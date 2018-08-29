<?php
$products = file_get_contents("../potions.json");
$product_list = json_decode($products, true);
?>
<div class="row">
<?php foreach($product_list['potions'] as $results){ ?>
			<div class="col-6 col-sm-4">
				<figure onclick="openDetails(<?php echo $results['id']; ?>)">
					<img src="assets/products/<?php echo $results['image']; ?>" alt="<?php echo $results['name']; ?>" title="<?php echo $results['name']; ?>" width="264" height="264" class="img-fluid mx-auto d-block">
					<figcaption>
						<strong><?php echo $results['name']; ?></strong> - <span><?php echo $results['price']; ?></span>
					</figcaption>
				</figure>
			</div>
<?php } // end foreach($product_list['potions'] as $results){ ?>
</div>
