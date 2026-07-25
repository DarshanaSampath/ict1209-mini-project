document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll("#filter-buttons .btn");
    const items = document.querySelectorAll(".recipe-item");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            buttons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            const filterValue = this.getAttribute("data-filter");

            items.forEach(item => {
                if (filterValue === "all" || item.classList.contains(filterValue)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });
});