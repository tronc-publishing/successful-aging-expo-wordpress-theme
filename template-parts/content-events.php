<?php
  if (is_page('schedule')) $type = 'schedule';
  if (is_page('entertainment')) $type = 'entertainment';

  function formatTime($time) {
    $hour = substr($time, 0, 2);
    $time = $hour > 12 ? $hour - 12 . substr($time, 2) : $time;
    $time = str_replace(array(':00', ' '), '', $time);

    return $time;
  }

  $args = array(
    'type' => "{$type}-page",
    'taxonomy' => "custom_cat_{$type}",
  );
  $categories = get_categories($args);

  // Need to get this for real
  $showAds = true;
?>

<!-- NAV  -->
<?php if (count($categories) > 1) : ?>
  <section id="room-nav" class="container clearfix">
    <ul>
      <?php foreach ($categories as $category) : ?>
        <li><a class="section-link" href="#<?php echo $category->slug ?>"><?php echo $category->name ?></a></li>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>

<!-- CONTENT -->
<?php
  foreach ($categories as $category) :
    $args = array(
      'post_type' => "{$type}-page",
      'tax_query' => array(
        array(
          'taxonomy' => "custom_cat_{$type}",
          'field' => 'slug',
          'terms' => $category->slug
        )
      ),
      'showposts' => -1,
      'meta_key' => "{$type}-time-start",
      'meta_type' => 'NUMERIC',
      'orderby' => 'meta_value',
      'order' => 'ASC'
    );
    $query = new WP_Query($args);
?>

  <?php if (count($categories) > 1) : ?>

    <section id="<?php echo $category->slug; ?>" class="room">
      <h2><?php echo $category->name; ?></h2>
      <a href="#">
       <i class="fa fa-arrow-up" aria-hidden="true"></i>
       <span>Top</span>
      </a>
    </section>

  <?php else : ?>

    <section id="<?php echo $category->slug; ?>" class="stage">
      <h2><?php echo $categories[0]->name; ?></h2>
    </section>

  <?php endif; ?>

  <?php if ($showAds) : ?>

    <section class="container flex omega alpha clearfix activity-list-ad">
      <div class="des-column col_8 col_lg_12">
        <div class="des-inner alpha omega content">
          <ul>
            <?php if ($query->have_posts()) : ?>
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li>
                  <div class="container alpha omega clearfix activity-list-ad-item">
                    <div class="des-column col_4 col_lg_3 col_md_12">
                      <div class="des-inner halfPad timeBtn">
                        <?php $start = get_post_meta($post->ID, "{$type}-time-start", true); ?>
                        <?php $end = get_post_meta($post->ID, "{$type}-time-end", true); ?>
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

  <?php else : ?>

    <section class="container flex alpha omega clearfix activity-list">
      <div class="des-column col_12 col_sm_12">
        <div class="des-inner alpha omega content">
          <ul>
            <?php if ($query->have_posts()) : ?>
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li>
                  <div class="container alpha omega clearfix activity-list-item">
                    <div class="des-column col_4 col_lg_3 col_md_12">
                      <div class="des-inner timeBtn">
                        <?php $start = get_post_meta($post->ID, "{$type}-time-start", true); ?>
                        <?php $end = get_post_meta($post->ID, "{$type}-time-end", true); ?>
                        <span><?php echo formatTime($start); if ($end) echo ' - ' . formatTime($end); ?></span>
                      </div>
                    </div>
                    <div class="des-column col_3 col_lg_4 col_md_12">
                      <div class="des-inner">
                        <?php the_post_thumbnail('full'); ?>
                      </div>
                    </div>
                    <div class="des-column col_5 col_md_12">
                      <div class="des-inner">
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
    </section>

  <?php endif; ?>

<?php endforeach; ?>

<?php get_template_part('./template-parts/ad-leaderboard'); ?>
