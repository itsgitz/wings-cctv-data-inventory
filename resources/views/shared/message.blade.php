<div class="py-1"></div>
@if ( session('message_success') )
   <div class="alert alert-success alert-dismissible fade show">
      {{ session('message_success') }}
      <button
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
      </button>
   </div>
@endif

@if ( session('message_error') )
   <div class="alert alert-danger alert-dismissible fade show">
      {{ session('message_error') }}
      <button
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
      </button>
   </div>
@endif
<div class="py-1"></div>
