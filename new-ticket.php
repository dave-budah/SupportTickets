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
    <script src="js/new-ticket.js" defer></script>
    <title>New Ticket</title>
</head>
<body>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card main-card p-3">
                    <div class="top-header d-flex justify-content-end align-items-center">
                        <h5 class="fw-bold">New Ticket</h5>
                        <button class="btn ms-4 text-uppercase cancel-btn">Cancel</button>
                    </div>
                    <hr>
                    <form action="" class="mt-4 w-100">
                        <div class="row">
                            <div class="col-4">
                                <div class="mt-0">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-0">
                                    <label for="priority" class="form-label">Select priority</label>
                                    <select class="form-select" id="priority" name="priority">
                                        <option selected value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                        <option value="Critical">Critical</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-0">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option selected value="Open">Open</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="submitBtn mt-3">
                            <button class="btn" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/sweetAlert2.min.js"></script>
<script>
    const cancelBtn = document.querySelector('.cancel-btn');
    cancelBtn.onclick = () => {
        location.href = 'home.php';
    }
</script>
</body>
</html>

