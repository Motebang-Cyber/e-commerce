<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>

<?php
    $app = new App;
    $app->validateSession();
    

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        
        if ($_POST['password'] === $_POST['password_check'] ) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }else{
            echo "<script>alert('The passwords do not Match!')</script>";
        }
        
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";

        $arr = [
            ":username" => $username,
            ":email" => $email,
            ":password" => $password,
        ];

        $path = "login.php";

        $app->register($query, $arr, $path);
    }
?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Register</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">REGISTER USER</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST" action="register.php">
                        
                        <div class="control-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Your password"
                                required="required" data-validation-required-message="Please enter your password" />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <input type="password" class="form-control" name="password_check" id="password_check" placeholder="Verify password"
                                required="required" data-validation-required-message="Please enter your password" />
                            <p class="help-block text-danger"></p>
                        </div>
                        
                        
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" name="submit" id="sendMessageButton">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php require "../includes/footer.php"; ?>