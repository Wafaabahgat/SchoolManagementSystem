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
{{--
@if (isset($errors) && count($errors) > 0)
    <div class="flex my-5 items-center p-3.5 rounded text-danger bg-danger-light dark:bg-danger-dark-light">
        <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Danger!</strong>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </span>
        <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
@endif

@if (session()->has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 2000, // 5 seconds
                showConfirmButton: false
            });
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        console.log('first')
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'danger!',
                text: '{{ session('danger') }}',
                timer: 2000, // 5 seconds
                showConfirmButton: false
            });
        });
    </script>
@endif --}}
