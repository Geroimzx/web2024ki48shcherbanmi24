<?php
	session_start();
	
	if (isset($_SESSION['user_id'])) {
		header("Location: index.php");
		exit();
	}

	$data = file_get_contents('php://input');
	$decodedData = json_decode($data);

	include("db_connection.php");
	
	$username = $decodedData->name;
	$googleId = $decodedData->sub;

	if (empty($username)) {
		echo json_encode(['status' => 'error']);
	} else {
		$checkStmt = $conn->prepare("SELECT id FROM users WHERE google_id = ?");
		$checkStmt->bind_param("s", $googleId);
		$checkStmt->execute();
		$checkStmt->store_result();

		if ($checkStmt->num_rows > 0) {
			$stmt = $conn->prepare("SELECT id, username FROM users WHERE google_id = ?");
			$stmt->bind_param("s", $googleId);
			$stmt->execute();
			$stmt->bind_result($userId, $username);
			$stmt->fetch();
			
			$_SESSION['user_id'] = $userId;
			$_SESSION['username'] = $username;
			
			$stmt->close();
		} else {
			$insertStmt = $conn->prepare("INSERT INTO users (username, google_id) VALUES (?, ?)");
			$insertStmt->bind_param("ss", $username, $googleId);

			if ($insertStmt->execute()) {
				$_SESSION['user_id'] = $insertStmt->insert_id;
				$_SESSION['username'] = $username;
			} else {
				echo json_encode(['status' => 'error']);
			}
			$insertStmt->close();
		}

		$checkStmt->close();
	}
	
	$conn->close();
	
	echo json_encode(['status' => 'success']);
?>