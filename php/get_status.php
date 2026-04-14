<?php
// php/get_status.php
require_once 'config.php';

if (isset($_GET['email'])) {
    $email = htmlspecialchars($_GET['email']);

    try {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $registrations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($registrations) {
            foreach ($registrations as $row) {
                echo "
                <div class='glass' style='padding: 2rem; margin-bottom: 1rem; border-left: 5px solid var(--primary-neon);'>
                    <div style='display: flex; justify-content: space-between; align-items: center;'>
                        <div>
                            <h3 style='color: var(--primary-neon);'>{$row['selected_sport']}</h3>
                            <p>Status: <span style='color: " . ($row['payment_status'] == 'Completed' ? 'var(--primary-neon)' : 'orange') . ";'>{$row['payment_status']}</span></p>
                        </div>
                        <div style='text-align: right;'>
                            <p style='font-size: 0.8rem; color: var(--text-muted);'>Registered on: {$row['registration_date']}</p>
                            <p><strong>{$row['full_name']}</strong></p>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<p style='text-align:center;'>No registrations found for this email.</p>";
        }
    } catch(PDOException $e) {
        echo "<p style='color:red;'>Error fetching status.</p>";
    }
}
?>
