<!DOCTYPE html>
<html>
    <head>
        <title><?php include CHAT_FRAGMENTS . 'title.php' ?></title>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="resources/css/reset.css" />
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="resources/css/ie6.css" /><![endif]-->
        <link rel="stylesheet" type="text/css" href="resources/css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="resources/css/4cols.css" />
        <link rel="stylesheet" type="text/css" href="resources/css/8cols.css" />
        <link rel="stylesheet" type="text/css" href="resources/css/chat.css" />
    </head>
    <body>
        <header class="section group">
            <?php include CHAT_FRAGMENTS . 'header.php' ?>
        </header>
        <main class="section group">
            <nav class="section group">
                <?php include CHAT_FRAGMENTS . 'nav.php' ?>
            </nav>
            <div class="section group">
                <div class="col span_4_of_4">
                    <h1><?php include CHAT_FRAGMENTS . 'title.php' ?></h1>
                </div>
            </div>
            <div class="section group">
                <h2 class="col span_2_of_4">Please enter your nick name</h2>
            </div>
            <form action="do-login.php" method='post'>
                <div class="section group">
                    <div class="col span_2_of_4">
                        <label for="nickName">Nick Name:</label>
                        <input type="text" id="nickName" name='nickName' class='text-author'/>
                    </div>
                </div>
                <div class="section group">
                    <div class="col span_1_of_4">
                        <input type="submit" value="OK"/>
                    </div>
                </div>
            </form>
            <footer class="section group">
                <?php include CHAT_FRAGMENTS . 'footer.php' ?>
            </footer>
        </main>
    </body>
</html>
