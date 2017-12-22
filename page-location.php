<?php
  /* Template Name: Location Page */
  get_header();

  $args = array(
    'type' => "location-page",
    'taxonomy' => "custom_cat_location",
  );
  $categories = get_categories($args);
?>

<style media="screen">
  #map iframe {
    width: 100%;
  }
</style>

<section id="map" class="container flex alpha omega clearfix">
  <div class="col_12 google-maps">
    <iframe
      width="600"
      height="450"
      frameborder="0" style="border:0"
      src="<?php echo "https://www.google.com/maps/embed/v1/place?key=AIzaSyAQiCFzV7wxzre-usrWH-RrQMySWSqDGm0&zoom=14&q={$expoMap}"; ?>" allowfullscreen>
    </iframe>
  </div>
</section>

<section id="location-info" class="sectionBlk">
  <div class="txtCenter container clearfix">
    <div class="des-column col_12">
      <div class="des-inner">
        <h2 class="txtCaps mb40"><?php _e($heroSubtitle); ?></h2>

        <?php
          foreach ($categories as $index => $category) :
            $args = array(
              'post_type' => "location-page",
              'orderby' => 'menu_order',
              'order' => 'ASC',
              'showposts' => -1,
              'tax_query' => array(
                array(
                  'taxonomy' => "custom_cat_location",
                  'field' => 'slug',
                  'terms' => $category->slug
                )
              )
            );
            $query = new WP_Query($args);
        ?>

        <h3 class="colorBLU mb20 <?php if ($index > 0) echo 'pt30'; ?>"><?php echo $category->name; ?></h3>
          <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
              <h5 class="colorGREY mb6"><strong><?php the_title(); ?></strong></h5>
              <?php the_content(); ?>
            <?php endwhile; ?>
          <?php endif; wp_reset_postdata(); ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('./template-parts/ad-leaderboard'); ?>

<?php get_footer(); ?>
