<?php
session_start();

$servername = "localhost"; 
$username = "Ardjun_Beroeps2";  
$password = "HEDEH2991";  
$dbname = "Beroeps_2_verzamelaar"; 

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Controleer de inloggegevens met de database
    $sql = "SELECT * FROM jouw_gebruikerstabel WHERE email = ?"; // Vervang 'jouw_gebruikerstabel' met de naam van je gebruikerstabel
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) { // Aangenomen dat je wachtwoorden hebt gehasht met password_hash
        // Als de inloggegevens correct zijn
        $_SESSION['user_email'] = $email; // Hier wordt de sessievariabele ingesteld
        header("Location: index.php"); // Stuur de gebruiker door naar de hoofdpagina of een dashboard
        exit; // Voeg dit toe om ervoor te zorgen dat de rest van de code niet wordt uitgevoerd na een header redirect
    } else {
        // Als de inloggegevens onjuist zijn
        echo "Onjuiste e-mail of wachtwoord";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photography Portal - Login & Sign Up</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2>Photography Portal</h2>
                        <p class="text-muted">Join our community or sign in</p>
                    </div>
                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="login-tab" data-toggle="pill" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="register-tab" data-toggle="pill" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <!-- Login Form -->
                            <form action="process.php" method="post">
                                <div class="form-group">
                                    <label for="loginEmail">Email:</label>
                                    <input type="email" name="loginEmail" class="form-control" id="loginEmail" required>
                                </div>
                                <div class="form-group">
                                    <label for="loginPassword">Password:</label>
                                    <input type="password" name="loginPassword" class="form-control" id="loginPassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <!-- Register Form -->
                            <form action="process.php" method="post">
                                <div class="form-group">
                                    <label for="signUpEmail">Email:</label>
                                    <input type="email" name="signUpEmail" class="form-control" id="signUpEmail" required>
                                </div>
                                <div class="form-group">
                                    <label for="signUpPassword">Password:</label>
                                    <input type="password" name="signUpPassword" class="form-control" id="signUpPassword" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password:</label>
                                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./javascript/login.js"></script>

</body>
</html>
