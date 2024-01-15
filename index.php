<?php
include('./api/get-topic.php');
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
	<script src="./js/script.js"></script>
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

		<section>
			<div class="thread">
				<div id="somethingrandomorsomethingidk" class="message">
					<details>
						<summary>
							Post title and/or author
						</summary>
						<div>
							Post content
						</div>
						<blockquote id="randID1" class="reply">
							<!-- replies -->

							<details>
								<summary>
									Reply title and/or author
								</summary>
								<div>
									The reply
								</div>
								<blockquote id="randID2" class="reply">
									<!-- replies -->

									<details>
										<summary>
											John McJohnFace
										</summary>
										<div>
											Get free Robux at <a href="https://www.duck.com">fake link</a> :D
										</div>
										<blockquote id="randID3" class="reply">
											<!-- replies -->

										</blockquote>
									</details>

									<details>
										<summary>
											John McJohnFace2
										</summary>
										<div>
											Download Minecraft for free at <a href="https://www.duck.com">fake link</a> :D
										</div>
										<blockquote id="randID4" class="reply">
											<!-- replies -->

										</blockquote>
									</details>

								</blockquote>
							</details>

							<details>
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

		<section>
			<div class="thread">
				<div id="somethingrandomorsomethingidk1" class="message">
					<details>
						<summary>
							How to bake a good cheesecake?
						</summary>
						<div>
							Hey guys, I was just wondering. How do a make a really good cheesecake?
						</div>

						<blockquote id="randID6" class="reply">
							<!-- replies -->

							<details>
								<summary>
									Mememaster68+1
								</summary>
								<div>
									Just follow the recipe. idiot.
								</div>

								<blockquote id="randID7" class="reply">
									<!-- replies -->

									<details>
										<summary>
											OP
										</summary>
										<div>
											Thanks.... very helpful.
										</div>

										<blockquote id="randID8" class="reply">
											<!-- replies -->

											<details>
												<summary>
													Mememaster68+1
												</summary>
												<div>
													Your welcome. Loser.
												</div>

												<blockquote id="randID9" class="reply">
													<!-- replies -->

												</blockquote>
											</details>

										</blockquote>
									</details>

								</blockquote>
							</details>

							<details>
								<summary>
									Smartass42
								</summary>
								<div>
									If your smart enough to ask the question; your smart enough to google the answer
								</div>

								<blockquote id="randID10" class="reply">
									<!-- replies -->

								</blockquote>
							</details>

							<details>
								<summary>
									John McCook
								</summary>
								<div>
									<h5>Instructions</h5>

											Preheat oven to 325F (160C).
											Prepare Graham Cracker crust first by combining graham cracker crumbs, sugar, and brown sugar, and stirring well. Add melted butter and use a fork to combine ingredients well.
											1 ½ cups graham cracker crumbs, 2 Tablespoons sugar, 1 Tablespoon brown sugar, 7 Tablespoons butter
											Pour crumbs into a 9” Springform pan and press firmly into the bottom and up the sides of your pan. Set aside.

									<h5>Cheesecake</h5>

											In the bowl of a stand mixer or in a large bowl (using a hand mixer) add cream cheese and stir until smooth and creamy (don't over-beat or you'll incorporate too much air).
											32 oz cream cheese²
											Add sugar and stir again until creamy.
											1 cup sugar
											Add sour cream, vanilla extract, and salt, and stir until well-combined. If using a stand mixer, make sure you pause periodically to scrape the sides and bottom of the bowl with a spatula so that all ingredients are evenly incorporated.
											⅔ cups sour cream, 1 ½ teaspoons vanilla extract, ⅛ teaspoon salt
											With mixer on low speed, gradually add lightly beaten eggs, one at a time, stirring just until each egg is just incorporated. Once all eggs have been added, use a spatula to scrape the sides and bottom of the bowl again and make sure all ingredients are well combined.
											4 large eggs
											Pour cheesecake batter into prepared springform pan. To insure against leaks, place pan on a cookie sheet that's been lined with foil.
											Transfer to the center rack of your oven and bake on 325F (160C) for 50-60 minutes (or longer as needed, see note 3). Edges will likely have slightly puffed and may have just begun to turn a light golden brown and the center should spring back to the touch but will still be Jello-jiggly. Don't over-bake or the texture will suffer, which means we all suffer.
											Remove from oven and allow to cool on top of the oven⁴ for 10 minutes. Once 10 minutes has passed, use a knife to gently loosen the crust from the inside of the springform pan (this will help prevent cracks as your cheesecake cools and shrinks). Do not remove the ring of the springform pan.
											Allow cheesecake to cool another 1-2 hours or until near room temperature before transferring to refrigerator and allowing to cool overnight or at least 6 hours. I remove the ring of the springform pan just before serving then return it to the pan to store. Enjoy!

									<h5>Notes</h5>
											I have not tested this recipe in a convection oven.
								</div>

								<blockquote id="randID11" class="reply">
									<!-- replies -->

									<details>
										<summary>
											OP
										</summary>
										<div>
											TYSM!
										</div>

										<blockquote id="randID12" class="reply">
											<!-- replies -->

										</blockquote>
									</details>

								</blockquote>
							</details>

						</blockquote>
					</details>

					</div>
				</div>
		</section>

		<section>
			<div class="thread">
				<div id="somethingrandomorsomethingidk2" class="message">

					<details>
						<summary>
							Why are we still here?
						</summary>
						<div>
							Just to suffer?
						</div>
						<blockquote id="randID13" class="reply">
							<!-- replies -->

							<details>
								<summary>
									Every_night
								</summary>
								<div>
									I can feel my leg
								</div>
								<blockquote id="randID14" class="reply">
								<!-- replies -->

									<details>
										<summary>
											and_my_arm
										</summary>
										<div>
											Even my fingers,
										</div>
										<blockquote id="randID15" class="reply">
										<!-- replies -->

										</blockquote>
									</details>

									<details>
										<summary>
											The_body_I've_lost
										</summary>
										<div>
											the comrades I've lost
										</div>
										<blockquote id="randID16" class="reply">
										<!-- replies -->

										</blockquote>
									</details>

								</blockquote>
							</details>

							<details>
								<summary>
									won't_stop_hurting
								</summary>
								<div>
									It's like they're all still here
								</div>
								<blockquote id="randID17" class="reply">
								<!-- replies -->

									<details>
										<summary>
											You_feel_it_too
										</summary>
										<div>
											don't you?
										</div>
										<blockquote id="randID18" class="reply">
											<!-- replies -->

										</blockquote>
									</details>

								</blockquote>
							</details>

							<details>
								<summary>
									Hideo Kojima
								</summary>
								<div>
									STFU
								</div>
								<blockquote id="randID19" class="reply">
									<!-- replies -->

								</blockquote>
							</details>

						</blockquote>
					</details>

				</div>
			</div>
		</section>

		<section>
			<div class="thread">
				<div id="somethingrandomorsomethingidk3" class="message">

					<details>
						<summary>
							Never
						</summary>
						<div>
							Gonna
						</div>
						<blockquote id="randID20" class="reply">
							<!-- replies -->

							<details>
								<summary>
									Give
								</summary>
								<div>
									You
								</div>
								<blockquote id="randID21" class="reply">
									<!-- replies -->

									<details>
										<summary>
											Up
										</summary>
										<div>
											Never
										</div>
										<blockquote id="randID22" class="reply">
											<!-- replies -->

											<details>
												<summary>
													Gonna
												</summary>
												<div>
													Let
												</div>
												<blockquote id="randID23" class="reply">
													<!-- replies -->

													<details>
														<summary>
															You
														</summary>
														<div>
															Down
														</div>
														<blockquote id="randID24" class="reply">
															<!-- replies -->

															<details>
																<summary>
																	Never
																</summary>
																<div>
																	Gonna
																</div>
																<blockquote id="randID25" class="reply">
																	<!-- replies -->

																	<details>
																		<summary>
																			Run
																		</summary>
																		<div>
																			Around
																		</div>
																		<blockquote id="randID26" class="reply">
																			<!-- replies -->

																			<details>
																				<summary>
																					And
																				</summary>
																				<div>
																					Desert
																				</div>
																				<blockquote id="randID27" class="reply">
																					<!-- replies -->

																					<details>
																						<summary>
																							You
																						</summary>
																						<div>
																							...................................
																						</div>
																						<blockquote id="randID28" class="reply">
																							<!-- replies -->

																						</blockquote>
																					</details>

																				</blockquote>
																			</details>

																		</blockquote>
																	</details>

																</blockquote>
															</details>

														</blockquote>
													</details>

												</blockquote>
											</details>

										</blockquote>
									</details>

								</blockquote>
							</details>

							<details>
								<summary>
									Make
								</summary>
								<div>
									You
								</div>
								<blockquote id="randID29" class="reply">
									<!-- replies -->

									<details>
										<summary>
											Cry
										</summary>
										<div>
											Never
										</div>
										<blockquote id="randID30" class="reply">
											<!-- replies -->

											<details>
												<summary>
													Gonna
												</summary>
												<div>
													Say
												</div>
												<blockquote id="randID31" class="reply">
													<!-- replies -->

													<details>
														<summary>
															Goodbye
														</summary>
														<div>
															......................................
														</div>
														<blockquote id="randID32" class="reply">
															<!-- replies -->

														</blockquote>
													</details>

												</blockquote>
											</details>

										</blockquote>
									</details>

								</blockquote>
							</details>

						</blockquote>
					</details>

				</div>
			</div>
		</section>

		<section>
			<div class="thread">
				<div id="somethingrandomorsomethingidk4" class="message">

					<details>
						<summary>
							What
						</summary>
						<div>
							Is
						</div>
						<blockquote id="randID33" class="reply">
							<!-- replies -->

							<details>
								<summary>
									Love
								</summary>
								<div>
									Baby
								</div>
								<blockquote id="randID34" class="reply">
									<!-- replies -->

									<details>
										<summary>
											Don't
										</summary>
										<div>
											Hurt
										</div>
										<blockquote id="randID35" class="reply">
											<!-- replies -->

											<details>
												<summary>
													Me
												</summary>
												<div>
													Don't
												</div>
												<blockquote id="randID36" class="reply">
													<!-- replies -->

													<details>
														<summary>
															Hurt
														</summary>
														<div>
															Me
														</div>
														<blockquote id="randID37" class="reply">
															<!-- replies -->

															<details>
																<summary>
																	No
																</summary>
																<div>
																	More
																</div>
																<blockquote id="randID38" class="reply">
																	<!-- replies -->

																	<details>
																		<summary>
																			Angry Ned
																		</summary>
																		<div>
																			What the darn-diddily-doodily did you just say about me, you little witcharooney? I'll have you know I graduated top of my class at Springfield Bible College, and I've been involved in numerous secret mission trips in Capital City, and I have over 300 confirmed baptisms. I am trained in the Old Testament and I'm the top converter in the entire church mission group. You are nothing to me but just another heathen. I will cast your sins out with precision the likes of which has never been seen before in Heaven, mark my diddily-iddilly words. You think you can get away with saying that blasphemy to me over the Internet? Think again, friendarino. As we speak I am contacting my secret network of evangelists across Springfield and your IP is being traced by God right now so you better prepare for the storm, maggorino. The storm that wipes out the diddily little thing you call your life of sin. You're going to Church, kiddily-widdily. Jesus can be anywhere, anytime, and he can turn you to the Gospel in over infinity ways, and that's just with his bare hands. Not only am I extensively trained in preaching to nonbelievers, but I have access to the entire dang- diddily Bible collection of the Springfield Bible College and I will use it to its full extent to wipe your sins away off the face of the continent, you diddily-doo satan-worshipper. If only you could have known what holy retribution your little “clever” comment was about to bring down upon you from the Heavens, maybe you would have held your darn-diddily-fundgearoo tongue. But you couldn't, you didn't, and now you're clean of all your sins, you widdillo-skiddily neighborino. I will sing hymns of praise all over you and you will drown in the love of Christ. You're farn-foodily- flank-fiddily reborn, kiddo-diddily.
																		</div>
																		<blockquote id="randID39" class="reply">
																			<!-- replies -->

																		</blockquote>
																	</details>

																</blockquote>
															</details>

														</blockquote>
													</details>

												</blockquote>
											</details>

										</blockquote>
									</details>

								</blockquote>
							</details>

							<details>
								<summary>
									Me
								</summary>
								<div>
									apology for poor english<br>
									when were you when john lenin dies?<br>
									i was sat at home eating smegma butter when pjotr ring<br>
									'john is kill'<br>
									'no'
								</div>
								<blockquote id="randID42" class="reply">
									<!-- replies -->

									<details>
										<summary>
											M&M
										</summary>
										<div>
											Whenever I get a package of plain M&Ms, I make it my duty to continue the strength and robustness of the candy as a species. To this end, I hold M&M duels. Taking two candies between my thumb and forefinger, I apply pressure, squeezing them together until one of them cracks and splinters. That is the “loser,” and I eat the inferior one immediately. The winner gets to go another round. I have found that, in general, the brown and red M&Ms are tougher, and the newer blue ones are genetically inferior. I have hypothesized that the blue M&Ms as a race cannot survive long in the intense theater of competition that is the modern candy and snack-food world. Occasionally I will get a mutation, a candy that is misshapen, or pointier, or flatter than the rest. Almost invariably this proves to be a weakness, but on very rare occasions it gives the candy extra strength. In this way, the species continues to adapt to its environment. When I reach the end of the pack, I am left with one M&M, the strongest of the herd. Since it would make no sense to eat this one as well, I pack it neatly in an envelope and send it to M&M Mars, A Division of Mars, Inc., Hackettstown, NJ 17840-1503 U.S.A., along with a 3x5 card reading, “Please use this M&M for breeding purposes.” This week they wrote back to thank me, and sent me a coupon for a free 1/2 pound bag of plain M&Ms. I consider this “grant money.” I have set aside the weekend for a grand tournament. From a field of hundreds, we will discover the True Champion. There can be only one.
										</div>
										<blockquote id="randID43" class="reply">
											<!-- replies -->

										</blockquote>
									</details>

								</blockquote>
							</details>

						</blockquote>
					</details>

				</div>
			</div>
		</section>
		<section>
			<?php foreach ($topics as $topic): ?>
                <div class="thread">
				<div id="somethingrandomorsomethingidk1" class="message">
						<details>
							<summary>
								<?php echo $topic['title']; ?>
							</summary>
							<div><?php echo $topic['content']; ?></div>
						</details>
					</div>
                </div>
            <?php endforeach; ?>
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
			<input type="file" id="file" accept=".pdf, .doc, .docx, .txt"> 
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
