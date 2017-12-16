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
  /*#map iframe {
    width: 100%;
  }*/
</style>

<section id="map" class="container flex alpha omega clearfix">
  <div class="col_12 google-maps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14035.562351883635!2d-81.4736918481107!3d28.422558105296666!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e77e378ec5a9a9%3A0x2feec9271ed22c5b!2sOrange+County+Convention+Center!5e0!3m2!1sen!2sus!4v1510340313438" height="400" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
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
