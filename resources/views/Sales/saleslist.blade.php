@extends('./layout_master')
@section('admin')
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
                        </div>
                    </div>
                    <div class="pull-right margin-left-10 ">

                                                    </div>
												</div>
											</div>
			   <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" width="100%" role="grid" aria-describedby="example2_info" style="width: 100%;">
		        <thead class="bg-primary ">
			    <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 91px;" aria-label="Sales Date: activate to sort column ascending">Sales Date
				</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 154px;" aria-label="Sales Code: activate to sort column ascending">Product Code</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 135px;" aria-label="Customer Name: activate to sort column ascending">Customer Name</th>
                  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 135px;" aria-label="Customer Name: activate to sort column ascending">Customer Phone</th>
                  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 135px;" aria-label="Customer Name: activate to sort column ascending">Product Name</th>
                  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 118px;" aria-label="Paid Payment: activate to sort column ascending">Price</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 118px;" aria-label="Paid Payment: activate to sort column ascending">Total Paid</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 44px;" aria-label="Due: activate to sort column ascending">Due</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 133px;" aria-label="Payment Status: activate to sort column ascending">Payment Status</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 94px;" aria-label="Created by: activate to sort column ascending">Created by</th>
				  <th class="sorting_disabled text-light" rowspan="1" colspan="1" style="width: 98px;" aria-label="Action">

                    Action

                </th>
                </thead>

                <tbody>

                    @foreach ($sales as  $sale)
<tr>



    <td>{{$sale->sales_date}}</td>
    <td>{{$sale->sales_code}}</td>
    <td>{{$sale->sales_status}}</td>

    <td>{{$sale->customer_name}}</td>

    <td>{{$sale->price}}</td>

    <td>{{$sale->paid_payment}}</td>

    <td>{{$sale->due}}</td>

    <td>{{$sale->payment_status}}</td>
    <td>{{$sale->created_by}}</td>
    <td> <a href=""><i class="fas fa-trash-alt"></i></a>
    </td>



 </tr>
 @endforeach
                </tbody>

             </table>


    </div>
</div>
</div>

@endsection


