@if (Session::has('success') && Session::has('message'))
    <div class="alert alert-success">
        <strong>Success!</strong> {!! session('message') !!}.
    </div>
@endif

@if (Session::has('error') && Session::has('message'))
    <div class="alert alert-danger">
        <strong>Alert!</strong> {!! session('message') !!}.
    </div>
@endif
