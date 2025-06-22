<?php

include'db_connect.php';

session_start();

if (!isset($_SESSION['CustomerID'])) {
    header('Location: login.php');
    exit(); 
}
    $user_id = $_SESSION['CustomerID'];


    $sql = "SELECT * FROM customer WHERE CustomerID= $user_id";
    $result = mysqli_query($connection, $sql);

    if(!$result){
        die('QUERY FAILED').mysqli_connect_error();
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row['Name'];
        $email = $row['Email'];
        $phone = $row['PhoneNumber'];
        $address = $row['Address'];
        
    } else {
        echo "User not found";
    }

// Close database connection
$connection->close();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - FreshWash</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="css/user_1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <?php include 'header.php' ?>
    
    <!-- Main Content -->
    <main class="profile-container">
        <!-- Profile Header Section -->
        <section class="profile-header" data-aos="fade-down">
            <div class="profile-cover">
                <div class="profile-avatar">
                    <div class="avatar-wrapper">
                        <img src="images/user.png" alt="User Avatar" class="avatar-image">
                        <div class="avatar-overlay">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                    <div class="profile-status">
                        <span class="status-dot"></span>
                        <span class="status-text">Online</span>
                    </div>
                </div>
                <div class="profile-info">
                    <h1 class="profile-name"><?php echo htmlspecialchars($fname); ?></h1>
                    <p class="profile-email"><?php echo htmlspecialchars($email); ?></p>
                    <div class="profile-stats">
                        <div class="stat-item">
                            <span class="stat-number">12</span>
                            <span class="stat-label">Orders</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">4.8</span>
                            <span class="stat-label">Rating</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">2</span>
                            <span class="stat-label">Years</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Profile Content -->
        <div class="profile-content">
            <!-- Personal Information Card -->
            <section class="info-card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-header">
                    <i class="fas fa-user-circle"></i>
                    <h2>Personal Information</h2>
                    <button class="edit-btn" id="editPersonalBtn">
                        <i class="fas fa-edit"></i>
                        Edit
                    </button>
                </div>
                <div class="card-body">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-user"></i>
                                <span>Full Name</span>
                            </div>
                            <div class="info-value"><?php echo htmlspecialchars($fname); ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-envelope"></i>
                                <span>Email Address</span>
                            </div>
                            <div class="info-value"><?php echo htmlspecialchars($email); ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-phone"></i>
                                <span>Phone Number</span>
                            </div>
                            <div class="info-value"><?php echo htmlspecialchars($phone); ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Address</span>
                            </div>
                            <div class="info-value"><?php echo htmlspecialchars($address); ?></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Account Settings Card -->
            <section class="info-card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-header">
                    <i class="fas fa-cog"></i>
                    <h2>Account Settings</h2>
                </div>
                <div class="card-body">
                    <div class="settings-grid">
                        <a href="changepw.php" class="setting-item">
                            <div class="setting-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="setting-content">
                                <h3>Change Password</h3>
                                <p>Update your account password</p>
                            </div>
                            <div class="setting-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="order.php" class="setting-item">
                            <div class="setting-icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="setting-content">
                                <h3>My Orders</h3>
                                <p>View and track your orders</p>
                            </div>
                            <div class="setting-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="contact_us.php" class="setting-item">
                            <div class="setting-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="setting-content">
                                <h3>Support</h3>
                                <p>Get help and contact support</p>
                            </div>
                            <div class="setting-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="logout.php" class="setting-item logout-item">
                            <div class="setting-icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <div class="setting-content">
                                <h3>Logout</h3>
                                <p>Sign out of your account</p>
                            </div>
                            <div class="setting-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Recent Activity Card -->
            <section class="info-card" data-aos="fade-up" data-aos-delay="300">
                <div class="card-header">
                    <i class="fas fa-history"></i>
                    <h2>Recent Activity</h2>
                </div>
                <div class="card-body">
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="activity-content">
                                <h4>Order Completed</h4>
                                <p>Your laundry order #1234 has been delivered</p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="activity-content">
                                <h4>Order in Transit</h4>
                                <p>Your order #1235 is on its way</p>
                                <span class="activity-time">1 day ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="activity-content">
                                <h4>Review Submitted</h4>
                                <p>You rated your recent service 5 stars</p>
                                <span class="activity-time">3 days ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Edit Profile Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Profile</h2>
                <button class="modal-close" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="edit-form">
                    <div class="form-group">
                        <label for="editName">Full Name</label>
                        <input type="text" id="editName" value="<?php echo htmlspecialchars($fname); ?>">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email</label>
                        <input type="email" id="editEmail" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                    <div class="form-group">
                        <label for="editPhone">Phone Number</label>
                        <input type="tel" id="editPhone" value="<?php echo htmlspecialchars($phone); ?>">
                    </div>
                    <div class="form-group">
                        <label for="editAddress">Address</label>
                        <textarea id="editAddress"><?php echo htmlspecialchars($address); ?></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" id="cancelEdit">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner">
            <i class="fas fa-spinner fa-spin"></i>
        </div>
    </div>

    <?php include 'footer.php' ?>

    <!-- JavaScript Libraries -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // DOM Elements
        const editPersonalBtn = document.getElementById('editPersonalBtn');
        const editModal = document.getElementById('editModal');
        const closeModal = document.getElementById('closeModal');
        const cancelEdit = document.getElementById('cancelEdit');
        const editForm = document.querySelector('.edit-form');
        const loadingOverlay = document.getElementById('loadingOverlay');

        // Modal functionality
        editPersonalBtn.addEventListener('click', () => {
            editModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        function closeModalFunc() {
            editModal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        closeModal.addEventListener('click', closeModalFunc);
        cancelEdit.addEventListener('click', closeModalFunc);

        // Close modal when clicking outside
        editModal.addEventListener('click', (e) => {
            if (e.target === editModal) {
                closeModalFunc();
            }
        });

        // Form submission
        editForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Show loading
            loadingOverlay.classList.add('active');
            
            // Simulate API call
            setTimeout(() => {
                loadingOverlay.classList.remove('active');
                closeModalFunc();
                
                // Show success message
                showNotification('Profile updated successfully!', 'success');
            }, 2000);
        });

        // Notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => notification.classList.add('show'), 100);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Avatar upload functionality
        const avatarWrapper = document.querySelector('.avatar-wrapper');
        avatarWrapper.addEventListener('click', () => {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = (e) => {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        document.querySelector('.avatar-image').src = e.target.result;
                        showNotification('Profile picture updated!', 'success');
                    };
                    reader.readAsDataURL(file);
                }
            };
            input.click();
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add hover effects to setting items
        document.querySelectorAll('.setting-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(10px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        // Add click effects to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>
</body>
</html>

