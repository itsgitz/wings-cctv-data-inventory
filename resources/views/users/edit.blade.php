@extends ('layouts.app')

@section ('title', 'Edit User ' . $user->name)
@section ('content')
<div id="user-show">
   <div class="py-3"></div>

   <div class="p-3 shadow-sm">
      <div class="py-3">
         <h3>Edit User {{ $user->name }}</h3>
      </div>

      @include ('users.error_form_message')
      @include ('shared.message')

      <div class="py-3">
         <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
            @csrf
            @method ('PUT')

            <div class="mb-3 col-md-6">
               <label class="form-label" for="userId">Username</label>
               <input id="userId" class="form-control" type="text" name="userid" value="{{ $user->userid }}" @if ($user->id == 1) disabled @endif required>
            </div>

            <div class="mb-3 col-md-6">
               <label class="form-label" for="name">Alias</label>
               <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3 col-md-6">
               <label class="form-label" for="email">Email</label>
               <input id="email" class="form-control" type="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3 col-md-6">
               <label class="form-label" for="role">Role</label>
               <select id="role" class="form-select" name="role" @if ($user->id == 1) disabled @endif>
                  <option value="admin" @if ($user->role == 'admin') selected @endif>Administrator</option>
                  <option value="user" @if ($user->role == 'user') selected @endif>User</option>
               </select>
            </div>

            <div class="mb-3 col-md-6">
               <label class="form-label" for="password">Password</label>
               <input id="password" class="form-control" type="password" name="password" min="6">
            </div>
            <div class="mb-3 col-md-6">
               <label class="form-label" for="confirm_password">Confirm Password</label>
               <input id="confirm_password" class="form-control" type="password" name="confirm_password" min="6">
            </div>
            <div class="mb-3 col-md-6">
               <label class="form-label" for="description">Deskripsi</label>
               <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $user->description }}</textarea>
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
