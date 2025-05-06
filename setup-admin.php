<?php
// setup-admin.php - Creates the admin table and adds a default admin user
// Run this file once to set up your admin account

require_once 'includes/db.php';

try {
    // First check if admin table exists, if not create it
    $pdo->exec("CREATE TABLE IF NOT EXISTS admin (
        AdminID INT AUTO_INCREMENT PRIMARY KEY,
        Admin_name VARCHAR(50) NOT NULL UNIQUE,
        Password VARCHAR(255) NOT NULL,
        Email VARCHAR(255) NOT NULL UNIQUE
    )");

    // Check if admin user exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin WHERE Admin_name = 'admin'");
    $stmt->execute();
    $admin_exists = (int)$stmt->fetchColumn();

    if (!$admin_exists) {
        // Create default admin account
        $admin_password = password_hash('admin', PASSWORD_DEFAULT); // Change 'admin' to a stronger password

        $stmt = $pdo->prepare("INSERT INTO admin (Admin_name, Password, Email) 
                              VALUES ('admin', :password, 'admin@example.com')");
        $stmt->execute([':password' => $admin_password]);

        echo "<p style='color:green'>Admin user created successfully!</p>";
        echo "<p>Username: admin</p>";
        echo "<p>Password: admin</p>";
        echo "<p>Email: admin@example.com</p>";
        echo "<p><strong>Important:</strong> Please change these default credentials after logging in.</p>";
        echo "<p><a href='login_form.php'>Go to login page</a></p>";
    } else {
        echo "<p>Admin user already exists.</p>";
        echo "<p><a href='login_form.php'>Go to login page</a></p>";
    }
} catch (PDOException $e) {
    echo "<p style='color:red'>Database error: " . $e->getMessage() . "</p>";
}
