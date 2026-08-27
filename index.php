<?php
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Cooking Recipe Hub - Home</title>
    
   
      <link rel="stylesheet" href="css/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header id="navbar-placeholder">    <!-- Bootstrap 5 Navbar -->
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
                    <li class="nav-item"><a class="nav-link active text-warning fw-bold" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="recipes.php">Recipes</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
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
    <main>
    <!-- Sri Lankan Food Carousel -->
    <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- Kiribath Image -->
                <img src="images/Recipe images/kiribath_lunumiris_1784958632873.jpg" class="d-block w-100" alt="Kiribath">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 rounded p-3">
                    <h5 class="fw-bold text-warning">උදෑසනට රසවත් කිරිබත්</h5>
                    <p>Authentic Sri Lankan Milk Rice (Kiribath) with Lunu Miris.</p>
                </div>
            </div>
            <div class="carousel-item">
                <!-- Kottu Image -->
                <img src="images/Recipe images/sri_lankan_kottu_1784958602774.jpg" class="d-block w-100" alt="Kottu">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 rounded p-3">
                    <h5 class="fw-bold text-warning">උණු උණු කොත්තු රොටි</h5>
                    <p>The Ultimate Sri Lankan Street Food Experience.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#recipeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#recipeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    
    <div class="container mt-5 text-center">
        <h2 class="fw-bold">දේශීය සහ විදේශීය රසයන් (Explore Our Recipes)</h2><br>
        <p class="lead">රසවත්ම කෑම වට්ටෝරු ගෙදරදීම හදාගන්න.</p>
    </div>
</main>
    
    <!-- Bootstrap 5 Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2026 The Cooking Recipe Hub. All rights reserved.</p>
        </div>
    </footer>
    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

