(function ($) {
  "use strict";

  /*===========================================
        Table of contents
    01. On Load Function
    02. Preloader
    03. Mobile Menu Active
    04. Sticky fix
    05. Scroll To Top
    06. Set Background Image
    07. Popup Sidemenu
    08. Search Box Popup
    09. Counter Up Active
    10. Hero Slider Active
    11. Select Box Active
    12. Date & Time Picker
    13. Magnific Popup
    14. VS Button
    15. Appontment Form
    16. Progress Bar Active
    17. Sub Menu Position
    18. Product Ship Another Toggle
    19. Quantity Adder
    20. Rating Input Class Added
    21. One Page Nav
    22. Tab Slide Fixing
    22. Right Click Disable
    23. Inspect Element Disable
    24. Google Map Active
    =============================================*/

 
  
  
  








  /*---------- 01. On Load Function ----------*/
  $(window).on('load', function () {
    $('.preloader').addClass('animate');
    setTimeout(() => {
      $('.preloader').fadeOut();
    }, 1000);
  });



  /*---------- 02. Preloader ----------*/
  if ($('.preloader').length > 0) {
    $('.preloaderCls').each(function () {
      $(this).on('click', function (e) {
        e.preventDefault();
        $('.preloader').css('display', 'none');
      })
    });
  };



  /*---------- 03. Mobile Menu Active ----------*/
  $('.mobile-menu-active').vsmobilemenu({
    menuContainer: '.vs-mobile-menu',
    expandScreenWidth: 992,
    menuToggleBtn: '.vs-menu-toggle',
  });



  /*---------- 04. Sticky fix ----------*/
  var lastScrollTop = '';
  var scrollToTopBtn = '.scrollToTop'

  function stickyMenu($targetMenu, $toggleClass) {
    var st = $(window).scrollTop();
    if ($(window).scrollTop() > 600) {
      if (st > lastScrollTop) {
        $targetMenu.removeClass($toggleClass);

      } else {
        $targetMenu.addClass($toggleClass);
      };
    } else {
      $targetMenu.removeClass($toggleClass);
    };
    lastScrollTop = st;
  };
  $(window).on("scroll", function () {
    stickyMenu($('.sticky-header'), "active");
    if ($(this).scrollTop() > 400) {
      $(scrollToTopBtn).addClass('show');
    } else {
      $(scrollToTopBtn).removeClass('show');
    }
  });



  /*---------- 05. Scroll To Top ----------*/
  $(scrollToTopBtn).on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, 3000);
    return false;
  });




  /*---------- 06.Set Background Image ----------*/
  if ($('.background-image').length > 0) {
    $('.background-image').each(function () {
      var src = $(this).attr('data-vs-img');
      $(this).css({
        'background-image': 'url(' + src + ')'
      });
    });
  };





  /*---------- 07. Popup Sidemenu ----------*/
  function popupSideMenu($sideMenu, $sideMunuOpen, $sideMenuCls, $toggleCls) {
    // Sidebar Popup
    $($sideMunuOpen).on('click', function (e) {
      e.preventDefault();
      $($sideMenu).addClass($toggleCls);
      $('body').addClass('overflow-hidden');
    });
    $($sideMenu).on('click', function (e) {
      e.stopPropagation();
      $($sideMenu).removeClass($toggleCls)
      $('body').removeClass('overflow-hidden');
    });
    var sideMenuChild = $sideMenu + ' > div';
    $(sideMenuChild).on('click', function (e) {
      e.stopPropagation();
      $($sideMenu).addClass($toggleCls)
      $('body').addClass('overflow-hidden');
    });
    $($sideMenuCls).on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $($sideMenu).removeClass($toggleCls);
      $('body').removeClass('overflow-hidden');
    });
  };
  popupSideMenu('.sidemenu-wrapper', '.sideMenuToggler', '.sideMenuCls', 'show');





  /*---------- 08. Search Box Popup ----------*/
  function popupSarchBox($searchBox, $searchOpen, $searchCls, $toggleCls) {
    $($searchOpen).on('click', function (e) {
      e.preventDefault();
      $($searchBox).addClass($toggleCls);
      $('body').addClass('overflow-hidden');
    });
    $($searchBox).on('click', function (e) {
      e.stopPropagation();
      $($searchBox).removeClass($toggleCls);
      $('body').removeClass('overflow-hidden');
    });
    $($searchBox).find('form').on('click', function (e) {
      e.stopPropagation();
      $($searchBox).addClass($toggleCls);
      $('body').addClass('overflow-hidden');
    });
    $($searchCls).on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $($searchBox).removeClass($toggleCls);
      $('body').removeClass('overflow-hidden');
    });
  };
  popupSarchBox('.popup-search-box', '.searchBoxTggler', '.searchClose', 'show');



  /*----------- 09. Counter Up Active ----------*/
  $('.counter').counterUp({
    delay: 10,
    time: 1000
  });



  /*----------- 10. Hero Slider Active ----------*/
  $('.vs-hero-carousel').each(function () {
    var vsHslide = $(this),
      container = vsHslide.data('container'),
      responsiveunder = vsHslide.data('responsiveunder'),
      height = vsHslide.data('height'),
      loop = vsHslide.data('loop'),
      navbuttons = vsHslide.data('navbuttons'),
      navstartstop = vsHslide.data('navstartstop'),
      hoverbottomnav = vsHslide.data('hoverbottomnav'),
      hoverprevnext = vsHslide.data('hoverprevnext'),
      navprevnext = vsHslide.data('navprevnext'),
      pauseonhover = vsHslide.data('pauseonhover'),
      autoStart = vsHslide.data('autostart'),
      thumbnailnavigation = vsHslide.data('thumbnailnavigation'),
      slidertype = vsHslide.data('slidertype'),
      maxratio = vsHslide.data('maxratio'),
      showcircletimer = vsHslide.data('showcircletimer');


    // Custom Style Set    
    vsHslide.on('sliderWillLoad', function (event, slider) {

      // Define Variable
      var respLayer = $(this).find('.ls-responsive'),
        lsDesktop = 'ls-desktop',
        lsMobile = 'ls-mobile',
        lsTablet = 'ls-tablet',
        windowWid = $(window).width(),
        style;

      // Check window and look for style
      if (windowWid <= 767) {
        style = lsMobile;
      } else if (windowWid <= 1024) {
        style = lsTablet;
      } else {
        style = lsDesktop;
      }

      // Check if this layer has style for this device
      respLayer.each(function () {
        var layer = $(this),
          respStyle = (layer.data(style)) ? layer.data(style) : layer.data('ls-desktop'),
          mainStyle = (layer.attr('style') !== undefined) ? layer.attr('style') : ' ';
        layer.attr('style', mainStyle + respStyle);
      })

    });

    vsHslide.layerSlider({
      maxRatio: (maxratio ? maxratio : 1),
      type: (slidertype ? slidertype : 'responsive'),
      pauseOnHover: (pauseonhover ? true : false),
      navPrevNext: (navprevnext ? true : false),
      hoverPrevNext: (hoverprevnext ? true : false),
      hoverBottomNav: (hoverbottomnav ? true : false),
      navStartStop: (navstartstop ? true : false),
      navButtons: (navbuttons ? true : false),
      loop: (loop ? false : true),
      autostart: (autoStart ? true : false),
      height: (height ? height : 1080),
      responsiveUnder: (responsiveunder ? responsiveunder : 1220),
      layersContainer: (container ? container : 1220),
      showCircleTimer: (showcircletimer ? true : false),
      skinsPath: 'layerslider/skins/',
      thumbnailNavigation: (thumbnailnavigation ? false : true),
    });
  });




  /*----------- 11. Select Box Active ----------*/
  if ($('select').length > 0) {
    $('select').niceSelect();
  }



  /*---------- 12. Date & Time Picker ----------*/
  // Time And Date Picker
  $('.dateTime-pick').datetimepicker({
    timepicker: true,
    datepicker: true,
    format: 'y-m-d H:i',
    hours12: false,
    step: 30
  });

  // Only Date Picker
  $('.date-pick').datetimepicker({
    timepicker: false,
    datepicker: true,
    format: 'm-d-y',
    step: 10
  });

  // Only Time Picker
  $('.time-pick').datetimepicker({
    datepicker: false,
    timepicker: true,
    format: 'H:i',
    hours12: false,
    step: 10
  });



  /*----------- 13. Magnific Popup ----------*/
  /* magnificPopup img view */
  $('.popup-image').magnificPopup({
    type: 'image',
    image: {
      verticalFit: true
    },
    gallery: {
      enabled: true 
    }
  });

  /* magnificPopup video view */
  $('.popup-video').magnificPopup({
    type: 'iframe'
  });



  /*----------- 14. VS Button  ----------*/
  // function buttonAnimation(btn) {
  //   $(btn).each(function () {
  //     var text = $(this).html();
  //     $(this).html('')
  //     $(this).prepend('<span class="btn-text">' + text + '</span><span class="btn-text-mask">' + text + '</span>')
  //   })
  // };

  // if ($('[class*="mask-"]').length > 0) {
  //   buttonAnimation('[class*="mask-"]');
  // };

  



  /*----------- 15. Appontment Form ----------*/
  function appontmentSubmit() {
    let step1day = '#aptDay',
      step1Guests = '#aptGuests';

    $('#aptSubmit1').on('click', (e) => {
      e.preventDefault();
      let aptDate = $(step1day).val(),
        aptGuests = $(step1Guests).val();
      $('#aptMainGuest').val(aptGuests);
      $('#aptMainDate').val(aptDate);
    });
  };
  appontmentSubmit()



  /*----------- 16.  Progress Bar Active ----------*/
  $('.bar-progress .progress-value').each(function () {
    var width = $(this).attr('data-value');
    $(this).css('width', width + '%')
  })



  /*----------- 17. Sub Menu Position ----------*/
  function subMenu() {
    let $subMain = $('.main-menu > .menu-item-has-children > ul');
    let $subSub = $('.main-menu .menu-item-has-children > ul > ul');
    $subMain.each(function () {
      if ($(window).width() > 991) {
        if ($(this).offset().left + $(this).width() > $(window).width()) {
          $(this).css({
            'left': 'auto',
            'right': '100%'
          });
        } else {
          $(this).css({
            'left': '0',
            'right': 'auto'
          });
        }
      }
    })
    $subSub.each(function () {
      if ($(window).width() > 991) {
        if ($(this).offset().left + $(this).width() > $(window).width()) {
          $(this).css({
            'left': 'auto',
            'right': '100%'
          });
          $(this).find('.sub-menu').css({
            'left': 'auto',
            'right': '100%'
          });
        }
      }
    })
  }
  subMenu();
  $(window).on('resize', function () {
    subMenu();
  });


  /*----------- 18. Product Ship Another Toggle ----------*/
  $('#buyerShipAnother').on('change', function () {
    if ($(this).is(':checked')) {
      $('.vs-billing-differentAddress').slideDown();
    } else {
      $('.vs-billing-differentAddress').slideUp();
    }
  });



  /*----------- 19. Quantity Adder ----------*/
  $('.quantity-plus').each(function () {
    $(this).on('click', function () {
      var $qty = $(this).siblings(".qty-input");
      var currentVal = parseInt($qty.val());
      if (!isNaN(currentVal)) {
        $qty.val(currentVal + 1);
      }
    })
  });

  $('.quantity-minus').each(function () {
    $(this).on('click', function () {
      var $qty = $(this).siblings(".qty-input");
      var currentVal = parseInt($qty.val());
      if (!isNaN(currentVal) && currentVal > 1) {
        $qty.val(currentVal - 1);
      }
    });
  })

  /*----------- 20. Rating Input Class Added ----------*/
  if ($('.vs-rating-input').length > 0) {
    $('.vs-rating-input').each(function () {
      $(this).find('span').on('click', function () {
        $('.vs-rating-input span').addClass('active');
        $(this).nextAll('span').removeClass('active');
      });
    });
  };


  /*----------- 21. One Page Nav ----------*/
  function onePageNav(element) {
    if ($(element).length > 0) {
      $(element).each(function(){
        $(this).find('a').each(function () {
          $(this).on('click', function () {
            var target = $(this.getAttribute('href'));
            if (target.length) {
              event.preventDefault();
              $('html, body').stop().animate({
                scrollTop: target.offset().top - 10
              }, 1000);
            };
            
          });
        });
      } )
    }
  };
  onePageNav('.onepage-nav');
  
  
  /*----------- 22. Tab Slide Fixing ----------*/
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var tab = $(this).attr('href');
    $(tab).find('.vs-carousel').slick('refresh');
  })
  

  /*----------- 23. VS Toggler ----------*/
  // $('.vs-toggler').each(function(){
  //   var btn = $(this);
  //   btn.on('click', function(e){
  //     e.preventDefault();
  //     var menu = $(this).next('.toggle-menu');      
  //     if (menu.hasClass('show')) {
  //       btn.removeClass('active');
  //       menu.removeClass('show');
  //     } else {
  //       $('.toggle-menu.show').removeClass('show');
  //       $('.vs-toggler.active').removeClass('active');
  //       btn.addClass('active');
  //       menu.addClass('show');
  //     }
  //   })
  // })

//   document.querySelectorAll('.vs-toggler').forEach(function(btn) {
//     btn.addEventListener('click', function(e) {
//         e.preventDefault();
//         var menu = this.nextElementSibling;
//         if (menu.classList.contains('show')) {
//             btn.classList.remove('active');
//             menu.classList.remove('show');
//         } else {
//             document.querySelectorAll('.toggle-menu.show').forEach(function(item) {
//                 item.classList.remove('show');
//             });
//             document.querySelectorAll('.vs-toggler.active').forEach(function(item) {
//                 item.classList.remove('active');
//             });
//             btn.classList.add('active');
//             menu.classList.add('show');
//         }
//     });
// });

document.querySelectorAll('.vs-toggler').forEach(function(btn) {
  btn.addEventListener('click', function(e) {
      e.preventDefault();
      var menu = this.parentElement.querySelector('.toggle-menu');
      if (menu.classList.contains('show')) {
          btn.classList.remove('active');
          menu.classList.remove('show');
      } else {
          document.querySelectorAll('.toggle-menu.show').forEach(function(item) {
              item.classList.remove('show');
          });
          document.querySelectorAll('.vs-toggler.active').forEach(function(item) {
              item.classList.remove('active');
          });
          btn.classList.add('active');
          menu.classList.add('show');
      }
  });
});



  





  /*----------- 23. Right Click Disable ----------*/
  // window.addEventListener('contextmenu', function (e) {
  //   // do something here... 
  //   e.preventDefault();
  // }, false);


  /*----------- 24. Inspect Element Disable ----------*/
  // document.onkeydown = function (e) {
  //   if (event.keyCode == 123) {
  //     return false;
  //   }
  //   if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
  //     return false;
  //   }
  //   if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
  //     return false;
  //   }
  //   if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
  //     return false;
  //   }
  //   if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
  //     return false;
  //   }
  // }


  /*----------- 00. Color Plate ----------*/
  if ($('.vs-setting-plate').length) {
    var colorurl, bgcolor;
    $('.vs-setting-plate .color-btn').each(function () {
      bgcolor = $(this).attr('data-color');
      $(this).css({
        'background-color': bgcolor
      });
      $(this).on('click', function () {
        colorurl = $(this).data('url');
        $('#themeColor').attr('href', colorurl)
      })
    });
    $('.plateToggle').on("click", function (e) {
      e.preventDefault()
      $('.vs-setting-plate').toggleClass('open');
      return false;
    });
  }




  /*----------- 25. Google Map Active ----------*/
  function contactMap() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
      // How zoomed in you want the map to start at (always required)
      zoom: 11,
      scrollwheel: false,
      // The latitude and longitude to center the map (always required)
      center: new google.maps.LatLng(40.6700, -73.9400), // New York
      // This is where you would paste any style found on Snazzy Maps.
      styles: [{
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [{
          "color": "#e9e9e9"
        }, {
          "lightness": 17
        }]
      }, {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f5f5f5"
        }, {
          "lightness": 20
        }]
      }, {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 17
        }]
      }, {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 29
        }, {
          "weight": .2
        }]
      }, {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 18
        }]
      }, {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 16
        }]
      }, {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f5f5f5"
        }, {
          "lightness": 21
        }]
      }, {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [{
          "color": "#dedede"
        }, {
          "lightness": 21
        }]
      }, {
        "elementType": "labels.text.stroke",
        "stylers": [{
          "visibility": "on"
        }, {
          "color": "#ffffff"
        }, {
          "lightness": 16
        }]
      }, {
        "elementType": "labels.text.fill",
        "stylers": [{
          "saturation": 36
        }, {
          "color": "#333333"
        }, {
          "lightness": 40
        }]
      }, {
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }]
      }, {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f2f2f2"
        }, {
          "lightness": 19
        }]
      }, {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#fefefe"
        }, {
          "lightness": 20
        }]
      }, {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [{
          "color": "#fefefe"
        }, {
          "lightness": 17
        }, {
          "weight": 1.2
        }]
      }]
    };
    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('google-map');

    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(mapElement, mapOptions);

    // Let's also add a marker while we're at it
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(40.6700, -73.9400),
      map: map,
      title: 'Cryptox'
    });
  }
  if ($('#google-map').length != 0) {
    google.maps.event.addDomListener(window, 'load', contactMap);
  }

 /*----------- 26. Month Day, Year Hour:Minute:Second, id-of-element-container ----------*/ 
  $(document).ready(function() {
 
    countUpFromTime("Jan 1, 2014 12:00:00", 'countup1'); // ****** Change this line!
});

function countUpFromTime(countFrom, id) {
    countFrom = new Date(countFrom).getTime();
    var now = new Date(),
        countFrom = new Date(countFrom),
        timeDifference = (now - countFrom);

    var secondsInADay = 60 * 60 * 1000 * 24,
        secondsInAHour = 60 * 60 * 1000;
    
    var days = Math.floor(timeDifference / (secondsInADay) * 1);
    var years = Math.floor(days / 365);
    if (years > 1) { days = days - (years * 365); }
    var hours = Math.floor((timeDifference % (secondsInADay)) / (secondsInAHour) * 1);
    var mins = Math.floor(((timeDifference % (secondsInADay)) % (secondsInAHour)) / (60 * 1000) * 1);
    var secs = Math.floor((((timeDifference % (secondsInADay)) % (secondsInAHour)) % (60 * 1000)) / 1000 * 1);

    var idEl = $("#" + id);
    idEl.find('.years').html(years);
    idEl.find('.days').html(days);
    idEl.find('.hours').html(hours);
    idEl.find('.minutes').html(mins);
    idEl.find('.seconds').html(secs);

    clearTimeout(countUpFromTime.interval);
    countUpFromTime.interval = setTimeout(function() { countUpFromTime(countFrom, id); }, 1000);
}


/*----------- 09. Filter ----------*/
$('.filter-active').imagesLoaded(function () {
  var $filter = '.filter-active',
    $filterItem = '.filter-item',
    $filterMenu = '.filter-menu-active';

  if ($($filter).length > 0) {
    var $grid = $($filter).isotope({
      itemSelector: $filterItem,
      filter: '*',
      /*
      // For masonary layout activation
      masonry: {
        // use outer width of grid-sizer for columnWidth
        columnWidth: 1
      }
      */
    });

    // filter items on button click
    $($filterMenu).on('click', 'button', function () {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({
        filter: filterValue
      });
    });

    // Menu Active Class 
    $($filterMenu).on('click', 'button', function (event) {
      event.preventDefault();
      $(this).addClass('active');
      $(this).siblings('.active').removeClass('active');
    });
  };
});


})(jQuery);





