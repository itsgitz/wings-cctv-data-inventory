@extends ('layouts.app')

@section ('title', 'Users Management')
@section ('content')

<div id="users-index">
   <div class="py-3"></div>

   <div class="shadow-sm p-3">
      <div id="button-box">
         <a class="btn btn-sm btn-secondary shadow fw-bolder" href="{{ route('users.create') }}">
            <i class="fas fa-user-plus"></i> Tambah User
         </a>
      </div>

      <div class="py-2"></div>

      @include ('shared.message')
      @include ('users.table')
   </div>
</div>

@endsection
