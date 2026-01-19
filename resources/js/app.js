import './bootstrap';

// Import Swiper and modules
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {

    // ============================================
    // NAVBAR - Transparent to Sticky Animation
    // ============================================
    const navbar = document.getElementById('navbar');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIconOpen = document.querySelector('.menu-icon-open');
    const menuIconClose = document.querySelector('.menu-icon-close');

    if (navbar) {
        // Initial check for scroll position
        const updateNavbar = () => {
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        };

        // Run on scroll
        window.addEventListener('scroll', updateNavbar, { passive: true });

        // Run on page load
        updateNavbar();
    }

    // Mobile Menu Toggle
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            if (menuIconOpen && menuIconClose) {
                menuIconOpen.classList.toggle('hidden');
                menuIconClose.classList.toggle('hidden');
            }
        });

        // Close mobile menu when clicking on a link
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                if (menuIconOpen && menuIconClose) {
                    menuIconOpen.classList.remove('hidden');
                    menuIconClose.classList.add('hidden');
                }
            });
        });
    }

    // ============================================
    // SWIPER CAROUSELS
    // ============================================

    // Featured Products Swiper
    const featuredSwiper = document.querySelector('.featured-swiper');
    if (featuredSwiper) {
        new Swiper('.featured-swiper', {
            modules: [Navigation, Pagination],
            slidesPerView: 1,
            spaceBetween: 32,
            loop: true,
            navigation: {
                nextEl: '.featured-next',
                prevEl: '.featured-prev',
            },
            pagination: {
                el: '.featured-swiper .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 24 },
                1024: { slidesPerView: 3, spaceBetween: 32 },
            },
        });
    }

    // Brands Swiper
    const brandsSwiper = document.querySelector('.brands-swiper');
    if (brandsSwiper) {
        new Swiper('.brands-swiper', {
            modules: [Autoplay],
            slidesPerView: 2,
            spaceBetween: 24,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                480: { slidesPerView: 3 },
                640: { slidesPerView: 4 },
                768: { slidesPerView: 5 },
                1024: { slidesPerView: 6 },
            },
        });
    }

    // ============================================
    // SMOOTH SCROLL
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;

            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                const navbarHeight = navbar ? navbar.offsetHeight : 0;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ============================================
    // SCROLL ANIMATIONS - Intersection Observer
    // ============================================
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const animateOnScroll = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                animateOnScroll.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements with data-animate attribute
    document.querySelectorAll('[data-animate]').forEach(el => {
        el.style.opacity = '0';
        animateOnScroll.observe(el);
    });

    // ============================================
    // COUNTER ANIMATION
    // ============================================
    const animateCounter = (element, target, duration = 2000) => {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target + '+';
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start) + '+';
            }
        }, 16);
    };

    // Observe counter elements
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.dataset.count);
                if (target) {
                    animateCounter(entry.target, target);
                    counterObserver.unobserve(entry.target);
                }
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-count]').forEach(el => {
        counterObserver.observe(el);
    });

});

// ============================================
// ALPINE.JS COMPONENTS
// ============================================

// Category Filter Component
window.categoryFilter = function() {
    return {
        active: 'all',
        setCategory(category) {
            this.active = category;
            this.filterProducts();
        },
        filterProducts() {
            const products = document.querySelectorAll('[data-category]');
            products.forEach(product => {
                if (this.active === 'all' || product.dataset.category === this.active) {
                    product.style.display = '';
                    product.classList.remove('opacity-0', 'scale-95');
                    product.classList.add('opacity-100', 'scale-100');
                } else {
                    product.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => {
                        if (this.active !== 'all' && product.dataset.category !== this.active) {
                            product.style.display = 'none';
                        }
                    }, 300);
                }
            });
        }
    };
};

// Form Validation Helper
window.formHelper = function() {
    return {
        loading: false,
        success: false,
        async submitForm(event) {
            this.loading = true;
            // Form will be handled by Laravel
        }
    };
};
