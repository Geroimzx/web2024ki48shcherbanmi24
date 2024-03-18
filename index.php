<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My business card</title>
    <link rel="stylesheet" href="styles.css">
	<style>
		section {
            margin: 20px;
            text-align: center;
        }
	</style>
</head>
<body>

	<?php
		include("header.php");
	?>

    <section>
        <h2>Hello, I'm - Mykhailo Shcherban</h2>
        <p>I’m a student of Lviv Polytechnic National University and studying for a bachelor's degree in Сomputer engineering.</p>
		<?php
        if (isset($_GET['showMore']) && $_GET['showMore'] == 'true') {
            echo '<section>';
			echo '<p>In order to learn more, use the navigation menu above:</p>';
			echo '<p><strong>Experiences:</strong> to learn about my education and skills;</p>';
			echo '<p><strong>Projects:</strong> to learn about the projects I created;</p>';
			echo '<p><strong>Contact:</strong> to contact me.</p>';
			echo '</section>';
        } else {
			echo '<form action="index.php" method="get">';
            echo '<form action="index.php" method="get">';
            echo '<input type="hidden" name="showMore" value="true">';
            echo '<button type="submit">Learn more</button>';
            echo '</form>';
        }
		?>
	</section>

    <?php
		include("footer.php");
	?>

</body>
</html>
