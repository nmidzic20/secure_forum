<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/profile.css" />
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
  	<script src="../js/update-profile-pic.js"></script>
  </head>
  <body>
    <header>
      <nav class="navbar">
        <a href="../index.php">Home</a>
        <a class="active-page" href="profile.php">Profile</a>
        <a href="../api/logout.php">Log Out</a>
      </nav>
      <title>Profile</title>
    </header>
    <main>
      <div class="container">
        <h2>User Profile</h2>
        <div class="user-details">
          <img src="../assets/avatar.jpg" alt="User Profile Image" />
          <div class="user-info">
            <p><strong>Username:</strong> John Doe</p>
            <p><strong>Email:</strong> johndoe@example.com</p>
            <p><strong>Date of registration:</strong> Jan 2024.</p>
          </div>
        </div>
        <button id="update-profile-pic-btn">Update profile picture</button>
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
    <div id="new-profile-pic-submission" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<h2>New Profile Picture</h2>
			<label for="pic-url">URL:</label>
			<input type="text" id="pic-url" placeholder="facebook.com/myprofile/pic.jpg">
			<div class="button-row">
				<button id="update-pic-btn">Update</button>
				<button id="cancel-btn">Cancel</button>
			</div>
		</div>
	</div>
  </body>
</html>
