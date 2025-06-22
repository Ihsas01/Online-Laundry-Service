// Enhanced Admin Login Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    initParticleSystem();
    initFormValidation();
    initPasswordToggle();
    initFloatingLabels();
    initFormSubmission();
    initAnimations();
    initErrorHandling();
    initHoverEffects();
    initKeyboardNavigation();
    initAccessibility();
});

// Particle System for Background
function initParticleSystem() {
    const particlesContainer = document.getElementById('particles');
    if (!particlesContainer) return;
    const particleCount = 40;
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.cssText = `
            position: absolute;
            width: ${Math.random() * 4 + 2}px;
            height: ${Math.random() * 4 + 2}px;
            background: rgba(255, 255, 255, ${Math.random() * 0.5 + 0.1});
            border-radius: 50%;
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            pointer-events: none;
            animation: particleFloat ${Math.random() * 20 + 10}s linear infinite;
            animation-delay: ${Math.random() * 5}s;
        `;
        particlesContainer.appendChild(particle);
    }
    const style = document.createElement('style');
    style.textContent = `
        @keyframes particleFloat {
            0% { transform: translateY(100vh) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100px) translateX(${Math.random() * 200 - 100}px); opacity: 0; }
        }
    `;
    document.head.appendChild(style);
}

// Form Validation
function initFormValidation() {
    const form = document.getElementById('loginForm');
    const inputs = form.querySelectorAll('input[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', validateField);
        input.addEventListener('input', clearFieldError);
    });
    form.addEventListener('submit', validateForm);
}
function validateField(e) {
    const field = e.target;
    const value = field.value.trim();
    const fieldName = field.name;
    clearFieldError(e);
    if (fieldName === 'username') {
        if (value.length < 3) {
            showFieldError(field, 'Username must be at least 3 characters long');
        }
    } else if (fieldName === 'password') {
        if (value.length < 6) {
            showFieldError(field, 'Password must be at least 6 characters long');
        }
    }
}
function showFieldError(field, message) {
    const wrapper = field.closest('.input-wrapper');
    wrapper.classList.add('error');
    let errorElement = wrapper.querySelector('.field-error');
    if (!errorElement) {
        errorElement = document.createElement('div');
        errorElement.className = 'field-error';
        wrapper.appendChild(errorElement);
    }
    errorElement.textContent = message;
    errorElement.style.display = 'block';
    wrapper.style.animation = 'shake 0.5s ease-in-out';
    setTimeout(() => { wrapper.style.animation = ''; }, 500);
}
function clearFieldError(e) {
    const field = e.target;
    const wrapper = field.closest('.input-wrapper');
    wrapper.classList.remove('error');
    const errorElement = wrapper.querySelector('.field-error');
    if (errorElement) errorElement.style.display = 'none';
}
function validateForm(e) {
    const form = e.target;
    const inputs = form.querySelectorAll('input[required]');
    let isValid = true;
    inputs.forEach(input => {
        if (!input.value.trim()) {
            showFieldError(input, 'This field is required');
            isValid = false;
        } else {
            validateField({ target: input });
            if (input.closest('.input-wrapper').classList.contains('error')) {
                isValid = false;
            }
        }
    });
    if (!isValid) {
        e.preventDefault();
        showFormError('Please correct the errors above');
    }
}

// Password Toggle
function initPasswordToggle() {
    const passwordField = document.getElementById('password');
    const toggleBtn = passwordField.parentElement.querySelector('.password-toggle');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => togglePassword('password'));
        toggleBtn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                togglePassword('password');
            }
        });
    }
}
function togglePassword(fieldId) {
    const passwordField = document.getElementById(fieldId);
    const toggleBtn = passwordField.parentElement.querySelector('.password-toggle');
    const icon = toggleBtn.querySelector('i');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.className = 'fas fa-eye-slash';
        toggleBtn.setAttribute('aria-label', 'Hide password');
        toggleBtn.classList.add('active');
    } else {
        passwordField.type = 'password';
        icon.className = 'fas fa-eye';
        toggleBtn.setAttribute('aria-label', 'Show password');
        toggleBtn.classList.remove('active');
    }
    addRippleEffect(toggleBtn);
}

// Floating Labels
function initFloatingLabels() {
    const inputs = document.querySelectorAll('.form-group input');
    inputs.forEach(input => {
        if (input.value.trim()) {
            input.classList.add('has-value');
        }
        input.addEventListener('focus', handleInputFocus);
        input.addEventListener('blur', handleInputBlur);
        input.addEventListener('input', handleInputChange);
    });
}
function handleInputFocus(e) {
    const input = e.target;
    const wrapper = input.closest('.input-wrapper');
    wrapper.classList.add('focused');
    wrapper.style.transform = 'scale(1.02)';
    setTimeout(() => { wrapper.style.transform = 'scale(1)'; }, 200);
}
function handleInputBlur(e) {
    const input = e.target;
    const wrapper = input.closest('.input-wrapper');
    if (!input.value.trim()) {
        wrapper.classList.remove('focused');
    }
}
function handleInputChange(e) {
    const input = e.target;
    if (input.value.trim()) {
        input.classList.add('has-value');
    } else {
        input.classList.remove('has-value');
    }
}

// Form Submission
function initFormSubmission() {
    const form = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    form.addEventListener('submit', function(e) {
        if (!validateForm(e)) return;
        loginBtn.classList.add('loading');
        loginBtn.disabled = true;
        setTimeout(() => {
            loginBtn.classList.remove('loading');
            loginBtn.classList.add('success');
            setTimeout(() => {}, 1000);
        }, 1500);
    });
}

// Animations
function initAnimations() {
    const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    const animatedElements = document.querySelectorAll('.feature-item');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
}

// Error Handling
function initErrorHandling() {
    window.addEventListener('error', (e) => {
        showFormError('An unexpected error occurred. Please try again.');
    });
    window.addEventListener('unhandledrejection', (e) => {
        showFormError('An unexpected error occurred. Please try again.');
    });
}
function showFormError(message) {
    const existingError = document.getElementById('errorMessage');
    if (existingError) existingError.remove();
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.id = 'errorMessage';
    errorDiv.innerHTML = `
        <div class="error-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="error-content">
            <span class="error-title">Error</span>
            <span class="error-text">${message}</span>
        </div>
        <button type="button" class="error-close" onclick="closeError()">
            <i class="fas fa-times"></i>
        </button>
    `;
    const form = document.getElementById('loginForm');
    form.insertBefore(errorDiv, form.firstChild);
    setTimeout(() => { if (errorDiv.parentNode) closeError(); }, 5000);
}
function closeError() {
    const errorMessage = document.getElementById('errorMessage');
    if (errorMessage) {
        errorMessage.style.animation = 'slideOutUp 0.3s ease';
        setTimeout(() => { if (errorMessage.parentNode) errorMessage.remove(); }, 300);
    }
}

// Hover Effects
function initHoverEffects() {
    const interactiveElements = document.querySelectorAll('.login-btn, .help-link');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', addHoverEffect);
        element.addEventListener('mouseleave', removeHoverEffect);
    });
}
function addHoverEffect(e) {
    const element = e.target;
    element.style.transform = 'translateY(-2px)';
    element.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.15)';
}
function removeHoverEffect(e) {
    const element = e.target;
    element.style.transform = '';
    element.style.boxShadow = '';
}

// Keyboard Navigation
function initKeyboardNavigation() {
    const form = document.getElementById('loginForm');
    const inputs = form.querySelectorAll('input');
    inputs.forEach((input, index) => {
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && index < inputs.length - 1) {
                e.preventDefault();
                inputs[index + 1].focus();
            }
        });
    });
}

// Accessibility
function initAccessibility() {
    const loginBtn = document.getElementById('loginBtn');
    const passwordToggle = document.querySelector('.password-toggle');
    if (loginBtn) loginBtn.setAttribute('aria-label', 'Sign in as admin');
    if (passwordToggle) passwordToggle.setAttribute('aria-label', 'Show password');
}

// Utility
function addRippleEffect(element) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        left: ${x}px;
        top: ${y}px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    `;
    element.appendChild(ripple);
    setTimeout(() => { ripple.remove(); }, 600);
}
// Ripple animation CSS
const rippleStyle = document.createElement('style');
rippleStyle.textContent = `
    @keyframes ripple {
        to { transform: scale(4); opacity: 0; }
    }
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    @keyframes slideOutUp {
        from { opacity: 1; transform: translateY(0); }
        to { opacity: 0; transform: translateY(-20px); }
    }
`;
document.head.appendChild(rippleStyle); 