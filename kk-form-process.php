<?php


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errorNote = 'Invalid email format. ';
}

if (!$email || !$name || !$message) {
	$errorNote .= 'Please fill out all of the fields.';
}

if ($errorNote) {
	?>
	<!DOCTYPE html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
	</head>

	<style>

	* {
		margin: 0;
		padding: 0;
		border: 0;
		outline: 0;
		font-size: 100%;
		vertical-align: baseline;
		background: transparent;
	}

	h1 {
		font-family: 'Poppins', sans-serif;
		font-size: 22px;
		font-weight: 500;
		color: black;
		text-align: center;
	}


	p3 {
		font-family: 'Poppins', sans-serif;
		font-size: 16px;
		line-height: 1.5em;
	}

	input[type=text], select, textarea {
		width: 100%;
		padding: 12px;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		margin-top: 6px;
		margin-bottom: 16px;
		resize: none;
		font-family: Arial, Helvetica, sans-serif;
		background-color: #f2f2f2;
	}

	input[type=submit] {
		background-color: #28537c;
		color: white;
		padding: 12px 20px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	input[type=submit]:hover {
		background-color: #63819f;
	}

	.contactContainer {
		width: 100%;
		border-radius: 5px;
		text-align: left;
		color: black;
		font-weight: 200;
	}

	#warning {
		margin-top: 5px;
		color: red;
		font-weight: 500;
	}

	@media (min-width: 500px) {

		h1 {
			font-size: 28px;
		}
		p3 {
			font-size: 20px;
		}
	}

	</style>


	<body>
			<div class="contactContainer">
				<form action="https://kevinjbeaty.com/projects/kk-form-process.php" method="POST">

					<label for="name"><p3><em>Name</em></p3></label>
					<input type="text" id="name" name="name" placeholder="Your name..." value="<?php echo $name;?>">

					<label for="email"><p3><em>Email</em></p3></label>
					<input type="text" id="email" name="email" placeholder="Your email..." value="<?php echo $email;?>">

					<label for="message"><p3><em>Message</em></p3></label>
					<textarea id="message" name="message" placeholder="Your message..." style="height:150px"><?php echo $message;?></textarea>

					<input type="submit" value="Submit">				
				</form>
				<div id='warning'><p3><?php echo $errorNote;?></p3></div>
			</div>	
	</body>

	</html>
	<?php

}
else {

$message = str_ireplace(array("\r","\n",'\r','\n'),'', $message);
$message = filter_var($message, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $headers = "From: $email \r\n";
        $headers .= "Reply-To: ".$email."\r\n";
        $headers .= "Return-Path: ".$email."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;$message = 'New email from '.$name.'//'.$email.': '.$message;
$sent = mail('thatkevinkid89@gmail.com', 'New message from your website!', $message, $headers);

if ($sent) {
	?>
	<!DOCTYPE html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
	</head>

	<style>

	* {
		margin: 0;
        	padding: 0;
        	border: 0;
        	outline: 0;
        	font-size: 100%;
        	vertical-align: baseline;
        	background: transparent;
	}

	h1 {
		font-family: 'Poppins', sans-serif;
		font-size: 22px;
		font-weight: 500;
		color: black;
		text-align: center;
	}


	.container {
		width: 80%;
		text-align: center;
		padding: 10%;
		background-color: #c3cdd9;
	}

	@media (min-width: 500px) {

		h1 {
			font-size: 28px;
		}
	}

	</style>


	<body>
			<div class="container">
				<h1>Thanks for writing!<br><br>I'll be in touch soon!</h1>
			</div>	
	</body>

	</html>
	<?php
}}
?>
