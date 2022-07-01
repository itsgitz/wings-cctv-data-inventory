<div class="table-responsive">
   <table class="table table-hover fw-light text-extra-sm">
      <thead>
         <tr>
            <th scope="col">Username</th>
            <th scope="col">Alias</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Deskripsi</th>
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
            <td>{{ $user->description ?? '-' }}</td>
            <td>
               <a class="btn btn-sm btn-warning shadow fw-bold" href="{{ route('users.edit', ['user' => $user->id]) }}">
                  <i class="fas fa-cog"></i> Edit
               </a>
               @if ($user->id != 1)
               <button data-bs-toggle="modal" data-bs-target="#deleteData" class="btn btn-sm btn-danger shadow fw-bold" type="button">
                  <i class="fas fa-trash"></i> Hapus
               </button>
               @endif
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


   <!-- Modal -->
   <div class="modal fade" id="deleteData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Apakah anda yakin akan menghapus user <b>{{ $user->name }}</b> ?
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-sm btn-secondary shadow fw-bolder" data-bs-dismiss="modal">Batal</button>
               <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                  @csrf
                  @method ('DELETE')
                  <button type="submit" class="btn btn-sm shadow fw-bolder btn-danger">Hapus</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
