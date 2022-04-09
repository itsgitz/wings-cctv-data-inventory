@extends ('layouts.app')

@section ('title', 'Menampilkan CCTV - ' . $cctv->ip_cctv)
@section ('content')

<div id="cctv-index">
   @include ('shared.navigation')
   @include ('shared.search_form')
   @include ('cctvs.table')

</div>

@endsection
