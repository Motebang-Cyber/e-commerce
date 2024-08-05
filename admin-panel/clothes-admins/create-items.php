<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>

<?php
	$app = new App;
	$app->validateSessionAdminInside();

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$size = $_POST['size'];
		$image = $_FILES['image']['name'];

		$dir = "clothes-images/" . basename($image);
		$query = "INSERT INTO item (name, price, description, size, image) VALUES (:name, :price, :description, :size, :image)";

		$arr = [
			":name" => $name,
			":price" => $price,
			":description" => $description,
			":size" => $size,
			":image" => $image,
		];

		$path = "show-items.php";

		if (move_uploaded_file($FILES['image']['tmp_name'], $dir )){
			$app->register($query, $arr, $path);
		}
	}

?>