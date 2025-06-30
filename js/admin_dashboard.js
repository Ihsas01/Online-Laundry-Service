// Admin Dashboard JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initSidebar();
    initActiveMenu();
    initSearch();
    initNotifications();
    initUserMenu();
    initModals();
    initCharts();
    initAnimations();
    initTableActions();
    initStatistics();
    initDarkMode();
    initFloatingActionBtn();
    initGlobalLoading();
});

// Sidebar functionality
function initSidebar() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mainContent = document.querySelector('.main-content');
    
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            
            // Store state in localStorage
            localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
        });
    }
    
    // Restore sidebar state
    const sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    if (sidebarCollapsed) {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');
    }
    
    // Mobile sidebar toggle
    const menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            if (window.innerWidth <= 1024) {
                sidebar.classList.remove('active');
            }
        });
    });
}

// Set active menu item
function initActiveMenu() {
    const currentPage = window.location.pathname.split('/').pop();
    const menuItems = document.querySelectorAll('.sidebar-menu .menu-item');
    
    menuItems.forEach(item => {
        const itemPage = item.getAttribute('href').split('/').pop();
        if (itemPage === currentPage) {
            item.classList.add('active');
        }
    });
}

// Search functionality
function initSearch() {
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const tableRows = document.querySelectorAll('.data-table tbody tr');
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                    row.style.animation = 'fadeInUp 0.3s ease';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
}

// Notifications panel
function initNotifications() {
    const notificationBtn = document.getElementById('notificationBtn');
    const notificationPanel = document.getElementById('notificationPanel');
    const closeNotifications = document.getElementById('closeNotifications');
    const overlay = document.getElementById('overlay');
    
    if (notificationBtn) {
        notificationBtn.addEventListener('click', function() {
            notificationPanel.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }
    
    if (closeNotifications) {
        closeNotifications.addEventListener('click', closeNotificationPanel);
    }
    
    if (overlay) {
        overlay.addEventListener('click', function() {
            closeNotificationPanel();
            closeModal();
        });
    }
    
    function closeNotificationPanel() {
        notificationPanel.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }
}

// User menu dropdown
function initUserMenu() {
    const userMenuBtn = document.getElementById('userMenuBtn');
    const userDropdown = document.getElementById('userDropdown');
    
    if (userMenuBtn) {
        userMenuBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('active');
        });
    }
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function() {
        userDropdown.classList.remove('active');
    });
}

// Modal functionality
function initModals() {
    const addCustomerBtn = document.getElementById('addCustomerBtn');
    const addCustomerModal = document.getElementById('addCustomerModal');
    const closeModal = document.getElementById('closeModal');
    const cancelAdd = document.getElementById('cancelAdd');
    const modalForm = document.querySelector('.modal-form');
    
    if (addCustomerBtn) {
        addCustomerBtn.addEventListener('click', function() {
            addCustomerModal.classList.add('active');
            document.getElementById('overlay').classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }
    
    if (closeModal) {
        closeModal.addEventListener('click', closeModalFunction);
    }
    
    if (cancelAdd) {
        cancelAdd.addEventListener('click', closeModalFunction);
    }
    
    function closeModalFunction() {
        addCustomerModal.classList.remove('active');
        document.getElementById('overlay').classList.remove('active');
        document.body.style.overflow = '';
        modalForm.reset();
    }
    
    // Form submission
    if (modalForm) {
        modalForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const submitBtn = modalForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Adding...';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Show success message
                showNotification('Customer added successfully!', 'success');
                
                // Close modal
                closeModalFunction();
                
                // Reset button
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                
                // Refresh table (in real app, you'd update the DOM)
                location.reload();
            }, 1500);
        });
    }
}

// Charts initialization
function initCharts() {
    const ctx = document.getElementById('revenueChart');
    if (ctx) {
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue',
                    data: [12000, 19000, 15000, 25000, 22000, 30000],
                    borderColor: '#6366f1',
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#6366f1',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
        
        // Chart period controls
        const chartBtns = document.querySelectorAll('.chart-btn');
        chartBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                chartBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                
                // Update chart data based on period
                const period = this.dataset.period;
                updateChartData(chart, period);
            });
        });
    }
}

// Update chart data based on period
function updateChartData(chart, period) {
    const data = {
        week: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            data: [5000, 7000, 6000, 8000, 9000, 12000, 10000]
        },
        month: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            data: [25000, 30000, 28000, 35000]
        },
        year: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 32000, 35000, 40000, 38000, 45000]
        }
    };
    
    chart.data.labels = data[period].labels;
    chart.data.datasets[0].data = data[period].data;
    chart.update('active');
}

// Animate statistics numbers
function initStatistics() {
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalValue = parseInt(target.dataset.target);
                animateNumber(target, 0, finalValue, 2000);
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.5 });
    
    statNumbers.forEach(number => {
        observer.observe(number);
    });
}

// Animate number counting
function animateNumber(element, start, end, duration) {
    const startTime = performance.now();
    
    function updateNumber(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function
        const easeOutQuart = 1 - Math.pow(1 - progress, 4);
        const current = Math.floor(start + (end - start) * easeOutQuart);
        
        element.textContent = current.toLocaleString();
        
        if (progress < 1) {
            requestAnimationFrame(updateNumber);
        }
    }
    
    requestAnimationFrame(updateNumber);
}

// Table actions
function initTableActions() {
    const actionBtns = document.querySelectorAll('.action-btn');
    
    actionBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            
            const action = this.classList.contains('edit') ? 'edit' :
                          this.classList.contains('view') ? 'view' : 'delete';
            const row = this.closest('tr');
            const customerId = row.querySelector('td:first-child').textContent;
            
            handleTableAction(action, customerId, row);
        });
    });
}

// Handle table actions
function handleTableAction(action, customerId, row) {
    switch(action) {
        case 'edit':
            showNotification(`Editing customer ${customerId}`, 'info');
            // In real app, open edit modal
            break;
        case 'view':
            showNotification(`Viewing customer ${customerId}`, 'info');
            // In real app, open view modal
            break;
        case 'delete':
            if (confirm(`Are you sure you want to delete customer ${customerId}?`)) {
                // Show loading state
                row.style.opacity = '0.5';
                
                // Simulate API call
                setTimeout(() => {
                    row.remove();
                    showNotification('Customer deleted successfully!', 'success');
                }, 1000);
            }
            break;
    }
}

// Export functionality
function initExport() {
    const exportBtn = document.getElementById('exportBtn');
    if (exportBtn) {
        exportBtn.addEventListener('click', function() {
            // Show loading state
            this.innerHTML = '<i class="bx bx-loader-alt bx-spin"></i> Exporting...';
            this.disabled = true;
            
            // Simulate export process
            setTimeout(() => {
                showNotification('Data exported successfully!', 'success');
                this.innerHTML = '<i class="bx bx-download"></i> Export';
                this.disabled = false;
            }, 2000);
        });
    }
}

// Animations
function initAnimations() {
    // Intersection Observer for fade-in animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    // Observe elements with data-aos attribute
    const animatedElements = document.querySelectorAll('[data-aos]');
    animatedElements.forEach(el => {
        observer.observe(el);
    });
}

// Notification system
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="bx ${getNotificationIcon(type)}"></i>
            <span>${message}</span>
        </div>
        <button class="notification-close">
            <i class="bx bx-x"></i>
        </button>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${getNotificationColor(type)};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        z-index: 3000;
        display: flex;
        align-items: center;
        gap: 1rem;
        max-width: 400px;
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Close button functionality
    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.addEventListener('click', () => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    });
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }
    }, 5000);
}

// Helper functions for notifications
function getNotificationIcon(type) {
    const icons = {
        success: 'bx-check-circle',
        error: 'bx-x-circle',
        warning: 'bx-error',
        info: 'bx-info-circle'
    };
    return icons[type] || icons.info;
}

function getNotificationColor(type) {
    const colors = {
        success: '#10b981',
        error: '#ef4444',
        warning: '#f59e0b',
        info: '#3b82f6'
    };
    return colors[type] || colors.info;
}

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + K for search
    if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
        e.preventDefault();
        document.querySelector('.search-input').focus();
    }
    
    // Escape to close modals/panels
    if (e.key === 'Escape') {
        const modal = document.getElementById('addCustomerModal');
        const notificationPanel = document.getElementById('notificationPanel');
        
        if (modal.classList.contains('active')) {
            modal.classList.remove('active');
            document.getElementById('overlay').classList.remove('active');
            document.body.style.overflow = '';
        }
        
        if (notificationPanel.classList.contains('active')) {
            notificationPanel.classList.remove('active');
            document.getElementById('overlay').classList.remove('active');
            document.body.style.overflow = '';
        }
    }
});

// Initialize export functionality
initExport();

// Add some sample data for demonstration
function addSampleData() {
    // This would be replaced with actual API calls in a real application
    console.log('Dashboard initialized with sample data');
}

// Call sample data function
addSampleData();

function initDarkMode() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    if (!darkModeToggle) return;
    const icon = darkModeToggle.querySelector('i');
    const body = document.body;
    // Restore mode from localStorage
    if (localStorage.getItem('darkMode') === 'true') {
        body.classList.add('dark-mode');
        icon.classList.remove('bx-moon');
        icon.classList.add('bx-sun');
    }
    darkModeToggle.addEventListener('click', function() {
        body.classList.toggle('dark-mode');
        const isDark = body.classList.contains('dark-mode');
        localStorage.setItem('darkMode', isDark);
        if (isDark) {
            icon.classList.remove('bx-moon');
            icon.classList.add('bx-sun');
        } else {
            icon.classList.remove('bx-sun');
            icon.classList.add('bx-moon');
        }
    });
}

function initFloatingActionBtn() {
    const fab = document.getElementById('fab');
    if (!fab) return;
    fab.addEventListener('click', function() {
        // You can replace this with a modal or quick actions menu
        alert('Quick Actions: Add User, Add Order, etc.');
    });
}

function initGlobalLoading() {
    window.showGlobalLoading = function() {
        const overlay = document.getElementById('globalLoading');
        if (overlay) overlay.classList.add('active');
    };
    window.hideGlobalLoading = function() {
        const overlay = document.getElementById('globalLoading');
        if (overlay) overlay.classList.remove('active');
    };
} 