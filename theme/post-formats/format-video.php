<article id="post-<?php the_ID(); ?>" role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
	Video Format

	<h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
    <time class="date" datetime="<?php get_the_time('Y-m-d') ?>"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></time>
    <div class="author"><?php _e('Published By:', 'designbyte-starter'); ?> <?php the_author_posts_link(); //the_author(); ?></div>
    <?php the_tags(__('Tags: ', 'designbyte-starter'), ', ', ''); ?>
    <?php _e('Categorised In: ', 'designbyte-starter'); the_category(', '); ?>

    <div class="entry-content" itemprop="articleBody">
		<?php if(has_post_thumbnail()) { ?>
            <?php the_post_thumbnail(); ?>
        <?php } ?>
    
    	<?php the_content(); ?>
        
        <?php
			wp_link_pages(array(
			  'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:','designbyte-starter') . '</span>',
			  'after'       => '</div>',
			  'link_before' => '<span>',
			  'link_after'  => '</span>',
			));
		?>
	</div>

	<?php //edit_post_link(); ?>
	<?php //comments_template(); ?>
</article>
