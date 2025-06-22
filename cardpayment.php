<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if payment method was selected
    if (!isset($_POST['payment']) || empty($_POST['payment'])) {
        $error = "Please select a payment method first.";
    } else {
        // Validate and sanitize input data
        $cardType = isset($_POST['card']) ? trim($_POST['card']) : '';
        $cardNumber = isset($_POST['number']) ? trim($_POST['number']) : '';
        $cvv = isset($_POST['code']) ? trim($_POST['code']) : '';
        $expirationYear = isset($_POST['year']) ? trim($_POST['year']) : '';
        $expirationMonth = isset($_POST['month']) ? trim($_POST['month']) : '';
        $cardHolderName = isset($_POST['cardholder']) ? trim($_POST['cardholder']) : '';

        // Basic validation
        if (empty($cardType) || empty($cardNumber) || empty($cvv) || empty($expirationYear) || empty($expirationMonth) || empty($cardHolderName)) {
            $error = "All fields are required.";
        } elseif (!preg_match('/^\d{16}$/', $cardNumber)) {
            $error = "Please enter a valid 16-digit card number.";
        } elseif (!preg_match('/^\d{3,4}$/', $cvv)) {
            $error = "Please enter a valid CVV code.";
        } elseif (!preg_match('/^\d{4}$/', $expirationYear)) {
            $error = "Please enter a valid 4-digit year.";
        } elseif (!preg_match('/^\d{1,2}$/', $expirationMonth) || $expirationMonth < 1 || $expirationMonth > 12) {
            $error = "Please enter a valid month (1-12).";
        } else {
            // For demo purposes, we'll create a dummy PaymentID
            // In a real application, you would get this from the order process
            $paymentID = 1; // This should come from the actual order
            
            // Prepare the SQL statement with proper column names
            $sql = "INSERT INTO card_payments (PaymentID, CardType, CardNumber, CardHolderName, CVV, ExpirationMonth, ExpirationYear) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            // Use prepared statement to prevent SQL injection
            $stmt = mysqli_prepare($connection, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "issssii", $paymentID, $cardType, $cardNumber, $cardHolderName, $cvv, $expirationMonth, $expirationYear);
                
                if (mysqli_stmt_execute($stmt)) {
                    $success = "Payment processed successfully!";
                } else {
                    $error = "Error processing payment: " . mysqli_stmt_error($stmt);
                }
                mysqli_stmt_close($stmt);
            } else {
                $error = "Database error: " . mysqli_error($connection);
            }
        }
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Payment - FreshWash</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="css/cardpayment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'header.php' ?>
    <?php include 'order_Navigate.php' ?>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <div class="header-content">
                    <div class="header-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="header-text">
                        <h1>Card Payment</h1>
                        <p>Enter your card details to complete the payment</p>
                    </div>
                </div>
            </div>

            <!-- Error/Success Messages -->
            <?php if (isset($error)): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span><?php echo htmlspecialchars($success); ?></span>
                </div>
            <?php endif; ?>

            <!-- Payment Form -->
            <div class="payment-form-container">
                <div class="card-visual">
                    <div class="card-front">
                        <div class="card-header">
                            <div class="card-chip"></div>
                            <div class="card-type">
                                <i class="fas fa-credit-card"></i>
                            </div>
                        </div>
                        <div class="card-number" id="cardNumberDisplay">
                            <span>**** **** **** ****</span>
                        </div>
                        <div class="card-details">
                            <div class="card-holder">
                                <label>Card Holder</label>
                                <span id="cardHolderDisplay">YOUR NAME</span>
                            </div>
                            <div class="card-expiry">
                                <label>Expires</label>
                                <span id="cardExpiryDisplay">MM/YY</span>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="cardpayment.php" method="post" class="payment-form" id="paymentForm">
                    <div class="form-section">
                        <h3><i class="fas fa-credit-card"></i> Card Information</h3>
                        
                        <div class="form-group">
                            <label for="cardholder">Card Holder Name</label>
                            <input type="text" id="cardholder" name="cardholder" required 
                                   placeholder="Enter card holder name" maxlength="100"
                                   oninput="updateCardDisplay()">
                        </div>

                        <div class="form-group">
                            <label for="card">Card Type</label>
                            <select id="card" name="card" required onchange="updateCardDisplay()">
                                <option value="">Select card type</option>
                                <option value="Visa">Visa</option>
                                <option value="Mastercard">Mastercard</option>
                                <option value="American Express">American Express</option>
                                <option value="Discover">Discover</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="number">Card Number</label>
                            <input type="text" id="number" name="number" required 
                                   placeholder="1234 5678 9012 3456" maxlength="19"
                                   oninput="formatCardNumber(this)" onchange="updateCardDisplay()">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="month">Expiration Month</label>
                                <select id="month" name="month" required onchange="updateCardDisplay()">
                                    <option value="">MM</option>
                                    <?php for ($i = 1; $i <= 12; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="year">Expiration Year</label>
                                <select id="year" name="year" required onchange="updateCardDisplay()">
                                    <option value="">YYYY</option>
                                    <?php for ($i = date('Y'); $i <= date('Y') + 10; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="code">CVV</label>
                                <input type="text" id="code" name="code" required 
                                       placeholder="123" maxlength="4"
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="history.back()">
                            <i class="fas fa-arrow-left"></i>
                            Back
                        </button>
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-lock"></i>
                            Process Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include 'footer.php' ?>

    <!-- JavaScript -->
    <script>
        function formatCardNumber(input) {
            // Remove all non-digits
            let value = input.value.replace(/\D/g, '');
            
            // Add spaces every 4 digits
            value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
            
            input.value = value;
        }

        function updateCardDisplay() {
            const cardNumber = document.getElementById('number').value;
            const cardHolder = document.getElementById('cardholder').value;
            const month = document.getElementById('month').value;
            const year = document.getElementById('year').value;

            // Update card number display
            const cardNumberDisplay = document.getElementById('cardNumberDisplay');
            if (cardNumber) {
                cardNumberDisplay.innerHTML = `<span>${cardNumber}</span>`;
            } else {
                cardNumberDisplay.innerHTML = '<span>**** **** **** ****</span>';
            }

            // Update card holder display
            const cardHolderDisplay = document.getElementById('cardHolderDisplay');
            cardHolderDisplay.textContent = cardHolder || 'YOUR NAME';

            // Update expiry display
            const cardExpiryDisplay = document.getElementById('cardExpiryDisplay');
            if (month && year) {
                const formattedMonth = month.padStart(2, '0');
                const formattedYear = year.toString().slice(-2);
                cardExpiryDisplay.textContent = `${formattedMonth}/${formattedYear}`;
            } else {
                cardExpiryDisplay.textContent = 'MM/YY';
            }
        }

        // Form validation
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            const cardNumber = document.getElementById('number').value.replace(/\s/g, '');
            const cvv = document.getElementById('code').value;
            
            if (cardNumber.length !== 16) {
                e.preventDefault();
                alert('Please enter a valid 16-digit card number.');
                return;
            }
            
            if (cvv.length < 3 || cvv.length > 4) {
                e.preventDefault();
                alert('Please enter a valid CVV code (3-4 digits).');
                return;
            }
        });
    </script>
</body>
</html>