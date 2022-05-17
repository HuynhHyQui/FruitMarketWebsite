<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>History</h1>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Total</th>
            <th>Detail</th>
          </tr>
        </thead>
        <tbody>
            <?php
                session_start();
                require("../connection.php");
                require("../class/order.php");
                $order=new order();
                $arr=json_decode($order->getAllOrder($_SESSION['id']),true);
                if (isset($_SESSION['id'])) {
                    $t=1;
                    foreach ($arr as $key=>$value) {
                        echo '
                        <tr>
                            <td>'.$t.'</td>
                            <td>'.$value['Date'].'</td>
                            <td>'.$value['Total'].'</td>
                            <td>
                                <button type="button" class="btn btn-info">
                                    <a href="./detail.php?orderid='.$value['OrderID'].'" class="text-white">Detail</a>
                                </button>
                            </td>
                        </tr>';
                        $t++;
                    }
                }
    
            ?>
           
        </tbody>
      </table>
    </div>
</body>
</html>