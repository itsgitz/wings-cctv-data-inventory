@extends ('layouts.app')

@section ('title', 'Cari CCTV')
@section ('content')

<div id="cctv-index">
   <div class="p-3 shadow-sm">
      <a class="btn" href="{{ route('cctv.dashboard.get') }}">
         <h1 class="fs-4 fw-bolder text-danger">Wings CCTV Dashboard</h1>
      </a>
   </div>

   @include ('shared.search_form')

   <div class="shadow-sm p-3">
      @if (isset($welcome))
         <div class="alert alert-success">
            {{ $welcome }}
         </div>
      @else
         @if (isset($cctv))
         <table class="table table-hover">
            <tr>
               <td></td>
            </tr>
         </table>
         @else
         <div class="alert alert-warning">
            Maaf, data CCTV untuk alamat IP {{ $requested_cctv }} tidak ditemukan
         </div>
         @endif
      @endif
   </div>

</div>

@endsection
