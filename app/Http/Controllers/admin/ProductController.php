<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use Directory;

class ProductController extends Controller
{
    public function index()
    {
        $product = product::all();
        return view('admin.product.index',compact('product'));
    }
    public function add()
    {
        $category = category::all();
        return view('admin.product.add',compact('category'));
    } 
    public function create(ProductAddRequest $req)
    {
        $req->validated();
        if($req->has('file')){
            $file= $req->file;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
        }
        try {
            $req->merge(['image'=>$file_name]);
            product::create($req->all());
            return redirect()->route('product.index')->with('success','Thêm mới Thành Công');
        } catch (\Throwable $th) {
            dd($th);
        }
    }  
    public function edit($id)
    {
        $product = product::find($id);
        $category = category::all();
        return view('admin.product.edit',compact('product','category'));
    } 
    public function update(ProductEditRequest $req,$id)
    {
        $req->validated();
        $product = product::find($id);
        if($req->has('file')){
            $file= $req->file;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
        }else{
            $file_name = $product->image;
        }
        try {
            $req->merge(['image'=>$file_name]);
            $product->update($req->all());
            return redirect()->route('product.index')->with('success','Sửa Thành Công');
        } catch (\Throwable $th) {
            echo 'loi';
        }
    }
    public function delete($id)
    {
        $product = product::find($id);
        if($product->delete()){
            return redirect()->route('product.index')->with('success','Xóa Thành Công');
        }
    }
}
