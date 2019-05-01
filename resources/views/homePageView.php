
<!doctype html>
<html lang="en">
<head>
	<title>On and off</title>
    <script type="text/javascript" src="/Resources/js/onOffForm.js"></script>
	</head>
	<body>
	<div>
	<form action="http://130.229.167.163/on" method="post">
  <div>
    <input name="key" type="hidden" id="to" value="/on">
  </div>
  <div>
    <button>Turn On</button>
  </div>
</form>

<form action="http://130.229.167.163/off" method="post">
  <div>
    <input name="key" type="hidden" id="to" value="/off">
  </div>
  <div>
    <button>Turn Off</button>
  </div>
</form>
	</div>
	</body>
</html>
