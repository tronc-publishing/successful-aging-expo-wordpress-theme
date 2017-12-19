<?php
  /* Template Name: Contact Us Page */
  get_header();

  $args = array(
    'post_type' => 'contact-us-page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'show_posts' => -1,
  );
  $contactUs = new WP_Query($args);
?>

<section id="contact-us" class="container clearfix sectionBlk">
  <?php if ($contactUs->have_posts()) : ?>
    <?php while ($contactUs->have_posts()) : $contactUs->the_post(); $postNum = $contactUs->current_post; ?>
      <?php if($postNum == 0) : ?>
        <div class="des-column col_12">
          <div class="des-inner txtCenter mb40">
            <h2><?php the_title(); ?></h2>
          </div>
        </div>
        <div class="des-column col_12">
          <div class="des-inner txtCenter">
            <?php the_content(); ?>
          </div>
        </div>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>
