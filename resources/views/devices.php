<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="resources/css/reset.css" />
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="resources/css/ie6.css" /><![endif]-->
        <link rel="stylesheet" type="text/css" href="resources/css/devices.css" />

    </head>
    <body>
        <?php include TOGGLE_FRAGMENTS . 'header.php' ?>
        <main class="section group">
            <div class="section group">
            <h1>Here are your devices</h1>
            <form>
                <button type="submit" name="action" value="delete">________</button>
                <input type="text" name="text" value="ID of your device" readonly="readonly"/>
                <input type="text" name="text" value="Name of Device" readonly="readonly"/>
                <input type="text" name="text" value="Power Status" readonly="readonly"/>
                <input type="text" name="text" value="Connection Status" readonly="readonly"/>
                <input type="text" name="tex" value="Additional remarks"/>
            </form>
            <form>
                <button type="submit" name="action" value="delete">Toggle</button>
                <input type="text" name="text" value="6Wl93iesIV" readonly="readonly"/>
                <input type="text" name="text" value="Kitchen" readonly="readonly"/>
                <input type="text" name="text" value="On" readonly="readonly"/>
                <input type="text" name="text" value="Offline" readonly="readonly"/>
                <input type="text" name="tex" value="On the sink in kitchen"/>
                <button type="submit" name="action" value="delete">Remove</button>
            </form>
            <form>
                <button type="submit" name="action" value="delete">Toggle</button>
                <input type="text" name="text" value="6Wl93iesIV" readonly="readonly"/>
                <input type="text" name="text" value="Kitchen" readonly="readonly"/>
                <input type="text" name="text" value="On" readonly="readonly"/>
                <input type="text" name="text" value="Offline" readonly="readonly"/>
                <input type="text" name="tex" value="On the sink in kitchen"/>
                <button type="submit" name="action" value="delete">Remove</button>
            </form>
            <form>
                <button type="submit" name="action" value="delete">Toggle</button>
                <input type="text" name="text" value="6Wl93iesIV" readonly="readonly"/>
                <input type="text" name="text" value="Kitchen" readonly="readonly"/>
                <input type="text" name="text" value="On" readonly="readonly"/>
                <input type="text" name="text" value="Offline" readonly="readonly"/>
                <input type="text" name="tex" value="On the sink in kitchen"/>
                <button type="submit" name="action" value="delete">Remove</button>
            </form>
            <form>
                <button type="submit" name="action" value="update">Add new device</button>
            </form>
            </div>
            <footer class="section group">
                <?php include TOGGLE_FRAGMENTS . 'footer.php' ?>
            </footer>
        </main>
    </body>
</html>