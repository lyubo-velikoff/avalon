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

	<link rel="shortcut icon" type="image/x-icon" href="<?php path() ?>/favicon.ico">
    
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
                        <div class="logo">
                            <a href="<?php url('/') ?>"><img src="<?php path() ?>/assets/images/logo.png" alt="Avalon Logo"></a>
                        </div>
                    </div>
                </div>
                <div class="header-middle clearfix">
                    <div class="container">
                        <ul class="nav">
                            <li><a href="<?php url('/') ?>">Начало</a></li>
                            <?php wp_list_categories( $categoriesQuery ); ?>
                            <li><a href="#">За нас</a></li>
                            <li><a href="#">Контакти</a></li>
                        </ul>
                    </div>
                </div>

            </div>
