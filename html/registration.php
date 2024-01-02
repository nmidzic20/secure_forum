<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon" />
    <link
      rel="shortcut icon"
      href="../assets/favicon.ico"
      type="image/x-icon"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;600;700&family=Poppins:wght@200&family=Ranchers&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <a href="../index">Home</a>
          <?php
          if (isset($_SESSION['loggedin'])) {
              echo '<a href="profile.php">Profile</a>';
              echo '<a href="../src/logout.php">Log Out</a>';
          } else {
              echo '<a href="login.php">Log In</a>';
              echo '<a class="active-page" href="registration.php">Registration</a>';
          }
          ?>
      </nav>
      <title>Registration</title>
    </header>
    <main>
      <div class="container">
        <h2>Registration</h2>
        <form id="registration-form" method="post" action="/registration.php">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required />

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required />

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required />

          <label for="confirm-password">Confirm Password:</label>
          <input
            type="password"
            id="confirm-password"
            name="confirm-password"
            required
          />

          <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="login.php">Login here</a>.</p>
      </div>
    </main>
    <footer>
      <div>&copy; SIS 2024.</div>
      <div>
        <img src="../assets/favicon.png" height="15" />
        <a
          href="https://www.flaticon.com/free-icons/bulletin"
          title="bulletin icons"
          >Bulletin icons created by Alfredo Creates - Flaticon</a
        >
      </div>
    </footer>
  </body>
</html>
