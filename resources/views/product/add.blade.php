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
                        <h3>thêm sản phẩm</h3>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('product.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">tên sản phẩm</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? "is-invalid" : "" }}" id="name" name="name" placeholder="name product">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback">{{ $errors->has('name') ? $errors->first('name') : "" }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">giá sản phẩm</label>
                                <input type="number" class="form-control {{ $errors->has('price') ? "is-invalid" : "" }}" id="price" name="price" placeholder="price product">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback">{{ $errors->has('price') ? $errors->first('price') : "" }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">image product</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="content">chi tiết sản phẩm</label>
                                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories">danh mục</label>
                                <select multiple class="form-control" id="categories" name="categories[]">
                                    @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">add product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection