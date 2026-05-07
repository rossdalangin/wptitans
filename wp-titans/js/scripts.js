// Preloader & Page Ready
window.addEventListener('load', () => {
    const preloader = document.getElementById('preloader');
    if (preloader) {
        preloader.style.transition = 'opacity 0.6s ease-out';
        preloader.style.opacity = '0';
        setTimeout(() => preloader.style.display = 'none', 600);
    }
    document.body.classList.add('page-ready');
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

// Form Simulations (Success States)
const simulateForm = (formId, successMsg, redirectKey = null) => {
    const form = document.getElementById(formId);
    if (!form) return;

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const btn = form.querySelector('button');

        btn.disabled = true;
        const originalText = btn.innerText;
        btn.innerText = 'Sending...';

        setTimeout(() => {
            // Check for redirect
            const redirectUrl = (redirectKey && wp_titans_ajax.redirects) ? wp_titans_ajax.redirects[redirectKey] : null;

            if (redirectUrl && redirectUrl !== '') {
                window.location.href = redirectUrl;
            } else {
                form.innerHTML = `
                    <div class="reveal visible" style="text-align: center; padding: 2rem;">
                        <i class="fas fa-check-circle" style="font-size: 3rem; color: #2ecc71; margin-bottom: 1.5rem;"></i>
                        <h3 style="color: white; margin-bottom: 1rem;">Success!</h3>
                        <p style="color: #ccc;">${successMsg}</p>
                    </div>
                `;
            }
        }, 1500);
    });
};

document.addEventListener('DOMContentLoaded', () => {
    simulateForm('audit-request-form', 'Your audit request has been received. Our strategists will deliver your manual report within 24 hours.', 'audit');
    simulateForm('exit-intent-form', 'Thank you! Your Authority Checklist is on its way to your inbox.', 'exit');

    // Newsletter form in footer or front page
    const newsForms = document.querySelectorAll('#newsletter form, .footer-newsletter form');
    newsForms.forEach(f => {
        f.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = f.querySelector('button');
            btn.disabled = true;
            btn.innerText = 'Joined!';
            f.querySelector('input').value = '';
            f.querySelector('input').placeholder = 'Welcome to the Titan Circle.';
        });
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
document.querySelectorAll('.grid-cards, .grid-2, .grid-masonry').forEach(grid => {
    const items = grid.querySelectorAll('.reveal');
    items.forEach((item, index) => {
        item.style.transitionDelay = `${index * 0.15}s`;
    });
});

// Magnetic Buttons Refined Physics
document.querySelectorAll('.btn-primary, .btn-outline, #fab-trigger').forEach(btn => {
    btn.addEventListener('mousemove', (e) => {
        const rect = btn.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;

        // Physics constants for more fluid feel
        const intensity = 0.4;
        const rotate = x * 0.05;

        btn.style.transform = `translate(${x * intensity}px, ${y * intensity}px) rotate(${rotate}deg)`;
    });

    btn.addEventListener('mouseleave', () => {
        btn.style.transform = `translate(0, 0) rotate(0)`;
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

    // AJAX Live Search Logic
    const resultsContainer = document.getElementById('search-results-live');
    let searchTimeout;

    searchInput.addEventListener('input', () => {
        clearTimeout(searchTimeout);
        const query = searchInput.value;
        if (query.length < 3) {
            resultsContainer.innerHTML = '';
            return;
        }

        searchTimeout = setTimeout(() => {
            const formData = new URLSearchParams();
            formData.append('action', 'titan_search');
            formData.append('query', query);

            fetch(wp_titans_ajax.url, {
                method: 'POST',
                body: formData,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            })
            .then(res => res.json())
            .then(response => {
                if (response.success && response.data.length > 0) {
                    let html = '<ul style="list-style:none; padding:0;">';
                    response.data.forEach(item => {
                        html += `
                            <li style="margin-bottom:1.5rem; padding-bottom:1.5rem; border-bottom:1px solid #111;">
                                <a href="${item.url}" style="display:block;">
                                    <small style="color:var(--primary); text-transform:uppercase; font-size:0.65rem;">${item.type}</small>
                                    <h4 style="color:white; margin:0.5rem 0 0; font-size:1.1rem;">${item.title}</h4>
                                </a>
                            </li>
                        `;
                    });
                    html += '</ul>';
                    resultsContainer.innerHTML = html;
                } else {
                    resultsContainer.innerHTML = '<p style="color:#444;">No exact matches found.</p>';
                }
            });
        }, 300);
    });

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
        { t: "New Project Completed", s: "FinTech Authority Launch" },
        { t: "Strategy Call Booked", s: "Revenue Audit (Healthcare)" },
        { t: "Success Story", s: "+210% ROI for E-commerce Client" },
        { t: "New Client Secured", s: "Real Estate Market Expansion" },
        { t: "Asset Downloaded", s: "Authority Blueprint by Fortune 500 VP" },
        { t: "Performance Peak", s: "34ms LCP achieved for High-Traffic Portal" },
        { t: "Lead Generated", s: "Enterprise SEO Inquiry ($50k+ Pot.)" },
        { t: "System Deployment", s: "Headless CMS Cluster for Luxury Brand" }
    ];

    const times = ["Just now", "2 mins ago", "5 mins ago", "12 mins ago", "Just now", "3 mins ago"];
    let msgIdx = 0;

    const showNotif = () => {
        const msg = messages[Math.floor(Math.random() * messages.length)];
        const time = times[Math.floor(Math.random() * times.length)];

        document.getElementById('notif-text').innerText = msg.t;
        document.getElementById('notif-sub').innerHTML = `${msg.s} <span style="display:block; font-size:0.6rem; opacity:0.6; margin-top:0.2rem;">${time}</span>`;

        authNotif.style.transform = 'translateY(0)';

        setTimeout(() => {
            authNotif.style.transform = 'translateY(200%)';
        }, 7000);
    };

    // Randomize initial delay and subsequent intervals
    setTimeout(showNotif, 5000);

    const triggerNext = () => {
        const delay = Math.floor(Math.random() * (45000 - 20000) + 20000);
        setTimeout(() => {
            showNotif();
            triggerNext();
        }, delay);
    };
    triggerNext();

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
