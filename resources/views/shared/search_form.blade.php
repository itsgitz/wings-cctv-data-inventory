<div class="py-2"></div>
<div class="p-3 shadow-sm">
   <div class="col-md-3">
      <form action="{{ route('cctv.search.post') }}" method="post">
         @csrf
         <div class="input-group mb-3">
            <input class="form-control form-control disable-outline" name="ip" type="text" placeholder="Cari IP CCTV ..." required>
            <button class="btn btn-secondary" type="submit">
               <i class="fas fa-search"></i>
            </button>
         </div>
      </form>
   </div>
   <div>
      @error ('ip')
         <div class="alert alert-danger alert-dismissible fw-light fade show">
            <i class="fas fa-exclamation-triangle"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @enderror
   </div>
</div>
<div class="py-3"></div>
