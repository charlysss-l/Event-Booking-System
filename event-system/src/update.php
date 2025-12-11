<?php
ob_start(); // Start output buffering to allow header redirects
include 'db.php';
include 'header.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<p style='color:red;'>Invalid user ID.</p>";
    exit;
}

// Fetch user
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    echo "<p style='color:red;'>User not found.</p>";
    exit;
}

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event_name = $_POST['event_name'];

    $update = $conn->prepare("UPDATE users SET name = ?, event_name = ?, email = ? WHERE id = ?");
    $update->bind_param("sssi", $name, $event_name, $email, $id);

    if ($update->execute()) {
        // Redirect to list.php after successful update
        header("Location: list.php");
        exit;
    } else {
        echo "<p style='color:red;'>Error: " . $update->error . "</p>";
    }

    $update->close();
}
?>

<main>
    <h2>Edit User</h2>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br><br>

        <label>Event Name:</label>
        <input type="text" name="event_name" value="<?= htmlspecialchars($user['event_name']) ?>" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
</main>

<?php
include 'footer.php';
ob_end_flush(); // Send output to browser
?>
