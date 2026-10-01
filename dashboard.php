<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

// Check if user is logged in
if (!isLoggedIn()) {
    redirect('auth/login.php');
}

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = sanitize($_POST['title']);
    $category = sanitize($_POST['category']);
    $ingredients = sanitize($_POST['ingredients']);
    $instructions = sanitize($_POST['instructions']);
    $user_id = $_SESSION['user_id'];

    $target_dir = "images/Recipe images/";
    $uploadOk = 1;
    $image_path = null;

    // Check if files were uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . time() . "_" . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $error = "Uploaded file is not a valid image.";
            $uploadOk = 0;
        }

        // Limit size to 5MB
        if ($_FILES["image"]["size"] > 5000000) {
            $error = "Sorry, your image file is too large (max 5MB).";
            $uploadOk = 0;
        }

        // Limit allowed formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            } else {
                $error = "Sorry, there was an error uploading your image file.";
                $uploadOk = 0;
            }
        }
    } else {
        $error = "Please upload an image for the recipe.";
        $uploadOk = 0;
    }

    if (empty($title) || empty($category) || empty($ingredients) || empty($instructions)) {
        $error = "All fields are required!";
    } elseif ($uploadOk == 1) {
        // Insert into database
        $stmt = $pdo->prepare("INSERT INTO recipes (user_id, title, category, ingredients, instructions, image_path) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$user_id, $title, $category, $ingredients, $instructions, $image_path])) {
            $success = "ඔබේ වට්ටෝරුව සාර්ථකව ඇතුලත් කරන ලදී! (Recipe submitted successfully!)";
        } else {
            $error = "Something went wrong while saving to the database. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Recipe - The Cooking Recipe Hub</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header id="navbar-placeholder">
        <!-- Bootstrap 5 Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center fw-bold" href="index.php">
                    <img src="images/logo.png" alt="Logo" height="50" class="d-inline-block align-top rounded me-2" style="border-radius: 8px !important;">
                    The Cooking Recipe Hub
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="recipes.php">Recipes</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active text-warning fw-bold" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link text-danger fw-bold" href="auth/logout.php">Logout (<?= htmlspecialchars($_SESSION['username']); ?>)</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="about-text-container mb-5">
                    <h1 class="mb-3 fw-bold">ඔබේ කෑම වට්ටෝරුව එකතු කරන්න</h1>
                    <h6 class="text-muted">Welcome, <?= htmlspecialchars($_SESSION['username']); ?>! Submit your own traditional or modern recipe to share with our community.</h6>
                </div>
                <div class="card submit-card p-5 border bg-white shadow-sm mb-5">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?= $success ?></div>
                    <?php endif; ?>

                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">වට්ටෝරුවේ නම (Recipe Name)</label>
                                <input type="text" name="title" class="form-control" placeholder="e.g., Spicy Chicken Curry" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">වර්ගය (Category)</label>
                                <select name="category" class="form-select" required>
                                    <option value="">Select Category...</option>
                                    <option value="breakfast">Breakfast</option>
                                    <option value="brunch">Brunch</option>
                                    <option value="lunch">Lunch</option>
                                    <option value="dinner">Dinner</option>
                                    <option value="snack">Snack</option>
                                    <option value="dessert">Dessert</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">අවශ්‍ය ද්‍රව්‍ය (Ingredients)</label>
                            <textarea name="ingredients" class="form-control" rows="4" placeholder="List the ingredients separated by commas..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">සාදන ආකාරය (Instructions)</label>
                            <textarea name="instructions" class="form-control" rows="5" placeholder="Explain how to cook this recipe step by step..." required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">පින්තූරයක් (Upload Image)</label>
                            <input name="image" class="form-control" type="file" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Submit Recipe</button>
                    </form>
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

    <!-- Bootstrap 5 javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
