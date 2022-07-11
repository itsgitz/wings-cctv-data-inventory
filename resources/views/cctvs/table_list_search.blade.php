<div class="p-3 shadow-sm">
   @if (isset($cctvs))
      @if ($cctvs->isNotEmpty())
         <div class="table-responsive">
            <table class="table table-hover fw-light text-extra-sm">
               <thead>
                  <tr>
                     <th scope="col">IP NVR</th>
                     <th scope="col">IP CCTV</th>
                     <th scope="col">CH</th>
                     <th scope="col">Lokasi</th>
                     <th scope="col">Zona</th>
                     <th scope="col">No. Asset</th>
                     <th scope="col">Tahun Asset</th>
                     <th scope="col">#</th>
                  </tr>
               </thead>

               @foreach ($cctvs as $cctv)
               <tr>
                  <td><a href="http://{{ $cctv->ip_nvr }}" target="__blank">{{ $cctv->ip_nvr }}</a></td>
                  <td><a href="http://{{ $cctv->ip_cctv }}" target="__blank">{{ $cctv->ip_cctv }}</a></td>
                  <td>{{ $cctv->ch }}</td>
                  <td>{{ $cctv->location }}</td>
                  <td>{{ $cctv->zone }}</td>
                  <td>{{ $cctv->no_asset ?? '-' }}</td>
                  <td>{{ $cctv->year_asset ?? '-' }}</td>
                  <td>
                     <a href="{{ route('cctvs.show', ['cctv' => $cctv->id]) }}" class="btn btn-sm btn-success shadow fw-bold">
                        <i class="fas fa-eye"></i> Lihat
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
