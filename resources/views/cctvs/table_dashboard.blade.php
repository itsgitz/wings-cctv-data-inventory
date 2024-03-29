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

      @if ($cctvs->isNotEmpty())
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
      @else
         <tr>
            <td colspan="9" class="p-4">
               <div class="alert alert-warning">
                  Maaf, saat ini data untuk <b>{{ Request::input('group') }}</b> tidak tersedia. Silahkan untuk menambahkan CCTV terlebih dahulu
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
