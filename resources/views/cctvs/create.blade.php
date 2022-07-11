@extends ('layouts.app')

@section ('title', 'Tambah CCTV')
@section ('content')
<div id="cctv-create">
   <div class="py-3"></div>

   <div class="p-3 shadow-sm">
      <div class="py-3">
         <h3>Tambah CCTV</h3>
      </div>
      @error('ip_nvr')
         <div class="alert alert-danger alert-dismissible fw-light">
            <i class="fas fa-exclamation-triangle"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @enderror
      @error('ip_cctv')
         <div class="alert alert-danger alert-dismissible fw-light">
            <i class="fas fa-exclamation-triangle"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @enderror

      <form action="{{ route('cctvs.store') }}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="mb-3 col-md-6">
            <label class="form-label" for="group">Group</label>
            <select class="form-select" name="group" id="group">
               <option value="SMU1">SMU1</option>
               <option value="SMU2">SMU2</option>
               <option value="SMU3">SMU3</option>
            </select>
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="cctvType">Jenis CCTV</label>
            <input id="cctvType" class="form-control" type="text" name="cctv_type" value="" required>
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="ipNvr">IP NVR</label>
            <input id="ipNvr" class="form-control" type="text" name="ip_nvr" value="" required>
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="ipNvr">IP CCTV</label>
            <input id="ipCctv" class="form-control" type="text" name="ip_cctv" value="" required>
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="ch">CH</label>
            <input id="ch" class="form-control" type="text" name="ch" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="area">Area</label>
            <input id="area" class="form-control" type="text" name="area" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="zone">Zona</label>
            <input id="zone" class="form-control" type="text" name="zone" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="noCctv">No. CCTV</label>
            <input id="noCctv" class="form-control" type="text" name="cctv_number" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="categoryArea">Kategori Area</label>
            <input id="categoryArea" class="form-control" type="text" name="category_area" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="location">Lokasi</label>
            <input id="location" class="form-control" type="text" name="location" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="oldCctv">Old CCTV</label>
            <input id="oldCctv" class="form-control" type="text" name="old_cctv" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="newCctv">New CCTV</label>
            <input id="newCctv" class="form-control" type="text" name="new_cctv" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="nameChange">Perubahan Nama Done</label>
            <input id="nameChange" class="form-control" type="text" name="name_change" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="dataStatus">Status Pendataan</label>
            <input id="dataStatus" class="form-control" type="text" name="data_status" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="description">Keterangan</label>
            <textarea id="description" class="form-control" type="text" name="description" cols="30" rows="5"></textarea>
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="noAsset">No. Asset</label>
            <input id="noAsset" class="form-control" type="text" name="no_asset" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="yearAsset">Tahun Asset</label>
            <input id="yearAsset" class="form-control" type="text" name="year_asset" value="">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="image">Gambar CCTV (capture cctv)</label>
            <input id="image" class="form-control" type="file" name="image">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="zoneMap">Layout CCTV (zone map)</label>
            <input id="zoneMap" class="form-control" type="file" name="zone_map">
         </div>
         <div class="py-2"></div>
         <a class="btn btn-sm btn-danger shadow fw-bolder" href="{{ route('cctv.dashboard.get') }}">
            Batal
         </a>
         <input class="btn btn-sm btn-primary shadow fw-bolder" type="submit" value="Simpan">
      </form>
   </div>
</div>
@endsection
