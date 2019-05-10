<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="resources/css/reset.css" />
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="resources/css/ie6.css" /><![endif]-->
        <link rel="stylesheet" type="text/css" href="resources/css/mainstructure.css" />
        <link rel="stylesheet" type="text/css" href="resources/css/navigationbar.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
			    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			    crossorigin="anonymous">
        </script>
        <script src="resources/js/device.js"/></script>
    </head>
    <body>
        <?php include($_SERVER["DOCUMENT_ROOT"].'/resources/fragments/header.php'); ?>
        <main class="main-structure">
            <div class="div-structure">
            <h1>Here are your devices</h1>
            <form id='deviceForm' method='POST' >
                <button type="submit" name="action" value="delete">________</button>
                <input  type="text" name="text" value="ID of your device" readonly="readonly"/>
                <input  type="text" name="text" value="Name of Device" readonly="readonly"/>
                <input  type="text" name="text" value="Power Status" readonly="readonly"/>
                <input  type="text" name="text" value="Connection Status" readonly="readonly"/>
                <input  type="text" name="tex" value="Additional remarks"/>
            </form>
            <div class="all-devices"></div>
                <button id="toggle_device_status" 
                        type="submit"   
                        name="action" 
                        value="delete">Toggle</button>
                <input  id="device_token" 
                        type="text" 
                        name="text" 
                        value="test_token" 
                        readonly="readonly"/>
                <input  type="text" 
                        name="text" 
                        value="Kitchen" 
                        readonly="readonly"/>
                <input  id="power_status" 
                        type="text" 
                        name="text" 
                        value="N/A" 
                        placeholder="unknown"
                        readonly="readonly"/>
                <input  id="connectivity_status" 
                        type="text" 
                        name="text" 
                        value="Offline" 
                        readonly="readonly"/>
                <input  type="text" 
                        name="tex" 
                        value="On the sink in kitchen"/>
                <button type="submit" 
                        name="action" 
                        value="delete">Remove</button>
            <form>
                <button type="submit" name="action" value="update">Add new device</button>
            </form>
            </div>
            <footer class="section group">
            <?php include($_SERVER["DOCUMENT_ROOT"].'/resources/fragments/footer.php'); ?>
            </footer>
        </main>
    </body>
</html>