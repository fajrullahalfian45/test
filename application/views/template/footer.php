    <section class="news-offer py-3 mt-5" style="background-color: #fdf4ec; color:#202121;font-size: 20px">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mt-1">
                    <h1>Daftarkan email Anda sekarang dan nikmati berbagai </h1>
                    <small class="text-muted">PROMO EKSKLUSIF dari HotelsGue!</small>
                </div>
                <div class="col-md-5 text-left">
                    <div class="row">
                        <div class="col-md-9">
                            <form>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <input type="news" class="form-control" id="news" placeholder="">

                                </div>
                            </form>
                        </div>
                        <div class="col-md-3 text-left">
                            <button type="submit" class="btn btn-primary btn-sm mt-1"> sign up</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>



    <section class="py-5 col-foot">
        <div class="container">
            <div class="row">
                <div class="col-md-3 divider-bottom">
                    <img src="<?php echo base_url('assets/newpackage/images/logo-hotel1.png');?>" class="img-fluid center">
                </div>
                <div class="col-md-3 divider-bottom">
                    <p class="info-hotel"><i class="fa fa-map-marker"></i>Jl. Jalan Baru, Kota Jakarta Selatan DKI Jakarta 12430</p>
                </div>
                <div class="col-md-3 divider-bottom text-center">
                    <p class="info-hotel"><i class="fa fa-phone"></i> +62 21 123456789</p>
                    <p class="info-hotel"><i class="fa fa-envelope"></i> <a class="text-warning font-weight-normal" href="mailto:companyemail@gmail.com">info@hotelsgue.com</a></p>

                </div>
                <div class="col-md-3 divider-bottom text-center">
                    <p style="font-weight:bold;" class="text-white">FOLLOW</p>
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid py-2 text-center" style="background-color: #fbf6f0">
        <div class="row">
            <div class="col-md-12">
                <footer style="color: #212121; font-size: 12px">
                    <p class="font-weight-normal">© Copyright HotelsGue.com 2020. All Right Reserved</p>
                </footer>
            </div>
        </div>
    </div>

    <script  src="<?php echo base_url('assets/newpackage/js/jquery-3.2.1.slim.min.js');?>"></script>
     <script  src="<?php echo base_url('assets/newpackage/js/jquery-3.2.1.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/owl-carousel.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/popper.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/bootstrap.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/bootstrap-datepicker.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/slick.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/bootstrap-4-navbar.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/custom-script.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/floating-wpp.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/typeahead.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/select2.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/jquery.sliderPro.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/newpackage/js/main.js');?>"></script>
   
    <script>
        $('.alert').alert()
    </script>
    
<?php
        if(!empty($js))
        {
            echo $js;
        }
        ?>   

</body>


</html>


