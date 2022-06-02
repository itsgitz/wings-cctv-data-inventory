<div class="table-responsive">
   <table class="table table-hover fw-light text-extra-sm">
      <thead>
         <tr>
            <th scope="col">No</th>
            <th scope="col">Jenis CCTV</th>
            <th scope="col">IP NVR</th>
            <th scope="col">IP CCTV</th>
            <th scope="col">CH</th>
            <th scope="col">Status CCTV</th>
            <th scope="col">Area CCTV</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Zona</th>
            <th scope="col">Dibuat Tanggal</th>
            <th scope="col">#</th>
         </tr>
      </thead>

      @if ($cctvs->isNotEmpty())
         @foreach ($cctvs as $cctv)
         <tr>
            <td>{{ $cctv->data_number }}</td>
            <td>{{ $cctv->cctv_type }}</td>
            <td>{{ $cctv->ip_nvr }}</td>
            <td>{{ $cctv->ip_cctv }}</td>
            <td>{{ $cctv->ch }}</td>
            <td>{{ $cctv->status }}</td>
            <td>{{ $cctv->area }}</td>
            <td>{{ $cctv->location }}</td>
            <td>{{ $cctv->zone }}</td>
            <td>{{ $cctv->created_at }}</td>
            <td>
               <a href="{{ route('cctvs.show', ['cctv' => $cctv->id]) }}" class="btn btn-sm btn-success shadow fw-bold">
                  Lihat
               </a>
            </td>
         </tr>
         @endforeach
      @else
         <tr>
            <td colspan="9" class="p-4">
               <div class="alert alert-warning">
                  Maaf, untuk saat ini data tidak tersedia. Silahkan untuk menambahkan CCTV terlebih dahulu
                  <a href="{{ route('cctvs.create') }}">di sini</a>.
               </div>
            </td>
         </tr>
      @endif
   </table>

   @if ($cctvs->isNotEmpty())
      <div class="py-3">
         {{ $cctvs->links() }}
      </div>
   @endif
</div>
