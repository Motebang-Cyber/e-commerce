<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>

<?php
    $app = new App;
    $app->validateSession();

    if(isset($_POST['submit'])){
       $email = $_POST['email'];
       $password = $_POST['password'];

       $query = "SELECT * FROM users WHERE email='$email'";

       $data = ["email" => $email, "password" => $password,];

       $path = "http://localhost/clothes/clothes";

       $app->login($query, $data, $path);
    }
?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="<?php echo APPURL; ?>/">Home</a>
                    <span class="breadcrumb-item active">Login</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">USER LOGIN</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST" action="login.php">
                        
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

                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" name="submit" id="sendMessageButton">login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php require "../includes/footer.php"; ?>