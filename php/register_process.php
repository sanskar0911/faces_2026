<?php
// php/register_process.php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $college = htmlspecialchars($_POST['college_name']);
    $branch = htmlspecialchars($_POST['branch']);
    $year = htmlspecialchars($_POST['year']);
    $gender = htmlspecialchars($_POST['gender']);
    $sport = htmlspecialchars($_POST['selected_sport']);
    $emergency = htmlspecialchars($_POST['emergency_contact']);

    try {
        $sql = "INSERT INTO students (full_name, email, phone, college_name, branch, year, gender, selected_sport, emergency_contact) 
                VALUES (:full_name, :email, :phone, :college, :branch, :year, :gender, :sport, :emergency)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':college', $college);
        $stmt->bindParam(':branch', $branch);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':sport', $sport);
        $stmt->bindParam(':emergency', $emergency);
        
        $stmt->execute();
        
        echo json_encode([
            "status" => "success",
            "message" => "<strong>Success!</strong> You have been registered for $sport. Check your email for further instructions."
        ]);
    } catch(PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "<strong>Error!</strong> Could not complete registration. " . $e->getMessage()
        ]);
    }
}
?>
