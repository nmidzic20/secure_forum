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
        <a href="../index.php">Home</a>
          <?php
          if (isset($_SESSION['loggedin'])) {
              echo '<a href="profile.php">Profile</a>';
              echo '<a href="../api/logout.php">Log Out</a>';
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
        <form id="registration-form" method="post" action="../api/register.php">
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
    <script>
        document.getElementById('registration-form').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(event.target);

            console.log(formData);

            fetch('../api/register.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if(data.status === 'success') {
                        window.location.replace("../index.php");
                    } else if (data.status === 'error-password') {
                        alert("Passwords do not match. Please try again.");
                    } else if (data.status === 'error-username') {
                        alert("Username already exists. Please try again");
                    } else {
                        alert("Error registering. Please try again.");
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });
    </script>
  </body>
</html>
