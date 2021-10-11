
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
                                        <th>Product name</th>
                                        <th>Supplier Name</th>
                                        <th>quantity</th>
                                        <th> status</th>
                                        @if ( $user->can('product.update') && $user->can('product.update'))
                                        <th class="text-end">Action</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($returnproduct_list as $list)
                                    <tr>

                                        <td>{{ $list->Product->name }}</td>
                                        <td>{{ $list->Supplier->name }}</td>
                                        <td>{{ $list->return_quantiy }}</td>

                                        @if ($list->approve_status!=0)
                                       <td><button type="button" class="btn btn-success">Aproved</button></td>
                                       @else

                                       <td><button type="button" class="btn btn-success">Not Aproved</button></td>

                                        @endif









                                        <td class="text-end">
                                         @if ( $user->can('product.update') && $user->can('product.update'))
                                    <a href="/edit/returnproduct/{{$list->Product->id}}" class="btn btn-primary">Edit</a>

                                    <a href="{{ route('delete.return.product',$list->Product->id) }}" id="delete" class="btn btn-danger">Delete</a>
                                      {{-- <a href="{{ route('delete.product',$product->id) }}" id="delete" class="btn btn-danger">Aprove</a> --}}
                                    @endif
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


 {{-- <script>Swal.fire({
     title: 'Error!',
     text: 'Do you want to continue',
     icon: 'error',
     confirmButtonText: 'Cool'
   })</script>
  --}}


 @endsection
