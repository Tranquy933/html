<?php   
	include('../shop/inc/connect.php');
	include('getdata.php');
	$dataHot = getData('product', 'where hot = 1 LIMIT 4');
	$sql = 'SELECT * FROM category';
	$resul = mysqli_query($conn, $sql);
	$category = [];
	while ($row = mysqli_fetch_assoc($resul)) {
		$category[] = $row;
	}

	$product = [];
	$ss = isset($_GET['idProduct']) ? (int)$_GET['idProduct'] : 0;
	$sqlQuery = "SELECT * FROM product WHERE ".$ss." = id ";
	$resuls = mysqli_query($conn, $sqlQuery);
	$product = mysqli_fetch_assoc($resuls);
		
	$results = mysqli_query($conn, "SELECT *  FROM product WHERE id_cate = ".$product['id_cate']);
    $products = [];
    while ($rows = mysqli_fetch_assoc($results)){
       	$products[] = $rows;
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
					<?php $id = $v['id'] ?> 
					<ul class="cates_sbar">
						<li><a href="/shop/category.php?id=<?php echo $id ?>"><?php echo $v['name'] ?></a></li>
					</ul>
				<?php endforeach; ?>
			</div>

			<div class="new-products">
				<h3 class="text-primary text-product">BAN CHAY</h3>
			</div>
			<?php foreach ($dataHot as $value){ ?>

				<div class="detail_product_itemt">
					<div class="detail-search-result-view__item-card">
						<div class="detail-item-card--link">
							<a href="/shop/detail.php?idProduct=<?php echo $value['id'] ?>"><img src="../../../shop/img/product_img/<?php echo $value['img'] ?>"></a>
						</div>
					</div>
					<div class="product-card__description-detail">
						<div class="title-detail">
	            				<a href="/shop/detail.php?idProduct=<?php echo $value['id'] ?>"><?php echo $value['name']; ?></a>
						</div>
						<div class = "detail-item-card__section-price">
							<div class = "detail-item-card_sale"><?php echo number_format($value['price']); ?> đ</div>
						</div>
						<div class = "sale-price-detail">
							<div class = "sale-item-card_"><?php echo number_format($value['price_sale']); ?> đ</div>
						</div>
						<div class = "quick-buy-detail">
							<button type="submit" class="quick-buy__button-tetail">MUA NGAY</button>
						</div>

					</div>
				</div>
			<?php } ?>
		</div>

		<div class="col-md-9">
			<div class="col-md-4">
				<div class="detail_img">
					<a href=""><img src="../../../shop/img/product_img/<?php echo $product["img"]?>"></a>
				</div>
			</div>
			<div class="col-md-8">
				<form method="POST" action="libs/shopping_cart.php">
					<div class="wrap_detail">
						<div class="product-info-title">
							<h3><?php echo $product['name'] ?></h3>
							<input type="text" value="<?php echo $product['id'] ?>" hidden name="id">
						</div>
						<div class="product-info_price">
							<div class="header__price-before">
								<span class="price-before"><?php echo number_format($product['price']); ?> đ</span>
							</div>
							<div class="product-price-sale">
								<span><?php echo number_format($product['price_sale']); ?> đ</span>
							</div>
							<div class="vat">
								<span>Da bao gom phi Vat</span>
							</div>
						</div>
		                <div class="input-group detail-input">
		                		<h3>So luong</h3>
		            		<input type="text" id="quantity" name="quantity" class="form-control input-number" value="0" min="1" max="100">
		            	</div>
		            	<div class="col-md-6">
		            		<div class="wrap_call">
								<h3 class="call">Lien he mua hang</h3>
								<ul class="call_me">
									<li><a href=""><i class="fa fa-phone-square" aria-hidden="true"></i>04635268</a></li>
									<li><a href=""><i class="fa fa-phone" aria-hidden="true"></i>01675973497</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<div class="sky_wrap">
								<h3 class="call">Tu van khach hang</h3>
								<a class="sky_icon" href=""><i class="fa fa-skype" aria-hidden="true"></i>mooncoffe</a>
							</div>
						</div>
					</div>
					<div class="price_product_title">
					 	<input type="submit" name = "cart" value="Cart" class="btn btn-success cart_detail" >
						<input type="submit"  name = "buy" value="Buy now" class="btn btn-danger price_detail" >
					</div>

				</form>
			</div>
			<div class="col-md-12">			
				<div class="describe_detail">
					<div class="des__det">
						<h3 class=" text-primary category_title des">
							MO TA
						</h3>
					</div>
					<p><?php echo $product['description']; ?></p>
				</div>
				
				<div class="des__det">
					<h3 class=" text-primary category_title des">
						SAN PHAM CUNG DANH MUC
					</h3>
					<?php foreach ($products as $item) { ?>
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
											<a style="display: block;" href=""><img src="../../../shop/img/product_img/<?php echo $item["img"]?>"></a>
										</div>
									</div>
									<div class="shopee-item-card__text-name">
										<a href=""><?php echo $item['name'] ?></a>
									</div>
									<div class = "shopee-item-card__section-price">
										<div class = "shopee-item-card_"><?php echo number_format($item['price']); ?></div>
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
	</div>
</div>