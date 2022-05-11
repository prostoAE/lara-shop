@extends('admin.layouts.app')

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">

    @include('admin.includes.navbar')

    @include('admin.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                <li class="breadcrumb-item active">Fixed Navbar Layout</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

        @include('admin.includes.errors')

        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Add new product</h3>
                        </div>

                        <!-- /.card-header -->
                        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Product name">
                                </div>
                                <div class="form-group">
                                    <label>Product Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="product_thumbnail" class="custom-file-input" id="productFoto">
                                            <label class="custom-file-label" for="productFoto">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea id="summernote" name="description">
                                    Place <em>some</em> <u>text</u> <strong>here</strong>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Gallery</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="gallery[]" class="custom-file-input" id="exampleInputFile" multiple>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputRegularPrice">Regular price</label>
                                            <input type="number" name="regular_price" class="form-control" id="inputRegularPrice" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputSalePrice">Sale price</label>
                                            <input type="number" name="sale_price" class="form-control" id="inputSalePrice" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputQuantity">Quantity</label>
                                            <input type="number" name="quantity" class="form-control" id="inputQuantity" placeholder="Quantity">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tags</label>
                                            <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%;">
                                                <option>Alabama</option>
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Stock status</label>
                                            <select name="stock_status" class="select2" data-placeholder="Select a stock status" style="width: 100%;">
                                                <option>In Stock</option>
                                                <option>Out of Stock</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <button class="btn btn-primary">Add product</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
@endsection
