<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Delicious meatball recipe!</title>
    <link rel="stylesheet" href="../../resources/css/reset.css">
    <link rel="stylesheet" href="../../resources/css/nav.css">
    <link rel="stylesheet" href="../../resources/css/recipe.css">
</head>
<body>
<div class="wrapper">
            <?php include Tasty\Util\Constants::getViewFragmentsDir() . 'header.php' ?>
            <section class="top-container-text">
            <div class='title'>
            <h1 id="title">Meatball recipe</h1>
            </div>
            <div>
                <img class="image" src="../../resources/img/meatballForRecipe.jpg" alt="Picture of meatballs" />
            </div>
            <div class="ingredients">
                <h2>Ingredients:</h2>
                <ul>
                    <li> 1/2 cups all-purpose flour</li>
                    <li> 3 1/2 teaspoons baking powder</li>
                    <li> 1 teaspoon salt</li>
                    <li> 1 tablespoon white sugar</li>
                    <li> 1 1/4 cups milk</li>
                    <li> 1 egg</li>
                    <li> 3 tablespoons butter, melted</li>
                </ul>
            </div>
            <div class="directions">
                <h2>Directions:</h2>
                <ul>
                    <li> Pre-heat oven to 220 degrees</li>
                    <li> Mix all ingredients in a large bowl</li>
                    <li> Form the mix into small balls and place on bakingsheet</li>
                    <li> Bake uncovered for 15-22 minutes</li>
                    <li> Enjoy</li>
                </ul>
                </div> 
                <div class="comments">
                <?php
                foreach($comment as $comments){
                    "<div class='all-comments'><p>";
                    echo $comments->getUsername()."<br>";
                    echo $comments->getDate()."<br>";
                    echo nl2br($comments->getMessage())."<br><br>";
                    echo "</p>";
                    if(!empty($this->session->get('userid') && $this->session->get('isLoggedIn') == TRUE)){       
                       if($this->session->get('userid') == $comments->getUserID()) {        
                       echo 
                       '<form class="delete-comment" method="POST"  action="MeatballPage">
                            <input type="hidden" name="commentid" value="'.$comments->getCommentID().'">
                            <button class="delete-btn" type="submit" name="commentdelete" >Delete</button>
                        </form>';
                    }
                }
                }
                if($this->session->get('isLoggedIn') == TRUE){
                    echo 
                '<form method="POST"  action="MeatballPage">
                    <input type="hidden" name="userid" value="'.$this->session->get('userid').'">
                    <input type="hidden" name="date" value="'.date('Y-m-d H:i:s').'">
                    <textarea class="text-for-comment" name="comment" placeholder="Enter your comment here.."></textarea><br>
                    <button type="submit" name="submitcomment">Submit comment</button>
                    </form>';
                }else { echo 'Please login to comment!';}
                echo "</div>";
                ?>
                </div>               
            </section>
    </div>
</body>
</html>