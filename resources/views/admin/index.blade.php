
 @extends('./layout_master')

 {{-- section id is yeild name  --}}

 @section('admin')

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">

                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                    <i class="fe-user font-22 avatar-title text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$adminCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Admin</p>
                                                    {{-- <audio id="audioBox" src="{{asset('asstets/noti/audio1.wav')}}">
                                                        erdrfyhrtf
                                                    </audio> --}}
                                                </div>
                                            </div>
                                            {{-- <div class="col-6">
                                                <audio id="audioBox" controls="controls" src="{{asset('music.mp3')}}"> </audio>





                                            </div> --}}
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                    <i class="fe-user font-22 avatar-title text-success"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$manageCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Manager</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                                    <i class="fe-shopping-cart font-22 avatar-title text-info"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$productCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total product</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                                    <i class="fe-user font-22 avatar-title text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$customerCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Customer</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->




                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                    <i class="fe-user font-22 avatar-title text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$supplierCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Supplier</p>
                                                    {{-- <audio id="audioBox" src="{{asset('asstets/noti/audio1.wav')}}">
                                                        erdrfyhrtf
                                                    </audio> --}}
                                                </div>
                                            </div>

                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                    <i class="fe-user font-22 avatar-title text-success"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$productReturnCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate"> Total Return Product</p></p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                                    <i class="fe-shopping-cart font-22 avatar-title text-info"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$salesPosCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Today Sale Product</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                    <i class="iconify font-22 avatar-title text-success"  data-icon="dashicons:money-alt" ></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$todaysalesprice}}</span>tk</h3>
                                                    <p class="text-muted mb-1 text-truncate">today sale amount</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->




                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                    <i class="iconify font-22 avatar-title text-success"  data-icon="dashicons:money-alt" ></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$monthprice}}</span>tk</h3>
                                                    <p class="text-muted mb-1 text-truncate">Monthly Sale amount</p>
                                                    {{-- <audio id="audioBox" src="{{asset('asstets/noti/audio1.wav')}}">
                                                        erdrfyhrtf
                                                    </audio> --}}
                                                </div>
                                            </div>

                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">

                                                    <i class="iconify font-22 avatar-title text-success"  data-icon="dashicons:money-alt" ></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$yearprice}}</span>tk</h3>
                                                    <p class="text-muted mb-1 text-truncate">Yearly total sale Amount</p></p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->


                        </div>
                        <!-- end row-->



                            {{-- <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end d-none d-md-inline-block">
                                            <div class="btn-group mb-2">
                                                <button type="button" class="btn btn-xs btn-light">Today</button>
                                                <button type="button" class="btn btn-xs btn-light">Weekly</button>
                                                <button type="button" class="btn btn-xs btn-secondary">Monthly</button>
                                            </div>
                                        </div>

                                        <h4 class="header-title mb-3">Sales Analytics</h4>
                                        <div dir="ltr">
                                            <div id="sales-analytics" class="apex-charts" data-colors="#6658dd,#1abc9c"></div>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col--> --}}
                            <div class="col-md-12">
                                <div id="bar-chart" style="width: 900px; height: 500px"></div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                  ['Product Name', 'Sales Price', 'Sales Product Quantity'],

                  @php
                    foreach($salesPos as $product) {
                    echo "['".$product->item_name."', ".$product->price.", ".$product->quantity."],";

                    }
                  @endphp
                  ]);

                  var options = {
                    chart: {
                  title: 'Product Graph ',
                  //subtitle: 'Price, and Quantity: @php echo $salesPos[0]->created_at @endphp',
                    },
                    bars: 'vertical'
                  };
                  var chart = new google.charts.Bar(document.getElementById('bar-chart'));
                  chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                  </script>
               @include('./body.footer')


            </div>



@endsection

