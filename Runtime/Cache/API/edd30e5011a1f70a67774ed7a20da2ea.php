<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>测试</title>
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
	</head>
	<body>
		<div id="result"></div>
		<script>
			$.ajax({
				url: "./discuz",
				dataType: "json",
				success: function(data) {
					$("#result").text(data.msg);
				}
			});
		</script>
	</body>
</html>