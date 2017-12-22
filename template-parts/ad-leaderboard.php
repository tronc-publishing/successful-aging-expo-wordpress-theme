<?php
  $args = array('post_type' => 'ads-page', 'name' => 'leaderboard');
  $adLeaderboard = new WP_Query($args);
  $showAd = get_post_meta($adLeaderboard->post->ID, 'ad-show', true);
?>

<?php if ($adLeaderboard->have_posts() && $showAd) : ?>
  <?php while ($adLeaderboard->have_posts()) : $adLeaderboard->the_post(); ?>

    <section id="leaderboard">
      <div class="pt50 pb50">
        <div class="container clearfix">
          <div class="col_12 txtCenter">
            <a id="adLeaderboard" href="<?php echo get_post_meta(get_the_ID(), 'ad-url', true); ?>" target="_blank" style="border:none;" rel="nofollow">
              <img src="<?php echo the_post_thumbnail_url(); ?>" alt="advertisement">
            </a>
          </div>
        </div>
      </div>
    </section>

    <?php $title = get_post(get_post_thumbnail_id())->post_title; ?>

    <script type="text/javascript">
      document.getElementById('adLeaderboard').addEventListener('click', function() {
        ga('send', 'event', '<?php echo "{$title}-ad"; ?>', '<?php echo "{$title}-halfpage"; ?>');
      });
    </script>

  <?php endwhile; ?>
<?php endif; wp_reset_query(); ?>
