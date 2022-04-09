<div class="shadow-sm p-3">
   @if (isset($cctv))
   <div class="table-responsive">
      <table class="table table-hover">
         <tr>
            <td>Jenis</td>
            <td>{{ $cctv->cctv_type }}</td>
         </tr>
         <tr>
            <td>IP NVR</td>
            <td>{{ $cctv->ip_nvr }}</td>
         </tr>
         <tr>
            <td>IP CCTV</td>
            <td>{{ $cctv->ip_cctv }}</td>
         </tr>
         <tr>
            <td>CH</td>
            <td>{{ $cctv->ch }}</td>
         </tr>
         <tr>
            <td>Status</td>
            <td>{{ $cctv->status }}</td>
         </tr>
         <tr>
            <td>Area</td>
            <td>{{ $cctv->area }}</td>
         </tr>
         <tr>
            <td>Zona</td>
            <td>{{ $cctv->zone }}</td>
         </tr>
         <tr>
            <td>No CCTV</td>
            <td>{{ $cctv->cctv_number }}</td>
         </tr>
         <tr>
            <td>Kategori Area</td>
            <td>{{ $cctv->category_area }}</td>
         </tr>
         <tr>
            <td>Lokasi</td>
            <td>{{ $cctv->location }}</td>
         </tr>
         <tr>
            <td>Nama CCTV Old</td>
            <td>{{ $cctv->old_cctv }}</td>
         </tr>
         <tr>
            <td>New Nama CCTV</td>
            <td>{{ $cctv->new_cctv }}</td>
         </tr>
         <tr>
            <td>Perubahan Nama Dome</td>
            <td>{{ $cctv->name_change }}</td>
         </tr>
         <tr>
            <td>Status Pendataan</td>
            <td>{{ $cctv->data_status }}</td>
         </tr>
         <tr>
            <td>Keterangan</td>
            <td>{{ $cctv->description }}</td>
         </tr>
      </table>
   </div>
   @else
   <div class="alert alert-warning">
      Maaf, data CCTV untuk alamat IP {{ $requested_cctv }} tidak ditemukan
   </div>
   @endif

   <div class="py-1">
      <a class="btn btn-sm btn-danger fw-bolder shadow" href="{{ route('cctv.dashboard.get') }}">
         Kembali
      </a>
   </div>
</div>
