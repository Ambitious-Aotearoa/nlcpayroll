;(function($){

  /**
   * jQuery function to prevent default anchor event and take the href * and the title to make a share popup
   *
   * @param  {[object]} e           [Mouse event]
   * @param  {[integer]} intWidth   [Popup width defalut 500]
   * @param  {[integer]} intHeight  [Popup height defalut 400]
   * @param  {[boolean]} blnResize  [Is popup resizeabel default true]
   */
  $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {

    // Prevent default anchor event
    e.preventDefault();

    // Set values for window
    intWidth = intWidth || '500';
    intHeight = intHeight || '400';
    strResize = (blnResize ? 'yes' : 'no');

    // Set title and open popup with focus on it
    var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
        strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
        objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
  };

  /* ================================================== */

  $(document).ready(function ($) {
    $('.share__link:not([href^="mailto"])').on("click", function(e) {
      $(this).customerPopup(e);
    });
  });

}(jQuery));

(function($) {

  $(function() {

    var swiper = new Swiper(".myhero-slider", {
        loop: true,
        autoplay: {
          delay: 5000, // Slide change every 3 seconds
          disableOnInteraction: false, // Continue autoplay after user interactions
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    });

    $('.page-header__background-image img, .section-hero__background-image img').one('load', function() {
      $(this).fadeIn(500);
    }).each(function() {
      if(this.complete) {
        $(this).load();
      }
    });

    $('#menu').on('show.bs.collapse', function () {
      $('body').addClass('body--menu-open');
    });

    $('#menu').on('hidden.bs.collapse', function () {
      $('body').removeClass('body--menu-open');
    });

    if( $(window).width() >= 992 ) {
      $('.nav-link[data-toggle=dropdown]').parent().on('mouseenter', function(e) {
        $(this).find('.nav-link[data-toggle=dropdown]').dropdown('toggle');
      });
      $('.nav-link[data-toggle=dropdown]').parent().on('mouseleave', function(e) {
        $(this).find('.nav-link[data-toggle=dropdown]').dropdown('toggle');
      });

      $('.dropdown-toggle, .dropdown-item').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.location = $(this).attr('href');
      });
    } else {
      $('.dropdown-toggle-arrow').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        if ( $(this).hasClass('dropdown-toggle-arrow--active') ) {
          $(this).removeClass('dropdown-toggle-arrow--active');
          $(this).closest('.nav-item').find('.dropdown-menu').eq(0).addClass('show').slideUp('dropdown-menu--active');
        } else {
          $(this).addClass('dropdown-toggle-arrow--active');
          $(this).closest('.nav-item').find('.dropdown-menu').eq(0).addClass('show').slideDown('dropdown-menu--active');
        }
      });

      $('.dropdown-toggle').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.location = $(this).attr('href');
      });
    }

    $('a[href*="#"]').not('[href^="#tab"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
      // On-page links
      if ( location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            }
          });
        }
      }
    });

    $(window).bind("scroll", function() {
        if ($(this).scrollTop() > 520) {
            $("#btt").addClass('active');
        } else {
            $("#btt").removeClass('active');
        }
    });

    // Wp forms float
    var $wpinputs = $('.form--floating-labels input, .form--floating-labels select'),
    update = function(){
      var $wpinput   = $(this),
          $wpwrapper = $wpinput.closest('.wpforms-field');

      if( $wpinput.val() !== '' || $wpinput.is(':active') || $wpinput.is(':focus') || $wpinput.prop('tagName') === 'SELECT') {
        $wpwrapper.addClass('is-floating');
      } else {
        $wpwrapper.removeClass('is-floating');
      }

      if($wpinput.is(':focus')) {
        $wpwrapper.addClass('is-focused');
      } else {
        $wpwrapper.removeClass('is-focused');
      }
    };

    $wpinputs.each( update );
    $wpinputs.on('click focus input blur', update);

    $('.mfp-iframe').magnificPopup({
      type: 'iframe'
    });

    //Swiper
    $(function() {
      var imageSwiper = new Swiper('.swiper-container--images', {
        loop: true,
        pagination: {
          el: '.swiper-pagination',
          type: 'fraction',
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    });

    $('img.svg').each(function(){
      var $img     = $(this);
      var imgID    = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL   = $img.attr('src');

      $.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = $(data).find('svg');

          // Add replaced image's ID to the new SVG
          if(typeof imgID !== 'undefined') {
              $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if(typeof imgClass !== 'undefined') {
              $svg = $svg.attr('class', imgClass+' replaced-svg');
          }

          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');

          // Replace image with new SVG
          $img.replaceWith($svg);

      }, 'xml');

    });

    $('.client').on('mouseenter', function() {
      var bgcolor = $(this).data('bgcolor');
      $(this).css('background', bgcolor);
    });
    $('.client').on('mouseleave', function() {
      $(this).removeAttr('style');
    });

    function setCookie(cname, cvalue, exdays) {
      const d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      let expires = "expires="+d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
      let name = cname + "=";
      let ca = document.cookie.split(';');
      for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }


    let country = getCookie("country");
    if (country !== "") {
        console.log(country+'-test1');
        if(country === 'Australia') {
            jQuery('.phones__link img').attr('src', 'https://nlcpayroll.com/wp-content/uploads/2023/03/australia.png');
            jQuery('.phones__link .phones__text').text('AU 1800 925 991');
            jQuery('.phones__link a').attr('href', 'tel:1800925991');
        }
        else {
            jQuery('.phones__link img').attr('src', 'https://nlcpayroll.com/wp-content/uploads/2019/11/flag-nz.svg');
            jQuery('.phones__link .phones__text').text('NZ 0800 925 991');
            jQuery('.phones__link a').attr('href', 'tel:0800925991');
        }
        jQuery('.phones__link').css('opacity', '1');

    } else {
        jQuery.ajax({
        type : "GET",
        url : '/wp-admin/admin-ajax.php',
        data : {action: "get_country"},
        success: function(response) {
            console.log(response+'-test2');
            setCookie("country", response, 365);
            if(response === 'Australia') {
                jQuery('.phones__link img').attr('src', 'https://nlcpayroll.com/wp-content/uploads/2023/03/australia.png');
                jQuery('.phones__link .phones__text').text('AU 1800 925 991');
                jQuery('.phones__link a').attr('href', 'tel:1800925991');
            }
            else {
                jQuery('.phones__link img').attr('src', 'https://nlcpayroll.com/wp-content/uploads/2019/11/flag-nz.svg');
                jQuery('.phones__link .phones__text').text('NZ 0800 925 991');
                jQuery('.phones__link a').attr('href', 'tel:0800925991');
            }
            jQuery('.phones__link').css('opacity', '1');
        }
        });

    }

  });

})(jQuery);
