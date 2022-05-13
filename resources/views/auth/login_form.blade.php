<div class="py-4"></div>
<div class="d-flex justify-content-center">
   <img src="/img/wings.svg" alt="logo-wings" width="150">
</div>
<div class="py-2"></div>
<div class="row">
   <div class="col-md-4 offset-md-4 rounded shadow-sm p-4">
      <div class="py-3"></div>
      <div class="d-flex justify-content-center">
         <h4 class="text-secondary">Login ke CCTV Data Inventory</h4>
      </div>
      <div class="py-3"></div>

      <div id="auth-login-form" class="">
         <form action="{{ route('auth.login.post') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
               <input id="userid" type="text" class="form-control disable-outline" placeholder="Username" name="userid" required>
               <label for="userid">Username</label>
            </div>
            @error ('userid')
            <div class="alert alert-danger text-extra-sm">
               <i class="fas fa-exclamation-triangle"></i> {{ $message }}
            </div>
            @enderror
            <div class="form-floating mb-3">
               <input id="password" class="form-control disable-outline" type="password" placeholder="Password" name="password" required>
               <label for="password">Password</label>
            </div>
            @error ('password')
            <div class="alert alert-danger text-extra-sm">
               <i class="fas fa-exclamation-triangle"></i> {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
               <input class="form-control btn btn-danger shadow fw-bolder" type="submit" value="Masuk">
            </div>
         </form>
      </div>
   </div>
</div>
