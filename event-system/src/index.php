<?php
include 'db.php';
include 'header.php';

$result = $conn->query("SELECT * FROM users");
?>
<main>
<h2> Hi Welcome to Event System</h2>
</main>
<?php include "footer.php"; ?>