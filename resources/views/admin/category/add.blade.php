@extends('admin.master')
@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{{ session('error') }}</strong> 
            </div>
            
            <script>
              $(".alert").alert();
            </script>
        @endif
        <h1 class="text-success">Add Category</h1>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
              @error('name')
                    <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <label for="">Status</label>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="status"  value="1" checked> Hiện
                </label>
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="status"  value="0"> Ẩn
                </label>
            </div><br>
            <button type="submit" class="btn btn-success">ADD</button>
        </form>
    </div>
@stop