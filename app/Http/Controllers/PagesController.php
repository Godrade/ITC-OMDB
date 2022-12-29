<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller {

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        return view('app.pages.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request) {
        $request->validate([
            'form_name' => 'required|string',
            'form_page' => 'required|numeric|min:0|max:100',
        ]);

        try {
            $mediaListed = array(
                'series' => $this->getMediaByType('series', "$request->form_name", "$request->form_page"),
                'movie' => $this->getMediaByType('movie', "$request->form_name", "$request->form_page"),
            );

            $pagination = array(
                'previousIndex' => $request->form_page - 1,
                'index' => $request->form_page,
                'nextIndex' => $request->form_page + 1,
                'mediaData' => $request
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
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


}
