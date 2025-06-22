// Driver Login JavaScript - Modern Interactive Features

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all interactive features
    initializeFormValidation();
    initializeAnimations();
    initializePasswordToggle();
    initializeFormSubmission();
    initializeAlertSystem();
    initializeInputEffects();
    initializeSocialLogin();
    initializeResponsiveFeatures();
});

// Form Validation
function initializeFormValidation() {
    const form = document.getElementById('loginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const loginBtn = document.getElementById('loginBtn');

    // Real-time validation
    usernameInput.addEventListener('input', function() {
        validateField(this, 'username');
    });

    passwordInput.addEventListener('input', function() {
        validateField(this, 'password');
    });

    // Form submission validation
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            showLoadingState();
            // Submit form after validation
            setTimeout(() => {
                form.submit();
            }, 1000);
        }
    });
}

function validateField(field, type) {
    const value = field.value.trim();
    let isValid = true;
    let message = '';

    // Remove existing error styling
    field.classList.remove('error', 'success');

    switch(type) {
        case 'username':
            if (value.length === 0) {
                isValid = false;
                message = 'Username is required';
            } else if (value.length < 3) {
                isValid = false;
                message = 'Username must be at least 3 characters';
            }
            break;
        case 'password':
            if (value.length === 0) {
                isValid = false;
                message = 'Password is required';
            } else if (value.length < 6) {
                isValid = false;
                message = 'Password must be at least 6 characters';
            }
            break;
    }

    // Apply styling
    if (isValid) {
        field.classList.add('success');
        removeFieldError(field);
    } else {
        field.classList.add('error');
        showFieldError(field, message);
    }

    return isValid;
}

function validateForm() {
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    
    const usernameValid = validateField(usernameInput, 'username');
    const passwordValid = validateField(passwordInput, 'password');
    
    return usernameValid && passwordValid;
}

function showFieldError(field, message) {
    removeFieldError(field);
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error';
    errorDiv.textContent = message;
    errorDiv.style.cssText = `
        color: #ef4444;
        font-size: 12px;
        margin-top: 4px;
        animation: slideInDown 0.3s ease-out;
    `;
    
    field.parentNode.appendChild(errorDiv);
}

function removeFieldError(field) {
    const existingError = field.parentNode.querySelector('.field-error');
    if (existingError) {
        existingError.remove();
    }
}

// Animations
function initializeAnimations() {
    // Stagger animation for form elements
    const formElements = document.querySelectorAll('.input-group, .form-options, .login-btn');
    
    formElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            element.style.transition = 'all 0.6s ease-out';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 200 + (index * 100));
    });

    // Floating shapes animation enhancement
    const shapes = document.querySelectorAll('.shape');
    shapes.forEach((shape, index) => {
        shape.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2) rotate(45deg)';
            this.style.transition = 'all 0.3s ease';
        });
        
        shape.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    });
}

// Password Toggle
function initializePasswordToggle() {
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('passwordIcon');
    
    if (passwordInput && passwordIcon) {
        // Add click event for password toggle
        document.querySelector('.password-toggle').addEventListener('click', function() {
            togglePassword();
        });
    }
}

function togglePassword() {
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('passwordIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.className = 'fas fa-eye-slash';
        passwordIcon.style.color = '#4f46e5';
    } else {
        passwordInput.type = 'password';
        passwordIcon.className = 'fas fa-eye';
        passwordIcon.style.color = '#9ca3af';
    }
}

// Form Submission
function initializeFormSubmission() {
    const form = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    
    form.addEventListener('submit', function(e) {
        if (!validateForm()) {
            e.preventDefault();
            return;
        }
        
        // Show loading state
        showLoadingState();
        
        // Simulate form processing
        setTimeout(() => {
            hideLoadingState();
        }, 2000);
    });
}

function showLoadingState() {
    const loginBtn = document.getElementById('loginBtn');
    const loadingOverlay = document.getElementById('loadingOverlay');
    
    if (loginBtn) {
        loginBtn.classList.add('loading');
        loginBtn.disabled = true;
    }
    
    if (loadingOverlay) {
        loadingOverlay.classList.add('show');
    }
}

function hideLoadingState() {
    const loginBtn = document.getElementById('loginBtn');
    const loadingOverlay = document.getElementById('loadingOverlay');
    
    if (loginBtn) {
        loginBtn.classList.remove('loading');
        loginBtn.disabled = false;
    }
    
    if (loadingOverlay) {
        loadingOverlay.classList.remove('show');
    }
}

// Alert System
function initializeAlertSystem() {
    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            if (alert.parentNode) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }
        }, 5000);
    });
}

function closeAlert(alertId) {
    const alert = document.getElementById(alertId);
    if (alert) {
        alert.style.opacity = '0';
        alert.style.transform = 'translateY(-10px)';
        setTimeout(() => {
            alert.remove();
        }, 300);
    }
}

// Input Effects
function initializeInputEffects() {
    const inputs = document.querySelectorAll('.input-wrapper input');
    
    inputs.forEach(input => {
        // Focus effects
        input.addEventListener('focus', function() {
            this.parentNode.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentNode.classList.remove('focused');
            if (this.value.trim() === '') {
                this.classList.remove('has-value');
            } else {
                this.classList.add('has-value');
            }
        });
        
        // Check if input has value on load
        if (input.value.trim() !== '') {
            input.classList.add('has-value');
        }
        
        // Add ripple effect on click
        input.addEventListener('click', function(e) {
            createRippleEffect(e, this);
        });
    });
}

function createRippleEffect(event, element) {
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
        background: rgba(79, 70, 229, 0.3);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    `;
    
    element.parentNode.style.position = 'relative';
    element.parentNode.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Social Login
function initializeSocialLogin() {
    const socialBtn = document.querySelector('.google-btn');
    
    if (socialBtn) {
        socialBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Add loading state to social button
            this.innerHTML = '<div class="spinner"></div> <span>Connecting...</span>';
            this.disabled = true;
            
            // Simulate social login
            setTimeout(() => {
                showNotification('Google login feature coming soon!', 'info');
                this.innerHTML = '<i class="fab fa-google"></i> <span>Continue with Google</span>';
                this.disabled = false;
            }, 2000);
        });
    }
}

// Responsive Features
function initializeResponsiveFeatures() {
    // Handle viewport changes
    window.addEventListener('resize', function() {
        adjustLayoutForScreenSize();
    });
    
    // Initial adjustment
    adjustLayoutForScreenSize();
    
    // Add touch support for mobile
    if ('ontouchstart' in window) {
        document.body.classList.add('touch-device');
    }
}

function adjustLayoutForScreenSize() {
    const width = window.innerWidth;
    const loginCard = document.querySelector('.login-card');
    
    if (width <= 480) {
        loginCard.style.padding = '24px';
        loginCard.style.borderRadius = '20px';
    } else {
        loginCard.style.padding = '40px';
        loginCard.style.borderRadius = '24px';
    }
}

// Notification System
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${getNotificationIcon(type)}"></i>
        <span>${message}</span>
        <button class="notification-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 16px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        z-index: 1001;
        display: flex;
        align-items: center;
        gap: 12px;
        max-width: 300px;
        animation: slideInRight 0.3s ease-out;
    `;
    
    document.body.appendChild(notification);
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.animation = 'slideOutRight 0.3s ease-out';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }
    }, 5000);
}

function getNotificationIcon(type) {
    const icons = {
        success: 'check-circle',
        error: 'exclamation-circle',
        warning: 'exclamation-triangle',
        info: 'info-circle'
    };
    return icons[type] || 'info-circle';
}

// Add CSS animations for new features
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100%);
        }
    }
    
    .input-wrapper.focused input {
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    }
    
    .input-wrapper input.success {
        border-color: #10b981;
    }
    
    .input-wrapper input.error {
        border-color: #ef4444;
    }
    
    .notification-close {
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        padding: 4px;
        border-radius: 4px;
        transition: all 0.2s ease;
    }
    
    .notification-close:hover {
        background: rgba(0, 0, 0, 0.1);
        color: #6b7280;
    }
    
    .touch-device .input-wrapper input {
        font-size: 16px; /* Prevents zoom on iOS */
    }
    
    .social-btn .spinner {
        width: 16px;
        height: 16px;
        border: 2px solid rgba(0, 0, 0, 0.1);
        border-top: 2px solid currentColor;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
`;

document.head.appendChild(style);

// Performance optimization
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

// Apply debouncing to resize events
window.addEventListener('resize', debounce(adjustLayoutForScreenSize, 250));

// Accessibility improvements
document.addEventListener('keydown', function(e) {
    // Escape key to close alerts and notifications
    if (e.key === 'Escape') {
        const alerts = document.querySelectorAll('.alert');
        const notifications = document.querySelectorAll('.notification');
        
        alerts.forEach(alert => {
            if (alert.parentNode) {
                closeAlert(alert.id);
            }
        });
        
        notifications.forEach(notification => {
            notification.remove();
        });
    }
    
    // Enter key to submit form when focused on inputs
    if (e.key === 'Enter' && (e.target.tagName === 'INPUT')) {
        const form = e.target.closest('form');
        if (form && validateForm()) {
            form.submit();
        }
    }
});

console.log('Driver Login JavaScript loaded successfully! 🚀'); 