@extends('admin.master')
@section('content')
    <div class="container">

        <h1 class="text-primary">Update Category</h1>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" value="{{ $categories->name }}">
              @error('name')
                    <div class="text-danger">{{ $message }}</div>
            @enderror
            <label for="">Status</label>
            </div>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="status"  checked value="1" {{ $categories->status ? 'checked' : '' }}> Hiện
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="status"  value="0" {{ !$categories->status ? 'checked' : '' }}> Ẩn
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@stop