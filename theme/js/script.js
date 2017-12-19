jQuery(document).ready(function () {
  'use strict';


  /*--- Smooth Scroll ---*/
  var hash = window.location.hash.substr(1);
  if (hash != "") {
      var scrollAnimationTime = 1200,
          scrollAnimation = 'easeInOutExpo';

      var target = '#' + hash;
      jQuery('html, body').stop().animate({
          'scrollTop': jQuery(target).offset().top
      }, scrollAnimationTime, scrollAnimation, function () {
          window.location.hash = target;
      });
  }

  jQuery('.section-link').smoothScroll({
  // jQuery('a').smoothScroll({
      speed: 400,
      offset: 0
  });


  /*--- Mobile Nav ---*/
  var winHit = jQuery(window).outerHeight(),
      winTot = winHit + 'px';
  jQuery('.mobileBox').css('height', winTot);

  jQuery('.mNavBtn').click(function (e) {
      e.preventDefault();
      jQuery(this).toggleClass('open');

      if (jQuery(this).hasClass('active')) {
          jQuery(this).removeClass('active');
          jQuery('#mobileNav').animate({right: '-261px'}, 450);
          jQuery('.theme-wrap').animate({left: '0px'}, 450);
          jQuery('.logoHorz').show();
      } else {
          jQuery(this).addClass('active');
          jQuery('#mobileNav').animate({right: '0px'}, 450);
          jQuery('.theme-wrap').removeAttr('style');
          jQuery('.theme-wrap').animate({left: '-261px'}, 450);
          jQuery('.logoHorz').hide();
      }
  });


  /*--- Contact Form ---*/
  jQuery('#uPhone').mask("(999)-999-9999");

	var uName = jQuery('#uName'),
		uEmail = jQuery('#uEmail'),
		uPhone = jQuery('#uPhone'),
		uMsg = jQuery('#uMsg');

	uName.blur(validateName);
	uEmail.blur(validateEmail);
    uPhone.blur(validatePhone);
    uMsg.blur(validateMsg);

	jQuery('#submitBtn').click(function (e) {
		e.preventDefault();
		if(validateName() && validateEmail() && validatePhone() && validateMsg()){
			jQuery('#contactUs').submit();
		}
	});
	jQuery('#contactUs').submit(function (e) {
		e.preventDefault();

        jQuery('#contactUs').fadeOut(200, function () {
            jQuery('pProgressContact').fadeIn(300);

            jQuery.ajax({type: 'GET',
                url: 'inc/emailConfirm.php',
                data: jQuery('#contactUs').serialize(),
                success: function () {
                    jQuery('#pProgressContact').fadeOut(200, function () {
                        jQuery('#pSuccessContact').fadeIn(300);
                    });
                    //alert('Success');

                    jQuery('#uName').attr('value', '');
                    jQuery('#uEmail').attr('value', '');
                    jQuery('#uPhone').attr('value', '');
                    jQuery('#uMsg').attr('value', '');
                },
                error: function () {
                    jQuery('#pProgressContact').fadeOut(200, function () {
                        jQuery('#pSuccessContact').fadeIn(300);
                    });
                    //alert('Fail');
                }
            });
            return false;
        });
    });

	function validateName(){
		if(uName.val() != ''){
			uName.removeClass('error');
			uName.addClass('success');
			return true;
		} else {
			uName.removeClass('success');
			uName.addClass('error');
			return false;
		}
	};
	function validateEmail(){
		var a = uEmail.val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		if(filter.test(a)){
			uEmail.removeClass('error');
			uEmail.addClass('success');
			return true;
		} else {
			uEmail.removeClass('success');
			uEmail.addClass('error');
			return false;
		}
	};
	function validatePhone(){
		if(uPhone.val() != ''){
			uPhone.removeClass('error');
			uPhone.addClass('success');
			return true;
		} else {
			uPhone.removeClass('success');
			uPhone.addClass('error');
			return false;
		}
	};
	function validateMsg(){
		if(uMsg.val() != ''){
			uMsg.removeClass('error');
			uMsg.addClass('success');
			return true;
		} else {
			uMsg.removeClass('success');
			uMsg.addClass('error');
			return false;
		}
	};


  /*--- Sponsor Slider ---*/
  jQuery('.sponsorSlideBlk').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2500,
      dots: false,
      arrows: true,
      infinite: true,
      speed: 450,
      responsive: [
          {
              breakpoint: 1075,
              // breakpoint: 1024,
              settings: {
                  slidesToShow: 4,
                  slidesToScroll: 1,
                  arrows: false
              }
          },
          {
              breakpoint: 600,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  arrows: false
              }
          },
          {
              breakpoint: 480,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  arrows: false
              }
          }
      ]
  });


  /*--- Newsletter Validation ---*/
  var email = jQuery('#newsemail');

  email.blur(validateEmailNewsLetter);

  jQuery('#newsSubmit').click(function (e) {
    e.preventDefault();
    if(validateEmailNewsLetter()){
      jQuery('#newsForm').submit();
    }
  });

  jQuery('#newsForm').submit(function (e) {
    e.preventDefault();

      jQuery('#newsOne').fadeOut(200, function () {
          jQuery('#newsProgress').fadeIn(300);

          jQuery.ajax({type: 'GET',
              // url: 'http://tribpubchicago.com/events/the-taste/inc/confirm-newsletter.php',
              url: 'inc/confirm-newsletter.php',
              data: jQuery('#newsForm').serialize(),
              success: function () {
                  jQuery('#newsProgress').fadeOut(200, function () {
                      jQuery('#newsSuccess').fadeIn(300);
                  });
                  //alert('Success');

                  jQuery('#newsemail').attr('value', '');
              },
              error: function () {
                  jQuery('#newsProgress').fadeOut(200, function () {
                      jQuery('#newsOne').fadeIn(300);
                  });
                  //alert('Fail');
              }
          });
          return false;
      });
  });

  function validateEmailNewsLetter(){
    var a = email.val();
    var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
    if(filter.test(a)){
      email.removeClass('error');
      email.addClass('success');
      return true;
    } else {
      email.removeClass('success');
      email.addClass('error');
      return false;
    }
  };

  /*-- Ad Event Tracking --*/
  // jQuery('#adLeaderboard').click(function(){
  //   ga('send', 'event', 'flammia-law-ad', 'flammia-law-leaderboard');
  // });

});
