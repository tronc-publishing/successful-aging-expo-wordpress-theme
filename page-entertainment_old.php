<?php
  /* Template Name: Entertainment Page */
  get_header();

  function formatTime($time) {
    $hour = substr($time, 0, 2);

    $time = $hour > 12 ? $hour - 12 . substr($time, 2) : $time;
    $time = str_replace(array(':00', ' '), '', $time);

    return $time;
  }

  $args = array(
    'type' => 'entertainment-page',
    'taxonomy' => 'custom_cat_entertainment',
  );
  $categories = get_categories($args);
?>

<section id="room-nav" class="container clearfix">
  <ul>
    <?php foreach ($categories as $category) : ?>
      <li><a class="section-link" href="#<?php echo $category->slug ?>"><?php echo $category->name ?></a></li>
    <?php endforeach; ?>
  </ul>
</section><!-- END #room-nav -->

<?php
  foreach ($categories as $category) :
    $args = array(
      'post_type' => 'entertainment-page',
      'tax_query' => array(
        array(
          'taxonomy' => 'custom_cat_entertainment',
          'field' => 'slug',
          'terms' => $category->slug
        )
      ),
      'showposts' => -1,
      'meta_key' => 'entertainment-time-start',
      'meta_type' => 'NUMERIC',
      'orderby' => 'meta_value',
      'order' => 'ASC'
    );
    $query = new WP_Query($args);
?>

  <section id="<?php echo $category->slug; ?>" class="room">
    <h2><?php echo $category->name; ?></h2>
    <a href="#">
     <i class="fa fa-arrow-up" aria-hidden="true"></i>
     <span>Top</span>
    </a>
  </section>

  <section class="container flex omega alpha clearfix activity-list-ad">
    <div class="des-column col_8 col_lg_12">
      <div class="des-inner omega alpha content">
        <ul>
          <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
              <?php
                $start = get_post_meta($post->ID, 'entertainment-time-start', true);
                $end = get_post_meta($post->ID, 'entertainment-time-end', true);
               ?>
              <li>
                <div class="container alpha omega clearfix activity-list-ad-item">
                  <div class="des-column col_4 col_lg_3 col_md_12">
                    <div class="des-inner halfPad timeBtn">
                      <span><?php echo formatTime($start); if ($end) echo ' - ' . formatTime($end); ?></span>
                    </div>
                  </div>
                  <div class="des-column col_3 col_lg_4">
                    <div class="des-inner halfPad">
                      <?php the_post_thumbnail('full'); ?>
                    </div>
                  </div>
                  <div class="des-column col_5 col_md_12">
                    <div class="des-inner halfPad">
                      <h3><?php the_title(); ?></h3>
                      <?php the_content(); ?>
                    </div>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
          <?php endif; wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
    <?php get_template_part('./template-parts/ad-halfpage') ?>
  </section>

<?php endforeach; ?>

<?php get_template_part('./template-parts/ad-leaderboard'); ?>

<?php get_footer(); ?>
