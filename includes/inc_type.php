<?php   
	include('../shop/inc/connect.php');
	$sql = 'SELECT * FROM category';
	$resul = mysqli_query($conn, $sql);
	$category = [];
	while ($row = mysqli_fetch_assoc($resul)) {
		$category[] = $row;
	}
	$product = [];
	$ss = isset($_GET['id']) ? (int)$_GET['id'] : 0;
	$sqlQuery = "SELECT * FROM product WHERE id_cate =".$ss;
	$resuls = mysqli_query($conn, $sqlQuery);
	
	while ($rows = mysqli_fetch_assoc($resuls)) {
		$product[] = $rows;
	}
	
 ?>


<div class="container">
	<div class="row">
		<div class="home clearfix">
			<li><a href="">Trang chu</a></li>
			<i class="fa fa-angle-right" aria-hidden="true"></i>
			<li><a href="">San pham</a></li>
		</div>
		<div class="col-md-3">
			<div class="title_sidebar">
				<h3 class=" text-primary category_title">
					DANG MUC SAN PHAM
				</h3>
				<?php foreach ($category as $v): ?>

					<?php $id = $v['id'] 
						
					?>
				<ul class="cates_sbar">
					<li><a href="/shop/category.php?id=<?php echo $id ?>"><?php echo $v['name'] ?></a></li>
				</ul>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="col-md-9">
			<?php foreach ($product as $value) { ?>
				<div class="col-md-4">
					<div class = "shopee-item">
						<div class="product-item">
							<div class="cart-drawer">
								<a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
							</div>
							<div class="more">
								<a href="">Xem Them</a>
							</div>

							<div class="shopee-item-card ">
								<div class="shopee-item-card__cover-img">
									<a style="display: block;" href="/shop/detail.php?idProduct=<?php echo $value['id'] ?>"><img src="../../../shop/img/product_img/<?php echo $value["img"]?>"></a>
								</div>
							</div>
							<div class="shopee-item-card__text-name">
								<a href="/shop/detail.php?idProduct=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
							</div>
							<div class = "shopee-item-card__section-price">
								<div class = "shopee-item-card_"><?php echo number_format($value['price']); ?></div>
							</div>
							<div class = "quick-buy">
								<button type="submit" class="quick-buy__button">MUA NGAY</button>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>
		</div>
	</div>
</div>