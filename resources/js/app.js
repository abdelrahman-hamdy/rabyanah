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
    // PREMIUM SCROLL ANIMATIONS
    // Advanced Intersection Observer System
    // ============================================

    // Configuration for different animation types
    const animationConfig = {
        default: { threshold: 0.15, rootMargin: '0px 0px -50px 0px' },
        eager: { threshold: 0.05, rootMargin: '0px 0px -20px 0px' },
        lazy: { threshold: 0.3, rootMargin: '0px 0px -100px 0px' },
    };

    // Create observers for different configurations
    const createObserver = (config, callback) => {
        return new IntersectionObserver(callback, {
            root: null,
            rootMargin: config.rootMargin,
            threshold: config.threshold
        });
    };

    // Main animation observer
    const animateOnScroll = createObserver(animationConfig.default, (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Get delay from data attribute
                const delay = entry.target.dataset.delay || 0;

                setTimeout(() => {
                    entry.target.classList.add('animated');
                }, parseInt(delay));

                animateOnScroll.unobserve(entry.target);
            }
        });
    });

    // Observer for staggered children animations
    const childrenObserver = createObserver(animationConfig.default, (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                childrenObserver.unobserve(entry.target);
            }
        });
    });

    // Observer for grid animations
    const gridObserver = createObserver(animationConfig.eager, (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                gridObserver.unobserve(entry.target);
            }
        });
    });

    // Initialize all animations
    const initScrollAnimations = () => {
        // Single element animations
        document.querySelectorAll('[data-animate]').forEach(el => {
            animateOnScroll.observe(el);
        });

        // Staggered children animations
        document.querySelectorAll('[data-animate-children]').forEach(el => {
            childrenObserver.observe(el);
        });

        // Grid animations
        document.querySelectorAll('[data-animate-grid]').forEach(el => {
            gridObserver.observe(el);
        });
    };

    initScrollAnimations();

    // ============================================
    // PARALLAX EFFECT FOR BACKGROUNDS
    // ============================================
    const parallaxElements = document.querySelectorAll('.parallax-bg');

    if (parallaxElements.length > 0) {
        let ticking = false;

        const updateParallax = () => {
            const scrollY = window.pageYOffset;

            parallaxElements.forEach(el => {
                const speed = el.dataset.speed || 0.3;
                const rect = el.getBoundingClientRect();
                const elementTop = rect.top + scrollY;
                const elementCenter = elementTop + rect.height / 2;
                const viewportCenter = scrollY + window.innerHeight / 2;
                const distance = viewportCenter - elementCenter;
                const movement = distance * speed * 0.1;

                el.style.transform = `translateY(${movement}px)`;
            });

            ticking = false;
        };

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }, { passive: true });
    }

    // ============================================
    // COUNTER ANIMATION (Enhanced)
    // ============================================
    const animateCounter = (element, target, duration = 2000) => {
        const startTime = performance.now();
        const startValue = 0;

        const easeOutQuart = (t) => 1 - Math.pow(1 - t, 4);

        const updateCounter = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = easeOutQuart(progress);
            const currentValue = Math.floor(startValue + (target - startValue) * easedProgress);

            element.textContent = currentValue + '+';

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        };

        requestAnimationFrame(updateCounter);
    };

    // Observe counter elements
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.dataset.count);
                if (target) {
                    entry.target.classList.add('animated');
                    animateCounter(entry.target, target);
                    counterObserver.unobserve(entry.target);
                }
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-count]').forEach(el => {
        counterObserver.observe(el);
    });

    // ============================================
    // MAGNETIC HOVER EFFECT (for buttons)
    // ============================================
    const magneticElements = document.querySelectorAll('[data-magnetic]');

    magneticElements.forEach(el => {
        el.addEventListener('mousemove', (e) => {
            const rect = el.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            const strength = el.dataset.magnetic || 0.3;

            el.style.transform = `translate(${x * strength}px, ${y * strength}px)`;
        });

        el.addEventListener('mouseleave', () => {
            el.style.transform = 'translate(0, 0)';
            el.style.transition = 'transform 0.3s ease-out';
        });

        el.addEventListener('mouseenter', () => {
            el.style.transition = 'none';
        });
    });

    // ============================================
    // TEXT SPLIT ANIMATION HELPER
    // ============================================
    const splitTextElements = document.querySelectorAll('[data-split-text]');

    splitTextElements.forEach(el => {
        const text = el.textContent;
        const words = text.split(' ');
        el.innerHTML = '';

        words.forEach((word, index) => {
            const span = document.createElement('span');
            span.textContent = word + ' ';
            span.style.transitionDelay = `${index * 0.05}s`;
            el.appendChild(span);
        });
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
