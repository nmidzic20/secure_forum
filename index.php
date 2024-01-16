<?php

global $comments, $topics;

include ('./api/get-topic.php');
include ('./api/get-comments.php');

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
	<link rel="stylesheet" type="text/css" href="./css/home.css" />
	<link rel="icon" href="./assets/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;600;700&family=Poppins:wght@200&family=Ranchers&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<nav class="navbar">
			<a class="active-page" href="">Home</a>
            <?php
                if (isset($_SESSION['loggedin'])) {
                    echo '<a href="html/profile.php">Profile</a>';
                    echo '<a href="api/logout.php">Log Out</a>';
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

        <?php foreach ($topics as $topic): ?>
            <section>
                <div class="thread">
					<div id="topic<?php echo $topic['id'] ?>" class="message">
                        <details>
                            <summary>
                                <?php echo $topic['title']; ?>
								<div class="topicMenu" style="float: right">
								<div class="topicActions">
									<?php if ($topic['user_id'] == $_SESSION['userid'] || $_SESSION['userid'] == 1): ?>
									<a onclick="deleteTopic(<?php echo $topic['id'] ?>)">Delete</a>
									<?php endif; ?>
									<a id="post-content-btn" onclick="setVar(<?php echo $topic['id'] ?>)">Comment</a>
								</div>
									<div>#<?php echo $topic['id'] ?></div>
								</div>
                            </summary>

                            <div>
								<?php echo $topic['content']; ?>

								<?php
									if($topic['file_path'] != null) {
										echo "<br>";

										$finfo = new finfo(FILEINFO_MIME_TYPE);

										if (str_contains($finfo->file($topic['file_path']), 'image'))
											echo "<img src=\"{$topic['file_path']}\" width=\"100rem\"/>";
										else
											echo "<a href=\"{$topic['file_path']}\">File attachment</a>";
									}
								?>
							</div>

                            <blockquote id="comments<?php echo $topic['id'] ?>" class="comment">
                                <?php foreach ($comments as $comment): ?>
                                    <?php if ($comment['topic_id'] == $topic['id']): ?>
										<div id="comment<?php echo $comment['id'] ?>" class="message">
											<details>
												<summary>
													<?php echo $comment['username']; ?>
												</summary>
												<div>
													<?php echo $comment['content']; ?>

													<?php
														if($comment['file_path'] != null) {
															echo "<br>";

															$finfo = new finfo(FILEINFO_MIME_TYPE);

															if (str_contains($finfo->file($comment['file_path']), 'image'))
																echo "<img src=\"{$comment['file_path']}\" width=\"100rem\"/>";
															else
																echo "<a href=\"{$comment['file_path']}\">File attachment</a>";
														}
													?>
												</div>
											</details>
										</div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </blockquote>
                        </details>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
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
			<input type="file" id="file" accept=".pdf, .doc, .docx, .txt, .png, .jpg, .jpeg, .gif">
			<div class="button-row">
				<button id="post-topic-btn">Post new topic</button>
				<button id="cancel-btn">Cancel</button>
			</div>
		</div>
	</div>
	<div id="new-comment-submission" class="modal">
		<div class="modal-content">
			<span class="close" id="close-comment-modal">&times;</span>
			<h2>New Comment Submission</h2>
			<label for="comment-content">Content:</label>
			<textarea id="comment-content" placeholder="Enter your comment content here..."></textarea>
			<input type="file" id="comment-file" accept=".pdf, .doc, .docx, .txt, .png, .jpg, .jpeg, .gif">
			<div class="button-row">
				<button id="post-comment-btn">Post new comment</button>
				<button id="cancel-comment-btn">Cancel</button>
			</div>
		</div>
	</div>
	<!--<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script>
		$('.see-replies').parent('blockquote').css({
			"background-color": "aliceblue"
		});
	</script>-->
	<script>
		function deleteTopic(id) {
			if(window.confirm("The chosen topic and all of it's comments will be deleted. Proceed?")) {

				var xhr = new XMLHttpRequest();
				xhr.open("GET", "api/delete-topic.php?id=" + id, true);
				xhr.onload = function () {
					if (xhr.status === 200) {
						let response = JSON.parse(xhr.responseText);

						if (response.status === "success") {
							alert("Topic deleted successfully!");
							window.location.reload();
						} else {
							alert("Error deleting topic: " + response.message);
						}
					} else {
						alert("Error deleting topic. Please try again.");
					}
				};
				xhr.send();
			}
		}
	</script>
	<div id="user-id" hidden><?php if(isset($_SESSION['loggedin'])) echo $_SESSION['userid']; ?></div>
	<script src="./js/script.js"></script>
</body>
</html>