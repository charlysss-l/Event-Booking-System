<?php
include 'db.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event_name = $_POST['event_name'];
    $stmt = $conn->prepare("INSERT INTO users (name, event_name, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $event_name, $email);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>User added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>
<main> 
<h2>Add User</h2>
<form method="post">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Event Name:</label>
    <input type="text" name="event_name" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <button type="submit">Add</button>
</form>
</main>
<?php include 'footer.php'; ?>
