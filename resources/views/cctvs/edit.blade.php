@extends ('layouts.app')

@section ('title', 'Edit CCTV ' . $cctv->ip_cctv)
@section ('content')
<div id="cctv-edit">
   <div class="py-3"></div>

   <div class="p-3 shadow-sm">
      <div class="py-3">
         <h3>Edit CCTV</h3>
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
      <form action="{{ route('cctvs.update', ['cctv' => $cctv->id]) }}" method="post">
         @csrf
         @method ('PUT')
         <div class="mb-3 col-md-6">
            <label class="form-label" for="cctvType">Jenis CCTV</label>
            <input id="cctvType" class="form-control" type="text" name="cctv_type" value="{{ $cctv->cctv_type ?? '-' }}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="ipNvr">IP NVR</label>
            <input id="ipNvr" class="form-control" type="text" name="ip_nvr" value="{{ $cctv->ip_nvr ?? '-' }}" required>
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="ipNvr">IP CCTV</label>
            <input id="ipCctv" class="form-control" type="text" name="ip_cctv" value="{{ $cctv->ip_cctv ?? '-' }}" required>
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="ch">CH</label>
            <input id="ch" class="form-control" type="text" name="ch" value="{{ $cctv->ch ?? '-' }}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="status">Status</label>
            <select class="form-select" name="status" required>
               <option value="Online" @if ($cctv->status == 'Online') selected @endif>Online</option>
               <option value="Offline" @if ($cctv->status == 'Offline') selected @endif>Offline</option>
            </select>
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="area">Area</label>
            <input id="area" class="form-control" type="text" name="area" value="{{ $cctv->area ?? '-' }}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="zone">Zona</label>
            <input id="zone" class="form-control" type="text" name="zone" value="{{ $cctv->zone ?? '-' }}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="noCctv">No. CCTV</label>
            <input id="noCctv" class="form-control" type="text" name="cctv_number" value="{{ $cctv->cctv_number ?? '-' }}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="categoryArea">Kategori Area</label>
            <input id="categoryArea" class="form-control" type="text" name="category_area" value="{{ $cctv->category_area ?? '-'}}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="location">Lokasi</label>
            <input id="location" class="form-control" type="text" name="location" value="{{ $cctv->location ?? '-' }}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="oldCctv">Old CCTV</label>
            <input id="oldCctv" class="form-control" type="text" name="old_cctv" value="{{ $cctv->old_cctv ?? '-' }}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="newCctv">New CCTV</label>
            <input id="newCctv" class="form-control" type="text" name="new_cctv" value="{{ $cctv->new_cctv ?? '-' }}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="nameChange">Perubahan Nama Done</label>
            <input id="nameChange" class="form-control" type="text" name="name_change" value="{{ $cctv->name_change ?? '-' }}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="dataStatus">Status Pendataan</label>
            <input id="dataStatus" class="form-control" type="text" name="data_status" value="{{ $cctv->data_status ?? '-' }}">
         </div>
         <div class="mb-3 col-md-6">
            <label class="form-label" for="description">Keterangan</label>
            <textarea id="description" class="form-control" type="text" name="description">{{ $cctv->description ?? '-' }}</textarea>
         </div>
         <a class="btn btn-sm btn-danger shadow fw-bolder" href="{{ route('cctvs.show', ['cctv' => $cctv->id]) }}">
            Batal
         </a>
         <input class="btn btn-sm btn-primary shadow fw-bolder" type="submit" value="Simpan">
      </form>
   </div>
</div>
@endsection
