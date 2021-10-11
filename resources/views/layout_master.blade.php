
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

           <script src="{{ asset('/assets/js/axios.min.js')}}"></script>
           <!-- third party js ends -->
           <!-- Datatables init -->
           <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>

        <!-- App js-->
        <script src="{{ asset('/assets/js/app.min.js')}}"></script>
        <script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script> --}}

 <!-- noster notify js function  start -->
        <script>

        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info')}}"
        switch (type) {

            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");


                  break;
                  default:
                break;
        }

        @endif

        </script>




{{-- <script>
    $(document).ready(function(){
        ProductView();
        function ProductView()
        {
            $.ajax({
                    url: "{{ url('/view') }}/",
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                      if(data['products']>1){
                        console.log(data);
                        $('#audioBox')[0].muted="false";
                        $('#audioBox')[0].play();

                        // $('#audioBox').get(0).load();
                        // $('#audioBox').get(0).play();
                        // var audio = new Audio('C:\xampp\htdocs\invent\inventory-management\public\music.mp3');
                        // audio.play();
                        // $('audio').get(0).load();
                        // $('audio').get(0).load();
                        // $('audio').get(0).play();
                        // // $('#source')[0].play;
                        // $('audio')[0].muted="false";
                      }

                    },
                });
        }
    })
</script> --}}

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         {{-- <script>
  $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085D6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  })
    });
  });// main funcations end
</script> --}}


<script>
    // document.getElementById('notification').muted = false;
    // document.getElementById('notification').play();
</script>
<script>
        // var audio = require('simple-audio');
        // audio.playSound('foo');
</script>
<!-- noster notify js function  End -->

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
  
                            
                              
                        $string=`<div class="col-sm-3">
                            <div class="card bg-info ">
                              <div class="card-body">
                                <h5 class="card-title"> ${data[index].name}</h5>
                              
                                <center>
                                  <img class=" img-responsive item_image " style="border: 1px solid gray; height:60px; width:60px;  " 
                                   src=" /${data[index].product_image}" alt="Item picture">
                                 <p class="card-text"> ${data[index].count}</p>
                                <p><i class="fa-solid fa-bangladeshi-taka-sign"></i>${data[index].price}</p> 
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
</html>
