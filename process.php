<?php
$host = 'localhost';
$db   = 'Beroeps_2_verzamelaar';
$user = 'Ardjun_Beroeps2';
$pass = 'HEDEH2991'; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
        // Login logic
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, redirect to index.html
            header("Location: index.html");
            exit;
        } else {
            // Invalid credentials
            echo "Invalid email or password!";
        }
    } elseif (isset($_POST['signUpEmail']) && isset($_POST['signUpPassword']) && isset($_POST['confirmPassword'])) {
        $email = $_POST['signUpEmail'];
        $password = password_hash($_POST['signUpPassword'], PASSWORD_DEFAULT); // Hashing the password

        $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->execute([$email, $password]);

        // Redirect back to the login page (login.php) after registration
        header("Location: login.php");
        exit;
    }
}
?>
