<div class="p-3 shadow-sm">
   @if (isset($cctvs))
      @if ($cctvs->isNotEmpty())
         <div class="table-responsive">
            <table class="table table-hover fw-light text-extra-sm">
               <thead>
                  <tr>
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

               @foreach ($cctvs as $cctv)
               <tr>
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
            </table>
         </div>
      @else
         <div class="alert alert-warning">
            Maaf, data CCTV untuk {{ $requested_cctv }} tidak ditemukan
         </div>
      @endif

   @else
      <div class="alert alert-secondary">
         Silahkan cari data CCTV melalui form pencarian diatas.
      </div>
   @endif
</div>
