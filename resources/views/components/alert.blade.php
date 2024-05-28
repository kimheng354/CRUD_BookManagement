

@if (Session::has('success'))
    <div class="alert alert-success w-50 " role="alert">
        {{ session('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger fixed-top" role="alert">
        {{ session('error') }}
    </div>
@endif
