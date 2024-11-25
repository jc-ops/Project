<?php
session_start();

// Users array with hashed passwords
$users = [
    'Jansent' => password_hash('Bazar2401', PASSWORD_DEFAULT),
    'Janna' => password_hash('Roldan2402', PASSWORD_DEFAULT),
    'Jc' => password_hash('Encio2403', PASSWORD_DEFAULT),
    'Cathy' => password_hash('Dela cruz2404', PASSWORD_DEFAULT),
    'Niña' => password_hash('Dionisio2405', PASSWORD_DEFAULT)
];

// Check if the user is logging out
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOLAR SYSTEM</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php if (isset($_SESSION['username'])): ?>
        <h1>WELCOME TO SOLAR SYSTEM</h1>
        <header>
            <nav>
                <a href="#">HOME</a>
                <a href="?logout">LOG OUT</a>
                <a href="orbit.html" class="orbit-button">View Planet Orbits</a>
            </nav>
        </header>

        <section class="about">
        <h1><strong>Here you can explore the planets in our solar system and learn more about them.</strong></h1>
    </section>


        <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        
        <h2>Planets</h2>
        <ul class="planets-list">
            <li>
                <div class="planet-box">
                    <div class="planet-name">Mercury:</div>
                    <img src="images/mercury.jpg" alt="Mercury">
                    <p class="planet-description">The closest planet to the Sun.</p>
                </div>
            </li>
            <li>
                <div class="planet-box">
                    <div class="planet-name">Venus:</div>
                    <img src="images/venus.jpg" alt="Venus">
                    <p class="planet-description">The second planet, known for its thick atmosphere.</p>
                </div>
            </li>
            <li>
                <div class="planet-box">
                    <div class="planet-name">Earth:</div>
                    <img src="images/earth.jpg" alt="Earth">
                    <p class="planet-description">Our home planet, the third from the Sun.</p>
                </div>
            </li>
            <li>
                <div class="planet-box">
                    <div class="planet-name">Mars:</div>
                    <img src="images/mars.jpg" alt="Mars">
                    <p class="planet-description">The red planet, known for its iron oxide surface.</p>
                </div>
            </li>
            <li>
                <div class="planet-box">
                    <div class="planet-name">Jupiter:</div>
                    <img src="images/jupiter.jpg" alt="Jupiter">
                    <p class="planet-description">The largest planet in our solar system.</p>
                </div>
            </li>
            <li>
                <div class="planet-box">
                    <div class="planet-name">Saturn:</div>
                    <img src="images/saturn.jpg" alt="Saturn">
                    <p class="planet-description">Known for its stunning rings.</p>
                </div>
            </li>
            <li>
                <div class="planet-box">
                    <div class="planet-name">Uranus:</div>
                    <img src="images/uranus.jpg" alt="Uranus">
                    <p class="planet-description">An ice giant with a unique tilt.</p>
                </div>
            </li>
            <li>
                <div class="planet-box">
                    <div class="planet-name">Neptune:</div>
                    <img src="images/neptune.jpg" alt="Neptune">
                    <p class="planet-description">The farthest planet from the Sun.</p>
                </div>
            </li>
        </ul>

        <footer>
            <p>&copy; 2023 Solar System. All rights reserved.</p>
        </footer>

    <?php else: ?>
        <!-- Login Form -->
        <form method="POST" action="">
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Login">
            <?php if (isset($error)): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    <?php endif; ?>
</body>
</html>
