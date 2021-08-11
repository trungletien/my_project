@extends('layout.admin')

@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="mt-2 mb-2" method="get" action="{{ route('admin.products.index') }}">
                            @csrf
                            <input type="text" name="keySearch">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                        @if (!empty($products) && $products->count() > 0)
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->categoryEntity->name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->price}}</td>
                                        <td><img width="156px" height="200px" src="{{asset('storage/product/' . $product->image)}}"/></td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.products.edit', [$product->id]) }}">Sửa</a>
                                            ||
                                            <form action="{{ route('admin.products.destroy', [$product->id]) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <input type="submit" value="Xóa">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <center>Data empty</center>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
