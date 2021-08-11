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
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Edit</li>
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
                        @if (!empty($categories) && $categories->count() > 0)
                            <form action="{{route('admin.products.update', [$product->id])}}" method="post" class="col-10 mx-auto" enctype="multipart/form-data">
                                {{ method_field('put') }}
                                @csrf
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="product_category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ ($category->id == $product->category) ? 'selected' : '' }}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" class="form-control" name="product_name" value="{{$product->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea name="product_description" class="form-control" rows="3">{{$product->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image:</label>
                                    <input type="file" name="product_image" class="form-control-file">
                                    <img width="156px" height="200px" src="{{asset('/storage/product/' . $product->image)}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" step="0.01" name="product_price" class="form-control" value="{{$product->price}}">
                                </div>
                                <input type="submit" value="Update" class="btn btn-success float-right">
                            </form>
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
