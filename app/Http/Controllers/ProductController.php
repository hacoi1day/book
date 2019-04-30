<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        $products = $this->product->all();
        return view('product.list', ['products' => $products]);
    }

    public function add()
    {
        $categories = $this->category->all();
        return view('product.add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $name = $params['name'];
        $price = $params['price'];
        $content = $params['content'];
        $categories = $params['categories'];
        // thêm product vào bản products
        $productCreate = $this->product->create([
            'name' => $name,
            'price' => $price,
            'content' => $content,
        ]);
        // thêm vào bảng category_product
        if(count($categories) > 0)
            $productCreate->categories()->attach($categories);

        if($productCreate)
        {
            return redirect()->route('product.list');
        }
        else
        {
            return abort(401);
        }
    }

    public function edit($id)
    {
        $categories = $this->category->all();
        $product = $this->product->find($id);
        $categoriesOfProduct = $product->categories;
//        dd($categoriesOfProduct);
        return view('product.edit', ['categories' => $categories, 'product' => $product, 'categoriesOfProduct' => $categoriesOfProduct]);
    }

    public function update(Request $request, $id)
    {
        $params = $request->all();
        $name = $params['name'];
        $price = $params['price'];
        $content = $params['content'];
        $categories = $params['categories'];
        // thay đổi thông tin trong bảng product
        $productUpdate = $this->product->find($id);
        $productUpdate->update([
            'name' => $name,
            'price' => $price,
            'content' => $content,
        ]);
        // đồng bộ trong bảng category_product
        if(count($categories) > 0)
            $productUpdate->categories()->sync($categories);
        if($productUpdate)
        {
            return redirect()->route('product.list');
        }
        else
        {
            return abort(401);
        }
    }

    public function delete($id)
    {

    }

}
