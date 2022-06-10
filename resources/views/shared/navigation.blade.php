<div class="p-3 shadow-sm">
   <nav class="navbar navbar-expand-lg navbar-light bg-wight">
      <div class="container">
      <a class="navbar-brand" href="{{ route('cctv.dashboard.get') }}">
         <img src="/img/wings.svg" alt="wings-logo" width="100">
         <span class="text-danger fw-light brand-text">CCTV Data Inventory</span>
      </a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           <li class="nav-item">
           </li>
         </ul>
         <div class="d-flex">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link fw-light" href="{{ route('cctv.dashboard.get') }}">
                     <i class="fas fa-chalkboard"></i> Dashboard
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link fw-light" href="{{ route('cctvs.create') }}">
                     <i class="fas fa-camera"></i> Tambah CCTV</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link fw-light" href="{{ route('auth.logout.get') }}">
                     <i class="fas fa-sign-out-alt"></i> Logout
                  </a>
               </li>
            </ul>
         </div>
       </div>
     </div>
   </nav>
</div>
