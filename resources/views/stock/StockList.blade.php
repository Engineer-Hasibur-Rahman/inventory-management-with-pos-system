
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
                                        <th>Serial</th>
                                        <th>purchase_date</th>
                                        <th>product_name</th>
                                        <th>product_Category</th>
                                        <th>product_quantity</th>


                                    </tr>
                                </thead>
                                @php
                                $serial=0;

                           @endphp
                                <tbody>
                                    @foreach($stocks as $stock)

                                    @php
                                    $serial++;

                               @endphp
                                    <tr>

                                        <td>{{ $serial }}</td>
                                        <td>{{ $stock->product_add_date }}</td>
                                        <td>{{ $stock->product->name }}</td>
                                        <td>{{ $stock->product->category->category_name }}</td>
                                        @if ( $stock->product_stock_count <"5")
                                         <td><a class="btn btn-danger ">{{ $stock->product_stock_count }}</a></td>
                                         @else
                                          <td><a class="btn btn-primary ">{{ $stock->product_stock_count }}</a></td>
                                          @endif
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



















