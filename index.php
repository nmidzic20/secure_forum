<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: html/login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
	<link rel="stylesheet" type="text/css" href="../css/home.css" />
	<link rel="icon" href="./assets/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;600;700&family=Poppins:wght@200&family=Ranchers&display=swap" rel="stylesheet">
	<script src="./js/script.js"></script>
</head>
<body>
	<header>
		<nav class="navbar">
			<a class="active-page" href="">Home</a>
            <?php
                if (isset($_SESSION['loggedin'])) {
                    echo '<a href="html/profile.php">Profile</a>';
                    echo '<a href="src/logout.php">Log Out</a>';
                } else {
                    echo '<a href="html/login.php">Log In</a>';
                    echo '<a href="html/registration.php">Registration</a>';
                }
            ?>
		</nav>
		<title>Home</title>
	</header>
	<main>
		<button id="post-content-btn">New topic</button>

		<section>
			<div class="thread">
				<div id="somethingrandomorsomethingidk" class="message">
					<details open="">
						<summary>
							Post title and/or author
						</summary>
						<div>
							Post content
						</div>
						<blockquote id="randID1" class="reply">
							<!-- replies -->

							<details open="">
								<summary>
									Reply title and/or author
								</summary>
								<div>
									The reply
								</div>
								<blockquote id="randID2" class="reply">
								<!-- replies -->

									<details open="">
										<summary>
											John McJohnFace
										</summary>
										<div>
											Get free Robux at <a href="https://www.duck.com">fake link</a> :D
										</div>
										<blockquote id="randID3" class="reply">
										<!-- replies -->
											<a class="see-replies" href="">See replies</a>
										</blockquote>
									</details>

									<details open="">
										<summary>
											John McJohnFace2
										</summary>
										<div>
											Download Minecraft for free at <a href="https://www.duck.com">fake link</a> :D
										</div>
										<blockquote id="randID4" class="reply">
										<!-- replies -->
											<a class="see-replies" href="">See replies</a>
										</blockquote>
									</details>

								</blockquote>
							</details>

							<details open="">
								<summary>
									Steve McStevenson
								</summary>
								<div>
									Heed my warning. The moon is made of cheese.
								</div>
								<blockquote id="randID5" class="reply">
								<!-- replies -->

								</blockquote>
							</details>

						</blockquote>
					</details>

					</div>
				</div>
		</section>
	</main>
	<footer>
		<div>&copy; SIS 2024.</div>
		<div>
			<img src="./assets/favicon.png" height="15">
			<a href="https://www.flaticon.com/free-icons/bulletin" title="bulletin icons">Bulletin icons created by Alfredo Creates - Flaticon</a>
		</div>
	</footer>
	<div id="new-topic-submission" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<h2>New Topic Submission</h2>
			<label for="topic-title">Title:</label>
			<input type="text" id="topic-title" placeholder="Enter your topic title...">
			<label for="topic-content">Content:</label>
			<textarea id="topic-content" placeholder="Enter your topic content here..."></textarea>
			<input type="file" id="file-upload" accept=".pdf, .doc, .docx, .txt"> <!-- Add accepted file types as needed -->
			<div class="button-row">
				<button id="post-topic-btn">Post new topic</button>
				<button id="cancel-btn">Cancel</button>
			</div>
		</div>
	</div>
	<!--<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script>
		$('.see-replies').parent('blockquote').css({
			"background-color": "aliceblue"
		});
	</script>-->
</body>
</html>
