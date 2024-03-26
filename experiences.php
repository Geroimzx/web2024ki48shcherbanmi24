<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Experiences</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php
		include("header.php");
	?>

    <section>
		<h1>EDUCATION AND TRAINING</h1>
        <table>
            <tr>
                <td>September 2020 – Present (June 2024 graduation)</td>
                <td>Bachelor of Computer Engineering</td>
                <td>Lviv Polytechnic National University, Lviv, Ukraine</td>
            </tr>
            <tr>
                <td>September 2018 – June 2020</td>
                <td>Complete general secondary education (direction of information technology)</td>
                <td>Drohobych Lyceum of Drohobych City Council of Lviv region, Drohobych, Lviv region, Ukraine</td>
            </tr>
        </table>
    </section>
	
	<section>
		<h1>PERSONAL SKILLS</h1>
		<h3>Mother tongue(s): Ukrainian</h3>
        <table>
            <tr>
                <th>Language</th>
                <th>Understanding</th>
                <th>Speaking</th>
                <th>Writing</th>
            </tr>
			<tr>
                <th>English</th>
                <td>B2</td>
                <td>B1</td>
                <td>B2</td>
            </tr>
            <tr>
                <th>German</th>
                <td>A2</td>
                <td>A2</td>
                <td>A2</td>
            </tr>
        </table>
		<h3>Communication skills:</h3>
		<p>Team work in programming competitions. Excellent verbal and written communication skills both in an office environment and with external stakeholders. Experienced at giving presentations to large audiences.</p>
		<h3>Organisational / managerial skills:</h3>
		<p>Excellent organisational and prioritisation skills.</p>
		<h3>Computer skills:</h3>
		<p>Java Core, C++ Core, MySQL, PostgreSQL, MongoDB, Spring MVC, Spring Boot, HTML, CSS, JavaScript, Microsoft Word and Excel.</p>
    </section>

	<?php
		include("footer.php");
	?>

</body>
</html>
