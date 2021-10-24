
 @extends('./layout_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="content-page center">
   <div class="content">

       <!-- Start Content-->
       <div class="container-fluid ">
<<<<<<< HEAD
           <div class="row">
            <div class="col-lg-4">
            </div>
               <div class="col-4  p-3">
=======
           <div class="row" style="padding-top: 50px">
            <div class="col-2"></div>
               <div class="col-8">
>>>>>>> 57458b6b367a99b3bb40ecbfd70280eca276b88d
                   <div class="card">
                       <div class="card-body">
                           <h4 class="header-title">Category List</h4>
                           <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 ">
                               <thead>
                                   <tr>
                                       <th>Category name</th>
                                       <th class="text-end">Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach($categories  as $cat)
                                    <tr>
                                       <td>{{$cat->category_name}}</td>
                                       <td class="text-end">
                                   <a href="/edit/category/{{$cat->id}}" class="btn btn-primary">Edit</a>
                                   <a href="/delete/category/{{$cat->id}}" id="delete" class="btn btn-danger">Delete</a>
                                       </td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>

                       </div> <!-- end card body-->
                   </div> <!-- end card -->
               </div><!-- end col-->
               <div class="col-2"></div>
           </div>
       </div>
   </div>
</div>
@endsection
