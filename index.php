<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Merlin's potions - fine potions since 1026</title>
		<link href="https://fonts.googleapis.com/css?family=Oswald:400,500|PT+Serif:400,400i,700,700i|Source+Sans+Pro:400,400i,700,700i" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/styles.css" rel="stylesheet">
	</head>
<body>

<?php include('assets/includes/header.php'); ?>

<section class="product-list">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="page-title">Potions</h1>
			</div>
		</div>
		<div id="product-contents"></div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="product-details" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body" id="modal-product-details"></div>
		</div>
	</div>
</div>

<?php include('assets/includes/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
var cart = 0;
jQuery(document).ready(function($) {
	$("#cart-qty").html(cart);
	dothis();
});

function dothis() {
	$.ajax({
		type: "POST",
		url:'assets/includes/product-list.php',
		cache: false,
		success: function(result){
			$("#product-contents").html(result);
			$("#product-contents").show();
		}
	});
}

function openDetails(id) {
	$.ajax({
		type: "POST",
		url:'assets/includes/product-modal.php',
		cache: false,
		data: { product: id },
		success: function(result){
			$("#modal-product-details").html(result);
			$("#modal-product-details").show();
			$('#product-details').modal('show')
		}
	});
}

function addToCart(id) {
	cart = cart + 1;
	$("#cart-qty").html(cart);
}
</script>
</body>
</html>