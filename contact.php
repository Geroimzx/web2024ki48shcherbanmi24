<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("sendMessageBtn").addEventListener("click", function(e) {
				e.preventDefault();

				var form = document.getElementById("contactForm");

				var nameInput = form.querySelector('input[name="name"]');
				var emailInput = form.querySelector('input[name="email"]');
				var messageInput = form.querySelector('textarea[name="message"]');

				if (nameInput.value.trim() === "") {
					alert("Please enter your name");
					return;
				}

				if (emailInput.value.trim() === "" || !isValidEmail(emailInput.value.trim())) {
					alert("Please enter a valid email address");
					return;
				}

				if (messageInput.value.trim() === "") {
					alert("Please enter your message");
					return;
				}

				var formData = new FormData(form);

				var xhr = new XMLHttpRequest();
				xhr.open("POST", "form.php", true);

				xhr.onload = function() {
					if (xhr.status === 200) {
						document.getElementById("contactForm").innerHTML = "<p>Thank you, " + nameInput.value.trim() + ", for contacting me!</p>";
					} else {
						alert("Error: " + xhr.statusText);
					}
				};

				xhr.send(formData);
			});

			// Допоміжна функція для перевірки валідності email
			function isValidEmail(email) {
				var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				return emailRegex.test(email);
			}
		});
	</script>


</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="experiences.php">Experiences</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Contact Information</h2>
        <p><i class="fas fa-envelope"></i> Email: <a href="mailto:mykhailo.shcherban.ki.2020@lpnu.ua">mykhailo.shcherban.ki.2020@lpnu.ua</a></p>
        <p><i class="fab fa-linkedin"></i> LinkedIn: <a href="https://www.linkedin.com/in/mykhailo-shcherban-8b8a1a243/" target="_blank">https://www.linkedin.com/in/mykhailo-shcherban-8b8a1a243/</a></p>
        <p><i class="fab fa-telegram"></i> Telegram: <a href="https://t.me/gr_mx" target="_blank">https://t.me/gr_mx</a></p>
        <p><i class="fab fa-github"></i> GitHub: <a href="https://github.com/Geroimzx" target="_blank">https://github.com/Geroimzx</a></p>

        <h2>Contact Me</h2>
		<form id="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<label for="name">Name:</label>
			<input type="text" name="name" required><br>

			<label for="email">Email:</label>
			<input type="email" name="email" required><br>

			<label for="message">Message:</label>
			<textarea name="message" rows="4" required></textarea><br>

			<input type="submit" id="sendMessageBtn" value="Send a message">
		</form>
    </section>

    <footer>
        &copy; 2024 Mykhailo Shcherban
    </footer>

</body>
</html>
