<?php
session_start();
include 'db.php';

// Agar user login nahi hai to login page bhej do
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM posts");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
</head>
<body>

<h2>All Posts</h2>

<a href="index.php">⬅ Back to Dashboard</a> |
<a href="create.php">➕ Add New Post</a>

<br><br>

<table border="1" cellpadding="10">
<tr>
  <th>ID</th>
  <th>Title</th>
  <th>Content</th>
  <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?php echo $row['id']; ?></td>
  <td><?php echo $row['title']; ?></td>
  <td><?php echo $row['content']; ?></td>
  <td>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
  </td>
</tr>
<?php } ?>

</table>

</body>
</html>