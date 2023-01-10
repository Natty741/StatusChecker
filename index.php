<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		*{
			margin: 5px;
			padding: 0;
			box-sizing: border-box;
		}
		.online{
			color: #2fcc66;
		}

		.online-box{
			width: 100%;
			padding: 20px;
			background-color: #2fcc66;
			color: white;
		}
		.center{
			max-width: 1100px;
			width: 100%;
			margin: 0 auto;
			padding: 0 2%;
		}

		.row{
			display: flex;
			justify-content: space-between;
			margin: 20px 0;
		}

	</style>
</head>
<body>
	<h2>Status Checker</h2>
	<br/>
	<div class="center">
	<div class="online-box">
		<p>All our systems are up and running!</p>
		<br/>
	</div>

	<div class="table">
		<div class="row">
			<p>WBudget</p>
			<p id="wbud" class="online"><?php echo checkWebSite('https://app.wbudget.com.br') ?></p>
				<script>
  				var paragraph = document.getElementById("wbud");
  				var text = paragraph.textContent;
 			 	if (text == "online") {
   				 paragraph.style.color = "green";
  				} else if (text == "offline") {
   			 	paragraph.style.color = "red";
  				}
				</script>
		</div>
				<div class="row">
			<p>WPages</p>
			<p  id="wpages" class="online"><?php echo checkWebSite('https://app.wpages.com.br') ?></p>
				<script>
  				var paragraph = document.getElementById("wpages");
  				var text = paragraph.textContent;
 			 	if (text == "online") {
   				 paragraph.style.color = "green";
  				} else if (text == "offline") {
   			 	paragraph.style.color = "red";
  				}
				</script>
		</div>
		
	</div>

	</div>
	<?php

function checkWebSite($url){
	//check if url is valid
	if(!filter_var($url, FILTER_VALIDATE_URL)){
		return false;
	}

//Initialize curl
$ch = curl_init($url);

//set options
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,10);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//get the answer
$response = curl_exec($ch);

//close the curl session
curl_close($ch);

return $response ? 'online' : 'offline';
}

?>
</body>
</html>