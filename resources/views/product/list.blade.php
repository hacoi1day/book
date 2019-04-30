@extends('base.app')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
    <div class="container list-category my-3">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>danh sách sản phẩm</h3>
                    </div>
                    <div class="col-12">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">price</th>
                                <th scope="col">image</th>
                                <th scope="col">categories</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $product['name'] }}</td>
                                    <td>{{ $product['price'] }}</td>
                                    <td>{{ $product['image'] }}</td>
                                    <td>
                                        <ul style="margin-left: 0px; padding-left: 16px; list-style-type: circle;">
                                            @foreach($product->categories as $category)
                                            <li>{{ $category['name'] }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', ['id' => $product['id']]) }}">Edit</a>
                                        <a href="{{ route('product.delete', ['id' => $product['id']]) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection