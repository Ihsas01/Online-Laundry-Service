// Enhanced Login Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS library
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });
    
    // Initialize all interactive features
    initParticleSystem();
    initFormValidation();
    initPasswordToggle();
    initFloatingLabels();
    initSocialButtons();
    initFormSubmission();
    initModalFunctionality();
    initAnimations();
    initErrorHandling();
    initHoverEffects();
    initKeyboardNavigation();
    initAccessibility();
    initDarkMode();
    initFloatingActionButton();
    initLoadingOverlay();
});

// Dark Mode Toggle
function initDarkMode() {
    const themeToggle = document.getElementById('themeToggle');
    const body = document.body;
    
    // Check for saved theme preference
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        body.classList.add('dark-mode');
        themeToggle.classList.add('dark');
    }
    
    themeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        themeToggle.classList.toggle('dark');
        
        // Save preference
        const isDark = body.classList.contains('dark-mode');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        
        // Add ripple effect
        addRippleEffect(themeToggle);
        
        // Trigger theme change animation
        triggerThemeChangeAnimation();
    });
}

function triggerThemeChangeAnimation() {
    const elements = document.querySelectorAll('.login-wrapper, .branding-section, .login-section');
    elements.forEach(element => {
        element.style.transition = 'all 0.5s ease';
        setTimeout(() => {
            element.style.transition = '';
        }, 500);
    });
}

// Floating Action Button
function initFloatingActionButton() {
    const fabButton = document.getElementById('fabButton');
    const fabContainer = document.getElementById('fabContainer');
    
    fabButton.addEventListener('click', () => {
        fabContainer.classList.toggle('active');
        addRippleEffect(fabButton);
    });
    
    // Close FAB menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!fabContainer.contains(e.target)) {
            fabContainer.classList.remove('active');
        }
    });
}

// Help Modal Functions
function showHelpModal() {
    const helpModal = document.getElementById('helpModal');
    helpModal.classList.add('show');
    document.body.style.overflow = 'hidden';
    
    // Add entrance animation
    helpModal.querySelector('.modal-content').style.animation = 'modalSlideIn 0.3s ease-out';
}

function closeHelpModal() {
    const helpModal = document.getElementById('helpModal');
    helpModal.classList.remove('show');
    document.body.style.overflow = '';
}

function showTutorial() {
    // Show a quick tutorial overlay
    showLoadingOverlay('Loading tutorial...');
    
    setTimeout(() => {
        hideLoadingOverlay();
        showSuccessNotification('Tutorial feature coming soon!');
    }, 2000);
}

function toggleAccessibility() {
    const body = document.body;
    body.classList.toggle('high-contrast');
    
    // Save accessibility preference
    const isHighContrast = body.classList.contains('high-contrast');
    localStorage.setItem('accessibility', isHighContrast ? 'high-contrast' : 'normal');
    
    showSuccessNotification(isHighContrast ? 'High contrast mode enabled' : 'High contrast mode disabled');
}

// Loading Overlay
function initLoadingOverlay() {
    const loadingOverlay = document.getElementById('loadingOverlay');
    
    // Auto-hide after page load
    setTimeout(() => {
        loadingOverlay.classList.remove('show');
    }, 1000);
}

function showLoadingOverlay(message = 'Loading...') {
    const loadingOverlay = document.getElementById('loadingOverlay');
    const loadingText = loadingOverlay.querySelector('p');
    
    loadingText.textContent = message;
    loadingOverlay.classList.add('show');
}

function hideLoadingOverlay() {
    const loadingOverlay = document.getElementById('loadingOverlay');
    loadingOverlay.classList.remove('show');
}

// Enhanced Form Submission with Loading
function initFormSubmission() {
    const form = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    
    form.addEventListener('submit', function(e) {
        // Don't prevent default - let the form submit normally
        // Just add visual feedback
        
        if (!validateForm(e)) {
            e.preventDefault();
            return false;
        }
        
        // Show loading state
        loginBtn.classList.add('loading');
        showLoadingOverlay('Signing you in...');
        
        // Let the form submit naturally - the loading overlay will show until page redirects
        // The PHP will handle the actual login logic and redirect
    });
}

// Enhanced Social Login
function handleSocialLogin(provider) {
    showLoadingOverlay(`Connecting to ${provider}...`);
    
    // Simulate social login
    setTimeout(() => {
        hideLoadingOverlay();
        showSuccessNotification(`${provider} login feature coming soon!`);
    }, 2000);
}

// Enhanced Password Reset
function sendResetEmail() {
    const email = document.getElementById('resetEmail').value;
    
    if (!isValidEmail(email)) {
        showFormError('Please enter a valid email address');
        return;
    }
    
    const resetBtn = document.querySelector('.reset-btn');
    resetBtn.classList.add('loading');
    
    // Simulate API call
    setTimeout(() => {
        resetBtn.classList.remove('loading');
        closeModal();
        showSuccessNotification('Password reset link sent to your email!');
    }, 2000);
}

// Enhanced Animations
function initAnimations() {
    // Add scroll-triggered animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.feature-item, .stat-item').forEach(el => {
        observer.observe(el);
    });
    
    // Add hover animations
    document.querySelectorAll('.feature-item, .stat-item, .alt-btn').forEach(el => {
        el.addEventListener('mouseenter', addHoverEffect);
        el.addEventListener('mouseleave', removeHoverEffect);
    });
}

// Enhanced Error Handling
function initErrorHandling() {
    // Global error handler
    window.addEventListener('error', (e) => {
        console.error('Global error:', e.error);
        showFormError('An unexpected error occurred. Please try again.');
    });
    
    // Unhandled promise rejection handler
    window.addEventListener('unhandledrejection', (e) => {
        console.error('Unhandled promise rejection:', e.reason);
        showFormError('An unexpected error occurred. Please try again.');
    });
}

function showFormError(message) {
    const errorMessage = document.getElementById('errorMessage');
    
    if (!errorMessage) {
        // Create error message if it doesn't exist
        const form = document.getElementById('loginForm');
        const newError = document.createElement('div');
        newError.className = 'error-message';
        newError.id = 'errorMessage';
        newError.innerHTML = `
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
        form.insertBefore(newError, form.firstChild);
    } else {
        errorMessage.querySelector('.error-text').textContent = message;
    }
    
    // Add shake animation
    errorMessage.style.animation = 'shake 0.5s ease-in-out';
    setTimeout(() => {
        errorMessage.style.animation = '';
    }, 500);
    
    errorMessage.style.display = 'flex';
}

function closeError() {
    const errorMessage = document.getElementById('errorMessage');
    if (errorMessage) {
        errorMessage.style.animation = 'slideOutUp 0.3s ease';
        setTimeout(() => {
            if (errorMessage.parentNode) {
                errorMessage.remove();
            }
        }, 300);
    }
}

// Enhanced Hover Effects
function initHoverEffects() {
    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.login-btn, .social-btn, .alt-btn, .forgot-password');
    
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

// Enhanced Keyboard Navigation
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

// Enhanced Accessibility
function initAccessibility() {
    // Add ARIA labels and roles
    const loginBtn = document.getElementById('loginBtn');
    const passwordToggle = document.querySelector('.password-toggle');
    
    if (loginBtn) {
        loginBtn.setAttribute('aria-label', 'Sign in to your account');
    }
    
    if (passwordToggle) {
        passwordToggle.setAttribute('aria-label', 'Show password');
    }
    
    // Add skip link for screen readers
    const skipLink = document.createElement('a');
    skipLink.href = '#loginForm';
    skipLink.textContent = 'Skip to login form';
    skipLink.className = 'skip-link';
    skipLink.style.cssText = `
        position: absolute;
        top: -40px;
        left: 6px;
        background: #667eea;
        color: white;
        padding: 8px;
        text-decoration: none;
        border-radius: 4px;
        z-index: 1000;
        transition: top 0.3s;
    `;
    
    skipLink.addEventListener('focus', () => {
        skipLink.style.top = '6px';
    });
    
    skipLink.addEventListener('blur', () => {
        skipLink.style.top = '-40px';
    });
    
    document.body.appendChild(skipLink);
}

// Enhanced Success Notification
function showSuccessNotification(message) {
    const notification = document.getElementById('successNotification');
    const messageEl = notification.querySelector('.notification-message');
    
    messageEl.textContent = message;
    notification.classList.add('show');
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
        notification.classList.remove('show');
    }, 5000);
}

// Enhanced Ripple Effect
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
    
    element.style.position = 'relative';
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Add ripple animation CSS
const rippleStyle = document.createElement('style');
rippleStyle.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    
    @keyframes slideOutUp {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
`;
document.head.appendChild(rippleStyle);

// Particle System for Background
function initParticleSystem() {
    const particlesContainer = document.getElementById('particles');
    if (!particlesContainer) return;

    const particleCount = 50;
    const particles = [];

    // Create particles
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
        particles.push(particle);
    }

    // Add particle animation CSS
    const style = document.createElement('style');
    style.textContent = `
        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) translateX(${Math.random() * 200 - 100}px);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
}

// Enhanced Form Validation
function initFormValidation() {
    const form = document.getElementById('loginForm');
    const inputs = form.querySelectorAll('input[required]');
    
    inputs.forEach(input => {
        input.addEventListener('blur', validateField);
        input.addEventListener('input', clearFieldError);
        input.addEventListener('keyup', debounce(validateField, 300));
    });
    
    form.addEventListener('submit', validateForm);
}

function validateField(e) {
    const field = e.target;
    const value = field.value.trim();
    const fieldName = field.name;
    
    // Remove existing error styling
    clearFieldError(e);
    
    // Enhanced validation rules
    if (fieldName === 'username') {
        if (value.length < 3) {
            showFieldError(field, 'Username must be at least 3 characters long');
        } else if (!/^[a-zA-Z0-9_]+$/.test(value)) {
            showFieldError(field, 'Username can only contain letters, numbers, and underscores');
        }
    } else if (fieldName === 'password') {
        if (value.length < 6) {
            showFieldError(field, 'Password must be at least 6 characters long');
        } else if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(value)) {
            showFieldError(field, 'Password should contain uppercase, lowercase, and numbers');
        }
    }
}

function showFieldError(field, message) {
    const wrapper = field.closest('.input-wrapper');
    wrapper.classList.add('error');
    
    // Create error message element
    let errorElement = wrapper.querySelector('.field-error');
    if (!errorElement) {
        errorElement = document.createElement('div');
        errorElement.className = 'field-error';
        wrapper.appendChild(errorElement);
    }
    errorElement.textContent = message;
    errorElement.style.display = 'block';
    
    // Add shake animation
    wrapper.style.animation = 'shake 0.5s ease-in-out';
    setTimeout(() => {
        wrapper.style.animation = '';
    }, 500);
}

function clearFieldError(e) {
    const field = e.target;
    const wrapper = field.closest('.input-wrapper');
    wrapper.classList.remove('error');
    
    const errorElement = wrapper.querySelector('.field-error');
    if (errorElement) {
        errorElement.style.display = 'none';
    }
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
        return false;
    }
    
    return true;
}

// Enhanced Password Toggle
function initPasswordToggle() {
    const passwordField = document.getElementById('password');
    const toggleBtn = document.querySelector('.password-toggle');
    
    if (toggleBtn) {
        toggleBtn.addEventListener('click', togglePassword);
        toggleBtn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                togglePassword();
            }
        });
    }
}

function togglePassword() {
    const passwordField = document.getElementById('password');
    const toggleBtn = document.querySelector('.password-toggle');
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
    
    // Add ripple effect
    addRippleEffect(toggleBtn);
}

// Enhanced Floating Labels
function initFloatingLabels() {
    const inputs = document.querySelectorAll('.form-group input');
    
    inputs.forEach(input => {
        // Check if input has value on page load
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
    
    // Add focus animation
    wrapper.style.transform = 'scale(1.02)';
    setTimeout(() => {
        wrapper.style.transform = 'scale(1)';
    }, 200);
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

// Enhanced Social Buttons
function initSocialButtons() {
    const socialButtons = document.querySelectorAll('.social-btn');
    
    socialButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const provider = btn.classList.contains('google-btn') ? 'google' : 'facebook';
            handleSocialLogin(provider);
        });
        btn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const provider = btn.classList.contains('google-btn') ? 'google' : 'facebook';
                handleSocialLogin(provider);
            }
        });
    });
}

// Enhanced Modal Functionality
function initModalFunctionality() {
    const modal = document.getElementById('forgotPasswordModal');
    const modalContent = modal.querySelector('.modal-content');
    
    // Close modal when clicking outside
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            closeModal();
        }
    });
    
    // Prevent modal content clicks from closing modal
    modalContent.addEventListener('click', (e) => {
        e.stopPropagation();
    });
}

function showForgotPassword() {
    const modal = document.getElementById('forgotPasswordModal');
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
    
    // Focus on email input
    setTimeout(() => {
        const emailInput = modal.querySelector('#resetEmail');
        if (emailInput) {
            emailInput.focus();
        }
    }, 300);
}

function closeModal() {
    const modal = document.getElementById('forgotPasswordModal');
    modal.classList.remove('show');
    document.body.style.overflow = '';
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Utility Functions
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Cleanup function
function cleanup() {
    // Remove event listeners and clean up resources
    const elements = document.querySelectorAll('*');
    elements.forEach(element => {
        const clone = element.cloneNode(true);
        element.parentNode.replaceChild(clone, element);
    });
}

// Initialize cleanup on page unload
window.addEventListener('beforeunload', cleanup); 