<?php
  $args = array( 'post_type' => 'ads-page', 'name' => 'halfpage' );
  $adHalfpage = new WP_Query($args);
?>

<?php if ($adHalfpage->have_posts()) : ?>
  <?php while ($adHalfpage->have_posts()) : $adHalfpage->the_post(); ?>
    <?php // if (get_post_meta(get_the_ID(), 'ad-show', true)) : ?>

      <a id="adHalfpage" href="<?php echo get_post_meta(get_the_ID(), 'ad-url', true); ?>" target="_blank" style="border:none;" rel="nofollow">
        <img class="borderGRY" src="<?php echo the_post_thumbnail_url(); ?>" alt="advertisement">
      </a>

      <?php $title = get_post(get_post_thumbnail_id())->post_title; ?>

      <script type="text/javascript">
        jQuery(document).ready(function() {
          jQuery('#adHalfpage').click(function(){
            ga('send', 'event', '<?php echo "{$title}-ad"; ?>', '<?php echo "{$title}-halfpage"; ?>');
          });
        });
      </script>

    <?php // endif; ?>
  <?php endwhile; ?>
<?php endif; wp_reset_query(); ?>
