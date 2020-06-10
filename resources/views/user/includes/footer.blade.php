
    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer_1">
                        <a href="index.html"> <img src="{{asset('assets/uploads/settings/'.$setting->logo)}}" alt=""> </a>
                        <p>{{json_decode($footer->content)->desc}}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>{{json_decode($footer->content)->title}}</h4>
                        <p>{{json_decode($footer->content)->subtitle}}</p>

                        @include('user.includes.errors')

                        <form action="{{url('/message/newsletter')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="email" class="form-control" placeholder='Enter email address'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'">
                                    <div class="input-group-append">
                                        <button class="btn btn_1" type="button"><i class="ti-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="social_icon">
                            <a href="{{$setting->facebook}}"> <i class="ti-facebook"></i> </a>
                            <a href="{{$setting->twitter}}"> <i class="ti-twitter-alt"></i> </a>
                            <a href="{{$setting->instagram}}"> <i class="ti-instagram"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <div class="contact_info">
                            <p><span> Address :</span> {{$setting->address}}, {{$setting->city}}</p>
                            <p><span> Phone :</span> {{$setting->phone}}</p>
                            <p><span> Email :</span> {{$setting->email}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{asset('assets')}}/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="{{asset('assets')}}/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="{{asset('assets')}}/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="{{asset('assets')}}/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="{{asset('assets')}}/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="{{asset('assets')}}/js/slick.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.counterup.min.js"></script>
    <script src="{{asset('assets')}}/js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="{{asset('assets')}}/js/custom.js"></script>
</body>

</html>