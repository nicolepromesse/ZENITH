<?php
// Process form submission BEFORE any HTML output
session_start();
include("../connection.php");

$error_message = "";
$success_message = "";

if(isset($_POST['login'])){
    header("location:login.php");
    exit();
}

if(isset($_POST['create'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $insert = "insert into User() values (NULL,'$username','$email','$password')";
    $join = mysqli_query($connection, $insert);
    
    if($join == 1){
        header("location:login.php");
        exit();
    } else {
        $error_message = "Data not inserted. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Account</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            background: #0a0a0a;
        }

        /* Animated Green Background */
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /* background: linear-gradient(45deg, #0d4d3d, #1a5f4a, #1e7e5f, #2d8f6f); */
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        .background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(46, 204, 113, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(39, 174, 96, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(52, 152, 219, 0.2) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(46, 204, 113, 0.1);
            animation: floatUpDown 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 20%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 20%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 10%;
            animation-delay: 4s;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(5deg); }
            66% { transform: translateY(-10px) rotate(-5deg); }
        }

        @keyframes floatUpDown {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Main Container */
        .main-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 50px;
            border-radius: 25px;
            box-shadow: 
                0 25px 45px rgba(0, 0, 0, 0.3),
                0 0 80px rgba(46, 204, 113, 0.2);
            width: 100%;
            max-width: 450px;
            border: 1px solid rgba(46, 204, 113, 0.3);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(46, 204, 113, 0.2), transparent);
            transition: left 0.5s;
        }

        .form-container:hover::before {
            left: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header i {
            font-size: 48px;
            color: #27ae60;
            margin-bottom: 15px;
            display: block;
        }

        h1 {
            color: #2c3e50;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            color: #666;
            font-size: 16px;
            font-weight: 300;
        }

        .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #27ae60;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 18px 20px 18px 55px;
            border: 2px solid rgba(46, 204, 113, 0.2);
            border-radius: 15px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            color: #2c3e50;
            font-weight: 500;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #27ae60;
            background: white;
            box-shadow: 0 0 25px rgba(46, 204, 113, 0.3);
            transform: translateY(-3px);
        }

        input[type="text"]:focus + i,
        input[type="password"]:focus + i,
        input[type="email"]:focus + i {
            color: #1e8449;
            transform: translateY(-50%) scale(1.1);
        }

        input::placeholder {
            color: #95a5a6;
            font-weight: 400;
        }

        .button-group {
            margin-top: 35px;
        }

        button {
            width: 100%;
            padding: 18px 30px;
            border: none;
            border-radius: 15px;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 15px;
        }

        button[name="create"] {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(46, 204, 113, 0.4);
        }

        button[name="create"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(46, 204, 113, 0.6);
        }

        button[name="create"]::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        button[name="create"]:hover::before {
            left: 100%;
        }

        button[name="login"] {
            background: rgba(255, 255, 255, 0.1);
            color: #27ae60;
            border: 2px solid #27ae60;
            backdrop-filter: blur(10px);
        }

        button[name="login"]:hover {
            background: #27ae60;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(46, 204, 113, 0.4);
        }

        button:active {
            transform: translateY(-1px);
        }

        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(46, 204, 113, 0.3), transparent);
        }

        .divider span {
            background: rgba(255, 255, 255, 0.9);
            padding: 0 20px;
            color: #666;
            font-weight: 500;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #27ae60;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #1e8449;
            text-shadow: 0 0 10px rgba(46, 204, 113, 0.5);
        }

        .error-message {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-top: 20px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
            animation: shake 0.5s ease-in-out;
        }

        .success-message {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-top: 20px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Form appearance animation */
        .form-container {
            animation: slideInUp 0.8s cubic-bezier(0.23, 1, 0.320, 1);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .form-container {
                padding: 30px 25px;
                margin: 10px;
                border-radius: 20px;
            }
            
            h1 {
                font-size: 26px;
            }
            
            input[type="text"],
            input[type="password"],
            input[type="email"] {
                padding: 15px 15px 15px 45px;
            }
            
            .input-wrapper i {
                left: 15px;
                font-size: 16px;
            }
            
            button {
                padding: 15px 25px;
                font-size: 16px;
            }
        }

        /* Loading animation for buttons */
        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Additional Green Enhancements */
        .shape:nth-child(1) {
            background: rgba(39, 174, 96, 0.1);
            border: 1px solid rgba(46, 204, 113, 0.2);
        }

        .shape:nth-child(2) {
            background: rgba(46, 204, 113, 0.1);
            border: 1px solid rgba(39, 174, 96, 0.2);
        }

        .shape:nth-child(3) {
            background: rgba(30, 132, 73, 0.1);
            border: 1px solid rgba(46, 204, 113, 0.2);
        }

        /* Green glow effect on form container */
        .form-container:hover {
            box-shadow: 
                0 25px 45px rgba(0, 0, 0, 0.3),
                0 0 100px rgba(46, 204, 113, 0.3);
        }

        /* Green focus state for better UX */
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: #2ecc71;
            box-shadow: 0 0 25px rgba(46, 204, 113, 0.4);
        }
    </style>
</head>
<body>
    <div class="background"></div>
    
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="main-container">
        <div class="form-container">
            <div class="header">
                <i class="fas fa-user-plus"></i>
                <h1>Create Account</h1>
                <p class="subtitle">Join us and start your journey</p>
            </div>
            
            <form action="" method="post" id="registrationForm">
                <div class="input-group">
                    <div class="input-wrapper">
                        <input type="text" name="username" required placeholder="Create your username" id="username">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                
                <div class="input-group">
                    <div class="input-wrapper">
                        <input type="email" name="email" required placeholder="Enter your email" id="email">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                
                <div class="input-group">
                    <div class="input-wrapper">
                        <input type="password" name="password" required placeholder="Create password" id="password">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                
                <div class="button-group">
                    <button type="submit" name="create" id="createBtn">
                        <i class="fas fa-user-plus"></i> Create Account
                    </button>
                </div>
            </form>

            <div class="divider">
                <span>Already have an account?</span>
            </div>

            <div class="login-link">
                <a href="login.php">
                    <i class="fas fa-sign-in-alt"></i> Sign In Here
                </a>
            </div>
            
            <?php if($error_message): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            
            <?php if($success_message): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i> <?php echo $success_message; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Add loading animation to form submission
        document.getElementById('registrationForm').addEventListener('submit', function() {
            const btn = document.getElementById('createBtn');
            btn.classList.add('loading');
            btn.innerHTML = 'Creating Account...';
        });

        // Add focus animations
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Add floating label effect
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.length > 0) {
                    this.style.paddingLeft = '55px';
                } else {
                    this.style.paddingLeft = '55px';
                }
            });
        });
    </script>
</body>
</html>