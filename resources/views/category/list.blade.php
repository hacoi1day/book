@extends('base.app')

@section('title')
    Danh sách danh mục
@endsection

@section('content')
    <div class="container list-category my-3">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>danh sách danh mục</h3>
                    </div>
                    <div class="col-12">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">unsigned name</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $category['name'] }}</td>
                                <td>{{ $category['unsigned_name'] }}</td>
                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category['id']]) }}">Edit</a>
                                    <a href="{{ route('category.delete', ['id' => $category['id']]) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>thêm danh mục</h3>
                    </div>
                    @if(session('mess'))
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            {{ session('mess') }}
                        </div>
                    </div>
                    @endif
                    <div class="col-12">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">tên danh mục</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? "is-invalid" : "" }}" id="name" name="name" placeholder="name category">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback">{{ $errors->has('name') ? $errors->first('name') : "" }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">add category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection