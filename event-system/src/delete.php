<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<p style='color:red;'>Invalid user ID.</p>";
    exit;
}

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header('Location: list.php');
} else {
    echo "<p style='color:red;'>Error deleting user: " . $stmt->error . "</p>";
}

$stmt->close();
?>
