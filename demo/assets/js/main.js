(function ($) {
  "user strict";

  $(document).ready(function() {
    // preloader
  $(".preloader").delay(500).animate({
    "opacity" : "0"
  }, 500, function() {
    $(".preloader").css("display","none");
  });
  // nice-select
  $('select').niceSelect();
  background();
});

$(window).on('load', function() {
  galleryMasonary();
  galleryMasonaryTwo();
})

new WOW().init();

//Create Background Image
function background() {
  var img = $('.bg_img');
  img.css('background-image', function () {
    var bg = ('url(' + $(this).data('background') + ')');
    return bg;
  });
}

/* ---------------------------------------------
		    ## Sidebar Script
		--------------------------------------------- */
    var w = $(window).width();
    var MarginTop = (w > 1199) ? 80 : 0;
    if ($('.sidebar').length) {
        $('.sidebar').theiaStickySidebar({
            'containerSelector': '.blog-section',
            'additionalMarginTop': MarginTop,
            'minWidth': 992,
        });
    }

setInterval(function(){ 
  $(".banner-group-shape").addClass("active")
}, 1000);

  var fixed_top = $(".header-section");
  $(window).on("scroll", function(){
      if( $(window).scrollTop() > 500){  
          fixed_top.addClass("animated fadeInDown header-fixed");
      }
      else{
          fixed_top.removeClass("animated fadeInDown header-fixed");
      }
  });

  // navbar-click
  $(".navbar li a").on("click", function () {
    var element = $(this).parent("li");
    if (element.hasClass("show")) {
      element.removeClass("show");
      element.find("li").removeClass("show");
    }
    else {
      element.addClass("show");
      element.siblings("li").removeClass("show");
      element.siblings("li").find("li").removeClass("show");
    }
  });

  $('.popup-youtube').magnificPopup({
    type: 'video'
  });
  $('.image-popup').magnificPopup({
    type: 'image'
  });

  // scroll-to-top
  var ScrollTop = $(".scrollToTop");
  $(window).on('scroll', function () {
    if ($(this).scrollTop() < 500) {
        ScrollTop.removeClass("active");
    } else {
        ScrollTop.addClass("active");
    }
  });

  //Search
  $(document).on('click', '.search-bar, .skip', function() {
    $('.header-form').toggleClass('active');
  });
  $(document).on('click', '.ellipsis-bar', function() {
    $('.header-top-area').toggleClass('active');
    $('.overlay').addClass('active');
  })

  //Register
  $(document).on('click', '.custom-btn, .close', function() {
    $('.header-register-form').toggleClass('active');
  });
  $(document).on('click', '.ellipsis-bar', function() {
    $('.header-top-area').toggleClass('active');
    $('.overlay').addClass('active');
  })

  //Login
  $(document).on('click', '.custom-btn--style, .stop', function() {
    $('.header-login-form').toggleClass('active');
  });
  $(document).on('click', '.ellipsis-bar', function() {
    $('.header-top-area').toggleClass('active');
    $('.overlay').addClass('active');
  })

  //menu bar
  $('.header-bar').on('click', function () {
    $(this).toggleClass('active');
  $('.header-btn-group').toggleClass('active wow');
})

$('.datepicker-here').datepicker();

  //Overlay On Click Functions
  $(document).on('click', '.overlay', function () {
    $(this).removeClass('active');
    $('.header-bar').removeClass('active');
    $('.menu').removeClass('active');
    $('.header-top-area').removeClass('active');
  })

  $('.faq-wrapper .faq-title').on('click', function (e) {
    var element = $(this).parent('.faq-item');
    if (element.hasClass('open')) {
      element.removeClass('open');
      element.find('.faq-content').removeClass('open');
      element.find('.faq-content').slideUp(300, "swing");
    } else {
      element.addClass('open');
      element.children('.faq-content').slideDown(300, "swing");
      element.siblings('.faq-item').children('.faq-content').slideUp(300, "swing");
      element.siblings('.faq-item').removeClass('open');
      element.siblings('.faq-item').find('.faq-title').removeClass('open');
      element.siblings('.taq-item').find('.faq-content').slideUp(300, "swing");
    }
  });

  $('.faq-wrapper--style .faq-title').on('click', function (e) {
    var element = $(this).parent('.faq-item--style');
    if (element.hasClass('open')) {
      element.removeClass('open');
      element.find('.faq-content--style').removeClass('open');
      element.find('.faq-content--style').slideUp(300, "swing");
    } else {
      element.addClass('open');
      element.children('.faq-content--style').slideDown(300, "swing");
      element.siblings('.faq-item--style').children('.faq-content--style').slideUp(300, "swing");
      element.siblings('.faq-item--style').removeClass('open');
      element.siblings('.faq-item--style').find('.faq-title').removeClass('open');
      element.siblings('.taq-item--style').find('.faq-content--style').slideUp(300, "swing");
    }
  });

  $('.counter-number').counterUp({
    delay: 10,
    time: 5000,
    offset: 70,
    beginAt: 10,
    formatter: function (n) {
      return n.replace(/,/g, '.');
    }
  });

  // init Isotope
var $grid = $('.grid').isotope({
  // options
  itemSelector: '.grid-item',
  // percentPosition: true,
    masonry: {
      columnWidth: '.grid-item'
    }
});
var $gallery = $(".grid").isotope({
      
});
// filter items on button click
$('.filter-btn-group').on( 'click', 'button', function() {
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});
$('.filter-btn-group').on( 'click', 'button', function() {
$(this).addClass('active').siblings().removeClass('active');
});

//Banner Slider
var swiper = new Swiper('.banner-slider', {
  pagination: {
      el: '.banner-pagination',
      clickable: true,
      renderBullet: function (index, className) {
          return '<span class="' + className + '">' + (index + 1) + '</span>';
      },
  },
  autoplay: {
      delay: 3000,
      speed: 2000,
  },
  speed: 2000,
});

// slider
var swiper = new Swiper('.client-slider', {
  slidesPerView: 3,
  spaceBetween: 0,
  centeredSlides: true,
  loop: true,
  autoplay: {
    speeds: 1000,
    delay: 4000,
  },
  breakpoints: {
    991: {
      slidesPerView: 2,
    },
    767: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 1,
    },
  }
});

// slider
var swiper = new Swiper('.client-wrapper', {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.ruddra-next',
    prevEl: '.ruddra-prev',
  },
  autoplay: {
    speeds: 1000,
    delay: 3000,
  },
  speed:1000,
  breakpoints: {
    991: {
      slidesPerView: 1,
    },
    767: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 1,
    },
  }
});

// slider
var swiper = new Swiper('.blog-post-wrapper', {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: '.ruddra-next',
    prevEl: '.ruddra-prev',
  },
  autoplay: {
    speeds: 1000,
    delay: 3000,
  },
  speed: 1500,
  breakpoints: {
    991: {
      slidesPerView: 1,
    },
    767: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 1,
    },
  }
});

// slider
var swiper = new Swiper('.play-wrapper', {
  slidesPerView: 3,
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: '.ruddra-next',
    prevEl: '.ruddra-prev',
  },
  autoplay: {
    speeds: 1000,
    delay: 3000,
  },
  speed: 1000,
  breakpoints: {
    991: {
      slidesPerView: 2,
    },
    767: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 1,
    },
  }
});

var swiper = new Swiper('.brand-wrapper', {
  slidesPerView: 4,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    speeds: 1000,
    delay: 2000,
  },
  breakpoints: {
    991: {
      slidesPerView: 2,
    },
    767: {
      slidesPerView: 2,
    },
    575: {
      slidesPerView: 1,
    },
  }
});

$('.my-paroller').paroller();
  
$(window).on('load', function() {
  // filter functions
  var $grid = $(".grid");
  var filterFns = {};
  $grid.isotope({
    itemSelector: '.grid-item',
    masonry: {
      columnWidth: 0,
    }
  });
  // bind filter button click
  $('.filter-btn-group').on('click', 'button', function () {
    var filterValue = $(this).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[filterValue] || filterValue;
    $grid.isotope({
      filter: filterValue
    });
  });
  // change is-checked class on buttons
  $('.filter-btn-group').each(function (i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', 'button', function () {
      $buttonGroup.find('.active').removeClass('active');
      $(this).addClass('active');
    });
  });
});

$(window).on('load', function() {
  // filter functions
  var $grid = $(".offer-grid");
  var filterFns = {};
  $grid.isotope({
    itemSelector: '.offer-item',
    masonry: {
      columnWidth: 0,
    }
  });
  // bind filter button click
  $('.filter-btn-group').on('click', 'button', function () {
    var filterValue = $(this).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[filterValue] || filterValue;
    $grid.isotope({
      filter: filterValue
    });
  });
  // change is-checked class on buttons
  $('.filter-btn-group').each(function (i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', 'button', function () {
      $buttonGroup.find('.active').removeClass('active');
      $(this).addClass('active');
    });
  });
});

//privacy left side menu
$('.privacy-sidebar li a').on('click', function (e) {
  var element = $(this).parent('li');
  if (element.hasClass('open')) {
    element.removeClass('open');
    element.find('li').removeClass('open');
    element.find('ul').slideUp(300, "swing");
  } else {
    element.addClass('open');
    element.children('ul').slideDown(300, "swing");
    element.siblings('li').children('ul').slideUp(300, "swing");
    element.siblings('li').removeClass('open');
    element.siblings('li').find('li').removeClass('open');
    element.siblings('li').find('ul').slideUp(300, "swing");
  }
})

//The Password Show
$('#show-pass-one').on('click', function() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
});

$('#show-pass-two').on('click', function() {
  var x = document.getElementById("myInputTwo");
  if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
});

$('#show-pass-three').on('click', function() {
  var x = document.getElementById("myInputThree");
  if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
});

//Form Slider
$('.account-control-button').on('click', function() {
  $('.account-area').toggleClass('change-form');
})

// progress bar
$(".progressbar").each(function(){
  $(this).find(".bar").animate({
    "width": $(this).attr("data-perc")
  },8000);
  $(this).find(".label").animate({
    "left": $(this).attr("data-perc")
  },8000);
});

// faq Tab
var tabWrapper = $('.faq-tab-wrapper'),
tabMnu = tabWrapper.find('.tab-menu li'),
tabContent = tabWrapper.find('.tab-cont > .tab-item');
tabContent.not(':nth-child(1)').fadeOut(350);
tabMnu.each(function (i) {
$(this).attr('data-tab', 'tab' + i);
});
tabContent.each(function (i) {
$(this).attr('data-tab', 'tab' + i);
});
tabMnu.on('click', function () {
var tabData = $(this).data('tab');
tabWrapper.find(tabContent).fadeOut(350);
tabWrapper.find(tabContent).filter('[data-tab=' + tabData + ']').fadeIn(350);
});
$('.tab-menu > li').on('click', function () {
var before = $('.tab-menu li.active');
before.removeClass('active');
$(this).addClass('active');
});

//Isotope Masonary
function galleryMasonary(){
  $('.portfolio-wrapper').isotope({
    itemSelector: '.portfolio-item',
    masonry: {
      columnWidth: 0,
    }
  });
}

//Odometer
if($(".counter-item").length) {
  $(".counter-item").each(function () {
    $(this).isInViewport(function (status) {
      if (status === "entered") {
        for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
          var el = document.querySelectorAll('.odometer')[i];
          el.innerHTML = el.getAttribute("data-odometer-final");
        }
      }
    });
  });
}

function galleryMasonaryTwo(){
 // filter functions
 var $grid = $(".grid");
 var filterFns = {};
 $grid.isotope({
     itemSelector: '.grid-item',
     masonry: {
       columnWidth: 0,
     }
 });
 // bind filter button click
 $('ul.filter').on('click', 'li', function () {
   var filterValue = $(this).attr('data-filter');
   // use filterFn if matches value
   filterValue = filterFns[filterValue] || filterValue;
   $grid.isotope({
     filter: filterValue
   });
 });
 // change is-checked class on buttons
 $('ul.filter').each(function (i, buttonGroup) {
   var $buttonGroup = $(buttonGroup);
   $buttonGroup.on('click', 'li', function () {
     $buttonGroup.find('.active').removeClass('active');
     $(this).addClass('active');
   });
 });
}

$('.remove-cart').on('click', function (e) {
  e.preventDefault();
  $(this).parent().parent().hide(300);
});
$('#cart-button').on('click', function (e) {
  e.preventDefault();
  $('.cart-sidebar-area').addClass('active');
  $('.body-overlay').addClass('active');
});
$('#body-overlay').on('click', function (e) {
  e.preventDefault();
  $('.cart-sidebar-area').removeClass('active');
  $('.body-overlay').removeClass('active');
});
$('.side-sidebar-close-btn').on('click', function (e) {
e.preventDefault();
$('.cart-sidebar-area').removeClass('active');
$('.body-overlay').removeClass('active');
});

$(".search-bar a").on('click', function(){
  $('.header-top-search-area').toggleClass('active');
});

// ------ cursor js ---------- //
var $circleCursor = $('.cursor');

function moveCursor(e) {
    var t = e.clientX + "px",
        n = e.clientY + "px";

    TweenMax.to($circleCursor, .2, {
        left: t,
        top: n,
        ease: 'Power1.easeOut'
    });
}
$(window).on('mousemove', moveCursor);

// simple zoom
function zoomCursor(e) {
    TweenMax.to($circleCursor, .1, {
        scale: 3,
        ease: 'Power1.easeOut'
    });
    $($circleCursor).removeClass('cursor-close');
}
$('a, .zoom-cursor').on('mouseenter', zoomCursor);

// close
function closeCursor(e) {
    TweenMax.to($circleCursor, .1, {
        scale: 3,
        ease: 'Power1.easeOut'
    });
    $($circleCursor).addClass('cursor-close');
}
$('.trigger-close').on('mouseenter', closeCursor);

// default
function defaultCursor(e) {
    TweenLite.to($circleCursor, .1, {
        scale: 1,
        ease: 'Power1.easeOut'
    });
    $($circleCursor).removeClass('cursor-close');
}

$('a, .zoom-cursor, .trigger-close, .trigger-plus').on('mouseleave', defaultCursor);

})(jQuery);
   

// translation
//     function update_texts() { 
//         $('body').i18n() 
//     };

//     $.i18n().load( {
//             en: {
//                 'homepage': 'Home'	,
//                 'indextitle': 'Find your next game',
//                 'indexsubtitle': 'In only 10 questions, our algotirhm find you a list of games adapted to your research.',
//                 'deussearch_go': 'Do Deus Search',
//                 'index_bloc_1_title': 'Unic games',
//                 'index_bloc_1_p': 'Discover new licences out of the box',
//                 'index_bloc_2_title': 'A unequal experience',
//                 'index_bloc_2_p': 'Find the best game for you between 133 000 games',
//                 'index_bloc_3_title': 'For Gamers',
//                 'index_bloc_3_p': 'A powerfull tool',
//                 'index_bloc_4_title': 'By gamers',
//                 'index_bloc_4_p': 'We searched games for so long too..',
//                 'index_side_subtitle':'A new way to search',
//                 'index_side_title':'Discover games adapted for your personnality',
//                 'index_side_content':'',
//                 'copyright':'All rights reserved by ',
//                 'contact_title':'Contact Us',
//                 'contact_sub_title':'Need help ?',
//                 'contact_title_how_to':'How-To',
//                 'contact_explain':'We answer quickly to any request.',
//                 'contact_name_field':'Contact name',
//                 'contact_email_field':'E-mail',
//                 'contact_subject_field':'Subject',
//                 'contact_message_field':'Message',
//                 'contact_send_button':'Send',
//                 'deus_form_agree': 'Totally Agree',
//                 'deus_form_agree_2':'Agree',
//                 'deus_form_neutral':'Neutral',
//                 'deus_form_disagree_2':'Disagree',
//                 'deus_form_disagree':'Totally disagree',
//                 'deus_form_notice_preform':'',                
//                 'deus_form_notice_postform':' ',
//                 'deus_form_que1':'',
//                 'deus_form_que2':'',
//                 'deus_form_que3':'',
//                 'deus_form_que4':'',
//                 'deus_form_que5':'',
//                 'deus_form_que6':'',
//                 'deus_form_que7':'',
//                 'deus_form_que8':'',

//             },
//             fr: {
//                 'homepage': 'accueil'	,
//                 'indextitle': 'Trouves le jeu qui te correspond',
//                 'indexsubtitle': 'En seulement 10 questions, notre algorithme vous propose une liste de jeux adaptée à vos envies parmis les 130 000 disponibles.',
//                 'deussearch_go': 'Recherche Deus Search',
//                 'index_bloc_1_title': 'Des jeux uniques',
//                 'index_bloc_1_p': 'Découvrez de nouvelles licences qui sortent du lot. ',
//                 'index_bloc_2_title': 'Une expérience sans égal',
//                 'index_bloc_2_p': 'Faîtes vous plaisir sur le jeu qui vous correspond parmis les 130 000 disponibles. ',
//                 'index_bloc_3_title': 'Pour les gamers',
//                 'index_bloc_3_p': 'Un outil poussé fournissant une nouvelle approche de la consommation vidéoludique. ',
//                 'index_bloc_4_title': 'Par des gamers',
//                 'index_bloc_4_p': 'Parceque nous aussi nous avons passé trop de temps à chercher un bon jeu. ',
//                 'index_side_subtitle':'Une recherche unique',
//                 'index_side_title':'Découvrez des jeux adaptés à votre personnalité',
//                 'index_side_content':'',
//                 'copyright':'Tous droits reservés ',
//                 'contact_title':'Nous contacter',
//                 'contact_sub_title':'Besoin d\'aide ?',
//                 'contact_title_how_to':'Contactez-nous',
//                 'contact_explain':'Nous répondons rapidement et serons ravis de traiter vos demandes, ce formulaire est la pour toi !',
//                 'contact_name_field':'Nom de contact',
//                 'contact_email_field':'E-mail',
//                 'contact_subject_field':'Sujet',
//                 'contact_message_field':'Message',
//                 'contact_send_button':'Envoyer',
//                 'deus_form_agree': 'Totalement d\'accord',
//                 'deus_form_agree_2':'Plutot d\'accord',
//                 'deus_form_neutral':'Neutre',
//                 'deus_form_disagree_2':'Plutot pas d\'accord',
//                 'deus_form_disagree':'Totalement d\'accord',
//                 'deus_form_notice_preform':' Ce questionnaire de 12 questions permettra de définir votre personnalité et vous proposera une liste allant jusqu\'a 18 jeux vous proposant une expérience de jeu adaptée.',
//                 'deus_form_notice_postform':' Cette "étude de la personnalité" se base sur le format du Big Five <br />et reprend le format 10 items, réduis à 8, suivant le modèle établi par Jason VandenBerghe.',
//                 'deus_form_que1':'Tu es quelqu\'un d\'introverti, de reservé',
//                 'deus_form_que2':'Tu es du genre à te prélasser',
//                 'deus_form_que3':'Tu portes beaucoup d\'interêt au rapport à l\'autre',
//                 'deus_form_que4':'L\'art et la créativité t\'importe peu',
//                 'deus_form_que5':'Tu portes facilement un jugement sur les autres',
//                 'deus_form_que6':'Tu apprécies les tâches pénibles, éprouvantes, ..',
//                 'deus_form_que7':'Tu débordes d\'imagination',
//                 'deus_form_que8':'Tu crois en la bonne foi des gens',
//            }
//         } 
//     );

//     if($(this).text().substring(0, 2).toLowerCase() == 'en') {
//       $.i18n().locale = $(this).text().substring(0, 2).toLowerCase();
//     }
//     else if($(this).text().substring(0, 2).toLowerCase() == 'fr') {
//       $.i18n().locale = $(this).text().substring(0, 2).toLowerCase();
//     }
//     update_texts();

//     $("body").on('DOMSubtreeModified', ".language-select .current", function() {
//         $.i18n().locale = $(this).text().substring(0, 2).toLowerCase();
//         document.cookie = "language_deussearch="+$(this).text().substring(0, 2).toLowerCase();
//         update_texts();
//     });
// });
