<?php
    $categoriesQuery = array(
        'title_li' => '',
        'order_by' => 'category_id',
        'hide_empty' => 0,
        'exclude' => array(1, 36)
    );
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title>Avalon <?php echo date('Y') ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Avalon 2017 Description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="apple-touch-icon" sizes="180x180" href="<?php path() ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php path() ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php path() ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php path() ?>/site.webmanifest">

    <style>
        body {display: none;}
    </style>

</head>
    <body>

        <!-- Load Styles -->
        <noscript id="deferred-styles">
            <link rel="stylesheet" type="text/css" href="<?php path() ?>/assets/css/app.min.css"/>
        </noscript>
        <script>
            var loadDeferredStyles = function() {
                var addStylesNode = document.getElementById("deferred-styles");
                var replacement = document.createElement("div");
                replacement.innerHTML = addStylesNode.textContent;
                document.body.appendChild(replacement)
                addStylesNode.parentElement.removeChild(addStylesNode);
            };
            var raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame;
            if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
            else window.addEventListener('load', loadDeferredStyles);
        </script>
        
        <div class="dark-overlay"></div>
        <div class="notification"></div>
        <div class="body-content">

            <div class="header">
                <div class="header-top">
                    <div class="container">
                        <div class="row hcontacts">
                            <div class="col-sm-2">
                                <div class="logo">
                                    <a href="<?php url('/') ?>"><img src="<?php path() ?>/assets/images/logo.png" alt="Avalon Logo"></a>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class = "telephones">
                                    <p> Телефон за контакти: </br> <b>082/51-98-51; 0895606165;</b></p>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class = "email">    
                                    <p> Email: </br> <b> avalon_ds@abv.bg </b></p> 
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class = "stranica">    
                                    <p> Посети нашата страница: </br> <a href="https://www.facebook.com/avalon.imoti/" target="_blank"> <b>Facebook страница Тук</b> </a></p> 
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class = "workingh">
                                    <p> Работно време: </br> <b>10:00 до 18:00 </b> </p>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="header-middle clearfix">
                    <div class="container">
                        <ul class="nav">
                            <li><a href="<?php url('/') ?>">Начало</a></li>
                            <?php wp_list_categories( $categoriesQuery ); ?>
                            <li><a href="<?php url('/about') ?>">За нас</a></li>
                            <li><a href="<?php url('/contact') ?>">Контакти</a></li>
                        </ul>
                    </div>
                </div>

            </div>
