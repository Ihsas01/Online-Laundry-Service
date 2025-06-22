<?php
include '../db_connect.php';

// Fetch all orders with customer names
$query = "SELECT o.*, c.Name as CustomerName 
          FROM orders o 
          LEFT JOIN customer c ON o.CustomerID = c.CustomerID 
          ORDER BY o.OrderDate DESC";
$orders_result = mysqli_query($connection, $query);
$orders = $orders_result ? mysqli_fetch_all($orders_result, MYSQLI_ASSOC) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management - Laundry Admin</title>
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
                <li><a href="manage_users.php" class="menu-item"><i class='bx bxs-user-detail'></i><span>Users</span></a></li>
                <li class="active"><a href="manage_orders.php" class="menu-item"><i class='bx bxs-shopping-bag'></i><span>Orders</span></a></li>
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
        <header class="top-nav">
            <div class="nav-left">
                <h1 class="page-title">Order Management</h1>
                <p class="page-subtitle">View and manage all customer orders.</p>
            </div>
        </header>

        <div class="dashboard-content">
            <div class="table-section" data-aos="fade-up">
                <div class="section-header">
                    <h3>All Orders</h3>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($orders)): ?>
                                <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td>#<?php echo $order['OrderID']; ?></td>
                                    <td><?php echo $order['CustomerName'] ?: 'N/A'; ?></td>
                                    <td><?php echo date('M d, Y', strtotime($order['OrderDate'])); ?></td>
                                    <td>$<?php echo number_format($order['TotalAmount'], 2); ?></td>
                                    <td><span class="status-badge <?php echo strtolower($order['Status']); ?>"><?php echo ucfirst(str_replace('_', ' ', $order['Status'])); ?></span></td>
                                    <td><span class="status-badge <?php echo strtolower($order['PaymentStatus']); ?>"><?php echo ucfirst($order['PaymentStatus']); ?></span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn view" title="View Details"><i class='bx bx-show'></i></button>
                                            <button class="action-btn edit" title="Update Status"><i class='bx bx-edit-alt'></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">No orders found.</td>
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