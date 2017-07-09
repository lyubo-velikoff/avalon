<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<div class="content">
    <div class="container clearfix">
        <div class="categories">
            <?php 
                $my_cat_menu = array(
                    'title_li' => '',
                    'order_by' => 'category_id',
                    'hide_empty' => 0,
                    'exclude' => 1
                );
                
                echo '<ul class="my-categories-menu">';
                wp_list_categories( $my_cat_menu ); 
                echo '</ul>';
            ?>

        </div>
        <div class="properties">
 
            <?php for ($i = 0; $i < 10; $i++) : ?>
                <div class="property">
                    <div class="name">Property name</div>
                    <div class="description">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsum</div>
                    <a href="#" class="btn">More details</a>
                </div>
            <?php endfor; ?>
        </div>
    </div>

</div>


<?php get_footer(); ?>
