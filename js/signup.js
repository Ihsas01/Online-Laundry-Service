// Enhanced Signup Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all interactive features
    initParticleSystem();
    initFormValidation();
    initPasswordToggle();
    initFloatingLabels();
    initPasswordStrength();
    initSocialButtons();
    initFormSubmission();
    initAnimations();
    initErrorHandling();
    initHoverEffects();
    initKeyboardNavigation();
    initAccessibility();
    initAutoSave();
});

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
    const form = document.getElementById('signupForm');
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
    if (fieldName === 'firstName') {
        if (value.length < 2) {
            showFieldError(field, 'Name must be at least 2 characters long');
        } else if (!/^[a-zA-Z\s]+$/.test(value)) {
            showFieldError(field, 'Name can only contain letters and spaces');
        }
    } else if (fieldName === 'userName') {
        if (value.length < 3) {
            showFieldError(field, 'Username must be at least 3 characters long');
        } else if (!/^[a-zA-Z0-9_]+$/.test(value)) {
            showFieldError(field, 'Username can only contain letters, numbers, and underscores');
        }
    } else if (fieldName === 'phoneNum') {
        if (!isValidPhone(value)) {
            showFieldError(field, 'Please enter a valid phone number');
        }
    } else if (fieldName === 'email') {
        if (!isValidEmail(value)) {
            showFieldError(field, 'Please enter a valid email address');
        }
    } else if (fieldName === 'add') {
        if (value.length < 10) {
            showFieldError(field, 'Address must be at least 10 characters long');
        }
    } else if (fieldName === 'password') {
        if (value.length < 8) {
            showFieldError(field, 'Password must be at least 8 characters long');
        }
    } else if (fieldName === 'confirmPassword') {
        const password = document.getElementById('password').value;
        if (value !== password) {
            showFieldError(field, 'Passwords do not match');
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
    
    // Check terms agreement
    const termsCheckbox = document.getElementById('terms');
    if (!termsCheckbox.checked) {
        showFormError('Please agree to the Terms & Conditions');
        isValid = false;
    }
    
    if (!isValid) {
        e.preventDefault();
        showFormError('Please correct the errors above');
        return false;
    }
    
    return true;
}

// Enhanced Password Toggle
function initPasswordToggle() {
    const passwordFields = document.querySelectorAll('input[type="password"]');
    
    passwordFields.forEach(field => {
        const toggleBtn = field.parentElement.querySelector('.password-toggle');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function() {
                const fieldId = field.id;
                togglePassword(fieldId);
            });
        }
    });
}

function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const toggleBtn = field.parentElement.querySelector('.password-toggle');
    const icon = toggleBtn.querySelector('i');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
        toggleBtn.setAttribute('aria-label', 'Hide password');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
        toggleBtn.setAttribute('aria-label', 'Show password');
    }
}

// Enhanced Floating Labels
function initFloatingLabels() {
    const inputs = document.querySelectorAll('.form-group input');
    
    inputs.forEach(input => {
        input.addEventListener('focus', handleInputFocus);
        input.addEventListener('blur', handleInputBlur);
        input.addEventListener('input', handleInputChange);
        
        // Initialize state
        if (input.value.trim()) {
            input.parentElement.classList.add('focused');
        }
    });
}

function handleInputFocus(e) {
    const wrapper = e.target.closest('.input-wrapper');
    wrapper.classList.add('focused');
    
    // Add ripple effect
    addRippleEffect(wrapper);
}

function handleInputBlur(e) {
    const wrapper = e.target.closest('.input-wrapper');
    if (!e.target.value.trim()) {
        wrapper.classList.remove('focused');
    }
}

function handleInputChange(e) {
    const wrapper = e.target.closest('.input-wrapper');
    if (e.target.value.trim()) {
        wrapper.classList.add('focused');
    } else {
        wrapper.classList.remove('focused');
    }
}

// Enhanced Password Strength
function initPasswordStrength() {
    const passwordField = document.getElementById('password');
    const strengthIndicator = document.getElementById('passwordStrength');
    
    if (passwordField && strengthIndicator) {
        passwordField.addEventListener('input', function() {
            const strength = calculatePasswordStrength(this.value);
            updatePasswordStrengthIndicator(strengthIndicator, strength);
        });
    }
}

function calculatePasswordStrength(password) {
    let score = 0;
    
    if (password.length >= 8) score += 1;
    if (password.match(/[a-z]/)) score += 1;
    if (password.match(/[A-Z]/)) score += 1;
    if (password.match(/[0-9]/)) score += 1;
    if (password.match(/[^a-zA-Z0-9]/)) score += 1;
    
    if (score < 2) return 'weak';
    if (score < 3) return 'fair';
    if (score < 4) return 'good';
    return 'strong';
}

function updatePasswordStrengthIndicator(indicator, strength) {
    indicator.className = `password-strength ${strength}`;
    
    const strengthText = {
        weak: 'Weak',
        fair: 'Fair',
        good: 'Good',
        strong: 'Strong'
    };
    
    indicator.setAttribute('aria-label', `Password strength: ${strengthText[strength]}`);
}

function getStrengthColor(strength) {
    const colors = {
        weak: '#dc3545',
        fair: '#ffc107',
        good: '#17a2b8',
        strong: '#28a745'
    };
    return colors[strength] || '#dc3545';
}

// Enhanced Social Buttons
function initSocialButtons() {
    const socialButtons = document.querySelectorAll('.social-btn');
    
    socialButtons.forEach(button => {
        button.addEventListener('click', handleSocialSignup);
        button.addEventListener('mouseenter', addHoverEffect);
        button.addEventListener('mouseleave', removeHoverEffect);
    });
}

function handleSocialSignup(e) {
    const provider = e.currentTarget.classList.contains('google-btn') ? 'google' : 'facebook';
    
    // Add loading state
    const button = e.currentTarget;
    const originalContent = button.innerHTML;
    button.innerHTML = '<div class="spinner"></div><span>Connecting...</span>';
    button.disabled = true;
    
    // Simulate API call
    setTimeout(() => {
        button.innerHTML = originalContent;
        button.disabled = false;
        showFormError('Social signup is not implemented yet. Please use the regular signup form.');
    }, 2000);
}

// Enhanced Form Submission
function initFormSubmission() {
    const form = document.getElementById('signupForm');
    const submitBtn = form.querySelector('.signup-btn');
    
    form.addEventListener('submit', function(e) {
        if (!validateForm(e)) {
            return;
        }
        
        // Add loading state
        submitBtn.classList.add('loading');
        
        // Simulate form submission
        setTimeout(() => {
            submitBtn.classList.remove('loading');
            submitBtn.classList.add('success');
            
            // Show success notification
            showSuccessNotification('Account created successfully!');
            
            // Redirect after success
            setTimeout(() => {
                window.location.href = 'login.php';
            }, 2000);
        }, 2000);
    });
}

// Phone Number Formatting
function initPhoneFormatting() {
    const phoneField = document.getElementById('phoneNum');
    
    if (phoneField) {
        phoneField.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 0) {
                if (value.length <= 3) {
                    value = `(${value}`;
                } else if (value.length <= 6) {
                    value = `(${value.slice(0, 3)}) ${value.slice(3)}`;
                } else {
                    value = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6, 10)}`;
                }
            }
            
            e.target.value = value;
        });
    }
}

// Enhanced Animations
function initAnimations() {
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
    
    // Observe form sections
    const formSections = document.querySelectorAll('.form-section');
    formSections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        section.style.transition = 'all 0.6s ease';
        observer.observe(section);
    });
}

// Enhanced Error Handling
function initErrorHandling() {
    // Auto-hide error messages after 5 seconds
    const errorMessages = document.querySelectorAll('.error-message, .success-message');
    errorMessages.forEach(message => {
        setTimeout(() => {
            if (message.parentElement) {
                message.style.opacity = '0';
                setTimeout(() => {
                    message.remove();
                }, 300);
            }
        }, 5000);
    });
}

function showFormError(message) {
    // Remove existing error messages
    const existingErrors = document.querySelectorAll('.error-message');
    existingErrors.forEach(error => error.remove());
    
    // Create new error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.innerHTML = `
        <div class="error-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="error-content">
            <span class="error-title">Error</span>
            <span class="error-text">${message}</span>
        </div>
        <button class="error-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    // Insert before form
    const form = document.getElementById('signupForm');
    form.parentElement.insertBefore(errorDiv, form);
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
        if (errorDiv.parentElement) {
            errorDiv.style.opacity = '0';
            setTimeout(() => {
                errorDiv.remove();
            }, 300);
        }
    }, 5000);
}

function closeError() {
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(message => {
        message.style.opacity = '0';
        setTimeout(() => {
            message.remove();
        }, 300);
    });
}

function closeSuccess() {
    const successMessages = document.querySelectorAll('.success-message');
    successMessages.forEach(message => {
        message.style.opacity = '0';
        setTimeout(() => {
            message.remove();
        }, 300);
    });
}

// Enhanced Hover Effects
function initHoverEffects() {
    const interactiveElements = document.querySelectorAll('.form-group, .checkbox-container, .social-btn');
    
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', addHoverEffect);
        element.addEventListener('mouseleave', removeHoverEffect);
    });
}

function addHoverEffect(e) {
    e.currentTarget.style.transform = 'translateY(-2px)';
    e.currentTarget.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.1)';
}

function removeHoverEffect(e) {
    e.currentTarget.style.transform = 'translateY(0)';
    e.currentTarget.style.boxShadow = 'none';
}

// Enhanced Keyboard Navigation
function initKeyboardNavigation() {
    const form = document.getElementById('signupForm');
    const inputs = form.querySelectorAll('input, button, select, textarea');
    
    inputs.forEach((input, index) => {
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.type !== 'textarea') {
                e.preventDefault();
                const nextInput = inputs[index + 1];
                if (nextInput) {
                    nextInput.focus();
                } else {
                    form.submit();
                }
            }
        });
    });
}

// Enhanced Accessibility
function initAccessibility() {
    // Add ARIA labels
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        if (!input.getAttribute('aria-label')) {
            const label = input.previousElementSibling;
            if (label && label.tagName === 'LABEL') {
                input.setAttribute('aria-label', label.textContent);
            }
        }
    });
    
    // Add skip link
    const skipLink = document.createElement('a');
    skipLink.href = '#signupForm';
    skipLink.textContent = 'Skip to main content';
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
        z-index: 1001;
    `;
    skipLink.addEventListener('focus', function() {
        this.style.top = '6px';
    });
    skipLink.addEventListener('blur', function() {
        this.style.top = '-40px';
    });
    
    document.body.insertBefore(skipLink, document.body.firstChild);
}

// Enhanced Auto Save
function initAutoSave() {
    const form = document.getElementById('signupForm');
    const inputs = form.querySelectorAll('input');
    
    // Load saved data on page load
    loadSavedFormData();
    
    // Auto save on input change
    inputs.forEach(input => {
        input.addEventListener('input', debounce(autoSaveForm, 1000));
    });
}

function autoSaveForm() {
    const form = document.getElementById('signupForm');
    const formData = new FormData(form);
    const data = {};
    
    for (let [key, value] of formData.entries()) {
        data[key] = value;
    }
    
    localStorage.setItem('signupFormData', JSON.stringify(data));
}

function loadSavedFormData() {
    const savedData = localStorage.getItem('signupFormData');
    if (savedData) {
        const data = JSON.parse(savedData);
        const form = document.getElementById('signupForm');
        
        Object.keys(data).forEach(key => {
            const input = form.querySelector(`[name="${key}"]`);
            if (input && !input.value) {
                input.value = data[key];
                input.dispatchEvent(new Event('input'));
            }
        });
    }
}

function clearSavedFormData() {
    localStorage.removeItem('signupFormData');
}

// Success Notification
function showSuccessNotification(message) {
    const notification = document.getElementById('successNotification');
    if (notification) {
        notification.classList.add('show');
        
        setTimeout(() => {
            notification.classList.remove('show');
        }, 5000);
    }
}

// Enhanced Ripple Effect
function addRippleEffect(element) {
    const ripple = document.createElement('span');
    ripple.className = 'ripple';
    ripple.style.cssText = `
        position: absolute;
        border-radius: 50%;
        background: rgba(102, 126, 234, 0.3);
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    `;
    
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.width = ripple.style.height = size + 'px';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
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

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPhone(phone) {
    // Remove all non-digit characters
    const cleaned = phone.replace(/\D/g, '');
    
    // Check if it's a valid US phone number (10 digits)
    if (cleaned.length === 10) {
        return true;
    }
    
    // Check if it's a valid international number (7-15 digits)
    if (cleaned.length >= 7 && cleaned.length <= 15) {
        return true;
    }
    
    return false;
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
    const form = document.getElementById('signupForm');
    if (form) {
        form.removeEventListener('submit', validateForm);
    }
    
    // Clear saved form data
    clearSavedFormData();
}

// Add shake animation CSS
const shakeAnimation = document.createElement('style');
shakeAnimation.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
    
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(shakeAnimation); 