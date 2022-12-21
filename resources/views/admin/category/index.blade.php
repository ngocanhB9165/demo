@extends('admin.master')
@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>{{ session('success') }}</strong> 
    </div>
    
    <script>
      $(".alert").alert();
    </script>
@endif
    <a href="{{ route('category.add') }}" class="btn btn-success">ADD</a>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->status ? 'Hiện' : 'Ẩn'}}</td>
                <td>
                    <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger" onclick="return confirm ('Bạn Chắc Chắn Xóa Chứ ??')">DELETE</a>
                    <a href="{{ route('category.edit',$item->id) }}" class="btn btn-primary">UPDATE</a>
                </td>
            </tr>
            @endforeach
            
           
        </tbody>
    </table>
</div>
    
@stop