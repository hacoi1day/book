<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        return view('category.list', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ], [
            'name.required' => 'Bạn phải điền tên danh mục',
            'name.min' => 'Tên danh mục phải có ít nhất 3 ký tự'
        ]);
        $params = $request->all();
        $name = $params['name'];
        $unsigned_name = changeTitle($name);

        $categoryCreate = $this->category->create([
            'name' => $name,
            'unsigned_name' => $unsigned_name
        ]);
        if($categoryCreate)
        {
            return redirect()->back()->with('mess', 'thêm thành công danh mục ' . $name);
        }
        else
        {
            return abort(401);
        }
    }

    public function edit($id)
    {
        $categories = $this->category->all();
        $categoryEdit = $this->category->findOrFail($id);
        return view('category.edit', ['categories' => $categories, 'categoryEdit' => $categoryEdit]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ], [
            'name.required' => 'Bạn phải điền tên danh mục',
            'name.min' => 'Tên danh mục phải có ít nhất 3 ký tự'
        ]);
        $params = $request->all();
        $name = $params['name'];
        $unsigned_name = changeTitle($name);

        $categoryUpdate = $this->category->findOrFail($id)->update([
            'name' => $name,
            'unsigned_name' => $unsigned_name,
        ]);
        if($categoryUpdate)
        {
            return redirect()->route('category.list')->with('mess', 'thay đổi thành công');
        }
        else
        {
            return abort(401);
        }
    }

    public function delete($id)
    {
        $categoryDelete = $this->category->find($id);
        if($categoryDelete->delete())
        {
            return redirect()->route('category.list')->with('mess', 'xóa thành công ' . $categoryDelete['name']);
        }
        else
        {
            return abort(401);
        }
    }
}
