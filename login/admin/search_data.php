<?php
require_once('connection.php');
session_start();
$date = $_POST['date'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div class="suc">
        <h2 style="font-size:400%;"><?php echo ($date . "  Events") ?></h2>

        <table id="admin_date_table">
            <tr>
                <th>
                    <h2 class="text1">Event Name</h2>
                </th>
                <th>
                    <h2 class="text1"></h2>
                </th>
            </tr>
            <?php
            $query = "SELECT * FROM event WHERE DATE(date) = '$date' AND type = 'public'";

            $result_set = mysqli_query($connection, $query);

            if ($result_set) {
                while ($record = mysqli_fetch_assoc($result_set)) {
                    $name = $record['event_name'];
                    $event_id = $record['event_id'];

                    echo '<tr>';
                    echo '<td>';
                    echo $name;
                    echo '</td>';
                    echo '<td>';
                    echo '<div class="cart_btn">';
                    echo '<a href="report/index.php?id=' . $event_id . '"><button id="redirect_button" class="redirect">Ticket Details</button></a>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td>';
                echo "No Events.";
                echo '</td>';
                echo '<td>';
                echo " ";
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</body>

</html>

<?php
mysqli_close($connection);
?>