/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        // Facebook SDK
        window.fbAsyncInit = function() {
            FB.init({
              appId      : '1592763920993396',
              xfbml      : true,
              version    : 'v2.3'
            });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

// Toggle classes for search form
$('#search-form').on('show.bs.collapse', function () {
  $("#search-toggle").toggleClass("active");
});
$('#search-form').on('hide.bs.collapse', function () {
  $("#search-toggle").toggleClass("active");
});

// Social Share popup window
$('a.newwindow').on('click', function (e) {
  e.preventDefault();
  var link = $(this).attr('href');
  var width = 840;
  var height = 464;
  var popupName = 'popup_' + width + 'x' + height;
  var left = (screen.width - width) / 2;
  var top = 100;
  var params = 'width=' + width + ',height=' + height + ',location=no,menubar=no,scrollbars=yes,status=no,toolbar=no,left=' + left + ',top=' + top;
  window[popupName] = window.open(link, popupName, params);
  if (window.focus) {
      window[popupName].focus();
  }
  return true;
});

// Fancybox
$(document).ready(function() {
  $(".fancybox").fancybox();
  $("a.pop-up").fancybox();
  $("a.pop-up-iframe").fancybox();
  $("a.pop-up-text").fancybox();
  $("area.pop-up-tex").fancybox();
});
