<?php
declare(strict_types=1);
// Bit map options for filtering input from POST array.
$filterOptions = FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK;
// Use filter to sanitize user input. Also known as the James Wood filter.
$name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING, $filterOptions);
$password = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING, $filterOptions);
// Submit button value. Form has two submit inputs both with the same html name
// but different values. Value used to try signing in or adding new user.
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING, $filterOptions);
/** @noinspection TypeUnsafeComparisonInspection */
if (null == $name || false === $name
    || null == $login || false === $login
    || null == $password || false === $password) {
    $error = 'Invalid user info entered. Check all fields and try again.';
    include 'error.php';
    // Exit (stop) executing PHP so the rest of the code doesn't matter.
    // Makes follow logic easier with less nesting inside else etc.
    exit();
}
require_once 'database.php';
/**
 * Makes IDE code complete work better.
 *
 * @var PDO $db
 */
$query = "SELECT * FROM mc_guitar_shop.users WHERE userName = ':name'";
try {
    /** @var PDOStatement $statement */
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
// Instead of default mixed string and numerically index array result rows
// just return single numeric index array of column values.
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
} catch (\PDOException $e) {
    $error_message = $e->getMessage();
    include 'database_error.php';
    exit();
}
// Switch makes for cleaner logic and easier error handling for unknown values.
switch ($login) {
    case 'Login':
// If user is found and password has correct hash (matches)
        if (false !== $user && password_verify($password, $user['userHash'])) {
            if (password_needs_rehash($user['userHash'], PASSWORD_DEFAULT)) {
                passwordUpdate($db, $user['userID'], $password);
            }
// Instead of including other PHP inline which doesn't change the
// url correctly, should redirect to the display page.
            header('Location: product_list.php', true, 303);
            exit();
        }
        $error = 'Unknown user. Check for typos and try again.';
        include 'index.php';
        exit();
        break;
    case 'Join':
        if (false === $user) {
            userAdd($db, $name, $password);
        }
        $error = 'User already exist or something. Check for typos and try again.';
        include 'index.php';
        exit();
        break;
    default:
        $error = 'Unknown action. Check all fields and try again.';
        include 'error.php';
        exit();
}
/**
 * Used to update database password hash to newer encryption as needed on login.
 *
 * @param PDO    $db
 * @param int    $userID
 * @param string $password
 */
function passwordUpdate(PDO $db, int $userID, string $password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if (false === $hash) {
        /** @noinspection PhpUnusedLocalVariableInspection */
        $error = 'Something went wrong, please try again.';
        include 'error.php';
        exit();
    }
    $query = "UPDATE mc_guitar_shop.users SET userHash = ':hash' WHERE userID = ':id'";
    try {
        /** @var PDOStatement $statement */
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $userID);
        $statement->bindValue(':hash', $hash);
        $statement->execute();
        $statement->closeCursor();
    } catch (\PDOException $e) {
        /** @noinspection PhpUnusedLocalVariableInspection */
        $error_message = $e->getMessage();
        include 'database_error.php';
        exit();
    }
}

/**
 * Function use to keep switch logic shorter and clearer.
 *
 * @param PDO    $db
 * @param string $name
 * @param string $password
 */
function userAdd(PDO $db, string $name, string $password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if (false === $hash) {
        /** @noinspection PhpUnusedLocalVariableInspection */
        $error = 'Something went wrong, please try again.';
        include 'error.php';
        exit();
    }
    $query = 'INSERT INTO cim.users (userName, userHash) VALUES (:name, :hash)';
    try {
        /** @var PDOStatement $statement */
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':hash', $hash);
        $statement->execute();
        $statement->closeCursor();
    } catch (\PDOException $e) {
        /** @noinspection PhpUnusedLocalVariableInspection */
        $error_message = $e->getMessage();
        include 'database_error.php';
        exit();
    }
    header('Location: product_list.php', true, 303);
    exit();
}
