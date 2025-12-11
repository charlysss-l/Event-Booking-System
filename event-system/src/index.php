<?php
include 'db.php';
include 'header.php';

$result = $conn->query("SELECT * FROM users");
?>
<h2> Hi Welcome to Event System</h2>

<?php include "footer.php"; ?>