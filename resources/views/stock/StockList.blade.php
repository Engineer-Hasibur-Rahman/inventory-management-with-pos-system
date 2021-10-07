
 @extends('./layout_master')

 {{-- section id is yeild name  --}}

 @section('admin')
 @php
 $user =Auth::user()
 @endphp

 <div class="content-page center">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Stock List</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>purchase_date</th>
                                        <th>product_name</th>
                                        <th>product_quantity</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($stocks as $stock)
                                    <tr>


                                        <td>{{ $stock->product_add_date }}</td>
                                        <td>{{ $stock->product->name }}</td>
                                        <td>{{ $stock->product_stock_count }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </div>
    </div>
 </div>




 @endsection



















