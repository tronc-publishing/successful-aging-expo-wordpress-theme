<?php
  $socialLinks = [
    [ 'link' => get_option('social-facebook'), 'class' => 'facebook' ],
    [ 'link' => get_option('social-twitter'), 'class' => 'twitter' ],
    [ 'link' => get_option('social-linkedin'), 'class' => 'linkedin-square' ],
    [ 'link' => get_option('social-instagram'), 'class' => 'instagram' ],
    [ 'link' => get_option('social-google'), 'class' => 'google-plus' ],
    [ 'link' => get_option('social-vimeo'), 'class' => 'vimeo-square' ],
    [ 'link' => get_option('social-pinterest'), 'class' => 'pinterest-square' ],
    [ 'link' => get_option('social-email'), 'class' => 'envelope' ]
  ];

  $b2bCallout = nl2br(get_option('b2b-callout'));
  $copyTxt = get_option('copyright-txt');
?>

<section id="formsCon">
  <div class="sectionBlk pAll0">
    <div class="container flex alpha omega clearfix">
      <?php if(!is_page('b2b') && !is_page('contact-us')) : ?>
        <div id="entertainCon" class="des-column col_12 txtCenter">
          <div class="des-inner desMinBT des-minInner bkgrdBLU pt80 pb80">
            <h3 class="lgTxt colorWHT txtCaps mb25"><strong class="mdBold"><?php _e($b2bCallout); ?></strong></h3>
            <a class="typBtn orgBtn" href="<?php echo get_permalink(get_page_by_title('b2b')); ?>" rel="nofollow">Learn More</a>
          </div>
        </div>
      <?php else : ?>
        <div id="expertCon" class="des-column col_6 txtCenter">
          <div class="des-inner desMinBT des-minInner bkgrdBLU mRT1 pt80 pb80">
            <h3 class="lgTxt colorWHT txtCaps mb25"><strong class="mdBold">Expert Speaker Series Application</strong></h3>
            <a class="typBtn orgBtn" href="https://docs.google.com/forms/d/e/1FAIpQLSdTOMIiUSwAn9CnH6TkKduUxgI3OZ5gQIDqW-YRLyVmtdyaNA/viewform?c=0&w=1" rel="nofollow">Submit Application</a>
          </div>
        </div>
        <div id="entertainCon" class="des-column col_6 txtCenter">
          <div class="des-inner desMinBT des-minInner bkgrdBLU pt80 pb80">
            <h3 class="lgTxt colorWHT txtCaps mb25"><strong class="mdBold">Entertainment Stage Application</strong></h3>
            <a class="typBtn orgBtn" href="https://docs.google.com/forms/d/e/1FAIpQLSebM6xJ_Y85t6h3K0Vycn0CD0ofD68ZGpO5GM3823VGzJJUeA/viewform?c=0&w=1" rel="nofollow">Submit Application</a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section> <!-- END #formsCon -->

<?php
  if (is_page('contact-us'))
    get_template_part('./template-parts/ad-leaderboard');

  if (is_page('b2b') || is_page('contact-us'))
    get_template_part('./template-parts/content-contact-form');

  if (!is_page('b2b'))
    get_template_part('./template-parts/content-sponsors')
?>

<footer id="footer">
  <div class="sectionBlk pt50 pb50">
    <div class="container clearfix">
      <div class="des-column col_4 col_lg_7">
        <div class="des-inner">
          <?php dynamic_sidebar('footer-col-1'); ?>
        </div>
      </div>

      <div class="des-column col_3 col_lg_5">
        <div class="des-inner">
          <?php dynamic_sidebar('footer-col-2'); ?>
        </div>
      </div>

      <div id="newsletter" class="des-column col_5 col_lg_12">
         <div id="newsOne">
            <div class="des-column col_12 col_lg_5 col_sm_12 preFootLT">
              <div class="des-inner">
                <h6>Sign Up To Receive Updates About Successful Aging Expo</h6>
              </div>
            </div>
            <div class="des-column col_12 col_lg_7 col_sm_12 preFootRT">
              <div class="des-inner">
                <div class="form orange">
                  <div class="section">
                    <form id="newsForm" method="post">
                      <fieldset>
                        <div class="grid-container">
                          <div class="column-twelve">
                            <div class="input-group-right noLabel focus inlineError">
                              <label for="newsemail"><i class="fa fa-envelope icoLT" aria-hidden="true"></i></label>
                              <input type="email" id="newsemail" name="newsemail" placeholder="Email Address...">
                              <div class="tooltip slideIn topRight" data-tooltip="*Email Required"></div>
                              <a id="newsSubmit" class="typBtn" href="#">Sign Up</a>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div id="newsProgress" class="txtCenter">
          <h2 class="whtTxt">Processing</h2>
          <i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom whtTxt"></i>
        </div>
        <div id="newsSuccess" class="txtCenter">
          <h2 class="whtTxt"><strong>You're In!</strong> We look forward to sending you updates about our Free Successful Aging Expo.</h2>
        </div>
      </div>

    </div>
  </div>

  <div class="container clearfix">
    <div class="des-column col_12 txtCenter">
      <div class="footerBtm clearfix">
        <div class="des-column col_6 socialBlk">
          <?php foreach ($socialLinks as $socialLink) : ?>
            <?php if($socialLink['link']) : ?>
              <a href="<?php echo $socialLink['link']; ?>" target="_blank" rel="nofollow"><i class="<?php echo "fa fa-{$socialLink['class']}"; ?>" aria-hidden="true"></i></a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <p class="des-column col_6 txtRight"><?php $d = date('Y'); echo "&copy; Copyright {$d} {$copyTxt}"; ?></p>
      </div>
    </div>
  </div>
</footer>
</div>

<a id="scrollup" href="#" title="Sroll to Top"><i class="fa fa-chevron-up"></i></a>

</div>

<?php wp_footer(); ?>

<!-- <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/theme/css/arforms-custom.css"> -->

</body>
</html>
