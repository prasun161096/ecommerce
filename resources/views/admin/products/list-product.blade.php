@extends('layouts.admin_layouts.layouts')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item ">Products</li>
              <li class="breadcrumb-item active">Product List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of all products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Product Title</th>
                                <th>Description</th>
                                <th>Brand Name</th>
                                <th>Category Name</th>
                                <th>Product Mrp Price</th>
                                <th>Product Sell Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($getallproduct as $item)                    
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->product_title}}</td>
                                        <td>{{$item->product_desc}}</td>
                                        <td>{{$item->brand_title}}</td>
                                        <td>{{$item->category_title}}</td>
                                        <td>{{$item->product_mrp_price}}</td>
                                        <td>{{$item->product_sell_price}}</td>
                                        <td>{{$item->product_img_url}}</td>
                                        @if ($item->status==1)
                                            <td>Active</td>
                                        @else
                                        <td>Not Active</td>                                        
                                        @endif
                                        <td>
                                            <a href="/admin/edit-product/{{$item->id}}" class="">Edit</a>
                                            <a href="#" class="">View</a>
                                            <a href="/admin/delete-product/{{$item->id}}" class="">Delete</a>                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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