@extends ('layouts.app')

@section ('title', 'Dashboard')
@section ('content')

<div id="cctv-index">
   @include ('shared.search_form')

   <div class="shadow-sm p-3">
      @include ('cctvs.table_dashboard')
   </div>
</div>

@endsection
