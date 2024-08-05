<?php require "../config/config/php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>

<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$query = "SELECT * FROM items WHERE id='$id'";
		$app = new App;

		$one = $app->selectOne($query);

		if (isset($_SESSION['user_id'])){
			$q = "SELECT * FROM cart WHERE item_id=$id AND user_id='$_SESSION['user_id']'";
			$count =  $app->validateCart($q);
		}

		if (isset($_POST['submit'])){
			$item_id = $_POST['item_id'];
			$name = $_POST['name'];
			$price = $_POST['price'];
			$image = $_POST['image'];
			$category = $_POST['category'];
			$user_id = $_SESSION['user_id'];

			$query = "INSERT INTO cart (item_id, name, price, image, category, user_id) VALUES (:item_id, :name, :price, :image, :category, :user_id)";

			$arr = [
				":item_id" => $item_id,
				":name" => $name,
				":price" => $price,
				":image" => $image,
				":category" => $category,
				":user_id" => $user_id,
			];

			$path = "add-cart.php?id=".$id."";

			$app->insert($query, $arr, $path);
		}
	}else{
		echo "<script>window.location.href='".APPURL."/404.php'</script>"
	}
?>

 <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
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
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> Product Name</td>
                            <td class="align-middle">$150</td>
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
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                        </tr> 
                     
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="pt-2">
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Add To Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

<?php require "../includes/footer.php"; ?>


