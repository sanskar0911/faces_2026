<?php
// admin.php
require_once 'php/config.php';

// Simple session-based login (hardcoded for demo)
session_start();
$admin_pass = "admin123";

if (isset($_POST['password'])) {
    if ($_POST['password'] === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        $error = "Incorrect password!";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | FACES 2026</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 2rem; color: white; }
        th, td { padding: 1rem; border: 1px solid var(--glass-border); text-align: left; }
        th { background: rgba(57, 255, 20, 0.1); color: var(--primary-neon); }
        tr:nth-child(even) { background: rgba(255,255,255,0.02); }
    </style>
</head>
<body style="padding: 50px;">

    <?php if (!isset($_SESSION['admin_logged_in'])): ?>
        <div class="glass" style="max-width: 400px; margin: 100px auto; padding: 2rem;">
            <h2 style="text-align:center; color: var(--primary-neon);">Admin Login</h2>
            <form method="POST">
                <input type="password" name="password" class="form-control" style="width:100%; margin: 1rem 0; padding:0.8rem; background:rgba(255,255,255,0.05); border:1px solid var(--glass-border); color:white;" placeholder="Password">
                <button type="submit" class="btn-primary" style="width:100%;">Login</button>
                <?php if(isset($error)) echo "<p style='color:red; margin-top:1rem;'>$error</p>"; ?>
            </form>
        </div>
    <?php else: ?>
        <nav id="navbar" class="sticky">
            <a href="index.html" class="brand">FACES 2026 ADMIN</a>
            <ul class="nav-links">
                <li><a href="admin.php">Dashboard</a></li>
                <li><a href="?logout=1">Logout</a></li>
            </ul>
        </nav>

        <section>
            <div class="section-title">
                <h2>Registrations</h2>
                <p>Manage participants for FACES 2026.</p>
            </div>

            <div class="glass" style="padding: 2rem;">
                <!-- Filter form space -->
                <div style="margin-bottom: 2rem; display: flex; justify-content: space-between;">
                    <h3 style="color:var(--secondary-neon);">All Participants</h3>
                    <a href="php/export_csv.php" class="btn-primary" style="font-size: 0.8rem;">Export CSV</a>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sport</th>
                            <th>College</th>
                            <th>Year</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $pdo->query("SELECT * FROM students ORDER BY registration_date DESC");
                        while ($row = $stmt->fetch()) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['full_name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['selected_sport']}</td>
                                <td>{$row['college_name']}</td>
                                <td>{$row['year']}</td>
                                <td>" . date('d M, Y', strtotime($row['registration_date'])) . "</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endif; ?>
</body>
</html>
