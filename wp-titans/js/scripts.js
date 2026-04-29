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
