<div class="shadow-sm p-3">
   @if (isset($cctv))

   @if (Auth::user()->role == 'admin')
   <div class="px-3">
      <ul class="nav">
         <li class="nav-item p-1">
            <a class="btn btn-sm btn-warning shadow fw-bolder" href="{{ route('cctvs.edit', ['cctv' => $cctv->id]) }}">
               <i class="fas fa-cog"></i> Edit
            </a>
         </li>
         <li class="nav-item p-1">
            <button class="btn btn-sm btn-danger shadow fw-bolder" type="button" data-bs-toggle="modal" data-bs-target="#deleteData">
               <i class="fas fa-trash"></i> Hapus
            </button>
         </li>
      </ul>
   </div>
   @endif

   <!-- Modal -->
   <div class="modal fade" id="deleteData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Hapus CCTV</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            Apakah anda yakin akan menghapus CCTV <b>{{ $cctv->ip_cctv }}</b> ?
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-sm btn-secondary shadow fw-bolder" data-bs-dismiss="modal">Batal</button>
            <form action="{{ route('cctvs.destroy', ['cctv' => $cctv->id]) }}" method="post">
               @csrf
               @method ('DELETE')
               <button type="submit" class="btn btn-sm shadow fw-bolder btn-danger">Hapus</button>
            </form>
         </div>
       </div>
     </div>
   </div>

   <div class="py-3"></div>

   <div class="px-3 py-2">
      <h3>Info CCTV</h3>
   </div>

   <div class="px-3">
      @include ('shared.message')
   </div>

   <div class="px-3 text-center">
      @if (!empty($cctv->image))
         <img src="{{ $cctv->image }}" alt="CCTV - {{ $cctv->ip_cctv }}" class="img-fluid shadow-lg rounded">
      @else
         <div class="alert alert-secondary">
            <i class="fas fa-camera"></i> Tidak ada gambar yang dapat ditampilkan
         </div>
      @endif
   </div>

   <div class="py-3"></div>

   @include ('shared.zone_map')

   <div class="table-responsive p-2">
      <table class="table table-hover">
         <tr>
            <td>No</td>
            <td>{{ $cctv->data_number ?? '-' }}</td>
         </tr>
         <tr>
            <td>Tanggal Pendataan CCTV</td>
            <td>{{ $cctv->recorded_at }}</td>
         </tr>
         <tr>
            <td>Group</td>
            <td>{{ $cctv->group ?? '-' }}</td>
         </tr>
         <tr>
            <td>Jenis</td>
            <td>{{ $cctv->cctv_type ?? '-' }}</td>
         </tr>
         <tr>
            <td>IP NVR</td>
            <td>{{ $cctv->ip_nvr ?? '-' }}</td>
         </tr>
         <tr>
            <td>IP CCTV</td>
            <td>
               {{ $cctv->ip_cctv ?? '-' }} <a href="http://{{ $cctv->ip_cctv }}" target="__blank"> <i class="fas fa-window-restore"></i> </a>
            </td>
         </tr>
         <tr>
            <td>CH</td>
            <td>{{ $cctv->ch ?? '-' }}</td>
         </tr>
         <tr>
            <td>Status</td>
            <td>{{ $cctv->status ?? '-' }}</td>
         </tr>
         <tr>
            <td>Area</td>
            <td>{{ $cctv->area ?? '-' }}</td>
         </tr>
         <tr>
            <td>Zona</td>
            <td>{{ $cctv->zone ?? '-' }}</td>
         </tr>
         <tr>
            <td>No CCTV</td>
            <td>{{ $cctv->cctv_number ?? '-' }}</td>
         </tr>
         <tr>
            <td>Kategori Area</td>
            <td>{{ $cctv->category_area ?? '-' }}</td>
         </tr>
         <tr>
            <td>Lokasi</td>
            <td>{{ $cctv->location ?? '-' }}</td>
         </tr>
         <tr>
            <td>Nama CCTV Old</td>
            <td>{{ $cctv->old_cctv ?? '-' }}</td>
         </tr>
         <tr>
            <td>New Nama CCTV</td>
            <td>{{ $cctv->new_cctv ?? '-' }}</td>
         </tr>
         <tr>
            <td>Perubahan Nama Done</td>
            <td>{{ $cctv->name_change ?? '-' }}</td>
         </tr>
         <tr>
            <td>Status Pendataan</td>
            <td>{{ $cctv->data_status ?? '-' }}</td>
         </tr>
         <tr>
            <td>Keterangan</td>
            <td>{{ $cctv->description ?? '-' }}</td>
         </tr>
      </table>
   </div>
   @else
   <div class="alert alert-warning">
      Maaf, data CCTV untuk {{ $requested_cctv }} tidak ditemukan
   </div>
   @endif

   <div class="p-3">
      <a class="btn btn-sm btn-danger fw-bolder shadow" href="{{ route('cctv.dashboard.get') }}">
         Kembali
      </a>
   </div>
</div>
