@extends('./layout_master')
@section('admin')
<<<<<<< HEAD
<div class="content-page center">  
<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row margin-bottom-12">
        <div class="col-sm-12">
            <div class="pull-left">
                <div class="dataTables_length" id="example2_length">
                    <label>Show
                         <select name="example2_length" aria-controls="example2" class="form-control input-sm">
                             <option value="10">10</option>
                             <option value="25">25</option>
                             <option value="50">50</option>
                             <option value="100">100</option>
                            </select> entries</label>
=======
<div class="content-page center">
<div class="content">
<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row margin-bottom-12">
        <div class="col-sm-12">
                    <div class="pull-right">
                        <div id="example2_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example2"></label>
                        </div>
                        <div id="example2_processing" class="dataTables_processing panel panel-default" style="display: none;">
                            <div class="text-primary bg-primary" style="position: relative;z-index:100;overflow: visible;">Processing...</div>
>>>>>>> 9ab0fab7d77ded471f1a620c860e1f06db57e0bd
                        </div>
                    </div>
                    <div class="pull-right margin-left-10 ">

                                                    </div>
												</div>
											</div>
<<<<<<< HEAD
			<table id="example2" class="table table-bordered table-striped dataTable dtr-inline" width="100%" role="grid" aria-describedby="example2_info" style="width: 100%;">
			<thead class="bg-primary ">
             <tr role="row">
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 91px;" aria-label="Sales Date: activate to sort column ascending">Sales Date
=======
			   <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" width="100%" role="grid" aria-describedby="example2_info" style="width: 100%;">
		        <thead class="bg-primary ">
			    <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 91px;" aria-label="Sales Date: activate to sort column ascending">Sales Date
>>>>>>> 9ab0fab7d77ded471f1a620c860e1f06db57e0bd
				</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 154px;" aria-label="Sales Code: activate to sort column ascending">Product Code</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 135px;" aria-label="Customer Name: activate to sort column ascending">Customer Name</th>
                  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 135px;" aria-label="Customer Name: activate to sort column ascending">Product Name</th>
                  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 118px;" aria-label="Paid Payment: activate to sort column ascending">Price</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 118px;" aria-label="Paid Payment: activate to sort column ascending">Total Paid</th>
                  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 118px;" aria-label="Paid Payment: activate to sort column ascending">Total Paid</th>

				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 94px;" aria-label="Created by: activate to sort column ascending">Created by</th>
<<<<<<< HEAD
				  <th class="sorting_disabled text-light" rowspan="1" colspan="1" style="width: 98px;" aria-label="Action">Action</th>
				</tr>
                </thead>
				@php
					use App\Models\Product;
					$product  = Product::all();
				@endphp
				@foreach ($product as $product )
				<tr>
					<td>{{$product->product_code}}</td>
				</tr>
				@endforeach
                <tbody class="pos">
                </tbody>
				</table>
						<div class="btn-group" title="View Account">
										
										<ul role="menu" class="dropdown-menu dropdown-light pull-right"><li>
												<a title="View Invoice" href="sales/invoice/39">
													<i class="fa fa-fw fa-eye text-blue"></i>View sales
												</a>
											</li><li>
												<a title="Update Record ?" href="pos/edit/39">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li><li>
												<a title="Pay" class="pointer" onclick="view_payments(39)">
													<i class="fa fa-fw fa-money text-blue"></i>View Payments
												</a>
											</li><li>
												<a title="Pay" class="pointer" onclick="pay_now(39)">
													<i class="fa fa-fw fa-hourglass-half text-blue"></i>Payment Receive
												</a>
											</li><li>
												<a title="Update Record ?" target="_blank" href="sales/print_invoice/39">
													<i class="fa fa-fw fa-print text-blue"></i>Print
												</a>
											</li>
=======
				  <th class="sorting_disabled text-light" rowspan="1" colspan="1" style="width: 98px;" aria-label="Action">

                    Action

                </th>
                </thead>

                <tbody>

 @foreach ($sales as  $sale)
<tr>
    <td>{{$sale->sales_date}}</td>
    <td>{{$sale->sales_code}}</td>
    <td>{{$sale->customer_name}}</td>
    <td>{{$sale->item_name}}</td>
    <td>{{$sale->price}}</td>
    <td>{{$sale->paid_payment}}</td>
>>>>>>> 9ab0fab7d77ded471f1a620c860e1f06db57e0bd

    <td>{{$sale->payment_status}}</td>
    <td>{{$sale->created_by}}</td>
    <td> <a href="{{ route('pos.destroy', $sale->id ) }}"><i class="fas fa-trash-alt"></i></a>
    </td>
 </tr>
 @endforeach
                </tbody>

<<<<<<< HEAD
										</ul>
	                  </div>
 </div>
</div>
=======
             </table>


    </div>
</div>
</div>
>>>>>>> 9ab0fab7d77ded471f1a620c860e1f06db57e0bd

@endsection


