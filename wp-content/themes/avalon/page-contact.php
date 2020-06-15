<?php /* Template Name: Contact Us */ ?>

<?php get_header(); ?>

<div class="google-map row">
    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=%D0%B6.%D0%BA.%20%D0%A5%D1%8A%D1%88%D0%BE%D0%B2%D0%B5%2C%20Ruse%2C%20Bulgaria&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
        <style>
            .mapouter {
                position: relative;
                text-align: right;
                height: 400px;
                width: 100%;
            }

            .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 400px;
                width: 100%;
            }
        </style>
    </div>
</div>
<div class="content">
    <div class="container clearfix">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-title">
                    <h1 class="title">Contact Us</h1>
                </div>
                <hr>
                <address class="address">
                    <strong>Zaza Johnson and Bath</strong><br>
                    41 St Johns Hill<br>
                    Shrewsbury<br>
                    Shropshire<br>
                    SY1 1JQ
                </address>
                <hr>
                <p>Email:<br>info@zjandb.com</p>
                <p>Phone:<br><a href="tel:01743 248 351">01743 248 351</a></p>
            </div><!-- /col -->
            <div class="col-lg-6">
                <div class="officephoto"><img src="https://www.zjandb.com/wp-content/themes/zjandb/assets/images/front-office.jpg" alt=""></div>
            </div><!-- /col -->
        </div>
    </div>
</div>

<?php get_footer(); ?>