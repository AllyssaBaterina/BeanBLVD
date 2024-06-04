<?php
    include_once("connection.php");

    $result = mysqli_query($con, "SELECT * FROM orders");
?>

<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "view.css">
        <title></title>
    </head>
<body>
    <div class= "title">
        Completed Orders
    </div>
       <div class = "table">
    <table width='80%' border=1>
        <tr>
            <th id = "header">ID</th>
            <th id = "header">Full Name</th>
            <th id = "header">Address</th>
            <th id = "header">Phone Number</th>
            <th id = "header">Hot Beverage</th>
            <th id = "header">Cold Beveragen</th>
            <th id = "header">Pastries</th>
            <th id = "header">Action</th>
        </tr>
        <?php
            while($user_data=mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$user_data['id']."</td>";
                echo "<td>".$user_data['full_name']."</td>";
                echo "<td>".$user_data['address']."</td>";
                echo "<td>".$user_data['phone_number']."</td>";
                echo "<td>".$user_data['hot_beverages']."</td>";
                echo "<td>".$user_data['cold_beverages']."</td>";
                echo "<td>".$user_data['pastries']."</td>";
                echo "<td><a href = 'delete.php?id=$user_data[id]'>Delete</a>";
            }
        ?>

    </table>
        </div>
        <div class = "add">
            <a href = "order.php" id = "button">Add new order<a>
        </div>
</body>
</html>