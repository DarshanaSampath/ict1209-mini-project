document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll("#filter-buttons .btn");
    const recipeItems = document.querySelectorAll(".recipe-item");
    const searchInput = document.getElementById("recipeSearch");

    let currentCategory = "all";
    let currentSearchText = "";

    // Function to filter recipes based on both Category and Search Text
    function filterRecipes() {
        recipeItems.forEach(item => {
            // 1. Check Category Match
            const matchesCategory = currentCategory === "all" || item.classList.contains(currentCategory);
            
            // 2. Check Search Match
            const recipeTitle = item.querySelector(".card-title").innerText.toLowerCase();
            const matchesSearch = recipeTitle.includes(currentSearchText);

            // 3. Show or Hide based on both conditions
            if (matchesCategory && matchesSearch) {
                item.style.display = "block";
                // Add a small animation effect
                item.style.animation = "fadeIn 0.5s ease";
            } else {
                item.style.display = "none";
            }
        });
    }

    // Event Listener for Category Buttons
    filterButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove("active"));
            // Add active class to clicked button
            this.classList.add("active");

            // Update current category and run filter
            currentCategory = this.getAttribute("data-filter");
            filterRecipes();
        });
    });

    // Event Listener for Search Bar (Real-time typing)
    if (searchInput) {
        searchInput.addEventListener("input", function (e) {
            currentSearchText = e.target.value.toLowerCase().trim();
            filterRecipes();
        });
    }
});
