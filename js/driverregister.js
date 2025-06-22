// Driver Registration JavaScript - Multi-step Form with Advanced Features

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all interactive features
    initializeMultiStepForm();
    initializeFormValidation();
    initializeAnimations();
    initializePasswordFeatures();
    initializeFileUpload();
    initializeFormSubmission();
    initializeAlertSystem();
    initializeInputEffects();
    initializeResponsiveFeatures();
});

// Multi-step Form Management
let currentStep = 1;
const totalSteps = 3;

function initializeMultiStepForm() {
    updateProgressBar();
    updateStepIndicators();
}

function nextStep() {
    if (validateCurrentStep()) {
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
            updateProgressBar();
            updateStepIndicators();
        }
    }
}

function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
        updateProgressBar();
        updateStepIndicators();
    }
}

function showStep(stepNumber) {
    // Hide all steps
    document.querySelectorAll('.form-step').forEach(step => {
        step.classList.remove('active');
    });
    
    // Show current step
    const currentStepElement = document.querySelector(`[data-step="${stepNumber}"]`);
    if (currentStepElement) {
        currentStepElement.classList.add('active');
    }
}

function updateProgressBar() {
    const progressFill = document.getElementById('progressFill');
    const progressPercentage = (currentStep / totalSteps) * 100;
    progressFill.style.width = `${progressPercentage}%`;
}

function updateStepIndicators() {
    document.querySelectorAll('.step').forEach((step, index) => {
        const stepNumber = index + 1;
        step.classList.remove('active', 'completed');
        
        if (stepNumber === currentStep) {
            step.classList.add('active');
        } else if (stepNumber < currentStep) {
            step.classList.add('completed');
        }
    });
}

// Form Validation
function initializeFormValidation() {
    // Real-time validation for all inputs
    const inputs = document.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            validateField(this);
        });
        
        input.addEventListener('blur', function() {
            validateField(this);
        });
    });
}

function validateCurrentStep() {
    const currentStepElement = document.querySelector(`[data-step="${currentStep}"]`);
    const inputs = currentStepElement.querySelectorAll('input[required], select[required], textarea[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!validateField(input)) {
            isValid = false;
        }
    });
    
    if (!isValid) {
        showNotification('Please fill in all required fields correctly', 'error');
    }
    
    return isValid;
}

function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let message = '';
    
    // Remove existing error styling
    field.classList.remove('error', 'success');
    removeFieldError(field);
    
    // Check if required field is empty
    if (field.hasAttribute('required') && value.length === 0) {
        isValid = false;
        message = `${getFieldLabel(field)} is required`;
    } else if (value.length > 0) {
        // Field-specific validation
        switch(field.type) {
            case 'email':
                if (!isValidEmail(value)) {
                    isValid = false;
                    message = 'Please enter a valid email address';
                }
                break;
            case 'tel':
                if (!isValidPhone(value)) {
                    isValid = false;
                    message = 'Please enter a valid phone number';
                }
                break;
            case 'password':
                if (field.id === 'password') {
                    validatePasswordStrength(value);
                }
                if (field.id === 'confirmPassword') {
                    const password = document.getElementById('password').value;
                    if (value !== password) {
                        isValid = false;
                        message = 'Passwords do not match';
                    }
                }
                break;
            case 'text':
                if (field.id === 'fname' && value.length < 2) {
                    isValid = false;
                    message = 'Full name must be at least 2 characters';
                }
                if (field.id === 'lnumber' && value.length < 5) {
                    isValid = false;
                    message = 'License number must be at least 5 characters';
                }
                if (field.id === 'uname' && value.length < 3) {
                    isValid = false;
                    message = 'Username must be at least 3 characters';
                }
                break;
        }
    }
    
    // Apply styling
    if (isValid && value.length > 0) {
        field.classList.add('success');
    } else if (!isValid) {
        field.classList.add('error');
        showFieldError(field, message);
    }
    
    return isValid;
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPhone(phone) {
    const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
    return phoneRegex.test(phone);
}

function getFieldLabel(field) {
    const label = field.parentNode.querySelector('.input-label');
    return label ? label.textContent : field.placeholder || 'This field';
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

// Password Features
function initializePasswordFeatures() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            validatePasswordStrength(this.value);
            validateConfirmPassword();
        });
    }
    
    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener('input', function() {
            validateConfirmPassword();
        });
    }
}

function validatePasswordStrength(password) {
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');
    
    if (!strengthFill || !strengthText) return;
    
    let strength = 0;
    let text = '';
    let className = '';
    
    // Check password criteria
    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    
    switch(strength) {
        case 0:
        case 1:
            text = 'Very Weak';
            className = 'weak';
            break;
        case 2:
            text = 'Weak';
            className = 'weak';
            break;
        case 3:
            text = 'Fair';
            className = 'fair';
            break;
        case 4:
            text = 'Good';
            className = 'good';
            break;
        case 5:
            text = 'Strong';
            className = 'strong';
            break;
    }
    
    strengthFill.className = `strength-fill ${className}`;
    strengthText.textContent = text;
}

function validateConfirmPassword() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    if (confirmPassword.length > 0 && password !== confirmPassword) {
        document.getElementById('confirmPassword').classList.add('error');
        showFieldError(document.getElementById('confirmPassword'), 'Passwords do not match');
    } else {
        document.getElementById('confirmPassword').classList.remove('error');
        removeFieldError(document.getElementById('confirmPassword'));
    }
}

function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId === 'password' ? 'passwordIcon' : 'confirmPasswordIcon');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.className = 'fas fa-eye-slash';
        icon.style.color = '#4f46e5';
    } else {
        field.type = 'password';
        icon.className = 'fas fa-eye';
        icon.style.color = '#9ca3af';
    }
}

// File Upload
function initializeFileUpload() {
    const fileInput = document.getElementById('licenseImage');
    const fileLabel = document.querySelector('.file-upload-label');
    
    if (fileInput && fileLabel) {
        fileInput.addEventListener('change', function() {
            handleFileUpload(this);
        });
        
        // Drag and drop functionality
        fileLabel.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = '#4f46e5';
            this.style.background = 'rgba(79, 70, 229, 0.1)';
        });
        
        fileLabel.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = '#e5e7eb';
            this.style.background = '#f9fafb';
        });
        
        fileLabel.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#e5e7eb';
            this.style.background = '#f9fafb';
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                handleFileUpload(fileInput);
            }
        });
    }
}

function handleFileUpload(input) {
    const file = input.files[0];
    const label = document.querySelector('.file-upload-label');
    
    if (file) {
        // Validate file type
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!allowedTypes.includes(file.type)) {
            showNotification('Please select a valid image file (JPEG, PNG, GIF)', 'error');
            input.value = '';
            return;
        }
        
        // Validate file size (max 5MB)
        if (file.size > 5 * 1024 * 1024) {
            showNotification('File size must be less than 5MB', 'error');
            input.value = '';
            return;
        }
        
        // Update label
        label.innerHTML = `
            <i class="fas fa-check-circle" style="color: #10b981;"></i>
            <span>${file.name}</span>
            <small>File uploaded successfully</small>
        `;
        
        showNotification('File uploaded successfully!', 'success');
    }
}

// Animations
function initializeAnimations() {
    // Stagger animation for form elements
    const formElements = document.querySelectorAll('.input-group, .step-actions');
    
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

// Form Submission
function initializeFormSubmission() {
    const form = document.getElementById('registrationForm');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateCurrentStep() && validateAllSteps()) {
            showLoadingState();
            
            // Simulate form processing
            setTimeout(() => {
                hideLoadingState();
                // Form will be submitted normally after loading
                form.submit();
            }, 2000);
        } else {
            showNotification('Please complete all required fields correctly', 'error');
        }
    });
}

function validateAllSteps() {
    const allInputs = document.querySelectorAll('input[required], select[required], textarea[required]');
    let isValid = true;
    
    allInputs.forEach(input => {
        if (!validateField(input)) {
            isValid = false;
        }
    });
    
    return isValid;
}

function showLoadingState() {
    const submitBtn = document.getElementById('submitBtn');
    const loadingOverlay = document.getElementById('loadingOverlay');
    
    if (submitBtn) {
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
    }
    
    if (loadingOverlay) {
        loadingOverlay.classList.add('show');
    }
}

function hideLoadingState() {
    const submitBtn = document.getElementById('submitBtn');
    const loadingOverlay = document.getElementById('loadingOverlay');
    
    if (submitBtn) {
        submitBtn.classList.remove('loading');
        submitBtn.disabled = false;
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
    const inputs = document.querySelectorAll('.input-wrapper input, .input-wrapper select, .input-wrapper textarea');
    
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
    const registrationContainer = document.querySelector('.registration-container');
    
    if (width <= 768) {
        registrationContainer.style.padding = '24px';
        registrationContainer.style.borderRadius = '20px';
    } else {
        registrationContainer.style.padding = '40px';
        registrationContainer.style.borderRadius = '24px';
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
    
    .input-wrapper.focused input,
    .input-wrapper.focused select,
    .input-wrapper.focused textarea {
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    }
    
    .input-wrapper input.success,
    .input-wrapper select.success,
    .input-wrapper textarea.success {
        border-color: #10b981;
    }
    
    .input-wrapper input.error,
    .input-wrapper select.error,
    .input-wrapper textarea.error {
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
    
    .touch-device .input-wrapper input,
    .touch-device .input-wrapper select,
    .touch-device .input-wrapper textarea {
        font-size: 16px; /* Prevents zoom on iOS */
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
    if (e.key === 'Enter' && (e.target.tagName === 'INPUT' || e.target.tagName === 'SELECT' || e.target.tagName === 'TEXTAREA')) {
        const form = e.target.closest('form');
        if (form && validateAllSteps()) {
            form.submit();
        }
    }
});

console.log('Driver Registration JavaScript loaded successfully! 🚀'); 