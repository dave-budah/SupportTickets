<?php
global $username;
session_start();
include_once 'includes/config.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.bundle.js"></script>
    <title>Home | Tickets</title>
</head>
<body>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card main-card p-3">
                        <div class="top-header d-flex justify-content-end align-items-center">
                            <?php
                                if(isset($_SESSION['username'])) { ?>
                                     <h5 class="fw-bold">Hi,  <?php echo $_SESSION['username'];?></h5>
                               <?php }
                            ?>
                            <button class="btn ms-4 text-uppercase logout">Logout</button>
                        </div>
                    <hr>
                    <div class="utility d-flex justify-content-between align-items-center mb-4">
                        <div class="heading">
                            <h3 class="fw-bold">All Tickets</h3>
                        </div>
                        <div class="add-ticket">
                            <button class="btn text-uppercase new-ticket">Create new ticket</button>
                        </div>
                    </div>

                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Ticket ID</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Description</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Created On</th>
                            <th scope="col">Updated On</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        /**
                        * @var $conn;
                        */
                        $sql = "SELECT * FROM tickets";
                        $result = mysqli_query($conn, $sql);
                        $total = mysqli_num_rows($result);
                        $perPage = 5;
                        $totalPages = ceil($total / $perPage);
                        for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<li class="pagination_link"><a href="home.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                        if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        $start = ($page - 1) * $perPage;
                        } else {
                        $page = 1;
                        $start = 0;
                        }
                        $startLimit = ($page - 1) * $perPage;
                        $sql = "SELECT * FROM `tickets` LIMIT ".$startLimit.", ".$perPage;
                        $result = mysqli_query($conn, $sql);

                        if ($result){
                        while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $unique_id = $row['unique_id'];
                        $subject = $row['subject'];
                        $description = substr($row['description'], 0, 50);
                        $priority = $row['priority'];
                        $status = $row['status'];
                        $author = $row['author'];
                        $created_at = $row['created_on'];
                        $updated_at = $row['updated_on'];
                        echo '<tr>';
                            echo '<td style="text-align: left">' . $unique_id. '</td>';
                            echo '<td style="text-align: left">' . $subject. '</td>';
                            echo '<td style="text-align: left">' . $description . '</td>';
                            echo '<td style="text-align: left" class="'. $priority .'">' . $priority . '</td>';
                            echo '<td style="text-align: left" class="'. $status .'">' . $status . '</td>';
                            echo '<td style="text-align: left">' . $author . '</td>';
                            echo '<td style="text-align: left">' . date("d M Y", strtotime( $created_at)) . '</td>';
                            echo '<td style="text-align: left">' . date("d M Y", strtotime( $updated_at)) . '</td>';
                            echo '<td style="text-align: left"><a href="update-ticket.php?updateid=' . $id . '"><i class="fa fa-edit"></i></a> |
                                <a href="delete.php?deleteid=' . $id . '"><i class="fa fa-trash text-danger"></i></a> |
                                <a href="ticket.php?ticketid=' . $id . '"><i class="fa fa-eye text-secondary"></i></a></td>';
                            echo '</tr>';
                        }
                        } else {
                        echo '<tr>';
                            echo '<td>' . 'No Data' . '</td>';
                            echo '<td>' . 'No Data' . '</td>';
                            echo '<td>' . 'No Data' . '</td>';
                            echo '<td>' . 'No Data' . '</td>';
                            echo '<td>' . 'No Data' . '</td>';
                            echo '<td>' . 'No Data' . '</td>';
                            echo '<td>' . 'No Data' . '</td>';
                            echo '<td>' . 'No Data' . '</td>';
                            echo '<td>' . 'No Data' . '</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/sweetAlert2.min.js"></script>
<script>
    const newTicket = document.querySelector('.new-ticket');
    const logoutBtn = document.querySelector('.logout');
    newTicket.onclick = () => {
        location.href = 'new-ticket.php';
    }
    logoutBtn.onclick = () => {
        location.href = 'includes/logout.inc.php';
    }

</script>
<?php
if (isset($_GET['logout']) == 'success') {
    echo '<script>
      Swal.fire({
        title: "Success",
        text: "You have successfully logged out.",
        icon: "success",
        button: "OK",
      });
      </script>';
    unset($_GET["logout"]);
} elseif (isset($_GET['login']) == 'success') {
    echo '<script>
      Swal.fire({
        title: "Success",
        text: "You have successfully logged in.",
        icon: "success",
        button: "OK",
      });
      </script>';
    unset($_GET["login"]);
}elseif (isset($_GET['delete']) == 'success') {
    echo '<script>
      Swal.fire({
        title: "Success",
        text: "Ticket deleted successfully.",
        icon: "success",
        button: "OK",
      });
      </script>';
    unset($_GET["delete"]);
}elseif (isset($_GET['new-ticket']) == 'success') {
    echo '<script>
      Swal.fire({
        title: "Success",
        text: "Ticket created successfully.",
        icon: "success",
        button: "OK",
      });
      </script>';
    unset($_GET["delete"]);
}
?>
</body>
</html>
