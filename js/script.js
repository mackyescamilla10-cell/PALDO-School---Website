// ============================================
// SCHOOL WEBSITE - JAVASCRIPT
// ============================================

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');

    if (navToggle) {
        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });

        // Close menu when link is clicked
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
            });
        });
    }
});

// Form Validation
function validateForm(formElement) {
    const inputs = formElement.querySelectorAll('[required]');
    let isValid = true;

    inputs.forEach(input => {
        if (input.value.trim() === '') {
            input.style.borderColor = '#e74c3c';
            isValid = false;
        } else {
            input.style.borderColor = '#ddd';
        }
    });

    return isValid;
}

// Email Validation
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Smooth Scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Number Counter Animation
function animateCounters() {
    const counters = document.querySelectorAll('.stat-card h3');
    const speed = 50;

    counters.forEach(counter => {
        const updateCounter = () => {
            const target = +counter.getAttribute('data-target') || parseFloat(counter.innerText);
            const increment = target / speed;

            if (parseFloat(counter.innerText) < target) {
                counter.innerText = (parseFloat(counter.innerText) + increment).toFixed(0);
                setTimeout(updateCounter, 100);
            } else {
                counter.innerText = counter.innerText.split('+')[0] + '+';
            }
        };
    });
}

// Fade In Animation on Scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animation = 'fadeInUp 0.8s ease forwards';
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.program-card, .value-card, .facility-card, .stat-card').forEach(el => {
        observer.observe(el);
    });
});

// Form Submission Handler
function handleFormSubmit(event) {
    event.preventDefault();
    const form = event.target;
    
    if (validateForm(form)) {
        // Form is valid, allow submission
        form.submit();
    } else {
        alert('Please fill in all required fields!');
    }
}

// Search Filter
function filterItems(searchTerm) {
    const items = document.querySelectorAll('[data-filter]');
    items.forEach(item => {
        const text = item.textContent.toLowerCase();
        item.style.display = text.includes(searchTerm.toLowerCase()) ? 'block' : 'none';
    });
}

// Document Ready
console.log('✅ School Website - JavaScript Loaded Successfully');