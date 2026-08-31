<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

// Get recipe ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    redirect('recipes.php');
}

// Fetch recipe details
$stmt = $pdo->prepare("
    SELECT r.*, u.username 
    FROM recipes r 
    JOIN users u ON r.user_id = u.id 
    WHERE r.id = ?
");
$stmt->execute([$id]);
$recipe = $stmt->fetch();

// If recipe not found, redirect back
if (!$recipe) {
    redirect('recipes.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($recipe['title']) ?> - The Cooking Recipe Hub</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header id="navbar-placeholder">
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
                        <li class="nav-item"><a class="nav-link active text-warning fw-bold" href="recipes.php">Recipes</a></li>
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
        </nav>
    </header>

    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <?php if (!empty($recipe['image_path'])): ?>
                    <img src="<?= htmlspecialchars($recipe['image_path']) ?>" class="img-fluid rounded shadow-sm recipe-detail-img" alt="<?= htmlspecialchars($recipe['title']) ?>" style="width: 100%; height: 400px; object-fit: cover;">
                <?php else: ?>
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded shadow-sm" style="height: 400px;">
                        <h3>No Image Available</h3>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="col-lg-6">
                <h1 class="fw-bold mb-3"><?= htmlspecialchars($recipe['title']) ?></h1>
                
                <div class="d-flex gap-3 mb-4 text-muted">
                    <span><strong>Category:</strong> <span class="badge bg-primary text-capitalize"><?= htmlspecialchars($recipe['category']) ?></span></span>
                    <span><strong>By:</strong> <?= htmlspecialchars($recipe['username']) ?></span>
                    <span><strong>Date:</strong> <?= date('M d, Y', strtotime($recipe['created_at'])) ?></span>
                </div>

                <div class="mb-4">
                    <h3 class="fw-bold border-bottom pb-2">අවශ්‍ය ද්‍රව්‍ය (Ingredients)</h3>
                    <div class="p-3 bg-light rounded mt-3">
                        <?= nl2br(htmlspecialchars($recipe['ingredients'])) ?>
                    </div>
                </div>

                <div>
                    <h3 class="fw-bold border-bottom pb-2">සාදන ආකාරය (Instructions)</h3>
                    <div class="p-3 mt-3">
                        <?= nl2br(htmlspecialchars($recipe['instructions'])) ?>
                    </div>
                </div>
                
                <div class="mt-4">
                    <a href="recipes.php" class="btn btn-outline-dark">← Back to Recipes</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; 2026 The Cooking Recipe Hub. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
