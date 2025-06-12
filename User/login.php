<?php
session_start();
include("../connection.php");

$error_message = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Secure query with prepared statements to prevent SQL injection (optional but recommended)
    $stmt = $connection->prepare("SELECT User_name FROM User WHERE User_Email=? AND User_Password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['login'] = $row['User_name']; // Store username in session

        $target_file = "../src/dashboard.php";
        if (file_exists($target_file)) {
            header("Location: " . $target_file);
            exit();
        } else {
            $error_message = "Dashboard file not found at: " . realpath($target_file);
        }
    } else {
        $error_message = "Invalid credentials. Please check your email and password.";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
      
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: linear-gradient(135deg, #a8c8a8 0%, #8db88d 100%);
            border-radius: 20px;
            padding: 60px 50px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo img {
            max-width: 120px;
            height: auto;
            margin-bottom: 8px;
        }

        .logo {
            text-align: center;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #5a7a5a;
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .input-container {
            position: relative;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 0 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .input-container:focus-within {
            box-shadow: 0 6px 20px rgba(45, 90, 45, 0.2);
            transform: translateY(-2px);
        }

        .input-icon {
            color: #2d5a2d;
            font-size: 18px;
            margin-right: 15px;
            opacity: 0.7;
        }

        .form-input {
            width: 100%;
            padding: 18px 0;
            border: none;
            background: transparent;
            font-size: 16px;
            color: #333;
            outline: none;
        }

        .form-input::placeholder {
            color: #888;
            opacity: 0.8;
        }

        .password-toggle {
            cursor: pointer;
            color: #2d5a2d;
            font-size: 18px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .password-toggle:hover {
            opacity: 1;
        }

        .login-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #4a7c4a 0%, #2d5a2d 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(45, 90, 45, 0.3);
            margin-top: 20px;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(45, 90, 45, 0.4);
        }

        .login-btn:active {
            transform: translateY(-1px);
        }

        .error-message {
            background: rgba(220, 53, 69, 0.1);
            color: #d73545;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #d73545;
            font-size: 14px;
        }

        .success-message {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #28a745;
            font-size: 14px;
        }

        .create-account-btn {
            background: #6c757d;
            margin-top: 10px;
            text-align: center;
            display: block;
            padding: 16px;
            color: white;
            border-radius: 12px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .create-account-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 40px 30px;
            }

            .logo img {
                max-width: 100px;
            }
        }
    
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <div class="logo">
                <img src="../src/img/nobgLogo.png" alt="ZENITH" />
            </div>
            <div class="subtitle">Login to Access Admin Dashboard</div>
        </div>

        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <div class="input-container">
                    <span class="input-icon">✉</span>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-input" 
                        placeholder="Hello@example.com"
                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                        required
                    >
                </div>
            </div>
            <div class="form-group">
                <div class="input-container">
                    <span class="input-icon">🔒</span>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="form-input" 
                        placeholder="••••••••••••••••"
                        required
                    >
                    <span class="password-toggle" onclick="togglePassword()">👁</span>
                </div>
            </div>
            <button type="submit" name="login" class="login-btn">Login</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.textContent = '👁‍🗨';
            } else {
                passwordField.type = 'password';
                toggleIcon.textContent = '👁';
            }
        }
    </script>
</body>
</html>
