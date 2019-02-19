<!DOCTYPE html>
<html lang="en">
<!-- the head section -->
<head>
    <title>Chart It MD</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<!-- the body section -->
<body>
<header>
    <h1>ChartItMD</h1>
</header>
<main>
    <?php
    if (!empty($error)) {
        print '<p style="color: red; font-weight: bold;">' . $error . '</p>';
    }
    ?>
    <form action="login.php" method="post">
        <label>Username:<input name="user_name" type="text"></label><br>
        <label>Password:<input name="user_password" type="password"></label><br>
        <input name="login" type="submit" value="Login">
    </form>
</main>
<footer>
    <p>&copy; <?= date('Y'); ?> ChartItMD Development Group</p>
</footer>
</body>
</html>
