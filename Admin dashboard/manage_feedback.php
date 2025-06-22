<?php
include '../db_connect.php';

// Fetch all feedback with customer names
$query = "SELECT f.*, c.Name as CustomerName 
          FROM feedback f 
          LEFT JOIN customer c ON f.CustomerID = c.CustomerID 
          ORDER BY f.FeedbackDate DESC";
$feedback_result = mysqli_query($connection, $query);
$feedbacks = $feedback_result ? mysqli_fetch_all($feedback_result, MYSQLI_ASSOC) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Management - Laundry Admin</title>
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
                <li><a href="manage_delivery.php" class="menu-item"><i class='bx bxs-truck'></i><span>Delivery</span></a></li>
                <li class="active"><a href="manage_feedback.php" class="menu-item"><i class='bx bxs-comment-dots'></i><span>Feedback</span></a></li>
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
                <h1 class="page-title">Feedback Management</h1>
                <p class="page-subtitle">Review and manage customer feedback.</p>
            </div>
        </header>

        <div class="dashboard-content">
            <div class="table-section" data-aos="fade-up">
                <div class="section-header">
                    <h3>Customer Feedback</h3>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Feedback ID</th>
                                <th>Customer</th>
                                <th>Rating</th>
                                <th style="width: 40%;">Feedback</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($feedbacks)): ?>
                                <?php foreach ($feedbacks as $feedback): ?>
                                <tr>
                                    <td>#<?php echo $feedback['FeedbackID']; ?></td>
                                    <td><?php echo $feedback['CustomerName'] ?: 'N/A'; ?></td>
                                    <td>
                                        <div class="rating-stars">
                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                <i class='bx bxs-star <?php echo ($i < $feedback['Rating']) ? 'active' : ''; ?>'></i>
                                            <?php endfor; ?>
                                        </div>
                                    </td>
                                    <td><?php echo htmlspecialchars($feedback['FeedbackText']); ?></td>
                                    <td><?php echo date('M d, Y', strtotime($feedback['FeedbackDate'])); ?></td>
                                    <td><span class="status-badge <?php echo strtolower($feedback['Status']); ?>"><?php echo ucfirst($feedback['Status']); ?></span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn view" title="Approve"><i class='bx bx-check'></i></button>
                                            <button class="action-btn delete" title="Reject"><i class='bx bx-x'></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">No feedback found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <style>
        .rating-stars { display: flex; color: #e2e8f0; }
        .rating-stars .bxs-star.active { color: #f59e0b; }
    </style>
    <script src="../js/admin_dashboard.js"></script>
</body>
</html> 