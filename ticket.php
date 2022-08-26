<?php
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
<?php
global $conn;

$id = $_GET['ticketid'];
$url = basename($_SERVER['REQUEST_URI']);
$sql= "SELECT * FROM tickets WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$subject = $row['subject'];
$description = $row['description'];
$status = $row['status'];
$priority = $row['priority'];
$created_on = $row['created_on'];

?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card main-card p-3">
                    <div class="top-header d-flex justify-content-end align-items-center">
                            <h5 class="fw-bold">Hi,  <?php echo $_SESSION['username'];?></h5>
                        <button class="btn ms-4 text-uppercase ticket">Logout</button>
                    </div>
                    <hr>
                    <div class="utility d-flex justify-content-between align-items-center mb-4">
                        <div class="">
                            <div class="badge bg-warning text-dark p-2">Status: <?php echo $status ?></div>
                            <div class="badge <?php echo $priority ?> bg-dark p-2">Priority: <?php echo $priority ?></div>
                        </div>
                        <div class="add-ticket">
                            <button class="btn text-uppercase return">Return Home</button>
                        </div>
                    </div>

                    <hr>

                    <div class="">
                        <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold text-secondary">Subject: <?php echo $subject ?></h5>
                            <p>Create on: <?php echo date("d M Y", strtotime($created_on)) ?></p>
                        </div>
                        <div class="card-body">
                            <p><?php echo $description ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const newTicket = document.querySelector('.ticket');
    const returnBtn = document.querySelector('.return');
    returnBtn.onclick = () => {
        location.href = 'home.php';
    }
    logoutBtn.onclick = () => {
        location.href = 'includes/logout.inc.php';
    }
</script>
</body>
</html>

