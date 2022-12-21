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
        <a href="{{ route('product.add') }}" class="btn btn-success">ADD</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Sale_Price</th>
                    <th>image</th>
                    <th>Description</th>
                    <th>category_id</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->sale_price }}</td>
                    <td><img src="{{ url('uploads') }}/{{ $item->image }}" alt="" width="150px"></td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->category->name}}</td>
                    <td>
                        <a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary">Update</a>
                        <a href="{{ route('product.delete',$item->id) }}" onclick="return confirm ('Ban chac chan xoa chu ??')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                
                
            </tbody>
        </table>
    </div>
@stop