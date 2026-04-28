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
