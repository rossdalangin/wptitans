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

// Custom Cursor
const cursor = document.getElementById('custom-cursor');
const cursorText = document.getElementById('cursor-text');
if (cursor) {
    document.addEventListener('mousemove', (e) => {
        cursor.style.display = 'flex';
        cursor.style.left = `${e.clientX}px`;
        cursor.style.top = `${e.clientY}px`;
    });

    document.querySelectorAll('a, button, #theme-switch, #search-toggle').forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.style.width = '80px';
            cursor.style.height = '80px';
            cursor.style.background = 'var(--primary)';

            if (el.classList.contains('portfolio-item') || el.closest('.portfolio-item') || el.closest('.card')) {
                cursorText.innerText = 'VIEW';
                cursorText.style.opacity = '1';
            }
        });
        el.addEventListener('mouseleave', () => {
            cursor.style.width = '30px';
            cursor.style.height = '30px';
            cursor.style.background = 'transparent';
            cursorText.style.opacity = '0';
        });
    });
}

// Mouse Glow
const mouseGlow = document.getElementById('mouse-glow');
if (mouseGlow) {
    document.addEventListener('mousemove', (e) => {
        mouseGlow.style.opacity = '1';
        mouseGlow.style.left = `${e.clientX}px`;
        mouseGlow.style.top = `${e.clientY}px`;
    });
}

// Magnetic Buttons
document.querySelectorAll('.btn-primary, .btn-outline').forEach(btn => {
    btn.addEventListener('mousemove', (e) => {
        const rect = btn.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;

        btn.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px)`;
    });

    btn.addEventListener('mouseleave', () => {
        btn.style.transform = `translate(0, 0)`;
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

document.querySelectorAll('.reveal, .img-reveal').forEach(el => observer.observe(el));

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
                const categories = item.getAttribute('data-category').split(' ');
                if (filter === 'all' || categories.includes(filter)) {
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

// Pricing Toggle
const pricingToggle = document.getElementById('pricing-toggle');
if (pricingToggle) {
    const switchEl = pricingToggle.querySelector('.toggle-switch');
    const oneTimePrices = document.querySelectorAll('.one-time-price');
    const monthlyPrices = document.querySelectorAll('.monthly-price');
    let isMonthly = false;

    pricingToggle.addEventListener('click', () => {
        isMonthly = !isMonthly;
        if (isMonthly) {
            switchEl.style.left = '33px';
            oneTimePrices.forEach(p => p.style.display = 'none');
            monthlyPrices.forEach(p => p.style.display = 'block');
        } else {
            switchEl.style.left = '3px';
            oneTimePrices.forEach(p => p.style.display = 'block');
            monthlyPrices.forEach(p => p.style.display = 'none');
        }
    });
}

// Authority Notifications
const authNotif = document.getElementById('auth-notification');
if (authNotif) {
    const messages = [
        { t: "New Project Completed", s: "SaaS Authority System Launch" },
        { t: "Strategy Call Booked", s: "Growth Audit for Real Estate" },
        { t: "Success Story", s: "+140% Lead Growth in 30 Days" },
        { t: "New Client Secured", s: "Enterprise Web Infrastructure" }
    ];
    let msgIdx = 0;

    const showNotif = () => {
        const msg = messages[msgIdx];
        document.getElementById('notif-text').innerText = msg.t;
        document.getElementById('notif-sub').innerText = msg.s;

        authNotif.style.transform = 'translateY(0)';

        setTimeout(() => {
            authNotif.style.transform = 'translateY(200%)';
            msgIdx = (msgIdx + 1) % messages.length;
        }, 6000);
    };

    setTimeout(showNotif, 4000);
    setInterval(showNotif, 25000);

    document.getElementById('notif-close').addEventListener('click', () => {
        authNotif.style.display = 'none';
    });
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
