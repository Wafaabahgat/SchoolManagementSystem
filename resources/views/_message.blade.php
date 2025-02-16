@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center small p-2 m-2" role="alert">
        {{ session('success') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> --}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center small p-2 m-2" role="alert">
        {{ session('error') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" ></button> --}}
    </div>
@endif
