<?php
  $args = array( 'post_type' => 'ads-page', 'name' => 'leaderboard' );
  $adLeaderboard = new WP_Query($args);
?>

<?php if ($adLeaderboard->have_posts()) : ?>
  <?php while ($adLeaderboard->have_posts()) : $adLeaderboard->the_post(); ?>

    <section id="leaderboard">
      <div class="pt50 pb50">
        <div class="container clearfix">
          <div class="col_12 txtCenter">
            <a id="adLeaderboard" href="https://www.flammialaw.com/about-our-firm/" target="_blank" style="border:none;" rel="nofollow">
              <img src="<?php echo the_post_thumbnail_url(); ?>" alt="advertisement">
            </a>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      jQuery(document).ready(function() {
        jQuery('#adLeaderboard').click(function(){
          ga('send', 'event', 'flammia-law-ad', 'flammia-law-leaderboard');
        });
      });
    </script>

  <?php endwhile; ?>
<?php endif; ?>
