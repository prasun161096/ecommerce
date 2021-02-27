@extends('layouts.admin_layouts.layouts')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                            <li class="breadcrumb-item">Products</li>
                            <li class="breadcrumb-item active">Add Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('/admin/add-product') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Product Title</label>
                                        <input type="text" name="product_name" class="form-control"
                                            placeholder="Enter your product name">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Descpriton</label>
                                        <input type="text" name="product_desc" class="form-control"
                                            placeholder="Enter product derscpition">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Brand</label>
                                        <select class="form-control" name="product_brand_id">
                                            <option value="">Select Brand</option>
                                            @foreach ($getAllBrand as $items)
                                                <option value="{{$items->id}}">{{ $items->brand_title }}</option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Cateogry</label>
                                        <select class="form-control" name="product_cat_id">
                                            <option value="">Select Category</option>
                                            @foreach ($getallcatagory as $item)
                                        <option value="{{$item->id}}">{{$item->category_title}}</option>
                                            @endforeach                                            
                                          </select>
                                    </div>
                                    <div class="form-group">
                                        <label>MRP Price</label>
                                        <input type="text" name="product_mrp_price" class="form-control"
                                            placeholder="Enter product MRP prize">
                                    </div>
                                    <div class="form-group">
                                        <label>Sell Price</label>
                                        <input type="text" name="product_sell_price" class="form-control"
                                            placeholder="Enter product sell prize">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <input type="file" name="product_img" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @if(Session::has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{Session::get('success')}}'
            })
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @if(Session::has('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{Session::get('error')}}'
            })
        </script>
    @endif
@endsection