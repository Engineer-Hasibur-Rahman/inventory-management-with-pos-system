
 @extends('./layout_master')
{{-- section id is yeild name  --}}
@section('admin')
 <div class="content-page center">
    <div class="content">
        <!-- Start Content-->
     <div class="container-fluid">
 <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">Add Product</h3>

                <form method="POST" action="#" name="myForm" class="parsley-examples" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                    <div class="col-lg-6" >
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Code<span class="text-danger">*</span></label>
                        <input type="text" name="name" parsley-trigger="change"  placeholder="Enter Your Name" class="form-control" id="product_code" />
                        @error('name')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fathername" class="form-label">Product Name<span class="text-danger">*</span></label>
                        <input type="text" name="fathername" parsley-trigger="change"  placeholder="Enter Product name" class="form-control" id="fathername" />
                        @error('fathername')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                    <div class="mb-3">
                        <label for="mothername" class="form-label">Squ code<span class="text-danger">*</span></label>
                        <input type="text" name="mothername" parsley-trigger="change" placeholder="Enter squ_code" class="form-control" id="mothername" />
                        @error('mothername')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                    </div>
                    <div class="col-lg-6" >

                    <div class="mb-3">
                        <label for="permanent_address" class="form-label"> Product Image<span class="text-danger">*</span></label>
                        <input type="file" name="permanent_address" parsley-trigger="change"  placeholder="permanent_address" class="form-control" id="permanent_address" />
                          @error('permanent_address')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                    <div class="mb-3">
                        <label for="present_address" class="form-label">Product Proce<span class="text-danger">*</span></label>
                        <input type="text" name="present_address" parsley-trigger="change"  placeholder="Enter  present_address" class="form-control" id="present_address" />
                         @error('present_address')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Product Count<span class="text-danger">*</span></label>
                        <input type="email" name="email" parsley-trigger="change"  placeholder="Enter email" class="form-control" id="count" />
                        @error('count')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                 

                   
                    </div>


                     <div class=" text-center p-4">
                        <button class="btn btn-primary waves-effect waves-light"  id="submit" type="submit">SupplierSubmit</button>
                        <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                    </div>
                    </div>
                </form>
               
                
            </div>
        </div> <!-- end card -->

    </div>
    <!-- end col -->



 </div>
    </div>
    </div>
 </div>


@endsection
