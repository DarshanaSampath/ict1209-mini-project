<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $message = sanitize($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $message])) {
            $success = "Thank you! Your message has been saved to the database successfully.";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - The Cooking Recipe Hub</title>
      <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header id="navbar-placeholder">    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold" href="index.php">
                <img src="images/logo.png" alt="Logo" height="50" class="d-inline-block align-top rounded me-2" style="border-radius: 8px !important;">The Cooking Recipe Hub
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="recipes.php">Recipes</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link active text-warning fw-bold" href="contact.php">Contact</a></li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link text-danger fw-bold" href="auth/logout.php">Logout (<?= htmlspecialchars($_SESSION['username']); ?>)</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="auth/login.php">Login / Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav></header>
<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4 fw-bold">අපිට කියන්න (Contact Us)</h1> 
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>

            <!-- Contact Form -->
            <div class="card shadow p-4 mb-5">
                <form id="contactForm" method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">ඔබේ නම (Full Name)</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ඊමේල් ලිපිනය (Email)</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">පණිවිඩය (Message)</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100 fw-bold">Send Message</button>
                </form>
            </div>
            
        </div>
    </div>
</main>
    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2026 The Cooking Recipe Hub. All rights reserved.</p>
        </div>
    </footer>
    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/validation.js"></script>
</body>
</html>

