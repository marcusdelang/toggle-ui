<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="resources/css/reset.css" />
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="resources/css/ie6.css" /><![endif]-->
        <link rel="stylesheet" type="text/css" href="resources/css/mainstructure.css" />
        <link rel="stylesheet" type="text/css" href="resources/css/navigationbar.css" />
        <link rel="stylesheet" type="text/css" href="resources/css/login.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
			    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			    crossorigin="anonymous">
        </script>
        <script src="resources/js/device.js"></script>
        <script>f
        unction processAjaxData(response, urlPath){
        document.getElementById("content").innerHTML = response.html;
        document.title = response.pageTitle;
        window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath);
        }</script>
    </head>
    <body>
        <?php include($_SERVER["DOCUMENT_ROOT"].'/resources/fragments/header.php'); ?>
        <main class="main-structure">
            <div class="login-structure">       
            <form>
            <label for="username">Username:</label>
            <input id="username" type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input id="password" type="password" id="password" name="password">
            <div>
            <input id="submit" type="submit" value="Login">
            </div>
            </form>
            </div>
            <footer class="footer-structure">
            <?php include($_SERVER["DOCUMENT_ROOT"].'/resources/fragments/footer.php'); ?>
            </footer>
        </main>
    </body>
</html>