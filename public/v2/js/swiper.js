import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

//======================================================================
// COURSES CAROUSEL
//======================================================================

const coursescarousel = new Swiper('.courses-carousel', {
  slidesPerView: 1,
  spaceBetween: 20,
  preventClicks: true,
//   speed: 800,
//   autoplay: {
//     delay: 3000,
//   },
  navigation: {
    nextEl: '.courses-carousel__next-btn',
  },
  breakpoints: {
    1200: {
      slidesPerView: 3,
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 2,
    },
  }
});

//======================================================================
// COACHES CAROUSEL
//======================================================================

const coachescarousel = new Swiper('.coaches-carousel', {
  slidesPerView: 1,
  spaceBetween: 20,
  preventClicks: true,
//   speed: 800,
//   autoplay: {
//     delay: 3000,
//   },
  navigation: {
    nextEl: '.coaches-carousel__next-btn',
  },
  breakpoints: {
    1200: {
      slidesPerView: 3,
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 2,
    },
  }
});

//======================================================================
// EVENTS CAROUSEL
//======================================================================

const eventscarousel = new Swiper('.events-carousel', {
  slidesPerView: 1,
  preventClicks: true,
  grabCursor: true,
  navigation: {
    nextEl: '.events-carousel__next-btn',
  },
  breakpoints: {
    1200: {
      slidesPerView: 1,
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 1,
    },
  }
});

//======================================================================
// BLOG CAROUSEL
//======================================================================

const blogcarousel = new Swiper('.blog-carousel', {
  slidesPerView: 1,
  spaceBetween: 20,
  preventClicks: true,
  grabCursor: true,
  navigation: {
    nextEl: '.blog-carousel__next-btn',
  },
  breakpoints: {
    1200: {
      slidesPerView: 3,
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 2,
    },
  }
});

//======================================================================
// TESTIMONIAL CAROUSEL
//======================================================================

const testimonialcarousel = new Swiper('.testimonial-carousel', {
  slidesPerView: 1,
  spaceBetween: 20,
  preventClicks: true,
  grabCursor: true,
  loop: true,
  speed: 800,
  autoplay: {
    delay: 3000,
  },
  breakpoints: {
    1200: {
      slidesPerView: 5,
    },
    992: {
      slidesPerView: 3,
    },
    576: {
      slidesPerView: 2,
    }
  }
});

//======================================================================
// COACHES VIDEOS CAROUSEL
//======================================================================

const coachesvideoscarousel = new Swiper('.coachesvideos-carousel', {
  slidesPerView: 1,
  spaceBetween: 20,
  speed: 800,
  autoplay: {
    delay: 3000,
  },
  preventClicks: true,
  grabCursor: true,
  loop: true,
  breakpoints: {
    1200: {
      slidesPerView: 4,
    },
    992: {
      slidesPerView: 3,
    },
    576: {
      slidesPerView: 2,
    }
  }
});

//======================================================================
// SPECIALS OFFERS CAROUSEL
//======================================================================

const specialsofferscarousel = new Swiper('.special-offres__carousel', {
  slidesPerView: 1,
  spaceBetween: 20,
  // speed: 800,
  // autoplay: {
  //   delay: 3000,
  // },
  navigation: {
    nextEl: '.special-offres__next-btn',
  },
  pagination: {
    el: '.special-offres__pagination',
    clickable: true,
  },
  preventClicks: true,
  grabCursor: true,
  loop: true,

});

//======================================================================
// STUDENTS TESTIMONIALS CAROUSEL
//======================================================================

const studentstestimonialscarousel = new Swiper('.studentstestimonials-carousel', {
  slidesPerView: 1,
  spaceBetween: 20,
  speed: 800,
  autoplay: {
    delay: 3000,
  },
  navigation: {
    nextEl: '.studentstestimonials__next-btn',
  },
  preventClicks: true,
  grabCursor: true,
  loop: true,
  breakpoints: {
    768: {
      slidesPerView: 2,
    }
  }
});

//======================================================================
// DATE PICKER CAROUSEL
//======================================================================

const datePickerCarousel = new Swiper('.faraCoachTimePicker', {
  slidesPerView: 3,
  spaceBetween: 5,
  freeMode: true,
  navigation: {
    nextEl: '.faraCoachTimePicker__next-btn',
  },
  breakpoints: {
    768: {
      slidesPerView: 5,
    }
  }
});