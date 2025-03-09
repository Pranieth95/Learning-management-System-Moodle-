<?php

	include 'config.php';
	$PHPtext = "Please Log in first.";
?>
<html>
<head>
	<script type="text/javascript">
		
		var JavaScriptAlert = <?php echo json_encode($PHPtext); ?>;
alert(JavaScriptAlert); // Your PHP alert!
window.location.replace("index.php");


	</script>
	</head>
</html>