<?php
// check-admin.php - Debug script to check admin table and admin accounts
require_once 'includes/db.php';

try {
    echo "<h2>Admin Table Information</h2>";

    // Check if admin table exists
    $tables = $pdo->query("SHOW TABLES LIKE 'admin'")->fetchAll();
    if (count($tables) == 0) {
        echo "<p style='color:red'>Admin table does not exist!</p>";

        echo "<p>Creating admin table...</p>";
        $pdo->exec("CREATE TABLE IF NOT EXISTS admin (
            AdminID INT AUTO_INCREMENT PRIMARY KEY,
            Admin_name VARCHAR(50) NOT NULL UNIQUE,
            Password VARCHAR(255) NOT NULL,
            Email VARCHAR(255) NOT NULL UNIQUE
        )");
        echo "<p style='color:green'>Admin table created successfully!</p>";
    } else {
        echo "<p style='color:green'>Admin table exists!</p>";

        // Get table structure
        echo "<h3>Table Structure:</h3>";
        echo "<pre>";
        $columns = $pdo->query("SHOW COLUMNS FROM admin")->fetchAll(PDO::FETCH_ASSOC);
        print_r($columns);
        echo "</pre>";

        // Count admins
        $count = $pdo->query("SELECT COUNT(*) FROM admin")->fetchColumn();
        echo "<p>Number of admin accounts: $count</p>";

        // Show admin info without showing actual passwords
        if ($count > 0) {
            echo "<h3>Admin Accounts:</h3>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>AdminID</th><th>Admin_name</th><th>Email</th><th>Password Hash Length</th></tr>";

            $admins = $pdo->query("SELECT * FROM admin")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($admins as $admin) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($admin['AdminID']) . "</td>";
                echo "<td>" . htmlspecialchars($admin['Admin_name']) . "</td>";
                echo "<td>" . htmlspecialchars($admin['Email']) . "</td>";
                echo "<td>" . strlen($admin['Password']) . " characters</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    // Create admin form
    echo "<h2>Create New Admin</h2>";
    echo "<form method='post'>";
    echo "<p>Admin Username: <input type='text' name='admin_name' required></p>";
    echo "<p>Admin Email: <input type='email' name='admin_email' required></p>";
    echo "<p>Admin Password: <input type='password' name='admin_password' required></p>";
    echo "<p><input type='submit' name='create_admin' value='Create Admin'></p>";
    echo "</form>";

    // Create admin if form submitted
    if (isset($_POST['create_admin'])) {
        $admin_name = trim($_POST['admin_name']);
        $admin_email = trim($_POST['admin_email']);
        $admin_password = $_POST['admin_password'];

        // Basic validation
        if (empty($admin_name) || empty($admin_email) || empty($admin_password)) {
            echo "<p style='color:red'>All fields are required!</p>";
        } else {
            // Check if admin already exists
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin WHERE Admin_name = ? OR Email = ?");
            $stmt->execute([$admin_name, $admin_email]);
            $exists = $stmt->fetchColumn();

            if ($exists) {
                echo "<p style='color:red'>An admin with this username or email already exists!</p>";
            } else {
                // Create admin
                $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare("INSERT INTO admin (Admin_name, Password, Email) VALUES (?, ?, ?)");
                $stmt->execute([$admin_name, $hashed_password, $admin_email]);

                echo "<p style='color:green'>Admin account created successfully!</p>";
                echo "<p>Page will refresh in 3 seconds...</p>";
                echo "<meta http-equiv='refresh' content='3'>";
            }
        }
    }

    // Test admin credentials form
    echo "<h2>Test Admin Login</h2>";
    echo "<form method='post'>";
    echo "<p>Admin Username: <input type='text' name='test_name' required></p>";
    echo "<p>Admin Password: <input type='password' name='test_password' required></p>";
    echo "<p><input type='submit' name='test_admin' value='Test Login'></p>";
    echo "</form>";

    // Test admin credentials if form submitted
    if (isset($_POST['test_admin'])) {
        $test_name = trim($_POST['test_name']);
        $test_password = $_POST['test_password'];

        // Get admin
        $stmt = $pdo->prepare("SELECT AdminID, Admin_name, Password FROM admin WHERE Admin_name = ?");
        $stmt->execute([$test_name]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$admin) {
            echo "<p style='color:red'>Admin not found!</p>";
        } else {
            // Verify password
            if (password_verify($test_password, $admin['Password'])) {
                echo "<p style='color:green'>Password verification successful!</p>";
                echo "<p>This admin should be able to log in.</p>";
            } else {
                echo "<p style='color:red'>Password verification failed!</p>";
                $hash_info = password_get_info($admin['Password']);
                echo "<p>Hash info: <pre>" . print_r($hash_info, true) . "</pre></p>";
            }
        }
    }
} catch (PDOException $e) {
    echo "<p style='color:red'>Database error: " . $e->getMessage() . "</p>";
}
