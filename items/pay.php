<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>

<?php
	if (!isset($_SERVER['HTTP_REFERER'])){
		//redirect them to your desired location
		echo "<script>window.location.hrerf='".APPURL."'</script>";
		exit;
	}
?>

	<!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="<?php echo APPURL; ?>">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">PAY</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

	<div class="container-fluid">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=Af3gJhz75YTYoraiFzNzK2IEcZqdvpciFkgGJHrxgDjPEapqWsbzFFJB703SFb0OB-kCQy9MtJG8OGKD&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div style="margin-left: 200px;" id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '<?php echo $_SESSION['total_price']; ?>' // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='delete-cart.php';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>   
        </div>


<?php require "../includes/footer.php"; ?>