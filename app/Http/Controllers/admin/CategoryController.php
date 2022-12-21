<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::all();
       return view('admin.category.index',compact('categories'));
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function create(CategoryAddRequest $req)
    {
        $req->validated();
        try {
            $categories = category::create($req->all());
        return redirect()->route('category.index')->with('success','Thêm mới Thành Công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Thêm mới thất bại');
        }
       
    }
    public function edit($id)
    {
        $categories = category::find($id);
        return view('admin.category.edit',compact('categories'));
    }
    public function update(CategoryEditRequest $req,$id)
    {
        $req->validated();
        try {
            $categories = category::find($id);
            $categories->update($req->all());
            return redirect()->route('category.index')->with('success','Sửa Thành Công');
        } catch (\Throwable $th) {
            // return redirect()->back()->with('error','Sửa thất bại');
            dd('ok');
        }
        }
        
    
    public function delete($id)
    { 
            $categories = category::find($id);
            if ($categories->delete()){
                return redirect()->route('category.index')->with('success','Xóa Thành Công');
            }
    }
}
