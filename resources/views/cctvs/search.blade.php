@extends ('layouts.app')

@section ('title', 'Cari CCTV')
@section ('content')

<div id="cctv-index">
   @include ('shared.search_form')
   @include ('cctvs.table_show')
</div>

@endsection
