<?php /* Template Name: Contact Us */ ?>

<?php
    $thumbnail = get_the_post_thumbnail_url();
?>
<?php get_header(); ?>

<div class="google-map row">
    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe
                width="100%" height="400" id="gmap_canvas"
                src="https://maps.google.com/maps?q=%D0%A6%D0%B0%D1%80%20%D0%90%D1%81%D0%B5%D0%BD%2031%2C%20%D1%80%D1%83%D1%81%D0%B5&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            >
            </iframe>
        </div>
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
                    <div class="title">Къде да ни намерите?</div>
                </div>
                <address class="address">
                  
                    <h1> Авалон Недвижими Имоти </h1>
                   <div class="sub-title tac">Цар Асен 31, Вход 3, Офис 6, Русе, П.К. 7000</div>
                    <br><br>
                </address>
               
                <p><strong>Работно време:</strong>
                <div class="row">
                    <div class="col-xs-6">
                        Понеделник: 
                    </div>
                    <div class="col-xs-6">
                        10:00 - 18:00
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        Вторник:
                    </div>
                    <div class="col-xs-6">
                        10:00 - 18:00
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        Сряда: 
                    </div>
                    <div class="col-xs-6">
                        10:00 - 18:00
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        Четвъртък: 
                    </div>
                    <div class="col-xs-6">
                        10:00 - 18:00
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        Петък: 
                    </div>
                    <div class="col-xs-6">
                        10:00 - 18:00
                    </div>
                </div>
                <p><strong>Телефон:</strong><br>082/51-98-51; 0895 606 165;</p>
                <p><strong>Email:</strong><br>avalon_ds@abv.bg;</p>
            </div><!-- /col -->
            <div class="col-lg-6">
                <div class=""><img class="office-photo" src="<?php echo $thumbnail ?>" alt=""></div>
            </div><!-- /col -->
        </div>
    </div>
</div>

<?php get_footer(); ?>