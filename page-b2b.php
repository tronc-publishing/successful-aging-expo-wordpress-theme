<?php
  /* Template Name: b2b Page */
  get_header();

  $args = array(
    'post_type' => 'b2b-page',
    'posts_per_page' => 4,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'showposts' => -1
  );
  $b2b = new WP_Query($args);

  function add_styles($content) {
    $listItems = ['<ul>', '<li>'];
    $listClasses = ['<ul class="icon-list">', '<li><i class="fa fa-check-circle" aria-hidden="true"></i>'];
    $content = str_replace($listItems, $listClasses, $content);

    return $content;
  }
  add_filter('the_content', 'add_styles');
?>

<section id="about">
  <div class="sectionBlk">
    <div class="container clearfix">
      <?php if ($b2b->have_posts()) : ?>
        <?php while ($b2b->have_posts()) : $b2b->the_post(); $postNum = $b2b->current_post; ?>

          <?php if ($postNum == 0) : ?>
            <div class="des-column col_12 txtCenter">
              <h2 class="mb50">
                <strong class="txtCaps"><?php the_title(); ?></strong><br>
                <?php the_content(); ?>
              </h2>
            </div>

          <?php elseif ($postNum == 1) : ?>
            <div class="des-column col_6">
              <div class="des-inner">
                <?php
                  if (get_post_format() == 'video') :
                    // show video here
                  else :
                    the_post_thumbnail('large');
                  endif;
                ?>
              </div>
            </div>

          <?php elseif ($postNum == 2) : ?>
            <div class="des-column col_6">
              <div class="des-inner desMinBT">
                <?php the_content(); ?>
              </div>
            </div>

          <?php elseif ($postNum == 3) : ?>
            <div class="des-column col_12 txtCenter pt50">
              <div class="des-inner desMinBT">
                <h2 class="colorORG txtCaps"><strong><?php the_title(); ?></strong></h2>
              </div>
            </div>

          <?php endif; ?>

        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section><!-- END #about -->

<?php
  $args = array(
    'post_type' => 'b2b-page',
    'posts_per_page' => 1,
    'offset' => 4,
    'orderby' => 'menu_order',
    'order' => 'ASC',
  );
  $b2b = new WP_Query($args);
?>

<?php if ($b2b->have_posts()) : ?>
  <?php while ($b2b->have_posts()) : $b2b->the_post(); ?>

    <section id="location" style="background-image: url('<?php echo the_post_thumbnail_url('full'); ?>')">
      <div class="sectionBlk">
        <div class="container clearfix">
          <div class="des-column col_12 txtCenter">
            <h2 class="colorWHT txtCaps mb12"><?php the_title(); ?></h2>
            <h3 class="mb3"><strong class="mdBold"><?php _e($expoDate); ?></strong></h3>
            <h5 class="mb15"><strong class="mdBold"><?php _e($expoTime); ?></strong></h5>
            <h3 class="mb4"><strong class="mdBold"><?php _e($expoVenue); ?></strong></h3>
            <h5 class="mb0"><strong class="mdBold"><?php _e($expoAddress); ?></strong></h5>
          </div>
        </div>
      </div>
    </section><!-- END #location -->

  <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
