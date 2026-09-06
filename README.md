# The Cooking Recipe Hub

Welcome to **The Cooking Recipe Hub**, a digital platform dedicated to sharing culinary traditions alongside celebrated global recipes. This project is built for the **ICT 1209 - Web Technologies** module (Phase 3 Final Submission).

## Project Overview
Our web application serves as a comprehensive digital recipe book. It includes features for viewing dynamic recipes, secure user registration and login, and a secure dashboard for users to submit their own traditional recipes along with images.

## Key Features (Phase 3)
- **User Authentication:** Secure Login and Registration system using PHP Sessions and `password_hash()` (BCRYPT).
- **Dynamic Content:** Recipes are fetched directly from a MySQL database using PDO Prepared Statements.
- **Recipe Submission:** Authenticated users can upload recipes and images via the Dashboard.
- **Contact Form:** User inquiries are securely saved to the database.
- **Responsive Design:** Fully responsive layout built with Bootstrap 5.

## Setup Instructions (Local Environment)
Since this project uses PHP and MySQL, you must run it on a local server environment like XAMPP or WAMP.

1. **Clone the Repository:** 
   Clone this project into your server's root directory (e.g., `C:\xampp\htdocs\cooking-project`):
   ```bash
   git clone https://github.com/DarshanaSampath/ict1209-mini-project.git
   ```
2. **Database Setup:**
   - Open XAMPP and start **Apache** and **MySQL**.
   - Go to `http://localhost/phpmyadmin/`.
   - Create a new database named `recipe_book`.
   - Import the `database.sql` file provided in the root of this project to create the necessary tables (`users`, `recipes`, `messages`).
3. **Run the Project:**
   - Open your web browser and navigate to `http://localhost/cooking-project/index.php`.

## Contributors
- K.R.M.D.S Kumara - ITT/2024/056
- L.P.D.T Senarathna - ITT/2024/099