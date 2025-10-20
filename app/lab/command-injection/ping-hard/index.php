<?php
require("../../../lang/lang.php");

$strings = tr();

?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $strings['title1']; ?></title>
	<link rel="stylesheet" href="./../bootstrap.min.css">
</head>

<body>
	<div class="container text-center">
		<div class="main-wrapper" style="margin-top: 25vh;">
			<div class="header-wrapper">
				<h2 class="col">PING</h2>
			</div>
			<div class="col-md-auto mt-3 d-flex justify-content-center">
				<form method="POST" class="flex-column">
					<input class="form-control" type="text" name="ip" style="width: 500px;">
					<button type="submit" class="btn btn-primary mt-4" style=" width: 500px;">Ping</button>
				</form>
			</div>

		<div class="col-md-auto d-flex justify-content-center" style="">

			<?php
			if (isset($_POST["ip"])) {
					$input = $_POST["ip"];
					// Use escapeshellarg() to ensure the input is treated as a single, safe argument.
					$sanitized_input = escapeshellarg($input);

					// It is also best practice to validate the input format.
					if (filter_var($input, FILTER_VALIDATE_IP)) {
						exec("ping -c 5 " . $sanitized_input, $out);
						if (!empty($out)) {
							echo '<div class="mt-5 alert alert-primary" role="alert" style=" width:500px;" > <strong>  <p style="text-align:center;">';
							foreach ($out as $line) {
								echo htmlspecialchars($line, ENT_QUOTES, 'UTF-8');
								echo "<br>";
							}
							echo ' </p></strong></div>';
						}
					} else {
						echo '<div class="mt-5 alert alert-danger" role="alert" style=" width:500px;" > <strong>  <p style="text-align:center;">ERROR: Invalid IP address format.</p></strong></div>';
					}
				}
			?>
		</div>
	</div>
</div>
	<script id="VLBar" title="<?= $strings['title1'] ?>" category-id="4" src="/public/assets/js/vlnav.min.js"></script>
</body>

</html>