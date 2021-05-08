<?php

/**
 * The default template for displaying post content
 */
?>

<?php

$photos = get_field('photos');

$price = get_field('price');

$field = get_field_object('currency');
$value = $field['value'];
$currency = $field['choices'][$value];

$field = get_field_object('in_town');
$value = $field['value'];
$inTown = $field['choices'][$value];

$field = get_field_object('neighborhood');
$value = $field['value'];
$neighborhood = $field['choices'][$value];

$area = get_field('area');
$yard = get_field('yard');

$field = get_field_object('floor');
$value = $field['value'];
$floor = $field['choices'][$value];

$field = get_field_object('construction_type');
$value = $field['value'];
$constructionType = $field['choices'][$value];

$field = get_field_object('details');
$value = $field['value'];


$phone = get_field('phone');

// echo '<pre>'; print_r($photos); echo '</pre>';
?>

<div class="property-single">

  <?php if (!empty($photos)) : ?>

    <div class="photos">
      <div class="row">
        <div class="col-sm-7">

          <div class="slideshow-slider">
            <?php foreach ($photos as $photo) : ?>
              <div class="slide">
                <a href="<?php echo $photo['photo']; ?>" data-lightbox="carousel-lightbox" data-title="<?php the_title(); ?>"><img src="<?php echo $photo['photo']; ?>" alt=""></a>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="slideshow-nav">
            <?php foreach ($photos as $photo) : ?>
              <div class="slide">
                <img src="<?php echo $photo['photo']; ?>" alt="" data-lightbox="property-view">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="col-sm-5 p20">
          <div class="heading"><?php the_title(); ?></div>

          <div class="price">Цена: <?php echo number_format($price) . $currency ?></div>
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

          <?php if (get_field('region')) : ?>
            <?php
            $field = get_field_object('region');
            $value = $field['value'];
            $region = $field['choices'][$value];
            ?>
            <div class="region">Населено място: <?php echo $region; ?></div>
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

          <?php if (get_field('regulation')) : ?>
            <?php
            $field = get_field_object('regulation');
            $value = $field['value'];
            $regulation = $field['choices'][$value];
            ?>
            <div class="regulation">Регулация: <?php echo $regulation; ?></div>
          <?php endif; ?>

          <?php
          // vars	
          $field = get_field_object('details');
          $details = $field['value'];

          // check
          if ($details) : ?>
            <h4>Особености:</h4>
            <ul class='details'>
              <?php foreach ($details as $details) : ?>
                <li><?php echo $field['choices'][$details]; ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <?php
          // vars	
          $field = get_field_object('details_2');
          $details = $field['value'];

          // check
          if ($details) : ?>
            <h4>Особености:</h4>
            <ul class='details'>
              <?php foreach ($details as $details) : ?>
                <li><?php echo $field['choices'][$details]; ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <div class="mt30">
            <hr />
            <div class="subheading">Телефон за връзка</div>
            <a href="tel:<?php echo str_replace(" ", "", $phone) ?>" class="phone"><?php echo $phone ?></a>
            <div class="mt20 tac">
              <a href="mailto:" class="btn white">Изпрати имейл</a>
            </div>
            <hr />
          </div>

          <div class="post-content dtt pt20">
            <div class="heading">Описание на имота:</div>
            <div class="copy mt20"><?php the_content(); ?></div>
          </div>

        </div>
      </div>
    </div>


  <?php endif; ?>


</div>