@extends ('layouts.app')

@section ('title', 'Edit CCTV ' . $cctv->ip_cctv)
@section ('content')
<div id="cctv-edit">
   @include ('shared.navigation')
   <div class="py-3"></div>

   <div class="p-3 shadow-sm">
      <form action="" method="post">
         @csrf
         @method ('PUT')
         <div class="mb-3 col-md-3">
            <label class="form-label" for="cctvType">Jenis CCTV</label>
            <input id="cctvType" class="form-control" type="text">
         </div>
         <div class="mb-3 col-md-3">
            <label class="form-label" for="ipNvr">IP NVR</label>
            <input id="ipNvr" class="form-control" type="text">
         </div>
         <div class="mb-3 col-md-3">
            <label class="form-label" for="ipNvr">IP CCTV</label>
            <input id="ipCctv" class="form-control" type="text">
         </div>
         <div class="mb-3 col-md-3">
            <label class="form-label" for="ch">CH</label>
            <input id="ch" class="form-control" type="text">
         </div>
      </form>

      <a class="btn btn-sm btn-danger shadow fw-bolder" href="{{ route('cctvs.show', ['cctv' => $cctv->id]) }}">
         Batal
      </a>
   </div>
</div>
@endsection
