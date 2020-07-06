<?php /* Template Name: Homepage */ ?>

<?php
    // TODO: These shouldn't be hardcoded 
    // Defaults
    $TOP_OFFERS_ID = '36';
    $SALES_ID = '37';
    $RENTS_ID = '3';
    $BLANK_POST_STORAGE_ID = 92;
    $categoryFilter = $TOP_OFFERS_ID; // oferti  36, prodajbi 37, naemi 3
    $metaFilter = array();
    $isFilterTypeSelected = false;
    $isFilterNeighborhoodSelected = false;

    // Handle form search
    if(isset($_POST['submit'])) {
        if (isset($_POST['filter-type']) && $_POST['filter-type'] !== '') {
            $categoryFilter = $_POST['filter-type'];
            $isFilterTypeSelected = true;
        }
        if (isset($_POST['filter-neighborhood']) && $_POST['filter-neighborhood'] !== '') {
            $metaFilter = array(
                'relation' => 'AND',
                array(
                    'key' => 'neighborhood',
                    'value' => $_POST['filter-neighborhood'],
                    'compare' => '='
                )
            );
            $isFilterNeighborhoodSelected = true;
        }
    }

    $categoriesQuery = array(
        'title_li' => '',
        'order_by' => 'category_id',
        'hide_empty' => 0,
        'exclude' => 1
    );

    $args = array(
        'numberposts' => 100,
        'category' => $categoryFilter, 
        'meta_query' => $metaFilter,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );

    $topOffers = get_posts($args);
    // echo '<pre>'; print_r($topOffers); echo '</pre>';

    $props = get_field_object('neighborhood', $BLANK_POST_STORAGE_ID); 
    $neighborhoodChoices = array_key_exists('choices', $props) ? $props['choices'] : array();
    // echo '<pre>' . print_r($neighborhoodChoices, true) . '</pre>'; die();
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


            <div class="p10">

                <div class="search">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-4 search-columns">
                                <div class="mb10">Продажби/Наеми:</div>
                                <select class="select-boxes" id="filter-type" name="filter-type">
                                    <option value=""></option>
                                    <option <?php echo $isFilterTypeSelected && $_POST['filter-type'] === $SALES_ID ? 'selected' : '' ?> value="<?php echo $SALES_ID ?>">Продажби</option>
                                    <option <?php echo $isFilterTypeSelected && $_POST['filter-type'] === $RENTS_ID ? 'selected' : '' ?> value="<?php echo $RENTS_ID ?>">Наеми</option>
                                </select>
                            </div>
        
                            <div class="col-md-4 search-columns">
                                <div class="mb10">Район:</div>
                                <select class="select-boxes" id="filter-neighhborhood" name="filter-neighborhood">
                                    <?php foreach($neighborhoodChoices as $choiceKey => $choiceValue) : ?>
                                        <option <?php echo $isFilterNeighborhoodSelected && $_POST['filter-neighborhood'] === strval($choiceKey) ? 'selected' : '' ?> value="<?php echo $choiceKey ?>"><?php echo $choiceValue ?></option>
                                    <?php endforeach ?> 
                                </select>
                            </div>
                        
                            <div class="col-md-4 search-columns">
                                <input type="submit" name="submit" value="Търси" class="btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <?php if (!empty($topOffers)) : ?>
                <?php foreach($topOffers as $post) : ?>
                    <?php setup_postdata( $post ); ?>
                    <div class="col-md-6 property-container">
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
    
                                                    $field = get_field_object('currency');
                                                    $value = $field['value'];
                                                    $currency = $field['choices'][ $value ];
                                                ?>
                                                <div class="price">Цена: <?php echo number_format(get_field('price')) . $currency ?></div>
                                                
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

                                            <?php if (get_field('yard')) : ?>
                                                <div class="yard">Земя: <?php the_field('yard') ?> <?php echo 'кв.м.'; ?></div>
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
                                                <div class="floor">Етаж: <?php echo $floorLabel . '  от ' . $floorCountLabel; ?></div> 
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
                    </div>

                <?php endforeach; wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>
    </div>

</div>

<?php get_footer(); ?>
