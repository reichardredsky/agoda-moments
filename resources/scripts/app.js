import domReady from '@roots/sage/client/dom-ready';
import AgodaSwiper from './moment-swiper.js';
import SideBar from './sidebar.js';
import './bootstrap-loader.js';
import Dropdown from './dropdown.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...

  SideBar();

  new Dropdown('#dropdown-collapse');
  new Dropdown('#dropdown-collapse-mobile');
  
  AgodaSwiper('.agoda-swiper', {
    id: '',
    direction: 'horizontal',
    slidesPerView: 3,
    wrapperClass: '.agoda-swiper-wrapper',
    breakpoints: {
        1024: {
            slidesPerView: 2,
        },
        640: {
            slidesPerView: 1,
        }
    }
  });

  AgodaSwiper('.banner-swiper', {
    id: '',
    direction: 'horizontal',
    slidesPerView: 3,
    wrapperClass: '.banner-swiper-wrapper',
    breakpoints: {
        1024: {
            slidesPerView: 2,
        },
        640: {
            slidesPerView: 1,
        }
    }
  });

  AgodaSwiper('.may-also-like', {
    id: '',
    direction: 'horizontal',
    slidesPerView: 5,
    wrapperClass: '.may-also-like-wrapper',
    breakpoints: {
        1024: {
            slidesPerView: 2,
        },
        740: {
            slidesPerView: 2
        },
        640: {
            slidesPerView: 1,
        }
    }
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
