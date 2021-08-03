@extends('layout.admin')

@section('header-content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                        <form action="{{route('admin.categories.update', [$category->id])}}" method="post" class="col-10 mx-auto">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Name category:</label>
                                <input type="text" class="form-control" name="category_name" value="{{$category->name}}">
                            </div>
                            <div class="form-group">
                                <label>Image:</label>
                                <input type="file" class="form-control-file" name="category_image" value="{{$category->image}}">
                            </div>
                            <input type="submit" value="Update" class="btn btn-success float-right">
                        </form>
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
