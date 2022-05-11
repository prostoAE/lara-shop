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
                            <h1>Edit product</h1>
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

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Add new product</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="#">
                            @php /** @var \App\Models\Product $product */ @endphp
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product name</label>
                                    <input value="{{$product->name}}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Product name">
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea id="summernote">
                                        {{$product->description}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Product Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <p class="font-weight-bold">Gallery</p>
                                <div class="row my-3">
                                    @foreach($product->images as $image)
                                        <div class="col-sm-2">
                                            <a href="{{$image->image}}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                                <img src="{{$image->image}}" class="img-fluid mb-2" alt="white sample"/>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputRegularPrice">Regular price</label>
                                            <input value="{{$product->regular_price}}" type="number" class="form-control" id="inputRegularPrice" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputSalePrice">Sale price</label>
                                            <input value="{{$product->sale_price}}" type="number" class="form-control" id="inputSalePrice" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputQuantity">Quantity</label>
                                            <input value="{{$product->quantity}}" type="number" class="form-control" id="inputQuantity" placeholder="Quantity">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control select2" style="width: 100%;">
                                                @foreach($categories as $category)
                                                    <option @if($category->id == $product->category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tags</label>
                                            <select class="select2" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%;">
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
                                            <select class="select2" data-placeholder="Select a stock status" style="width: 100%;">
                                                @if($product->stock_status == 'instock')
                                                    <option selected>In Stock</option>
                                                    <option>Out of Stock</option>
                                                @else
                                                    <option>In Stock</option>
                                                    <option selected>Out of Stock</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <button class="btn btn-primary">Save product</button>
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
