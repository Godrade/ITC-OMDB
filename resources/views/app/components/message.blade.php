@if ($errors->any())
    {{-- MessageBoxError --}}
    @foreach ($errors->all() as $error)
        <script>toastr.error('{{ $error }}', 'WARNING', {escapeHtml:false}) </script>
    @endforeach
@endif
@if(session('success'))
    {{-- MessageBoxSuccess --}}
    <script>toastr.error({{ session('success') }}, 'WARNING', {escapeHtml:false}) </script>
@endif
