
@include('./body.header')

        <!-- Begin page -->
        <div id="wrapper">
       <!-- Topbar Start -->
        @include('./body.navbar')
        <!-- end Topbar -->
            <!-- ========== Left Sidebar Start ========== -->
            @include('./body.sidebar')
            <!-- Left Sidebar End -->
        </div>
        <!-- END wrapper -->
      @yield('admin')
        <!-- /Right-bar -->
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- {{ asset('backend/')}} -->

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Vendor js -->
        <script src=" {{ asset('/assets/js/vendor.min.js')}}"></script>
        <!-- Plugins js-->
        <script src="{{ asset('/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{ asset('/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{ asset('/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
        <!-- Dashboar 1 init js-->
        <script src="{{ asset('/assets/js/pages/dashboard-1.init.js')}}"></script>
           <!-- third party js -->
           <script src="{{ asset('/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
           <script src="{{ asset('/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
           <script src="{{ asset('/assets/js/chart.js')}}"></script>
           <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>

           <script src="{{ asset('/assets/js/axios.min.js')}}"></script>
           <!-- third party js ends -->
           <!-- Datatables init -->
           <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
           <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>
        <!-- App js-->
        <script src="{{ asset('/assets/js/app.min.js')}}"></script>
        <script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


     

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}



{{-- bar chart js --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script> --}}

        {{-- chart script --}}
        {{-- <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
          var data = google.visualization.arrayToDataTable([
          ['Product Id', 'Sales Price', 'Sales Product Quantity'],

          @php
            foreach($salesPos as $product) {
            echo "['".$product->item_name."', ".$product->price.", ".$product->quantity."],";
            }
          @endphp
          ]);

          var options = {
            chart: {
          title: 'Product Graph ',
          subtitle: 'Price, and Quantity: @php echo $salesPos[0]->created_at @endphp',
            },
            bars: 'vertical'
          };
          var chart = new google.charts.Bar(document.getElementById('bar-chart'));
          chart.draw(data, google.charts.Bar.convertOptions(options));
            }
          </script> --}}


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <!-- noster notify js function  start -->








  </body>
  <script>

    $( document ).ready(function() {

        fetchpos();

        function fetchpos() {
            console.log("sss");
                $.ajax({
                    type: "GET",
                    url: "/fetch-pos",
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('.pos').html("");
                        $.each(response.pos, function (key, item) {
                            $('.pos').append('<tr>\
                            \
                                <td>' + item.customer_name + '</td>\
                                <td>' + item.price + '</td>\
                                <td>' + item.stock + '</td>\
                                <td>' + item.quantity + '</td>\
                                <td>' + item.due + '</td>\
                                <td>' + item.tax + '</td>\
                               \
                             \
                            \</tr>');
                        });
                    }
                });
            }






  </body>  <!-- end body-->


  <script>

    $( document ).ready(function() {
        console.log( "ready!" );


      $('#categorySelect').on('change',function()
      {

        var selectedVal = $("#categorySelect option:selected").val();
        console.log(selectedVal);
        $murl  = '{{url('/getProduct/')}}'+'/'+selectedVal;
        console.log($murl);

        $.ajax({
              method:'GET',
              url: $murl,

              dataType: 'json',
              success: function (data) {



                  console.log(data);
                  $( "#showProduct" ).empty();

                  $( data ).each(function( index ) {



                    var value=$(".mybtn").attr("value");
                        console.log(value);




                        $string=` <button type="submit" class="mybtn" value="${data[index].id}"><div class="data col-sm-3">
                            <div class="card bg-info ">
                              <div class="card-body">
                                <h5  value="${data[index].name}" class="name card-title"> ${data[index].name}</h5>

                                <center>
                                  <img  class=" img-responsive item_image " style="border: 1px solid gray; height:60px; width:60px;  "
                                   src=" /${data[index].product_image}" alt="Item picture">
                                 <p value="${data[index].count}"  class="quantity card-text"> ${data[index].count}</p>
                                <h5 value="${data[index].price}" class="price"><i class="fa-solid fa-bangladeshi-taka-sign"></i>${data[index].price}</h5>
                              </center>
                            </div>
                          </div>
                        </div></button>`;

                 $( "#showProduct" ).append( $string);

                });

                fetchProduct();



                        $string=`<div class="col-sm-3">
                            <div class="card bg-info ">
                              <div class="card-body">
                                <h5 class="card-title"> ${data[index].name}</h5>

                                <center>
                                  <img class=" img-responsive item_image " style="border: 1px solid gray; height:60px; width:60px;  "
                                   src=" /${data[index].product_image}" alt="Item picture">
                                 <p class="card-text"> ${data[index].count}</p>

                                <p><i class="fa-solid fa-bangladeshi-taka-sign"></i>${data[index].price}</p> 
                                <button class="btn btn-primary showProduct ">add product </button>

                         

                              </center>

                            </div>
                          </div>
                        </div>`;


                        $( "#showProduct" ).append( $string);

                    });


              },
              error: function (data) {
                  console.log(data);
              }
          });

  
      });
  
    });
  
  </script>
  







    function fetchProduct() {





        $product = $('[class="mybtn"]');
        console.log('work');


        $.each($product, function (index, value) {

            $product.eq(index).on('click', function () {


                // $value = $product.eq(index).val();

                // var id=$(".mybtn").attr("id");


                var stud_id = $(this).val();





                var id=$(".mybtn").attr("id");

                $(".mybtn").attr("id","myBtn"+  '_' + stud_id);


                $d=$(".mybtn").attr("id");

                    console.log(('#'+$d+' '+'.name'));
                    $name=$('#'+$d+' '+'.name').text();
                    console.log($name);
                    $price=$('#'+$d+' '+'.price').text();
                    $quantity=$('#'+$d+' '+'.quantity').text();
                    $stock=1;


                 data = {

                'name':  $name,
                'price':  $price,
                'stock': $stock,
                'quantity': $quantity,

            }
            console.log(data);

            $.ajaxSetup({
                  headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


             $.ajax({
                type: "POST",
                 url:"/products-pos",
                 data: data,
                dataType: "json",
                success: function (response) {
                    fetchpos();

             }
            });

         });
                });



    }


   });

});






</script>


</html>




