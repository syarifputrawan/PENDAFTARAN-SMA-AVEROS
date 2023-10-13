<?php
if(!isset($_SESSION['id']) && isset($_SESSION['username'])) {
    header("location:pages/dashboard/index.php");
}


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>(admin) Login | pmb uad </title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                <?php 
                                    include "includes/koneksi.php";
                                    $qSelect = "SELECT logo FROM about LIMIT 1";
                                    $select = mysqli_query($koneksi, $qSelect) or die(mysqli_error($koneksi));
                                    $data = mysqli_fetch_assoc($select);
                                ?>
                                <center>
                                <img src="<?= 'images/tentang/' . $data['logo']?>" alt="" width="150" height="150">
                                </center>
                                    <h3 class="text-center 
                                    font-weight-light my-4">Login</h3></div>


                                    <?php 
                                    session_start();
                                    include "includes/alert.php"
                                    ?>
                                    <div class="card-body">
                                        <form action="aksi/auth/login.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsername" type="text" name="username"
                                                placeholder="username" />
                                                <label for="inputEmail">username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; pmb uad 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
