<?php
include '../db_connect.php';

// Fetch all settings
$settings_result = mysqli_query($connection, "SELECT * FROM app_settings");
$settings = $settings_result ? mysqli_fetch_all($settings_result, MYSQLI_ASSOC) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Laundry Admin</title>
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
                <li><a href="manage_feedback.php" class="menu-item"><i class='bx bxs-comment-dots'></i><span>Feedback</span></a></li>
                <li class="active"><a href="settings.php" class="menu-item"><i class='bx bxs-cog'></i><span>Settings</span></a></li>
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
                <h1 class="page-title">Application Settings</h1>
                <p class="page-subtitle">Manage general application settings.</p>
            </div>
        </header>

        <div class="dashboard-content">
            <div class="table-section" data-aos="fade-up">
                <div class="section-header">
                    <h3>General Settings</h3>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Setting</th>
                                <th>Value</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($settings)): ?>
                                <?php foreach ($settings as $setting): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($setting['SettingKey']); ?></td>
                                    <td>
                                        <input type="text" class="setting-input" value="<?php echo htmlspecialchars($setting['SettingValue']); ?>" data-key="<?php echo $setting['SettingKey']; ?>">
                                    </td>
                                    <td><?php echo htmlspecialchars($setting['Description']); ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn edit" title="Save"><i class='bx bx-save'></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">No application settings found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <style>
        .setting-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            background: var(--bg-tertiary);
        }
    </style>
    <script src="../js/admin_dashboard.js"></script>
</body>
</html> 