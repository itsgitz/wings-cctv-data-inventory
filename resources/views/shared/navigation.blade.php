<div class="p-3 shadow-sm">
   <nav class="navbar navbar-expand-lg navbar-light bg-wight text-extra-sm">
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
               <li class="nav-item px-2">
                  <a class="nav-link fw-light" href="{{ route('cctv.dashboard.get') }}">
                     <i class="fas fa-chalkboard"></i> Dashboard
                  </a>
               </li>
               @if (Auth::user()->role == 'admin')
               <li class="nav-item px-2">
                  <a class="nav-link fw-light" href="{{ route('cctvs.create') }}">
                     <i class="fas fa-camera"></i> Tambah CCTV</a>
               </li>
               <li class="nav-item px-2">
                  <a class="nav-link fw-light" href="{{ route('users.index') }}">
                     <i class="fas fa-users"></i> User Management
                  </a>
               </li>
               @endif
               <li class="nav-item px-2 dropdown">
                  <a class="nav-link fw-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                  </a>

                  <ul class="dropdown-menu text-extra-sm" aria-labelledby="dropdownMenuLink">
                     <li>
                        <a class="fw-light dropdown-item" href="{{ route('users.edit', ['user' => Auth::id()]) }}">
                           <i class="fas fa-user-edit"></i> Settings
                        </a>
                     </li>
                     <li>
                        <a class="fw-light dropdown-item" href="{{ route('auth.logout.get') }}">
                           <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                     </li>
                  </ul>
               </li>
            </ul>
         </div>
       </div>
      </div>
   </nav>
</div>
