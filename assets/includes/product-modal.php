<?php
if (isset($_POST['product'])) {
	$products = file_get_contents("../potions.json");
	$product_list = json_decode($products, true);
	$id = filter_input(INPUT_POST,'product',FILTER_SANITIZE_NUMBER_INT);
if (in_array($id, $product_list['potions'][$id])) {
	$results = $product_list['potions'][$id];
?>

				<div class="container-fluid">
					<div class="row">
						<div class="col-7"><img src="assets/products/<?php echo $results['image']; ?>" alt="<?php echo $results['name']; ?>" title="<?php echo $results['name']; ?>" width="400" height="400" class="img-fluid"></div>
						<div class="col-5">
						<h1><?php echo $results['name']; ?></h1>
						<h2>Use/Effect:</h2>
						<p><?php echo $results['effect']; ?></p>
<?php if (array_key_exists('ingredients', $product_list['potions'][$id])) { ?>
						<h2>Ingredients:</h2>
						<p>
<?php foreach($product_list['potions'][$id]['ingredients'] as $ingredients) { ?>
<?php echo $ingredients ?><br>
<?php } // end foreach($product_list['potions'][$id]['ingredients'] as $ingredients) { ?>
<?php } // end if (array_key_exists('ingredients', $product_list['potions'][$id])) { ?></p>
						<h2>Price:</h2>
						<p class="price">$<?php echo $results['price']; ?></p>
						<button onclick="addToCart(<?php echo $id; ?>)" class="btn btn-cart">Add to Cart</button>
						</div>
					</div>
				</div>
<?php } else { // if (in_array($id, $product_list['potions'][$id])) { ?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<h1 class="text-danger">Oooopppsss!</h1>
							<p>Some black magic going on here...please try again</p>
						</div>
					</div>
				</div>
<?php } ?>
<?php } else { // if (is_int($_POST['product'])) { ?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<h1 class="text-danger">Oooopppsss!</h1>
							<p>Some black magic going on here...please try again</p>
						</div>
					</div>
				</div>
<?php } // end if (is_int($_POST['product'])) { ?>
