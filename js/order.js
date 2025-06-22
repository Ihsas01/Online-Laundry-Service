// Initialize AOS (Animate On Scroll)
AOS.init({
    duration: 1000,
    easing: 'ease-in-out',
    once: true,
    offset: 100
});

// Order Management System
class OrderManager {
    constructor() {
        this.items = {};
        this.serviceFee = 2.00;
        this.init();
    }
    
    init() {
        this.loadFromStorage();
        this.updateDisplay();
        this.setupEventListeners();
    }
    
    setupEventListeners() {
        // Category tab switching
        const categoryTabs = document.querySelectorAll('.category-tab');
        categoryTabs.forEach(tab => {
            tab.addEventListener('click', () => this.switchCategory(tab));
        });
        
        // Item card interactions
        const itemCards = document.querySelectorAll('.item-card');
        itemCards.forEach(card => {
            card.addEventListener('click', (e) => {
                if (!e.target.closest('.qty-btn')) {
                    this.addItem(card.dataset.item, 1);
                }
            });
        });
    }
    
    switchCategory(selectedTab) {
        // Remove active class from all tabs
        document.querySelectorAll('.category-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        
        // Add active class to selected tab
        selectedTab.classList.add('active');
        
        // Show/hide appropriate items (for future implementation)
        const category = selectedTab.dataset.category;
        this.showCategoryItems(category);
    }
    
    showCategoryItems(category) {
        // This would show different items based on category
        // For now, we'll just animate the transition
        const itemsGrid = document.querySelector('.items-grid');
        itemsGrid.style.opacity = '0';
        
        setTimeout(() => {
            itemsGrid.style.opacity = '1';
        }, 300);
    }
    
    addItem(itemId, quantity) {
        if (!this.items[itemId]) {
            this.items[itemId] = 0;
        }
        
        this.items[itemId] += quantity;
        
        if (this.items[itemId] < 0) {
            this.items[itemId] = 0;
        }
        
        this.updateQuantityDisplay(itemId);
        this.updateSummary();
        this.saveToStorage();
        this.showNotification(`Item ${this.getItemName(itemId)} ${quantity > 0 ? 'added' : 'removed'} successfully!`);
    }
    
    removeItem(itemId) {
        if (this.items[itemId]) {
            delete this.items[itemId];
            this.updateQuantityDisplay(itemId);
            this.updateSummary();
            this.saveToStorage();
            this.showNotification('Item removed from order');
        }
    }
    
    clearAllItems() {
        this.items = {};
        this.updateDisplay();
        this.saveToStorage();
        this.showNotification('All items cleared');
    }
    
    updateQuantityDisplay(itemId) {
        const qtyElement = document.getElementById(`${itemId}-qty`);
        if (qtyElement) {
            const quantity = this.items[itemId] || 0;
            qtyElement.textContent = quantity;
            
            // Update button states
            const minusBtn = qtyElement.parentElement.querySelector('.minus');
            if (minusBtn) {
                minusBtn.disabled = quantity <= 0;
            }
        }
    }
    
    updateSummary() {
        const summaryItems = document.getElementById('summary-items');
        const subtotalElement = document.getElementById('subtotal');
        const totalElement = document.getElementById('total');
        const proceedBtn = document.getElementById('proceed-btn');
        
        let subtotal = 0;
        let hasItems = false;
        
        // Clear current summary
        summaryItems.innerHTML = '';
        
        // Add items to summary
        Object.keys(this.items).forEach(itemId => {
            const quantity = this.items[itemId];
            if (quantity > 0) {
                hasItems = true;
                const price = this.getItemPrice(itemId);
                const itemTotal = price * quantity;
                subtotal += itemTotal;
                
                this.addSummaryItem(itemId, quantity, price, itemTotal);
            }
        });
        
        // Show empty state if no items
        if (!hasItems) {
            summaryItems.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-shopping-bag"></i>
                    <p>No items selected yet</p>
                    <span>Add items to your order to get started</span>
                </div>
            `;
        }
        
        // Update totals
        const total = subtotal + this.serviceFee;
        
        if (subtotalElement) subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
        if (totalElement) totalElement.textContent = `$${total.toFixed(2)}`;
        
        // Enable/disable proceed button
        if (proceedBtn) {
            proceedBtn.disabled = !hasItems;
        }
    }
    
    addSummaryItem(itemId, quantity, price, total) {
        const summaryItems = document.getElementById('summary-items');
        const itemName = this.getItemName(itemId);
        const itemImage = this.getItemImage(itemId);
        
        const summaryItem = document.createElement('div');
        summaryItem.className = 'summary-item';
        summaryItem.innerHTML = `
            <div class="item-details">
                <img src="${itemImage}" alt="${itemName}">
                <div class="item-info-text">
                    <h4>${itemName}</h4>
                    <p class="item-price">$${price.toFixed(2)} each</p>
                </div>
            </div>
            <div class="item-actions">
                <span class="item-qty">Qty: ${quantity}</span>
                <span class="item-total">$${total.toFixed(2)}</span>
                <button class="remove-item" onclick="orderManager.removeItem('${itemId}')">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        
        summaryItems.appendChild(summaryItem);
    }
    
    getItemName(itemId) {
        const itemNames = {
            'tshirt': 'T-Shirt',
            'shirt': 'Dress Shirt',
            'pants': 'Pants',
            'dress': 'Dress',
            'jacket': 'Jacket',
            'sweater': 'Sweater'
        };
        return itemNames[itemId] || itemId;
    }
    
    getItemPrice(itemId) {
        const itemCard = document.querySelector(`[data-item="${itemId}"]`);
        return itemCard ? parseFloat(itemCard.dataset.price) : 0;
    }
    
    getItemImage(itemId) {
        const itemCard = document.querySelector(`[data-item="${itemId}"]`);
        if (itemCard) {
            const img = itemCard.querySelector('img');
            return img ? img.src : 'images/t-shirt.png';
        }
        return 'images/t-shirt.png';
    }
    
    updateDisplay() {
        Object.keys(this.items).forEach(itemId => {
            this.updateQuantityDisplay(itemId);
        });
        this.updateSummary();
    }
    
    saveToStorage() {
        localStorage.setItem('laundryOrder', JSON.stringify(this.items));
    }
    
    loadFromStorage() {
        const saved = localStorage.getItem('laundryOrder');
        if (saved) {
            this.items = JSON.parse(saved);
        }
    }
    
    showNotification(message) {
        const notification = document.getElementById('notification');
        const messageElement = document.getElementById('notification-message');
        
        if (notification && messageElement) {
            messageElement.textContent = message;
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
    }
    
    saveOrder() {
        // Save current order to localStorage (already done in addItem)
        this.showNotification('Order saved successfully!');
    }
    
    proceedToNext() {
        if (Object.keys(this.items).length > 0) {
            // Navigate to next step
            window.location.href = 'add_&_con.php';
        }
    }
}

// Global functions for onclick handlers
function updateQuantity(itemId, change) {
    orderManager.addItem(itemId, change);
}

function clearAllItems() {
    orderManager.clearAllItems();
}

function saveOrder() {
    orderManager.saveOrder();
}

function proceedToNext() {
    orderManager.proceedToNext();
}

// Initialize order manager when DOM is loaded
let orderManager;

document.addEventListener('DOMContentLoaded', () => {
    orderManager = new OrderManager();
    
    // Add smooth scrolling
    document.documentElement.style.scrollBehavior = 'smooth';
    
    // Add loading animation for images
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        img.addEventListener('load', () => {
            img.style.opacity = '1';
        });
        
        img.style.opacity = '0';
        img.style.transition = 'opacity 0.3s ease';
    });
    
    // Add hover effects for interactive elements
    const interactiveElements = document.querySelectorAll('.item-card, .category-tab, .action-card');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            element.style.transform = element.style.transform + ' scale(1.02)';
        });
        
        element.addEventListener('mouseleave', () => {
            element.style.transform = element.style.transform.replace(' scale(1.02)', '');
        });
    });
    
    // Add keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            // Close any open modals or notifications
            const notification = document.getElementById('notification');
            if (notification) {
                notification.classList.remove('show');
            }
        }
    });
    
    // Add touch support for mobile
    let touchStartX = 0;
    let touchEndX = 0;
    
    document.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });
    
    document.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });
    
    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;
        
        if (Math.abs(diff) > swipeThreshold) {
            // Handle swipe gestures if needed
            console.log('Swipe detected:', diff > 0 ? 'left' : 'right');
        }
    }
});

// Performance optimization: Debounce scroll events
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

// Apply debouncing to scroll events
window.addEventListener('scroll', debounce(() => {
    // Any scroll-based functionality can be added here
}, 16));

// Add service worker for offline functionality (future enhancement)
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(registration => {
                console.log('SW registered: ', registration);
            })
            .catch(registrationError => {
                console.log('SW registration failed: ', registrationError);
            });
    });
}

// Export for global access
window.orderManager = orderManager; 