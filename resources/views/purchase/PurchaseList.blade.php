
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
                            <h4 class="header-title">Product List</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>purchase_date</th>
                                        <th>product_quantity</th>
                                        <th>purchase_price</th>
 
                                        <th>purchase_unit </th>
                                       
                                        <th>purchase_note</th>
                                        
                                        <th class="text-end">Action</th>
                                 
                                    </tr>
                                </thead>
 
                                <tbody>
                                    @foreach($purchases as $purchase)
                                    <tr>
                                     
 
                                        <td>{{ $purchase->purchase_date }}</td>
                                        <td>{{ $purchase->product_quantity }}</td>
                                        <td>{{ $purchase->purchase_price }}</td>
                                        <td>{{ $purchase->purchase_unit }}</td>
                                        <td>{{ $purchase->purchase_note }}</td>
 
 
                                        <td class="text-end">
                                        
                                    <a href="{{ route('edit.purchase',$purchase->id) }}" class="btn btn-primary">Edit</a>
                                    {{-- <button class="btn btn-danger"  id="message" onclick="delete({{$product->id}})">Delete</button> --}}
                                    <a href="{{ route('delete.purchase',$purchase->id) }}" id="delete" class="btn btn-danger">Delete</a>
                             
                                        </td>
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
















 
 

