@extends('./layout_master')
@section('admin')
<div class="content-page center">
    <div class="content">

   

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row" style="padding: 30px;">
                <div class="col-6">
                    <div class="card">
                        <div class="row">

                            <div class="col-md-6 p-2">
                                <h5>Customer Create <span class="text-danger">*</span></h5>
                                <div class="input-group">
                                   {{-- <select  id="customer_id" name="customer_id"  style="width: 100%;"  >
                                      <option>All Customer </option>
                                                   @foreach($customers as $customer)
                                                       <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                                    @endforeach
                                   </select> --}}
                                  <span class="input-group-addon pointer" data-toggle="modal" data-target="#customer-modal" title="New Customer?">
                                    <button type="button" class="btn btn-success" style="background: #73e5e9" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                      <a href="#"><i style="color: white" class="fas fa-user"></i></a>
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <form method="POST" action="{{route('CustomerStored')}}" enctype="multipart/form-data">
                                              @csrf
                                              <div class="row">
                                                <input id="customer_id" type="text" name="customer_id" hidden>
                                                <div class="col-lg-6" >
                                              <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Customer Name</label>
                                                <input type="text"  name="customer_name" class="form-control" id="customer_name" required>
                                                @if($errors->has('customer_name'))
                                                <div style="color:red"> {{$errors->first('customer_name')}}</div>
                                                @endif
                                              </div>
                                              <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Address</label>
                                                <input type="text" name="address" class="form-control" id="address">
                                                @if($errors->has('address'))
                                                <div style="color:red"> {{$errors->first('address')}}</div>
                                                @endif
                                              </div>
                                               <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Email</label>
                                                <input type="text"  name="email" class="form-control" id="email">
                                                @if($errors->has('email'))
                                                <div style="color:red"> {{$errors->first('email')}}</div>
                                                @endif
                                              </div>
                                              </div>
                                               <div class="col-lg-6" >
                                              <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Phone</label>
                                                <input type="text"   name="phone" class="form-control" id="phone">
                                                @if($errors->has('phone'))
                                                <div style="color:red"> {{$errors->first('phone')}}</div>
                                                @endif
                                              </div>
                                              <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Image</label>
                                                <input type="file" name="image" parsley-trigger="change" value="{{old('image')}}"  class="form-control" id="image" />
                                                @if($errors->has('image'))
                                                <div style="color:red"> {{$errors->first('image')}}</div>
                                                @endif
                                              </div>
                                              </div>
                                              </div>
                                              <button class="btn btn-primary waves-effect waves-light"  style="background: #4E46A1"; type="submit">Add Customer</button>
                                            </form>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </span>
                                </div>
                                  <span class="customer_points text-success" style="display: none;"></span>
                              </div>
                              <div class="col-md-6 p-2">
                                <h5>Customer Items <span class="text-danger">*</span></h5>
                                <div class="input-group">
                                  <span class="input-group-addon" title="Select Items"></span>
                                   <input type="text" class="form-control" placeholder="Item name/Barcode/Itemcode" id="item_search">
                                </div>
                              </div>
                          </div>
                      </div>


            {{-- ///body///// --}}
            <div id="#" class="col-sm-12" style="overflow-y: auto; border: 1px solid rgb(51, 122, 183); height: 530px;">
                <table class="table table-condensed table-bordered table-striped table-responsive items_table" style="">
                  <thead class="bg-primary">
                    <tr><th width="10%" class="text-light">Item Name</th>
                    <th width="10%" class="text-light">Stock</th>
                    <th width="50%" class="text-light text-center ">Quantity</th>
                    <th width="5%" class="text-light">Price</th>
                    <th width="10%" class="text-light">Tax</th>
                    <th width="5%" class="text-light">Subtotal</th>
                    <th width="5%" class="text-light">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </th>
                  </tr></thead>

                  <tbody id="pos-form-tbody" class="pos"  style="font-size: 16px;font-weight: bold;overflow: scroll;">

                     {{-- mini cat start with ajax --}}




                </tbody>


                  <tfoot>

                    <!-- footer code -->
                  </tfoot>
                </table>
              </div>



            {{-- /////end --}}
            {{-- //////check --}}

            <div class="row">
            <div class="col-md-7 p-2">
                <div class="checkbox icheck">
                   <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false" style="position: relative;">
                    <input type="checkbox" checked="" class="form-control" id="send_sms" name="send_sms"
                    style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                    <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                    </ins>
                  </div>
                  <label for="sales_discount" class=" control-label">
                    <label for="send_sms">Send SMS to Customer</label>
                     <i class="hover-q " data-container="body" data-toggle="popover" data-placement="top"
                        data-content="If checkbox is Disabled! You need to enable it from SMS -> SMS API <br><b>Note:<i>Walk-in Customer will not receive SMS!</i></b>"
                      data-html="true" data-trigger="hover" data-original-title="Do you wants to send SMS ?" title="">
                       <i class="fa fa-info-circle text-maroon text-black hover-q"></i>
                     </i>
                   </label>
               </div>
             </div>
             <div class="col-sm-5 p-2">
                <form method="POST" action="{{route('download.pdf')}}">
                    @csrf
                <select  class="form-control select2" id="customer_id" name="customer_id"  style="width: 100%;"  >
                    <option>All Customer </option>
                                 @foreach($customers as $customer)
                                     <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                  @endforeach
                 </select>
                 <select class="form-control select2"  id="payment" name="payment"  style="width: 100%;"  >
                    <option>Payment System </option>

                                     <option>Cheque</option>
                                     <option>Cash</option>
                                    
                 </select>
              </div>
            </div>
            {{-- ////end --}}
                    {{-- making the count dynamic --}}
                        <div class="row">
                          <div class="col-md-4 text-right p-2">
                                  <label> Quantity:</label><br>
                                  ৳ <span style="font-size: 19px;"  id="cartQty" class="tot_amt text-bold"></span>
                          </div>
                          <div class="col-md-4 text-right p-2">
                                  <label>Total Amount:</label><br>
                                  ৳ <span style="font-size: 19px;" id="cartSubTotal" class="tot_amt text-bold"></span></div>


                          <div class="col-md-4 text-right p-2">
                                  <label>Grand Total:</label><br>
                                  ৳ <span style="font-size: 19px;"  id="cartTotal" class="tot_grand text-bold"></span></div>
                        </div>
                        {{-- making the count dynamic --}}
                        <div class="row">
                                <div class="col-sm-4">
                                    <button  type="button" id="" name="" class="btn btn-danger btn-block btn-flat btn-lg show_payments_modal" >
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                       Hold
                                      </button>
                                </div>

                                <div class="col-sm-4">
                                    <button type="button" id="" name="" class="btn btn-success btn-block btn-flat btn-lg show_payments_modal" >
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                         Cash
                                      </button>
                                </div>


                                    <button type="submit"  id="" name="" class="btn btn-primary btn-block btn-flat btn-lg show_payments_modal" >


                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                        <a style="color: white"  > Pay All</a>
                                      </button>
                                      @error('pay')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror


                                </div>



                        </div>
                    </form>

                </div><!-- end col-->

                <div class="col-6 p-1 ">
                    <div class="row p-1">
                        <div class="col-md-6">
                          <h5>Category Select <span class="text-danger">*</span></h5>
                          <select class="form-control select2" id="categorySelect" name="category_id"  style="width: 100%;"  >
                            <option value="all">All Product</option>
                            @foreach($categorys as $category)

                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                   @endforeach
                               </select>


                        </div>


                        <div class="col-md-6">
                          <h5>Filter Items <span class="text-danger">*</span></h5>
                          <form type="get" action="{{url('/search')}}">
                          <div class="input-group input-group-md">


                              <input type="search" id="search_it" name="query" class="form-control" placeholder="Filter Items" autocomplete="off">

                                  <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info btn-flat show_all">All</button>

                                  </span>

                            </div>
                        </div>
                      </div>
                      <div class="p-1">

                      <div class="row" id='showProduct' style="padding-left:5px;padding-right:5px;">

                        {{-- @foreach ($products as $item)
                        <div class="data col-sm-3">
                            <div class="card bg-info ">
                                 <div class="card-body">
                                <h5   class="name card-title">{{$item->name}}</h5>
                                    <center>
                                     <img  class=" img-responsive item_image " style="border: 1px solid gray; height:60px; width:60px;  "
                                     src={{$item->product_image}} alt="Item picture">
                                <p class="count card-text">{{$item->count}} </p>
                                <p > <i class="price fa-solid fa-bangladeshi-taka-sign"></i>{{$item->price}}</p>
                                    </center>
                   </div>
                 </div>
               </div>
                       @endforeach --}}


                      </div>







                </div>





                      </div>

            </div>
        </div>
    </div>

 <script>
  // In your Javascript (external .js resource or <script> tag)
     $(document).ready(function() {
         $('#customer_id').select2();
     });
 </script>

<script>
    var accessToken = '';
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{!! route('token') !!}",
            type: 'POST',
            contentType: 'application/json',
            success: function (data) {
                console.log('got data from token  ..');
                console.log(JSON.stringify(data));
                accessToken = JSON.stringify(data);
            },
            error: function () {
                console.log('error');
            }
        });
    });
</script>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->










@endsection
