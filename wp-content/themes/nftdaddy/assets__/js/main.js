if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
}

function scrollToTop() {
    if (pageYOffset > 0) {
        window.scrollTo(0, pageYOffset - pageYOffset / 8);
        requestAnimationFrame(scrollToTop);
    }
}

AOS.init({
    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
    initClassName: 'aos-init', // class applied after initialization
    animatedClassName: 'aos-animate', // class applied on animation
    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
    throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
    
    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    offset: 120, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 1000, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: true, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
});

window.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', e => {
        if (e.target.closest('.tab-link')) {
            const tabLink = e.target.closest('.tab-link');
            const tabLinkSilblings = tabLink.parentElement.children;
            const tabContent = document.querySelector(tabLink.getAttribute('data-tab'));
            const tabContentSilblings = tabContent.parentElement.children;
            for (let i = 0; i < tabLinkSilblings.length; i++) {
                tabLinkSilblings[i].classList.contains('active') && tabLinkSilblings[i].classList.remove('active');
            }
            tabLink.classList.add('active');
            for (let i = 0; i < tabContentSilblings.length; i++) {
                tabContentSilblings[i].classList.contains('active') && tabContentSilblings[i].classList.remove('active');
            }
            tabContent.classList.add('active');

            if (tabContent.querySelector('.swiper-container')) {
                window.dispatchEvent(new Event('resize'));
            }
        }
    });
    document.querySelectorAll('.tab-link.active').forEach(el => el.click());

    document.querySelectorAll('.main-menu-nav .dropdown').forEach(el => {
        const dropdown = el;
        const arrows = document.createElement("i");
        arrows.classList.add('fa', 'fa-angle-down');
        dropdown.querySelector('a').appendChild(arrows);
        arrows.addEventListener('click', e => {
            e.preventDefault();
            dropdown.classList.toggle('show-sub-menu');
        });
    });

    if (document.getElementById('main-menu-btn') && document.getElementById('main-menu')) {
        const mainMenuBtn = document.getElementById('main-menu-btn');
        const mainMenu = document.getElementById('main-menu');
        const mainMenuOverlay = document.getElementById('main-menu-overlay');
        mainMenuBtn.addEventListener('click', e => {
            mainMenuBtn.classList.toggle('active');
            mainMenu.classList.toggle('active');
        });
        if (mainMenuOverlay) {
            mainMenuOverlay.addEventListener('click', e => {
                mainMenuBtn.classList.remove('active');
                mainMenu.classList.remove('active');
            });
        }
    }

    if (document.getElementById('scroll-top')) {
        const scrollTopBtn = document.getElementById('scroll-top');

        function showScrollTop() {
            pageYOffset >= 100 ? scrollTopBtn.classList.add('show') : scrollTopBtn.classList.remove('show');
        }
        showScrollTop();
        window.addEventListener('scroll', showScrollTop);
        scrollTopBtn.addEventListener('click', scrollToTop);
    }

    // MONA CONTENT
    document.querySelectorAll('.mona-content iframe[src^="https://www.youtube.com/"]').forEach(el => {
        const wrap = document.createElement("div");
        wrap.classList.add('mona-youtube-wrap');
        el.insertAdjacentElement("afterend", wrap);
        wrap.appendChild(el);
    });

    document.querySelectorAll('.mona-content table').forEach(el => {
        const wrap = document.createElement("div");
        wrap.classList.add('mona-table-wrap');
        el.insertAdjacentElement("afterend", wrap);
        wrap.appendChild(el);
    });

    document.querySelectorAll('.swiper-init.is-slider').forEach(el => {
        const slider = el.querySelector('.swiper-container');
        const pagination = el.querySelector('.swiper-pagination');
        const prevBtn = el.querySelector('.swiper-button-prev');
        const nextBtn = el.querySelector('.swiper-button-next');
        new Swiper(slider, {
            speed: 1200,
            autoHeight: false,
            slidesPerView: 'auto',
            autoplay: {
                speed: 8000,
            },
            autoplay: false,
            pagination: {
                el: pagination,
                clickable: true,
            },
            noSwipingSelector: '.twentytwenty-wrapper',
            navigation: {
                nextEl: nextBtn,
                prevEl: prevBtn,
            },
            loop: true,
        })
    });

    new Swiper('.home-banner-slider.is-slider .swiper-container', {
        speed: 1200,
        autoHeight: false,
        slidesPerView: 'auto',
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        autoplay: {
            speed: 6000,
        },
        pagination: {
            el: '.home-banner-slider .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.home-banner-slider .swiper-button-next',
            prevEl: '.home-banner-slider .swiper-button-prev',
        },
        loop: true,
        on: {
            slideChangeTransitionEnd() {
                this.el.querySelector('.start-anim') && this.el.querySelector('.start-anim').classList.remove('start-anim');
                this.el.querySelector('.swiper-slide-active').classList.add('start-anim');
            }
        }
    });

    if (document.getElementById('particle-ground')) {
        particlesJS('particle-ground', {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.2,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 5,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.2,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true,
            "config_demo": {
                "hide_card": false,
                "background_color": "#b61924",
                "background_image": "",
                "background_position": "50% 50%",
                "background_repeat": "no-repeat",
                "background_size": "cover"
            }
        });
    }

    if (document.querySelector('.js-date-picker')) {
        flatpickr('.js-date-picker', {
            enableTime: true,
            disableMobile: "true",
            minDate: "today",
            onChange: function() {}
        });
    }

    if (document.getElementById('video') && document.getElementById('video-btn')) {
        const video = document.getElementById('video');
        const videoBtn = document.getElementById('video-btn');
        videoBtn.addEventListener('click', e => {
            e.preventDefault();
            if (video.paused) {
                videoBtn.innerHTML = `<i class="fa fa-pause" aria-hidden="true"></i><strong class="text">TẠM DỪNG VIDEO</strong>`;
                video.play();
            } else {
                videoBtn.innerHTML = `<i class="fa fa-play" aria-hidden="true"></i><strong class="text">PHÁT VIDEO</strong>`;
                video.pause();
            }
        })
    }

    if(document.querySelector('.fixed-bar') && document.querySelector('.fixed-bar-btn')){
        const nav = document.querySelector('.fixed-bar');
        const btn = document.querySelector('.fixed-bar-btn');
        btn.addEventListener('click', e => {
            nav.classList.toggle('active')
        })
    }
});

window.addEventListener('load', () => {
    if (document.getElementById('header')) {
        const header = document.getElementById('header');
        const headerHeight = header.offsetHeight;
        const headerOffset = header.offsetTop;

        function checkHeaderFixed() {
            if (pageYOffset > headerOffset) {
                header.classList.add('fixed');
                header.nextElementSibling.style.marginTop = headerHeight + 'px';
            } else {
                header.classList.remove('fixed');
                header.nextElementSibling.style.marginTop = null;
            }
        }
        checkHeaderFixed();
        window.addEventListener('scroll', checkHeaderFixed);
    }
});

jQuery(document).ready(function($) {

    $('.open-popup-btn').magnificPopup({
        removalDelay: 500,
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = "mfp-zoom-in";
            },
        },
        fixedContentPos: true,
        midClick: true
    });

    $('.open-video-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-zoom-in',
        removalDelay: 500,
        preloader: false,
        fixedContentPos: true,
    });

    $('.hd-popup-form').click(function(){

        $.magnificPopup.open({
            items: {
                src: '#step-1'
            },
            removalDelay: 500,
            fixedContentPos: true,
            callbacks: {
                beforeOpen: function() {
                    this.st.mainClass = "mfp-zoom-in";
                },
            },
            midClick: true
        });
        
        function timeOut(){
            setTimeout(() => {
                if($('.mfp-bg').length){
                    timeOut()
                }
                else{
                    $.magnificPopup.open({
                        items: {
                            src: '#step-1'
                        },
                        removalDelay: 500,
                        fixedContentPos: true,
                        callbacks: {
                            beforeOpen: function() {
                                this.st.mainClass = "mfp-zoom-in";
                            },
                        },
                        midClick: true
                    });
                }
            }, 3000);
        }
       // timeOut();
    });

    if ($('.system-faqs-item.active').length) {
        $('.system-faqs-item.active').find('.system-faqs-desc').show();
    }
    $('.system-faqs-item').on('click', '.system-faqs-title', function() {
        $(this).closest('.system-faqs-item').toggleClass('active');
        $(this).next('.system-faqs-desc').stop().slideToggle();
    });

    $(window).load(function(){
        $(".twentytwenty-container").addClass('ready');
        $(".twentytwenty-container").twentytwenty();
        $(window).trigger('resize');
    })
});
