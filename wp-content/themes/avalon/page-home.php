<?php /* Template Name: Homepage */ ?>

<?php
    $categoriesQuery = array(
        'title_li' => '',
        'order_by' => 'category_id',
        'hide_empty' => 0,
        'exclude' => 1
    );

    $args = array(
        'numberposts' => 10,
        'category' => 36,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );

    $topOffers = get_posts($args);
    // echo '<pre>'; print_r($topOffers); echo '</pre>';
?>

<?php get_header(); ?>

<div class="content">
    <div class="container clearfix">
        <div class="categories">
            <?php 
                echo '<ul class="my-categories-menu">';
                wp_list_categories( $categoriesQuery ); 
                echo '</ul>';
            ?>

        </div>
        <div class="properties">
 
            <?php if (!empty($topOffers)) : ?>
                <?php foreach($topOffers as $post) : ?>
                    <?php setup_postdata( $post ); ?>
                    <div class="property">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>"></a>
                            </div>
                            <div class="col-sm-6">
                                <div class="ml20">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>                            
                                    <div class="description">
                                        <?php if (get_field('price')) : ?>
                                            <?php 
                                                $currency = get_field_object('currency'); 
                                                $value = $currency['value'];
                                                $label = $currency['choices'][$value];
                                            ?>
                                            <div class="price">Цена: <?php the_field('price'); ?> <?php echo $label; ?></div> 
                                        <?php endif; ?>
                                        <?php if (get_field('neighborhood') && get_field('in_town')) : ?>
                                            <?php 
                                                $neighborhood = get_field_object('neighborhood'); 
                                                $value = $neighborhood['value'];
                                                $neighborhoodLabel = $neighborhood['choices'][$value];
                                                
                                                $city = get_field_object('in_town');
                                                $value = $city['value'];
                                                $cityLabel = $city['choices'][$value];
                                            ?>
                                            <div class="neighborhood"><?php echo $cityLabel . ', ' . $neighborhoodLabel; ?></div>
                                        <?php endif; ?>

                                        <?php if (get_field('area')) : ?>
                                            <div class="area">Квадратура: <?php the_field('area') ?> <?php echo 'кв.м.'; ?></div> 
                                        <?php endif; ?>

                                        <?php if (get_field('floor') && get_field('floor_count')) : ?>
                                            <?php 
                                                $floor = get_field_object('floor'); 
                                                $value = $floor['value'];
                                                $floorLabel = $floor['choices'][$value];

                                                $floorCount = get_field_object('floor_count'); 
                                                $value = $floorCount['value'];
                                                $floorCountLabel = $floorCount['choices'][$value];

                                            ?>
                                            <div class="floor">Етаж: <?php echo $floorLabel . ' ot ' . $floorCountLabel; ?></div> 
                                        <?php endif; ?>

                                        <?php if (get_field('construction_type')) : ?>
                                            <?php 
                                                $constructionType = get_field_object('construction_type'); 
                                                $value = $constructionType['value'];
                                                $label = $constructionType['choices'][$value];
                                            ?>
                                            <div class="construction-type">Вид строителство: <?php echo $label; ?></div> 
                                        <?php endif; ?>

                                        <?php if (get_field('furnished')) : ?>
                                            <?php 
                                                $furnished = get_field_object('furnished'); 
                                                $value = $furnished['value'];
                                                $label = $furnished['choices'][$value];
                                            ?>
                                            <div class="furnished">Обзавеждане: <?php echo $label; ?></div> 
                                        <?php endif; ?>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                <?php endforeach; wp_reset_postdata(); ?>
            <?php endif; ?>


            <!--<?php for ($i = 0; $i < 10; $i++) : ?>
                <div class="property">
                    <div class="name">Property name</div>
                    <div class="description">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsum</div>
                    <a href="#" class="btn">More details</a>
                </div>
            <?php endfor; ?>-->
        </div>
    </div>

</div>

<?php get_footer(); ?>
