// Preloader
window.addEventListener('load', () => {
    const preloader = document.getElementById('preloader');
    if (preloader) {
        preloader.style.transition = 'opacity 0.6s ease-out';
        preloader.style.opacity = '0';
        setTimeout(() => preloader.style.display = 'none', 600);
    }
});

// Navbar Scroll Effect
window.addEventListener('scroll', () => {
    const nav = document.getElementById('navbar');
    if (window.scrollY > 50) nav.classList.add('scrolled');
    else nav.classList.remove('scrolled');

    const btt = document.getElementById('back-to-top');
    if (btt) {
        if (window.scrollY > 300) {
            btt.style.opacity = '1';
            btt.style.visibility = 'visible';
        } else {
            btt.style.opacity = '0';
            btt.style.visibility = 'hidden';
        }
    }
});

// FAQ Toggle
document.querySelectorAll('.faq-head').forEach(item => {
    item.addEventListener('click', () => {
        const parent = item.parentElement;
        parent.classList.toggle('active');
        const icon = item.querySelector('i');
        if (icon) {
            icon.classList.toggle('fa-plus');
            icon.classList.toggle('fa-minus');
        }
    });
});

// Intersection Observer for Reveal
const observerOptions = { threshold: 0.1 };
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, observerOptions);

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// Staggered reveals for grids
document.querySelectorAll('.grid-cards, .grid-2').forEach(grid => {
    const items = grid.querySelectorAll('.reveal');
    items.forEach((item, index) => {
        item.style.transitionDelay = `${index * 0.15}s`;
    });
});

// Stats Counter
const statsSection = document.getElementById('stats');
if (statsSection) {
    const stats = document.querySelectorAll('.stat-item h3');
    let started = false;

    const startCount = () => {
        stats.forEach(num => {
            const targetAttr = num.getAttribute('data-target');
            const targetValue = parseInt(targetAttr);
            if (isNaN(targetValue)) return;

            let count = 0;
            const speed = targetValue / 100;
            const update = () => {
                if (count < targetValue) {
                    count += speed;
                    num.innerText = Math.ceil(count) + (targetAttr.includes('+') ? '+' : (targetAttr.includes('%') ? '%' : ''));
                    setTimeout(update, 20);
                } else {
                    num.innerText = targetAttr;
                }
            }
            update();
        });
    }

    window.addEventListener('scroll', () => {
        const pos = statsSection.getBoundingClientRect().top;
        if (pos < window.innerHeight && !started) {
            startCount();
            started = true;
        }
    });
}

// Mobile Menu
const mobileToggle = document.getElementById('mobile-toggle');
const mobileOverlay = document.getElementById('mobile-menu-overlay');
const mobileClose = document.getElementById('mobile-close');

if (mobileToggle && mobileOverlay) {
    mobileToggle.addEventListener('click', () => mobileOverlay.classList.add('active'));
    mobileClose.addEventListener('click', () => mobileOverlay.classList.remove('active'));

    // Close on link click
    mobileOverlay.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => mobileOverlay.classList.remove('active'));
    });
}

// Before/After Slider
document.querySelectorAll('.ba-container').forEach(container => {
    const slider = container.querySelector('.ba-slider');
    const overlay = container.querySelector('.ba-overlay');
    const beforeImg = overlay.querySelector('img');

    slider.addEventListener('input', (e) => {
        const value = e.target.value;
        overlay.style.width = `${value}%`;
        // Keep before image fixed relative to container
        beforeImg.style.width = `${container.offsetWidth}px`;
    });

    // Handle resize
    window.addEventListener('resize', () => {
        beforeImg.style.width = `${container.offsetWidth}px`;
    });
    // Initial sync
    beforeImg.style.width = `${container.offsetWidth}px`;
});

// Portfolio Filtering
const filterBtns = document.querySelectorAll('.filter-btn');
const portfolioItems = document.querySelectorAll('.portfolio-item');

if (filterBtns.length > 0) {
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.getAttribute('data-filter');

            // UI Update
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Filtering logic
            portfolioItems.forEach(item => {
                const category = item.getAttribute('data-category');
                if (filter === 'all' || filter === category) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(20px)';
                    setTimeout(() => item.style.display = 'none', 400);
                }
            });
        });
    });
}

// Testimonial Slider
const testiSlider = document.querySelector('.testi-slider');
if (testiSlider) {
    const slides = testiSlider.querySelectorAll('.testi-slide');
    let currentSlide = 0;

    const showSlide = (n) => {
        slides.forEach(s => s.style.transform = `translateX(-${n * 100}%)`);
    };

    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }, 5000);
}

// Exit Intent
const exitModal = document.getElementById('exit-modal');
const exitClose = document.getElementById('exit-close');
if (exitModal) {
    let shown = false;
    document.addEventListener('mouseleave', (e) => {
        if (e.clientY < 0 && !shown) {
            exitModal.style.display = 'flex';
            shown = true;
        }
    });
    exitClose.addEventListener('click', () => exitModal.style.display = 'none');
}

// Search Overlay
const searchToggle = document.getElementById('search-toggle');
const searchOverlay = document.getElementById('search-overlay');
const searchClose = document.getElementById('search-close');
const searchInput = document.getElementById('search-input');

if (searchToggle && searchOverlay) {
    searchToggle.addEventListener('click', () => {
        searchOverlay.style.display = 'flex';
        setTimeout(() => searchInput.focus(), 100);
    });
    searchClose.addEventListener('click', () => searchOverlay.style.display = 'none');

    // ESC to close
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') searchOverlay.style.display = 'none';
    });
}

// Theme Switch
const themeSwitch = document.getElementById('theme-switch');
if (themeSwitch) {
    const icon = themeSwitch.querySelector('i');
    themeSwitch.addEventListener('click', () => {
        document.body.classList.toggle('light-mode');
        if (document.body.classList.contains('light-mode')) {
            icon.classList.replace('fa-moon', 'fa-sun');
            localStorage.setItem('titan-theme', 'light');
        } else {
            icon.classList.replace('fa-sun', 'fa-moon');
            localStorage.setItem('titan-theme', 'dark');
        }
    });

    // Load preference
    if (localStorage.getItem('titan-theme') === 'light') {
        document.body.classList.add('light-mode');
        icon.classList.replace('fa-moon', 'fa-sun');
    }
}

// Reading Progress
const readingBar = document.getElementById('reading-progress');
if (readingBar) {
    window.addEventListener('scroll', () => {
        const pixels = window.pageYOffset;
        const pageHeight = document.body.scrollHeight;
        const viewHeight = window.innerHeight;
        const percentage = (pixels / (pageHeight - viewHeight)) * 100;
        readingBar.style.width = `${percentage}%`;
    });
}

// ScrollSpy / Active Nav
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-links a');

window.addEventListener('scroll', () => {
    let current = "";
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (window.pageYOffset >= (sectionTop - sectionHeight / 3)) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href').includes(current)) {
            link.classList.add('active');
        }
    });
});
