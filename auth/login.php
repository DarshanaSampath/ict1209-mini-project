<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

// Redirect to dashboard if already logged in
if (isLoggedIn()) {
    redirect('../dashboard.php');
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Both fields are required!";
    } else {
        // Fetch user by email
        $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Success! Create session
            session_regenerate_id(true); // Required by Phase 3 guidelines
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            redirect('../dashboard.php');
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - The Cooking Recipe Hub</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header id="navbar-placeholder">
        <!-- Bootstrap 5 Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center fw-bold" href="../index.php">
                    <img src="../images/logo.png" alt="Logo" height="50" class="d-inline-block align-top rounded me-2" style="border-radius: 8px !important;">
                    The Cooking Recipe Hub
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../recipes.php">Recipes</a></li>
                        <li class="nav-item"><a class="nav-link" href="../about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active text-warning fw-bold" href="login.php">Login / Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow border-0 rounded-4 p-4">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Welcome Back!</h2>
                        <p class="text-muted">Login to your digital kitchen</p>
                    </div>

                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 fw-bold py-2">Login</button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p>Don't have an account? <a href="register.php" class="text-decoration-none">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; 2026 The Cooking Recipe Hub. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
