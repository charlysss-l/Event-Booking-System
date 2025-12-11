<?php
include 'db.php';
include 'header.php';

$result = $conn->query("SELECT * FROM users ORDER BY created_at DESC");
?>
<main>
<h2>Users List</h2>
<a href="create.php"><button>Add New User</button></a>

<?php if ($result->num_rows > 0): ?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Event Name</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>  
        <td><?= htmlspecialchars($row['event_name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['created_at']) ?></td>
        <td>
            <a class="edit" href="update.php?id=<?= $row['id'] ?>">Edit</a>
            <a class="delete-button" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<?php else: ?>
<p>No users found.</p>
<?php endif; ?>
</main>
<?php include 'footer.php'; ?>
