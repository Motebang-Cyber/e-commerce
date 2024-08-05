<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>

<?php
	$query = "SELECT * FROM items";
	$app = new App;
	$app->validateSessionAdminInside();

	$items = $app->selectAll($query);
?>


<?php require "../layouts/footer.php"; ?>