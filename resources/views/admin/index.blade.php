@extends('admin.master')
@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>{{ session('success') }}</strong> 
        </div>
        
        <script>
          $(".alert").alert();
        </script>
    @endif
</div>
    <div class="jumbotron">
        <h1 class="display-3">Trang Admin</h1>
        <p class="lead">Jumbo helper text</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
        </p>
    </div>
@stop