<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="experiences.php">Experiences</a></li>
            <li><a href="projects.php">Projects</a></li>
            <li><a href="contact.php">Contact</a></li>
           <?php if (isset($_SESSION['user_id'])) : ?>
                <li class="right-align">
                    <div class="username-box">
                        <p><?php echo $_SESSION['username'];?></p>
                    </div>
                </li>
                <li class="right-align"><a href="logout.php">Logout</a></li>
            <?php else : ?>
                <li class="right-align"><a href="login.php">Login</a></li>
                <li class="right-align"><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
