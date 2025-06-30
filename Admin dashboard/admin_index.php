<?php 
include '../db_connect.php';

// Fetch statistics for dashboard
$stats = array();

// Total customers
$stats['customers'] = 0;
$query = "SELECT COUNT(*) as total FROM customer";
$result = mysqli_query($connection, $query);
if ($result) {
    $stats['customers'] = mysqli_fetch_assoc($result)['total'];
}

// Total orders (check if table exists first)
$stats['orders'] = 0;
$query = "SHOW TABLES LIKE 'orders'";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    $query = "SELECT COUNT(*) as total FROM orders";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $stats['orders'] = mysqli_fetch_assoc($result)['total'];
    }
}

// Recent orders (with error handling)
$recent_orders = null;
$query = "SHOW TABLES LIKE 'orders'";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    $query = "SELECT o.*, c.Name as CustomerName FROM orders o 
              LEFT JOIN customer c ON o.CustomerID = c.CustomerID 
              ORDER BY o.OrderDate DESC LIMIT 5";
    $recent_orders = mysqli_query($connection, $query);
    if (!$recent_orders) {
        $recent_orders = null;
    }
}

// Customer data for table
$query = "SELECT * FROM customer ORDER BY CustomerID DESC LIMIT 10";
$customers = mysqli_query($connection, $query);
if (!$customers) {
    $customers = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Laundry Service</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin_dashboard_modern.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include '_sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content animated-gradient-bg">
        <?php include '_header.php'; ?>

        <!-- Welcome Banner -->
        <section class="welcome-banner" data-aos="fade-down">
            <div class="banner-icon">
                <i class='bx bxs-star'></i>
            </div>
            <div class="banner-content">
                <h2>Welcome, Admin!</h2>
                <p>Manage your laundry business with style. All your key stats and actions are here at a glance.</p>
            </div>
            <button class="dark-mode-toggle" id="darkModeToggle" title="Toggle dark mode">
                <i class='bx bx-moon'></i>
            </button>
        </section>

        <!-- Top Navigation -->
        <header class="top-nav">
            <div class="nav-left">
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Welcome back! Here's what's happening today.</p>
            </div>
            
            <div class="nav-right">
                <div class="search-container">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Search..." class="search-input">
                </div>
                
                <div class="nav-actions">
                    <button class="notification-btn" id="notificationBtn">
                        <i class='bx bx-bell'></i>
                        <span class="notification-badge">3</span>
                    </button>
                    
                    <div class="user-menu">
                        <button class="user-btn" id="userMenuBtn">
                            <img src="../images/user.png" alt="User">
                            <span>Admin</span>
                            <i class='bx bx-chevron-down'></i>
                        </button>
                        <div class="user-dropdown" id="userDropdown">
                            <a href="admin_profile.php"><i class='bx bx-user'></i> Profile</a>
                            <a href="#"><i class='bx bx-cog'></i> Settings</a>
                            <a href="../logout.php"><i class='bx bx-log-out'></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Statistics Cards -->
            <div class="stats-grid" data-aos="fade-up">
                <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-icon customers">
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number" data-target="<?php echo $stats['customers']; ?>">0</h3>
                        <p class="stat-label">Total Customers</p>
                        <span class="stat-change positive">
                            <i class='bx bx-up-arrow-alt'></i>
                            12% from last month
                        </span>
                    </div>
                </div>

                <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-icon orders">
                        <i class='bx bxs-shopping-bag'></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number" data-target="<?php echo $stats['orders']; ?>">0</h3>
                        <p class="stat-label">Total Orders</p>
                        <span class="stat-change positive">
                            <i class='bx bx-up-arrow-alt'></i>
                            8% from last month
                        </span>
                    </div>
                </div>

                <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-icon revenue">
                        <i class='bx bxs-dollar-circle'></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number" data-target="15420">0</h3>
                        <p class="stat-label">Revenue</p>
                        <span class="stat-change positive">
                            <i class='bx bx-up-arrow-alt'></i>
                            15% from last month
                        </span>
                    </div>
                </div>

                <div class="stat-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-icon pending">
                        <i class='bx bxs-time'></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number" data-target="23">0</h3>
                        <p class="stat-label">Pending Orders</p>
                        <span class="stat-change negative">
                            <i class='bx bx-down-arrow-alt'></i>
                            3% from last month
                        </span>
                    </div>
                </div>
            </div>

            <!-- Charts and Tables Section -->
            <div class="dashboard-grid">
                <!-- Chart Section -->
                <div class="chart-section" data-aos="fade-up" data-aos-delay="500">
                    <div class="section-header">
                        <h3>Revenue Overview</h3>
                        <div class="chart-controls">
                            <button class="chart-btn active" data-period="week">Week</button>
                            <button class="chart-btn" data-period="month">Month</button>
                            <button class="chart-btn" data-period="year">Year</button>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="recent-orders" data-aos="fade-up" data-aos-delay="600">
                    <div class="section-header">
                        <h3>Recent Orders</h3>
                        <a href="#" class="view-all">View All</a>
                    </div>
                    <div class="orders-list">
                        <?php if ($recent_orders && mysqli_num_rows($recent_orders) > 0): ?>
                            <?php while($order = mysqli_fetch_assoc($recent_orders)): ?>
                            <div class="order-item">
                                <div class="order-info">
                                    <h4>Order #<?php echo $order['OrderID']; ?></h4>
                                    <p><?php echo $order['CustomerName'] ?: 'Unknown Customer'; ?></p>
                                </div>
                                <div class="order-status">
                                    <span class="status-badge <?php echo strtolower($order['Status']); ?>">
                                        <?php echo ucfirst($order['Status']); ?>
                                    </span>
                                </div>
                                <div class="order-amount">
                                    $<?php echo number_format($order['TotalAmount'], 2); ?>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="no-data">
                                <i class='bx bx-package'></i>
                                <p>No recent orders</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Customers Table -->
            <div class="table-section" data-aos="fade-up" data-aos-delay="700">
                <div class="section-header">
                    <h3>Recent Customers</h3>
                    <div class="table-actions">
                        <button class="btn-secondary" id="exportBtn">
                            <i class='bx bx-download'></i>
                            Export
                        </button>
                        <button class="btn-primary" id="addCustomerBtn">
                            <i class='bx bx-plus'></i>
                            Add Customer
                        </button>
                        <button class="btn-primary" id="addAdminBtn">
                            <i class='bx bx-user-plus'></i>
                            Add Admin
                        </button>
                    </div>
                </div>
                
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($customers): ?>
                                <?php while ($customer = mysqli_fetch_assoc($customers)): ?>
                                <tr>
                                    <td>#<?php echo $customer['CustomerID']; ?></td>
                                    <td>
                                        <div class="customer-info">
                                            <img src="../images/user.png" alt="Customer">
                                            <span><?php echo $customer['Name']; ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo $customer['UserName']; ?></td>
                                    <td><?php echo $customer['PhoneNumber']; ?></td>
                                    <td><?php echo $customer['Email']; ?></td>
                                    <td><?php echo substr($customer['Address'], 0, 30) . '...'; ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn edit" title="Edit">
                                                <i class='bx bx-edit-alt'></i>
                                            </button>
                                            <button class="action-btn view" title="View">
                                                <i class='bx bx-show'></i>
                                            </button>
                                            <button class="action-btn delete" title="Delete">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">No customers found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="floating-action-btn" id="fab" title="Quick Actions">
                <i class='bx bx-plus'></i>
            </div>
            <div class="global-loading-overlay" id="globalLoading">
                <div class="spinner"></div>
            </div>
        </div>
    </main>

    <!-- Add Customer Modal -->
    <div class="modal" id="addCustomerModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Customer</h3>
                <button class="modal-close" id="closeModal">
                    <i class='bx bx-x'></i>
                </button>
            </div>
            <form class="modal-form">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" rows="3" required></textarea>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" id="cancelAdd">Cancel</button>
                    <button type="submit" class="btn-primary">Add Customer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Notification Panel -->
    <div class="notification-panel" id="notificationPanel">
        <div class="notification-header">
            <h3>Notifications</h3>
            <button class="notification-close" id="closeNotifications">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <div class="notification-list">
            <div class="notification-item">
                <div class="notification-icon">
                    <i class='bx bx-shopping-bag'></i>
                </div>
                <div class="notification-content">
                    <h4>New Order Received</h4>
                    <p>Order #1234 has been placed by John Doe</p>
                    <span class="notification-time">2 minutes ago</span>
                </div>
            </div>
            <div class="notification-item">
                <div class="notification-icon">
                    <i class='bx bx-user-plus'></i>
                </div>
                <div class="notification-content">
                    <h4>New Customer Registration</h4>
                    <p>Jane Smith has registered for an account</p>
                    <span class="notification-time">15 minutes ago</span>
                </div>
            </div>
            <div class="notification-item">
                <div class="notification-icon">
                    <i class='bx bx-message-rounded'></i>
                </div>
                <div class="notification-content">
                    <h4>New Feedback</h4>
                    <p>You have received new customer feedback</p>
                    <span class="notification-time">1 hour ago</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Add Admin Modal -->
    <div class="modal" id="addAdminModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Admin</h3>
                <button class="modal-close" id="closeAdminModal">
                    <i class='bx bx-x'></i>
                </button>
            </div>
            <form class="modal-form" id="addAdminForm" method="POST" action="add_admin.php">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" required>
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                        <option value="manager">Manager</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" id="cancelAddAdmin">Cancel</button>
                    <button type="submit" class="btn-primary">Add Admin</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/admin_dashboard.js"></script>
    <script>
    // Modal open/close logic using 'active' class for popup effect
    const addAdminBtn = document.getElementById('addAdminBtn');
    const addAdminModal = document.getElementById('addAdminModal');
    const closeAdminModal = document.getElementById('closeAdminModal');
    const cancelAddAdmin = document.getElementById('cancelAddAdmin');

    addAdminBtn.onclick = function() {
        addAdminModal.classList.add('active');
    };
    closeAdminModal.onclick = function() {
        addAdminModal.classList.remove('active');
    };
    cancelAddAdmin.onclick = function() {
        addAdminModal.classList.remove('active');
    };
    window.onclick = function(event) {
        if (event.target === addAdminModal) {
            addAdminModal.classList.remove('active');
        }
    };
    </script>
</body>
</html>