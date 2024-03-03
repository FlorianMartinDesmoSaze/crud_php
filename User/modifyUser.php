<?php
include_once "../connect_ddb.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    mysqli_stmt_close($stmt);
} else {
    header('location:showuser.php?message=NoIdProvided');
    exit;
}

if (isset($_POST['send'])) {
    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        $_POST['name'] != '' &&
        $_POST['email'] != ''
    ) {
        extract($_POST);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'ssi', $name, $email, $id);
        if (mysqli_stmt_execute($stmt)) {
            header('location:showUser.php?message=Updated');
            exit;
        } else {
            header('location:showUser.php?message=EditFailed');
            exit;
        }
        mysqli_stmt_close($stmt);
    } else {
        header('location:showUser.php?message=EmptyField');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <form action="" method="post">
        <h1>Modify User</h1>
        <input type="text" name="name" placeholder="Enter your name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
        <input type="email" name="email" placeholder="Enter your E-mail" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
        <input type="submit" value="Modify" name="send">
        <a href="showUser.php" class="link back">Annuler</a>

    </form>
</body>

</html>