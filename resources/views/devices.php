<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="shortcut icon" href="#" />
        <link rel="stylesheet" type="text/css" href="resources/css/reset.css" />
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="resources/css/ie6.css" /><![endif]-->
        <link rel="stylesheet" type="text/css" href="resources/css/mainstructure.css" />
        <link rel="stylesheet" type="text/css" href="resources/css/navigationbar.css" />
        <link rel="stylesheet" type="text/css" href="resources/css/devices.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
			    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			    crossorigin="anonymous">
        </script>
        <script src="resources/js/device.js"></script>
        <script src="resources/js/logout.js"></script>

    </head>
    <body>
        <?php include($_SERVER["DOCUMENT_ROOT"].'/resources/fragments/header.php'); ?>
        <main class="main-structure">
            <h1>Here are your devices</h1>
            <div class="div-structure">
            <div class="device-header">
                <input  type="text" name="text" value="ID of your device" readonly="readonly"/>
                <input  type="text" name="text" value="Name of Device" readonly="readonly"/>
                <input  type="text" name="text" value="Power Status" readonly="readonly"/>
                <input  type="text" name="text" value="Connection Status" readonly="readonly"/>
            </div>
            <div class="device-items">
            </div>
            <div class="add-device">  
                <a href="addDevicePage.php" id="add_device" role="button" name="action">Add new device</a>
            </div>
            </div>
            <footer class="footer-structure">
            <?php include($_SERVER["DOCUMENT_ROOT"].'/resources/fragments/footer.php'); ?>
            </footer>
        </main>
    </body>
</html>