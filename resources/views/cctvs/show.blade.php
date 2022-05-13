@extends ('layouts.app')

@section ('title', 'Menampilkan CCTV ' . $cctv->ip_cctv)
@section ('content')

<div id="cctv-index">
   @include ('shared.search_form')
   @include ('cctvs.table_show')
</div>

@endsection
