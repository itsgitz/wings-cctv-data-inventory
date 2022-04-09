@extends ('layouts.app')

@section ('title', 'Dashboard')
@section ('content')

<div id="cctv-index">

   @include ('shared.navigation')
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
               <th scope="col">#</th>
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
            <td>
               <a href="{{ route('cctvs.show', ['cctv' => $cctv->id]) }}" class="btn btn-sm btn-primary shadow fw-bold">
                  Lihat
               </a>
            </td>
         </tr>
         @endforeach
      </table>
   </div>
</div>

@endsection
