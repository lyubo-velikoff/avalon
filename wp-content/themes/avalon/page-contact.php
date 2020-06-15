<?php /* Template Name: Contact Us */ ?>

<?php get_header(); ?>

<div class="google-map row">
    <div class="mapouter">
        <div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=ul.%20%22Panayot%20Hitov%22%2C%20g.k.%20Hashove%2C%20Ruse%2C%20Bulgaria&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
        <style>
            .mapouter {
                position: relative;
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
                    <br>
                    <strong>Адрес:</strong><br>
                    Цар Асен 31<br>
                    Вход 3, Офис 6<br>
                    Русе<br>
                    7000
                    <br><br>
                </address>
                <hr>
                <p>Email:<br>avalon_ds@abv.bg</p>
                <p>Телефон:<br>082/51-98-51; 0895 606 165;</p>
            </div><!-- /col -->
            <div class="col-lg-6">
                <div class=""><img class="office-photo" src="https://www.zjandb.com/wp-content/themes/zjandb/assets/images/front-office.jpg" alt=""></div>
            </div><!-- /col -->
        </div>
    </div>
</div>

<?php get_footer(); ?>