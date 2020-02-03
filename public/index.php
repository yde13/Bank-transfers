<?php
// include_once './classes/db.php';
// $connection = new Database();
$db = mysqli_connect('xav-p-mariadb01.xavizus.com', 'philip', 'cbQUJ7cwRzTK1239', 'philip', 16200);

$all1 = mysqli_query($db, "SELECT * FROM `philip-bank`.users");
$all2 = mysqli_query($db, "SELECT * FROM `philip-bank`.users");
$all3 = mysqli_query($db, "SELECT * FROM `philip-bank`.users");


if (isset($_POST['submit'])) {
    $name = $_POST['names'];
    $balance = $_POST['balances'];
    if (empty($name)) {
        $errors = 'You must fill in a name';
    } else {
        mysqli_query($db, "INSERT INTO philip.bank (name, balance) VALUES ('$name', '$balance')");
        header('Location: index.php');
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($db, "DELETE FROM philip.bank WHERE idbank=$id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="POST">
        <?php if (isset($errors)) { ?>
            <p><?php echo $errors; ?></p>
        <?php } ?>
        <input type="text" name='names' placeholder="name">
        <input type="text" name='balances' placeholder="balance">
        <button type="submit" name="submit">Add</button>
    </form>
    <br>
    from:
    <select>

        <?php while ($row = mysqli_fetch_array($all1)) { ?>
                    <option><?php echo $row['firstName']; ?></option>
        <?php } ?>
           
    </select>
    <br>


        to:
        <select>
            <?php while ($row = mysqli_fetch_array($all2)) { ?>
                    <option><?php echo $row['firstName']; ?></option>
            <?php } ?>
           
        </select>
        <br>
        <input type="text" placeholder="How much do you wanna transfer?">
        <br>
        <button type="submit" name="transfer">transfer</button>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>phone number</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($all3)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['mobilephone']; ?></td>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>