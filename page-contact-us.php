<?php
  /* Template Name: Contact Us Page */
  get_header();
?>

<section id="contact-us" class="container clearfix sectionBlk">
  <div class="des-column col_12">
    <div class="des-inner txtCenter mb40">
      <h2>Get in front of thousands of potential customers</h2>
    </div>
  </div>
  <div class="des-column col_12">
    <div class="des-inner txtCenter">
      <p>
        Become a sponsor or exhibitor for a day tailored to deliver inspiration, education and entertainment for adults 50+.
      </p>
      <p>
        This FREE expo will showcase expert speakers on a variety of topics from health &amp; wellness, financial planning, Medicare, travel, assisted living and so much more. The latest products, services and information on successfully aging will be found under one roof, producing maximum engagement.
      </p>
      <p>
        <strong>SPACE IS LIMITED!</strong><br>
        <strong class="mdBold">Don’t miss</strong> this great opportunity to reach <strong class="mdBold">your</strong> target audience.
      </p>
    </div>
  </div>
</section><!-- END #contact-us -->

<section id="formsCon">
    <div class="sectionBlk pAll0">
        <div class="container flex alpha omega clearfix">
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
        </div>
    </div>
</section><!-- END #formsCon -->

<?php include './inc/ad-leaderboard.php' ?>

<section id="contact">
    <div class="sectionBlk">
        <div class="container clearfix">
            <div class="des-column col_12 txtCenter">
                <h2 class="mb10">Join us as a sponsor or exhibitor for a day tailored to deliver inspiration, education &amp; entertainment to thousands of adults 50+</h2>
                <h5 class="colorGREY mb40">Complete the form below or contact us at <a class="typLink" href="tel:4074205100" target="_blank" rel="nofollow">407.420.5100</a> | <a class="typLink" href="mailto:sae@orlandosentinel.com" target="_blank" rel="nofollow">sae@orlandosentinel.com</a></h5>

                <form id="contactUs" class="formBlk txtLeft clearfix" method="" action="">
                    <div class="des-column col_6 formMDcol">
                        <div class="pRT4">
                            <div class="formInner mb8">
                                <input type="text" id="uName" name="uName" value="" placeholder="Name*" tabindex="1" />
                            </div>
                            <div class="formInner mb8">
                                <input type="email" id="uEmail" name="uEmail" value="" placeholder="Email*" tabindex="2" />
                            </div>
                            <div class="formInner mb0">
                                <input type="text" id="uPhone" name="uPhone" value="" placeholder="Phone Number*" tabindex="3" />
                            </div>
                        </div>
                    </div>
                    <div class="des-column col_6">
                        <div class="txtBoxContainer pLT4">
                            <textarea id="uMsg" name="uMsg" value="" placeholder="Message*" tabindex="4"></textarea>
                        </div>
                    </div>
                    <div class="des-column col_12 pt15 txtCenter">
                        <a id="submitBtn" class="typBtn orgBtn" href="#" tabindex="5">Send Message</a>
                    </div>
                </form>
                <div id="pProgressContact" class="txtCenter">
                    <h2 class="colorBLU mb3">Processing</h2>
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom colorBLU"></i>
                </div>
                <div id="pSuccessContact" class="txtCenter">
                    <h2 class="colorBLU">Thank you for your interest in Orlando Sentinel Successful Aging Expo. Our team will be in touch shortly.</h2>
                </div>
            </div>
        </div>
    </div>
</section><!-- END #contact -->

<?php get_footer(); ?>
