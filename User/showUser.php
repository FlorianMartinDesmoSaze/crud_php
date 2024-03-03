<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show User</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <main>
        <div class="link_container">
            <a href="addUser.php" class="link">Add User</a>
            <h1>User List</h1>
            <table>
                <thead>
                    <tr>
                    <?php include_once "../connect_ddb.php";
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>


                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Modify</th>
                        <th>Delete</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td class="image"><a href="modifyUser.php?id=<?= $row["id"] ?>"><img src="../images/write.png" alt=""></a></td>
                            <td class="image"><a href="deleteUser.php?id=<?= $row["id"] ?>"><img src="../images/remove.png" alt=""></a></td>
                        </tr>
                <?php }
                    } else {
                        echo "No user found";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>