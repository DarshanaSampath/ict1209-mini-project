<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes - The Cooking Recipe Hub</title>
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
    </nav></header>
    <main class="container mt-5">
    <h1 class="text-center mb-4">Our Recipes</h1>
    <!-- Filter & Search Row -->
    <div class="row align-items-center mb-4">
        <!-- Filter Buttons -->
        <div class="col-md-8 text-md-start text-center mb-3 mb-md-0" id="filter-buttons">
            <button class="btn btn-outline-success active" data-filter="all">All</button>
            <button class="btn btn-outline-success" data-filter="breakfast">Breakfast</button>
            <button class="btn btn-outline-success" data-filter="brunch">Brunch</button>
            <button class="btn btn-outline-success" data-filter="lunch">Lunch</button>
            <button class="btn btn-outline-success" data-filter="dinner">Dinner</button>
            <button class="btn btn-outline-success" data-filter="snack">Snack</button>
            <button class="btn btn-outline-success" data-filter="dessert">Dessert</button>
        </div>
        
        <!-- Search Bar -->
        <div class="col-md-4">
            <input type="text" id="recipeSearch" class="form-control shadow-sm" placeholder="Search recipes...">
        </div>
    </div>

    <!-- Recipes -->
    <div class="row g-4" id="recipe-gallery">
        <!-- Kiribath -->
        <div class="col-md-4 recipe-item breakfast brunch">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/kiribath_lunumiris_1784958632873.jpg" class="card-img-top" alt="Kiribath" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">Breakfast / Brunch</span>
                    <h5 class="card-title">Sri Lankan Kiribath</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Kottu -->
        <div class="col-md-4 recipe-item dinner snack">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/sri_lankan_kottu_1784958602774.jpg" class="card-img-top" alt="Kottu Roti" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-success mb-2">Dinner / Snack</span>
                    <h5 class="card-title">Chicken Kottu Roti</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>
        <!-- Chicken Curry -->
        <div class="col-md-4 recipe-item lunch dinner">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/chicken_curry.jpg" class="card-img-top" alt="Chicken Curry" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-info mb-2">Lunch / Dinner</span>
                    <h5 class="card-title">Sri Lankan Chicken Curry</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>
        <!-- String Hoppers -->
        <div class="col-md-4 recipe-item breakfast dinner">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/string_hoppers.jpg" class="card-img-top" alt="String Hoppers" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">Breakfast / Dinner</span>
                    <h5 class="card-title">Sri Lankan String Hoppers</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>
        <!-- Hoppers -->
        <div class="col-md-4 recipe-item dinner snack">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/hoppers.jpg" class="card-img-top" alt="Hoppers" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-success mb-2">Dinner / Snack</span>
                    <h5 class="card-title">Sri Lankan Hoppers (Appa)</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>
        <!-- Polos Curry -->
        <div class="col-md-4 recipe-item lunch dinner">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/polos_curry.jpg" class="card-img-top" alt="Polos Curry" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-info mb-2">Lunch / Dinner</span>
                    <h5 class="card-title">Spicy Polos Curry</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>
        <!--watalappam-->
        <div class="col-md-4 recipe-item dessert">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/watalappan.jpg" class="card-img-top" alt="Watalappan" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-danger mb-2">Dessert</span>
                    <h5 class="card-title">Sri Lankan Watalappan</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>
        <!-- pancakes -->
        <div class="col-md-4 recipe-item breakfast">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/blueberry_pancakes.jpg" class="card-img-top" alt="Pancakes" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">Breakfast</span>
                    <h5 class="card-title">Blueberry Pancakes</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>
        <!-- healthy bowl -->
        <div class="col-md-4 recipe-item lunch">
            <div class="card recipe-card h-100">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500" class="card-img-top" alt="Salad" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-success mb-2">Lunch</span>
                    <h5 class="card-title">Healthy Bowl</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Dhal Curry -->
        <div class="col-md-4 recipe-item lunch dinner">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/dhal_curry.jpg" class="card-img-top" alt="Dhal Curry" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-info mb-2">Lunch / Dinner</span>
                    <h5 class="card-title">Sri Lankan Dhal Curry (Parippu)</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Fish Ambul Thiyal -->
        <div class="col-md-4 recipe-item lunch dinner">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/ambul_thiyal.jpg" class="card-img-top" alt="Fish Ambul Thiyal" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-info mb-2">Lunch / Dinner</span>
                    <h5 class="card-title">Sri Lankan Fish Ambul Thiyal</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Egg Roti -->
        <div class="col-md-4 recipe-item dinner snack">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/egg_roti.jpg" class="card-img-top" alt="Egg Roti" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-success mb-2">Dinner / Snack</span>
                    <h5 class="card-title">Sri Lankan Egg Roti</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Pol Sambol -->
        <div class="col-md-4 recipe-item breakfast lunch dinner">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/pol_sambol.jpg" class="card-img-top" alt="Pol Sambol" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">Breakfast / Lunch / Dinner</span>
                    <h5 class="card-title">Sri Lankan Pol Sambol</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- English Breakfast -->
        <div class="col-md-4 recipe-item breakfast brunch">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/english_breakfast.jpg" class="card-img-top" alt="English Breakfast" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">Breakfast / Brunch</span>
                    <h5 class="card-title">Traditional English Breakfast</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Kiri Aluwa -->
        <div class="col-md-4 recipe-item dessert">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/kiri_aluwa.jpg" class="card-img-top" alt="Kiri Aluwa" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-danger mb-2">Dessert</span>
                    <h5 class="card-title">Sri Lankan Kiri Aluwa</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Konda Kevum -->
        <div class="col-md-4 recipe-item dessert snack">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/konda_kavum.jpg" class="card-img-top" alt="Konda Kevum" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-danger mb-2">Dessert / Snack</span>
                    <h5 class="card-title">Sri Lankan Konda Kevum</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Sushi Platter -->
        <div class="col-md-4 recipe-item lunch dinner">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/sushi_platter.jpg" class="card-img-top" alt="Sushi Platter" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-info mb-2">Lunch / Dinner</span>
                    <h5 class="card-title">Gourmet Sushi Platter</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Bibikkan -->
        <div class="col-md-4 recipe-item dessert">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/bibikkan.jpg" class="card-img-top" alt="Bibikkan" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-danger mb-2">Dessert</span>
                    <h5 class="card-title">Sri Lankan Bibikkan</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Malay Achcharu -->
        <div class="col-md-4 recipe-item lunch dinner snack">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/malay_achcharu.jpg" class="card-img-top" alt="Malay Achcharu" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-info mb-2">Lunch / Dinner / Snack</span>
                    <h5 class="card-title">Sri Lankan Malay Achcharu</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Chocolate Lava Cake -->
        <div class="col-md-4 recipe-item dessert">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/lava_cake.jpg" class="card-img-top" alt="Chocolate Lava Cake" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-danger mb-2">Dessert</span>
                    <h5 class="card-title">Molten Chocolate Lava Cake</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Kokis -->
        <div class="col-md-4 recipe-item snack">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/kokis.jpg" class="card-img-top" alt="Kokis" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-success mb-2">Snack</span>
                    <h5 class="card-title">Crispy Sri Lankan Kokis</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>
         <!-- Sri Lankan Roast Paan (Brunch) -->
        <div class="col-md-4 recipe-item brunch">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/roast_paan.jpg" class="card-img-top" alt="Roast Paan" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">Brunch</span>
                    <h5 class="card-title">Sri Lankan Roast Paan</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>
        <!-- Sourdough Avocado Toast (Brunch) -->
        <div class="col-md-4 recipe-item brunch">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/avocado_toast.jpg" class="card-img-top" alt="Avocado Toast" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">Brunch</span>
                    <h5 class="card-title">Sourdough Avocado Toast</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>
        <!--French Toast-->
        <div class="col-md-4 recipe-item breakfast brunch">
            <div class="card recipe-card h-100">
                <img src="images/Recipe images/french_toast.jpg" class="card-img-top" alt="French Toast" height="400" width="300">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">Breakfast / Brunch</span>
                    <h5 class="card-title">Classic French Toast</h5>
                    <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                </div>
            </div>
        </div>

        <!-- Dynamic User Submitted Recipes -->
        <?php
        try {
            // Automatically update any legacy 'mains' category to 'lunch'
            $pdo->query("UPDATE recipes SET category = 'lunch' WHERE category = 'mains'");

            // Query all recipes
            $stmt = $pdo->query("SELECT r.*, u.username FROM recipes r JOIN users u ON r.user_id = u.id ORDER BY r.created_at DESC");
            $db_recipes = $stmt->fetchAll();

            foreach ($db_recipes as $recipe) {
                // Determine badge color/text based on category
                $cat = strtolower($recipe['category']);
                $badge_class = 'bg-success'; // default
                if ($cat == 'breakfast' || $cat == 'brunch') {
                    $badge_class = 'bg-warning text-dark';
                } elseif ($cat == 'lunch' || $cat == 'dinner') {
                    $badge_class = 'bg-info';
                } elseif ($cat == 'dessert') {
                    $badge_class = 'bg-danger';
                }

                // If image path is empty, use a placeholder
                $img = !empty($recipe['image_path']) ? htmlspecialchars($recipe['image_path']) : 'images/Recipe images/watalappan.jpg';
                ?>
                <div class="col-md-4 recipe-item <?php echo htmlspecialchars($recipe['category']); ?>">
                    <div class="card recipe-card h-100">
                        <img src="<?php echo $img; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($recipe['title']); ?>" height="400" width="300" style="object-fit: cover;">
                        <div class="card-body">
                            <span class="badge <?php echo $badge_class; ?> mb-2"><?php echo ucfirst(htmlspecialchars($recipe['category'])); ?></span>
                            <h5 class="card-title"><?php echo htmlspecialchars($recipe['title']); ?></h5>
                            <p class="card-text text-muted mb-1"><small>By: <?php echo htmlspecialchars($recipe['username']); ?></small></p>
                            <button class="btn btn-sm btn-primary mt-2">View Recipe</button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } catch (PDOException $e) {
            // Silently handle or log error
        }
        ?>
    </div>
</main>
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2026 The Cooking Recipe Hub. All rights reserved.</p>
        </div>
    </footer>
    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/filter.js"></script>
</body>
</html>

