<?php
  $args = array( 'post_type' => 'ads-page', 'name' => 'leaderboard' );
  $adLeaderboard = new WP_Query($args);
?>

<?php if ($adLeaderboard->have_posts()) : ?>
  <?php while ($adLeaderboard->have_posts()) : $adLeaderboard->the_post(); ?>
    <?php if (get_post_meta(get_the_ID(), 'ad-show', true)) : ?>

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
        jQuery(document).ready(function() {
          jQuery('#adLeaderboard').click(function(){
            ga('send', 'event', '<?php echo "{$title}-ad"; ?>', '<?php echo "{$title}-leaderboard"; ?>');
          });
        });
      </script>

    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; wp_reset_query(); ?>
