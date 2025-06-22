<?php
include '../db_connect.php';

// Fetch all customers
$customers_result = mysqli_query($connection, "SELECT * FROM customer ORDER BY CustomerID DESC");
$customers = $customers_result ? mysqli_fetch_all($customers_result, MYSQLI_ASSOC) : [];

// Fetch all drivers
$drivers_result = mysqli_query($connection, "SELECT * FROM driver ORDER BY Driver_id DESC");
$drivers = $drivers_result ? mysqli_fetch_all($drivers_result, MYSQLI_ASSOC) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Laundry Admin</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin_dashboard_modern.css">
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <img src="logo4.png" alt="Laundry Logo">
                <h2>Laundry Admin</h2>
            </div>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class='bx bx-menu'></i>
            </button>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li><a href="admin_index.php" class="menu-item"><i class='bx bxs-dashboard'></i><span>Dashboard</span></a></li>
                <li class="active"><a href="manage_users.php" class="menu-item"><i class='bx bxs-user-detail'></i><span>Users</span></a></li>
                <li><a href="manage_orders.php" class="menu-item"><i class='bx bxs-shopping-bag'></i><span>Orders</span></a></li>
                <li><a href="manage_delivery.php" class="menu-item"><i class='bx bxs-truck'></i><span>Delivery</span></a></li>
                <li><a href="manage_feedback.php" class="menu-item"><i class='bx bxs-comment-dots'></i><span>Feedback</span></a></li>
                <li><a href="settings.php" class="menu-item"><i class='bx bxs-cog'></i><span>Settings</span></a></li>
            </ul>
        </div>

        <div class="sidebar-footer">
            <div class="admin-profile">
                <img src="../images/user.png" alt="Admin">
                <div>
                    <h4>Admin User</h4>
                    <p>Administrator</p>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navigation -->
        <header class="top-nav">
            <div class="nav-left">
                <h1 class="page-title">User Management</h1>
                <p class="page-subtitle">Manage registered customers and drivers.</p>
            </div>
            
            <div class="nav-right">
                <div class="search-container">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Search users..." class="search-input">
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
                            <a href="#"><i class='bx bx-user'></i> Profile</a>
                            <a href="#"><i class='bx bx-cog'></i> Settings</a>
                            <a href="../logout.php"><i class='bx bx-log-out'></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Users Content -->
        <div class="dashboard-content">
            <!-- Customers Table -->
            <div class="table-section" data-aos="fade-up">
                <div class="section-header">
                    <h3>Registered Customers</h3>
                    <div class="table-actions">
                        <button class="btn-primary" id="addCustomerBtn">
                            <i class='bx bx-plus'></i>
                            Add Customer
                        </button>
                    </div>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($customers)): ?>
                                <?php foreach ($customers as $customer): ?>
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
                                    <td><span class="status-badge <?php echo strtolower($customer['Status']); ?>"><?php echo ucfirst($customer['Status']); ?></span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn edit" title="Edit"><i class='bx bx-edit-alt'></i></button>
                                            <button class="action-btn view" title="View"><i class='bx bx-show'></i></button>
                                            <button class="action-btn delete" title="Delete"><i class='bx bx-trash'></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">No customers found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Drivers Table -->
            <div class="table-section" data-aos="fade-up" data-aos-delay="200">
                <div class="section-header">
                    <h3>Registered Drivers</h3>
                     <div class="table-actions">
                        <button class="btn-primary" id="addDriverBtn">
                            <i class='bx bx-plus'></i>
                            Add Driver
                        </button>
                    </div>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Vehicle</th>
                                <th>Vehicle No.</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php if (!empty($drivers)): ?>
                                <?php foreach ($drivers as $driver): ?>
                                <tr>
                                    <td>#<?php echo $driver['Driver_id']; ?></td>
                                    <td>
                                        <div class="customer-info">
                                            <img src="../images/driver.png" alt="Driver">
                                            <span><?php echo $driver['fname']; ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo $driver['phone']; ?></td>
                                    <td><?php echo $driver['email']; ?></td>
                                    <td><?php echo $driver['vehicle']; ?></td>
                                    <td><?php echo $driver['vnumber']; ?></td>
                                    <td><span class="status-badge <?php echo strtolower($driver['Status']); ?>"><?php echo ucfirst($driver['Status']); ?></span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn edit" title="Edit"><i class='bx bx-edit-alt'></i></button>
                                            <button class="action-btn view" title="View"><i class='bx bx-show'></i></button>
                                            <button class="action-btn delete" title="Delete"><i class='bx bx-trash'></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">No drivers found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="../js/admin_dashboard.js"></script>
</body>
</html> 