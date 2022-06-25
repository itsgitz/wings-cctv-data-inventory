@extends ('layouts.app')

@section ('title', 'Tambah User')
@section ('content')

<div id="user-create">
   <div class="py-3"></div>

   <div class="p-3 shadow-sm">
      <div class="py-3">
         <h3>Tambah User</h3>
      </div>

      @include ('users.error_form_message')
      @include ('shared.message')

      <div class="py-3">
         <form action="{{ route('users.store') }}" method="post">
            @csrf

            <div class="mb-3 col-md-6">
               <label class="form-label" for="userid">Username</label>
               <input id="userid" name="userid" class="form-control" type="text" min="6" required>
            </div>
            <div class="mb-3 col-md-6">
               <label class="form-label" for="name">Name</label>
               <input id="name" name="name" class="form-control" type="text" min="6" required>
            </div>
            <div class="mb-3 col-md-6">
               <label class="form-label" for="email">Email</label>
               <input id="email" name="email" class="form-control" type="email" min="6" required>
            </div>
            <div class="mb-3 col-md-6">
               <select id="role" class="form-select" name="role" required>
                  <option value="">Pilih Role</option>
                  <option value="admin">Administrator</option>
                  <option value="user">User</option>
               </select>
            </div>
            <div class="mb-3 col-md-6">
               <label class="form-label" for="password">Password</label>
               <input id="password" name="password" class="form-control" type="password" min="6"required>
            </div>
            <div class="mb-3 col-md-6">
               <label class="form-label" for="confirm_password">Password Confirmation</label>
               <input id="confirm_password" name="confirm_password" class="form-control" type="password" min="6"required>
            </div>

            <div class="py-2"></div>

            <a class="btn btn-sm btn-danger shadow fw-bolder" href="{{ route('users.index') }}">
               Batal
            </a>

            <input class="btn btn-sm btn-primary shadow fw-bolder" type="submit" value="Simpan">
         </form>
      </div>
   </div>
</div>

@endsection
