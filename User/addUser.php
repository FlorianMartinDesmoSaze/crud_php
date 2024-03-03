<?php
if (isset($_POST['send'])) {
    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        $_POST['name'] != "" &&
        $_POST['email'] != ""
    ) {
        include_once "../connect_ddb.php";
        var_dump($_POST);
        extract($_POST);
        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $statement = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($statement, 'ss', $name, $email);
        if (mysqli_stmt_execute($statement)) {
            header('location:showUser.php?message=UserCreated');
            exit;
        } else {
            header('location:addUser.php?message=AddFailed');
            exit;
        }
    } else {
        header('location:addUser.php?message=EmptyFields');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <form action="" method="post">
        <h1>Add User</h1>
        <input type="text" name="name" placeholder="Enter your name">
        <input type="email" name="email" placeholder="Enter your E-mail">
        <input type="submit" value="Ajouter" name="send">
        <a href="showUser.php" class="link back">Annuler</a>

    </form>
</body>

</html>