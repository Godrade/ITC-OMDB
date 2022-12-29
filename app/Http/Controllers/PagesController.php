<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller {

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        return view('app.pages.index');
    }

    /**
     * @param $omdbName
     * @param $pageID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function search($omdbName, $pageID) {
        $urlData = array('omdbName' => $omdbName, 'pageID' => $pageID);

        Validator::make($urlData, [
            'omdbName' => 'required|string',
            'pageID' => 'required|numeric|min:0|max:100',
        ])->validated();

        try {
            $mediaListed = array(
                'series' => $this->getMediaByType('series', "$omdbName", "$pageID"),
                'movie' => $this->getMediaByType('movie', "$omdbName", "$pageID"),
            );

            if (empty($mediaListed['movie']['totalResults'])) $mediaListed['movie']['totalResults'] = 10;
            if (empty($mediaListed['series']['totalResults'])) $mediaListed['series']['totalResults'] = 10;

            $paginationIndexMax = round($mediaListed['movie']['totalResults'] / 10, 0, PHP_ROUND_HALF_UP);
            if ($mediaListed['series']['totalResults'] > $mediaListed['movie']['totalResults']) {
                $paginationIndexMax = round($mediaListed['movie']['totalResults'] / 10, 0, PHP_ROUND_HALF_UP);
            }

            $pagination = array(
                'previousIndex' => $pageID - 1 == 0 ? 1 : $pageID - 1,
                'index' => $pageID,
                'nextIndex' => $pageID < $paginationIndexMax ? $pageID + 1 : 1,
                'mediaData' => $urlData
            );

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('app.index')->withErrors('An error has occurred!');
        }

        return view('app.pages.search-media', compact('mediaListed', 'pagination'));
    }

    /**
     * @param $type
     * @param $name
     * @param int $page
     * @return array|mixed|string[]
     */
    private function getMediaByType($type, $name, $page = 1) {
        try {
            $apiKey = ENV('OMDB_API_KEY');
            return Http::accept('application/json')->get("http://www.omdbapi.com/?s=$name&plot=short&apikey=$apiKey&type=$type&r=json&page=$page")->json();
        } catch (\Exception $e) {
            return array(
                'Response' => 'False',
                'Error' => $type . 'not found'
            );
        }
    }

    /**
     * @param $omdbID
     * @param $type
     * @return array|mixed|string[]
     */
    private function getMediaByOmdbID($omdbID, $type) {
        try {
            $apiKey = ENV('OMDB_API_KEY');
            return Http::accept('application/json')->get("http://www.omdbapi.com/?i=$omdbID&plot=full&apikey=$apiKey")->json();
        } catch (\Exception $e) {
            return array(
                'Response' => 'False',
                'Error' => $type . 'not found'
            );
        }
    }

    /**
     * @param $type
     * @param $imdbID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fiche($type, $omdbID) {
        try {
            $media = $this->getMediaByOmdbID($omdbID, $type);
            $media['Genre'] = explode(',', $media['Genre']);
            $media['Runtime'] = $media['Runtime'] != 'N/A' ? $this->formatRuntime(explode(' ', $media['Runtime'])[0]) : 'No duration available';
        } catch (\Exception $e) {
            return redirect()->route('app.index')->withErrors('An error has occurred!');
        }

        return view('app.pages.media-fiche', compact('media'));
    }

    /**
     * @param $runtime
     * @return string
     */
    private function formatRuntime($runtime) {
        return floor($runtime / 60) . 'h ' . ($runtime - floor($runtime / 60) * 60) . 'm';
    }
}
