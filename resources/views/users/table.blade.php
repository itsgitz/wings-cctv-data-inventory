<div class="table-responsive">
   <table class="table table-hover fw-light text-extra-sm">
      <thead>
         <tr>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Dibuat Tanggal</th>
            <th scope="col">#</th>
         </tr>
      </thead>

      @if ($users->isNotEmpty())
         @foreach ($users as $user)
         <tr>
            <td>{{ $user->userid }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><b class="fw-bold">{{ $user->role == 'admin' ? 'Administrator' : 'User'  }}</b></td>
            <td>{{ $user->created_at }}</td>
            <td>
               <a class="btn btn-sm btn-success shadow fw-bold" href="{{ route('users.edit', ['user' => $user->id]) }}">
                  Edit
               </a>
            </td>
         </tr>
         @endforeach
      @else
         <tr>
            <td colspan="6" class="p-4">
               <div class="alert alert-warning">
                  Maaf, untuk saat ini data tidak tersedia. Silahkan untuk menambahkan user terlebih dahulu
                  <a href="{{ route('users.create') }}">di sini</a>.
               </div>
            </td>
         </tr>
      @endif
   </table>
</div>
