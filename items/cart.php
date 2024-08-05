<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>

<?php
    $shipping_price = 50;
    
    if (!isset($_SESSION['user_id'])){
        echo "<script>window.location.href='".APPURL."'</script>"
    }

    $query = "SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'";
    $app = new App;

    $cart_items = $app->selectAll($query);

    $cart_price = $app->selectOne("SELECT SUM(price) AS all_price FROM cart WHERE user_id='$_SESSION[user_id]'");

    if(isset($_POST['submit'])){
        $_SESSION['total_price'] = $cart_price->all_price;

        echo "<script>window.location.href='chekout.php'</script>";
    }
?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="<?php echo APPURL; ?>">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php if($cart_price->all_price > 0) : ?>
                            <?php foreach($cart_items as $cart_item) : ?>
                        <tr>
                            <td class="align-middle"><img src="<?php echo APPIMAGES; ?>/<?php echo $cart_item->image; ?>" alt="" style="width: 50px;"> <?php echo $cart_item->name; ?></td>
                            <td class="align-middle"><?php echo $cart_item->price; ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">R<?php $cart_price->all_price; ?></td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"><a href="<?php echo APPURL; ?>/food/delete-item.php?id=<?php echo $cart_item->id; ?>"></i></button></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                        <div class="align-middle">cart is empty add some food items</div>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>R<?php echo $cart_price->all_price; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$shipping_price</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>R<?php echo $cart_price->all_price + $shipping_price ?></h5>
                        </div>
                        <form class="mb-30" action="cart.php" method="POST">
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" type="submit" name="submit">Proceed To Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

<?php require "../includes/footer.php"; ?>