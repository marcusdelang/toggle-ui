
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="resources/js/comment.js"></script>


			<div class="mbox">
				<br>
				<div class="divrow">
					<h2 style="text-align: left">Do you like it? Leave your comments if you wish.</h2>
					<div class="divleft" id="allComments">
						<?php
							include 'readComment.php';
							require_once './resources/fragments/start.php';
							use TastyRecipes\Controller\SessionManager;
							$controller = SessionManager::getController();
							if($result_array){
								foreach($result_array as $array){
								echo "Username: " . $array["username"] . "<br>" . "Comment: " . $array["comment"] . "<br>";
								$username = $array["username"];
								$time = $array["time"];
								if(isset($_SESSION['username'])){
									$currentUser = $_SESSION['username'];
									if ($username === $currentUser) {
										echo    '<form method="post">
										<input type="hidden" value="'.$time.'" name="time">
										<input type="submit" name="delete" value="Delete" class="button">
										</form>';
										echo "<br>";
										include "deleteComment.php";
									}
								}else {
									echo "<br>";
								}
								echo "<br>";
								}
							}
						?>
					</div>

					<div class="divright" id="new-comment">

					<form action="" method="POST" >
						<textarea cols="50" rows="6" name="commentText" id="commentText"></textarea>
						<input id="submitComment" type="button" value="Submit" name="commentButton"><br><br>
					<form>
					<br><br><br>
					</div>
				</div>
			</div>










