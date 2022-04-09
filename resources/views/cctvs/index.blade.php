@extends ('layouts.app')

@section ('title', 'Dashboard')
@section ('content')

<div id="cctv-index">
   <div class="p-3 shadow-sm">
      <a class="btn" href="{{ route('cctv.dashboard.get') }}">
         <h1 class="fs-4 fw-bolder text-danger">Wings CCTV Dashboard</h1>
      </a>
   </div>

   @include ('shared.search_form')

   <div class="table-responsive">
      <table class="table table-hover fw-light shadow-sm">
         <thead>
            <tr>
               <th scope="col">Jenis CCTV</th>
               <th scope="col">IP NVR</th>
               <th scope="col">IP CCTV</th>
               <th scope="col">CH</th>
               <th scope="col">Status CCTV</th>
               <th scope="col">Area CCTV</th>
               <th scope="col">Zona</th>
               <th scope="col">Dibuat Tanggal</th>
            </tr>
         </thead>

         @foreach ($cctvs as $cctv)
         <tr>
            <td>{{ $cctv->cctv_type }}</td>
            <td>{{ $cctv->ip_nvr }}</td>
            <td>{{ $cctv->ip_cctv }}</td>
            <td>{{ $cctv->ch }}</td>
            <td>{{ $cctv->status }}</td>
            <td>{{ $cctv->area }}</td>
            <td>{{ $cctv->zone }}</td>
            <td>{{ $cctv->created_at }}</td>
         </tr>
         @endforeach
      </table>
   </div>
</div>

@endsection
