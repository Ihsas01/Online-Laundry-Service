<?php
include '../db_connect.php';

// Fetch all orders with customer and driver details
$query = "SELECT o.OrderID, o.PickupDate, o.DeliveryDate, o.Status, c.Name as CustomerName, c.Address as CustomerAddress, d.fname as DriverName 
          FROM orders o 
          LEFT JOIN customer c ON o.CustomerID = c.CustomerID 
          LEFT JOIN driver d ON o.DriverID = d.Driver_id 
          ORDER BY o.OrderDate DESC";
$deliveries_result = mysqli_query($connection, $query);
$deliveries = $deliveries_result ? mysqli_fetch_all($deliveries_result, MYSQLI_ASSOC) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Management - Laundry Admin</title>
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
                <li><a href="manage_orders.php" class="menu-item"><i class='bx bxs-shopping-bag'></i><span>Orders</span></a></li>
                <li class="active"><a href="manage_delivery.php" class="menu-item"><i class='bx bxs-truck'></i><span>Delivery</span></a></li>
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
                <h1 class="page-title">Delivery Management</h1>
                <p class="page-subtitle">Monitor and manage all order deliveries.</p>
            </div>
        </header>

        <div class="dashboard-content">
            <div class="table-section" data-aos="fade-up">
                <div class="section-header">
                    <h3>Delivery Status</h3>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Driver</th>
                                <th>Pickup Date</th>
                                <th>Delivery Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($deliveries)): ?>
                                <?php foreach ($deliveries as $delivery): ?>
                                <tr>
                                    <td>#<?php echo $delivery['OrderID']; ?></td>
                                    <td><?php echo $delivery['CustomerName'] ?: 'N/A'; ?></td>
                                    <td><?php echo $delivery['DriverName'] ?: 'Not Assigned'; ?></td>
                                    <td><?php echo date('M d, Y', strtotime($delivery['PickupDate'])); ?></td>
                                    <td><?php echo date('M d, Y', strtotime($delivery['DeliveryDate'])); ?></td>
                                    <td><span class="status-badge <?php echo strtolower($delivery['Status']); ?>"><?php echo ucfirst(str_replace('_', ' ', $delivery['Status'])); ?></span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn view" title="View Details"><i class='bx bx-show'></i></button>
                                            <button class="action-btn edit" title="Assign Driver"><i class='bx bxs-user-plus'></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">No deliveries found.</td>
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