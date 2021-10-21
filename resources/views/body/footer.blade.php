

  <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                @php
                                    $demo=App\Models\Company::all();

                                @endphp
                                @foreach ($demo as $data)


                                <script>document.write(new Date().getFullYear())</script> &copy;Stock Management System by <a href="">{{$data->company_name}}</a>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
