@extends('admin.master')
@section('content')
    <div class="container mb-5">
        <h1 class="text-primary">Apdate Product</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" value="{{ $product->name }}">
              <@error('name')
              <div class="text-danger">{{ $message }}</div>
          @enderror
            </div>
            <div class="form-group">
              <label for="">Price</label>
              <input type="text" name="price" id="" class="form-control" value="{{ $product->price }}">
              @error('price')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Sale_Price</label>
              <input type="text" name="sale_price" id="" class="form-control" value="{{ $product->sale_price }}">
              @error('sale_price')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" name="file" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <img src="{{ url('uploads') }}/{{ $product->image }}" alt="" width="200px">
              @error('file')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" name="description" id="" rows="5">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
              <label for="">Category</label>
              <select class="form-control" name="category_id" id="">
                @foreach ($category as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected':'' }}>{{ $item->name }}</option>
                @endforeach
                
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@stop