<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>

<?php
	if(){
		//redirect them to your desired location
		echo "<script>window.location.href='".ADMINURL."'</script>";
		exit;
	}
?>

<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$query = "SELECT * FROM items WHERE id='$id'";

		$one = $app->selectOne($query);

		unlink("foods-image/". $one->image);

		$query = "DELETE FROM items where id='$id'";
		$app = new App;
		$path = "show-items.php";
		$app->delete($query, $path);
	}

?>
