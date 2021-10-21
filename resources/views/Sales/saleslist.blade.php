@extends('./layout_master')
@section('admin')
<div class="content-page center">
    <div class="content">
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
                        </div>
                    </div>
                    <div class="pull-right">
                        <div id="example2_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example2"></label>
                        </div>
                        <div id="example2_processing" class="dataTables_processing panel panel-default" style="display: none;">
                            <div class="text-primary bg-primary" style="position: relative;z-index:100;overflow: visible;">Processing...</div>
                        </div>
                    </div>
                    <div class="pull-right margin-left-10 ">
                        <div class="dt-buttons btn-group">
                                              <button class="btn btn-default bg-red color-palette btn-flat hidden delete_btn pull-left" tabindex="0" aria-controls="example2" type="button">
                                                  <span>Delete</span>
                                                </button>
                                                 <button class="btn btn-default buttons-copy buttons-html5 bg-teal color-palette btn-flat" tabindex="0" aria-controls="example2" type="button">
                                                     <span>Copy</span>
                                                    </button>
                                                    <button class="btn btn-default buttons-excel buttons-html5 bg-teal color-palette btn-flat" tabindex="0" aria-controls="example2" type="button">
                                                        <span>Excel</span>
                                                    </button>
                                                    <button class="btn btn-default buttons-pdf buttons-html5 bg-teal color-palette btn-flat" tabindex="0" aria-controls="example2" type="button">
                                                        <span>PDF</span>
                                                    </button>
                                                     <button class="btn btn-default buttons-print bg-teal color-palette btn-flat" tabindex="0" aria-controls="example2" type="button">
                                                         <span>Print</span>
                                                        </button>
                                                        <button class="btn btn-default buttons-csv buttons-html5 bg-teal color-palette btn-flat" tabindex="0" aria-controls="example2" type="button">
                                                            <span>CSV</span>
                                                        </button>
                                                         <button class="btn btn-default buttons-collection buttons-colvis bg-teal color-palette btn-flat" tabindex="0" aria-controls="example2" type="button" aria-haspopup="true">
                                                             <span>Columns</span>
                                                            </button>
                                                        </div>
                                                    </div>
												</div>
											</div>
											 <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" width="100%" role="grid" aria-describedby="example2_info" style="width: 100%;">
												<thead class="bg-primary ">
                   <tr role="row">
					<th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 33px;" aria-label=" ">
                    <div class="icheckbox_square-orange" aria-checked="false" aria-disabled="false" style="position: relative;">
						<input type="checkbox" class="group_check checkbox" style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
						<ins class="iCheck-helper" style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
						</ins>
					</div>
                  </th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 91px;" aria-label="Sales Date: activate to sort column ascending">Sales Date
				</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 154px;" aria-label="Sales Code: activate to sort column ascending">Sales Code</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 105px;" aria-label="Sales Status: activate to sort column ascending">Sales Status</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 118px;" aria-label="Reference No.: activate to sort column ascending">Reference No.</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 135px;" aria-label="Customer Name: activate to sort column ascending">Customer Name</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 62px;" aria-label="Total: activate to sort column ascending">Total</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 118px;" aria-label="Paid Payment: activate to sort column ascending">Paid Payment</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 44px;" aria-label="Due: activate to sort column ascending">Due</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 133px;" aria-label="Payment Status: activate to sort column ascending">Payment Status</th>
				  <th class="sorting text-light" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 94px;" aria-label="Created by: activate to sort column ascending">Created by</th>
				  <th class="sorting_disabled text-light" rowspan="1" colspan="1" style="width: 98px;" aria-label="Action">Action</th>
				</tr>
                </thead>

                <tbody class="pos">

                <tr role="row" class="odd">
					<td class=" text-center" tabindex="0">
						<div class="icheckbox_square-orange" aria-checked="false" aria-disabled="false" style="position: relative;">
							<input type="checkbox" name="checkbox[]" value="39" class="checkbox column_checkbox" style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
							<ins class="iCheck-helper" style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
							</ins>
						</div>
					</td>
                    </tr>
                </tbody>

						<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
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

											<li>
												<a title="Update Record ?" target="_blank" href="sales/pdf/39">
													<i class="fa fa-fw fa-file-pdf-o text-blue"></i>PDF
												</a>
											</li>
											<li>
												<a style="cursor:pointer" title="Print POS Invoice ?" onclick="print_invoice(39)">
													<i class="fa fa-fw fa-file-text text-blue"></i>POS Invoice
												</a>
											</li><li>
												<a title="Sales Return" href="sales_return/add/39">
													<i class="fa fa-fw fa-undo text-blue"></i>Sales Return
												</a>
											</li><li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_sales('39')">
													<i class="fa fa-fw fa-trash text-red"></i>Delete
												</a>
											</li>

										</ul>
						</div>


    </div>
</div>
@endsection


