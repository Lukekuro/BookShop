import vars from './_vars';

// Helper functions:
import {throttle} from './functions/throttle';

// Plugins (NPM modules and uploaded files):
import Swiper, {Navigation, Pagination, Autoplay, Thumbs} from 'swiper/bundle'; // import Swiper bundle with all modules installed
// available Swiper.js modules = [Virtual, Keyboard, Mousewheel, Navigation, Pagination, Scrollbar, Parallax, Zoom, Lazy, Controller, A11y, History, HashNavigation, Autoplay, Thumbs, FreeMode, Grid, Manipulation, EffectFade, EffectCube, EffectFlip, EffectCoverflow, EffectCreative, EffectCards]

jQuery(document).ready(function ($) {
	"use strict";

	/**
	 * Tweak for mobiles (full height)
	 */
	const fixFullheight = () => {
		const vh = window.innerHeight * 0.01;
		vars.htmlEl.style.setProperty('--vh', `${vh}px`);
	};

	fixFullheight();
	const fixHeight = throttle(fixFullheight);
	window.addEventListener('resize', fixHeight);


	/**
	 * Force load of all lazy-loading images
	 */
	setTimeout(function () {
		$('.lazyload.loading').removeClass('loading').addClass('loaded');
	}, 3000);


	/**
	 * Slider Book
	 */
	document.querySelectorAll('.swiper-book').forEach(slider => {
		const swiper = new Swiper(slider, {
			slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 20,
			breakpoints: {
				640: {
					slidesPerView: 2,
				},
				1025: {
					slidesPerView: 3,
				},
			},
			autoplay: {
				delay: 3000,
				disableOnInteraction: false,
				pauseOnMouseEnter: true,
			},
			pagination: {
				el: slider.querySelector('.swiper-pagination'),
				clickable: true,
			},
			on: {
				// lazy load images
				slideChange: function () {
					try {
						lazyLoadInstance.update();
					} catch (e) {
					}
				}
			}
		});
	});

	// JS Lazyload fix for images on the first screen.
	// This code should run after all the code is initiated.
	$(window).trigger('scroll');

});
