<?php
  /* Template Name: Home Page */
  get_header();

  $args = array(
    'post_type' => 'home-page',
    'posts_per_page' => 5,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'showposts' => -1
  );
  $home = new WP_Query($args);

  function add_styles($content) {
    $listItems = ['<ul>', '<li>'];
    $listClasses = ['<ul class="icon-list">', '<li><i class="fa fa-check-circle" aria-hidden="true"></i>'];
    $content = str_replace($listItems, $listClasses, $content);

    return $content;
  }
  add_filter('the_content', 'add_styles');
  remove_filter('the_content', 'wpautop');
?>

  <section id="about">
    <div class="sectionBlk">
      <div class="container clearfix">

        <?php if ($home->have_posts()) : ?>
          <?php while ($home->have_posts()) : $home->the_post(); $postNum = $home->current_post; ?>

            <?php if ($postNum == 0) : ?>
            <div class="des-column col_12 txtCenter">
              <h2 class="mb50"><?php the_content(); ?></h2>
            </div>
            <?php endif; ?>

            <?php if ($postNum == 1) : ?>
            <div class="des-column col_6">
                <div class="des-inner">
                  <?php if (get_post_format() == 'image') : ?>
                    <?php the_post_thumbnail('large'); ?>
                  <?php elseif (get_post_format() == 'video') : ?>
                    <!-- show video here -->
                  <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($postNum == 2) : ?>
            <div class="des-column col_6">
              <div class="des-inner desMinBT">
                <?php the_content(); ?>
              </div>
            </div>
            <?php endif; ?>

            <?php if ($postNum == 3) : ?>
            <div class="des-column col_12 pt50">
              <div class="des-column col_12">
                <div class="des-inner">
                  <p class="colorBLU mb25"><?php the_content(); ?></p>
                </div>
                <div class="des-inner">
                  <h3 class="colorBLU mb25"><?php _e($expoDate); ?></h3>
                </div>
            <?php endif; ?>

            <?php if ($postNum == 4) : ?>
                <div class="des-inner">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
            <?php endif; ?>

          <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>

      </div>
    </div>
  </section><!-- END #about -->

  <?php get_template_part('./template-parts/ad-leaderboard'); ?>

  <?php
    $args = array(
      'post_type' => 'home-page',
      'posts_per_page' => 1,
      'offset' => 5,
      'orderby' => 'menu_order',
      'order' => 'ASC',
    );
    $home = new WP_Query($args);
  ?>

  <?php if ($home->have_posts()) : ?>
    <?php while ($home->have_posts()) : $home->the_post(); $postNum = $home->current_post; ?>

      <section id="location" style="background-image: url('<?php echo the_post_thumbnail_url('full'); ?>')">
        <div class="sectionBlk">
          <div class="container clearfix">
            <div class="des-column col_12 txtCenter">
              <h2 class="colorWHT txtCaps mb12"><?php the_title(); ?></h2>
              <h3 class="mb3"><strong class="mdBold"><?php _e($expoDate); ?></strong></h3>
              <h5 class="mb15"><strong class="mdBold"><?php _e($expoTime); ?></strong></h5>
              <h3 class="mb4"><strong class="mdBold"><?php _e($expoVenue); ?></strong></h3>
              <h5 class="mb20"><strong class="mdBold"><?php _e($expoAddress); ?></strong></h5>
              <a class="clearBtn" href="<?php echo $expoMap; ?>" target="_blank" rel="nofollow">View Map</a>
            </div>
          </div>
        </div>
      </section><!-- END #location -->

    <?php endwhile; ?>
  <?php endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
