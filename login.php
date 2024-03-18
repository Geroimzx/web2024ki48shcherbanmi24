<?php
	session_start();
	
	if (isset($_SESSION['user_id'])) {
		header("Location: index.php");
		exit();
	}
	
    include("db_connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt->bind_result($id, $hashedPassword);
		$stmt->fetch();
		$stmt->close();

		if (password_verify($password, $hashedPassword)) {
			$_SESSION['user_id'] = $id;
			$_SESSION['username'] = $username;

			header("Location: index.php");
			exit();
		} else {
			echo "Invalid username or password";
		}
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-signin-client_id" content="104243150699-ql7e7sg2dkfdokmq127h31f70k1j132m.apps.googleusercontent.com">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
	<script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>

    <?php
		include("header.php");
	?>

    <section>		
		<form action="login.php" method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" required><br>

			<label for="password">Password:</label>
			<input type="password" name="password" required><br>

			<input type="submit" value="Login">
		</form>
		
		<div id="g_id_onload"
			data-client_id="104243150699-ql7e7sg2dkfdokmq127h31f70k1j132m.apps.googleusercontent.com"
			data-callback="handleCredentialResponse"
			data-auto_prompt="false">
		</div>
		<div 
			class="g_id_signin"
			data-type="standard"
			data-size="large"
			data-theme="outline"
			data-text="sign_in_with"
			data-shape="rectangular"
			data-logo_alignment="left">
		</div>
		<script>
			function handleCredentialResponse(response) {
				console.log(response.credential);

				const decodedPayload = decodeToken(response.credential);
				console.log("Decoded Payload:", decodedPayload);

				const xhr = new XMLHttpRequest();
				xhr.open('POST', 'google_response_handle.php', true);
				xhr.setRequestHeader('Content-Type', 'application/json');

				xhr.onreadystatechange = function() {
					if (xhr.readyState === XMLHttpRequest.DONE) {
						if (xhr.status === 200) {
							console.log('Server response:', xhr.responseText);
							window.location.href = 'index.php';
						} else {
							console.error('Error in server response');
						}
					}
				};

				xhr.send(JSON.stringify(decodedPayload));
			}

			function decodeToken(token) {
				const base64Url = token.split('.')[1];
				const base64 = base64Url.replace('-', '+').replace('_', '/');
				return JSON.parse(atob(base64));
			}
		</script>
	</section>
    <?php
		include("footer.php");
	?>
</body>
</html>