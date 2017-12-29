<?php 
	
	include('../shop/inc/connect.php');
	include('getdata.php');
	$newProduct = getData('product', 'LIMIT 3');
	$product = getData('product', 'LIMIT 8');
	$dataSale = getData('product', 'where sale = 1 LIMIT 4');
	$dataHot = getData('product', 'where hot = 1 LIMIT 4');
 ?>
<!-- slideshow  -->
<div class="bxslider">
  <div><a href="#"><img src="/shop/img/samsung.jpg"></a></div>
  <div><a href="#"><img src="/shop/img/samsunggame.jpg"></a></div>
  <div><a href="#"><img src="/shop/img/samsungnote.jpg"></a></div>
</div>
<!-- end slideshow -->
<!-- star list product -->
<div class="container">
	<div class="row">
		<?php foreach ($newProduct as $v) { ?>
			<div class="col-md-4">
				<div class="slider-items">
					<div class="product-item">
						<div class="sale">
							<a href="">Sale</a>
						</div>
						<a  href="/shop/detail.php?idProduct=<?php echo $v['id'] ?>"><img src="../../../shop/img/product_img/<?php echo $v['img'] ?>"></a>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="col-md-12">
			<div class="new-product">
				<h3 class="text-primary text-product">MOI VE</h3>
			</div>
		</div>
		<?php 
			foreach ($product as $item) {
				?>	
					<div class="col-md-3">
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
								<a style="display: block;" href="/shop/detail.php?idProduct=<?php echo $item['id'] ?>"><img src="../../../shop/img/product_img/<?php echo $item['img'] ?>"></a>
							</div>
						</div>
						<div class="shopee-item-card__text-name">
							<a href="/shop/detail.php?idProduct=<?php echo $item['id'] ?>"><?php echo $item["name"];?></a>
						</div>
						<div class = "shopee-item-card__section-price">
							<div class = "shopee-item-card_"><?php echo number_format($item["price"]);?> đ</div>
						</div>
						<div class = "quick-buy">
							<button type="submit" class="quick-buy__button">MUA NGAY</button>
						</div>
					</div>
					</div>
				</div>
			<?php
			} 
		?>
		<div class="col-md-6">
			<div class="new-products">
				<h3 class="text-primary text-product">BAN CHAY</h3>
			</div>
			<?php 
				foreach ($dataHot as $value) {
					?>
					<div class="shopee-search-result-view__item-card">
						<div class="shopee-item-card--link">
							<a href="/shop/detail.php?idProduct=<?php echo $value['id'] ?>"><img src="../../../shop/img/product_img/<?php echo $value['img'] ?>"></a>
						</div>
					</div>
					<div class="product-card__description">
						<div class="title-shopee">
	            				<a href="/shop/detail.php?idProduct=<?php echo $value['id'] ?>"><?php echo $value['name']; ?></a>
						</div>
						<div class = "shopee-item-card__section-price">
							<div class = "shopee-item-card_sale"><?php echo number_format($value['price']); ?> đ</div>
						</div>
						<div class = "sale-price">
							<div class = "sale-item-card_"><?php echo number_format($value['price_sale']); ?> đ</div>
						</div>
						<div class = "quick-buy">
							<button type="submit" class="quick-buy__button">MUA NGAY</button>
						</div>

					</div>
			<?php
				}
			 ?>
			
		</div>
		<div class="col-md-6">
			<div class="new-products">
				<h3 class="text-primary text-product ">GIAM GIA</h3>
			</div>
			<?php 
				foreach ($dataSale as $sale) {
					?>
						<div class="shopee-search-result-view__item-card">
							<div class="shopee-item-card--link">
								<a href="/shop/detail.php?idProduct=<?php echo $sale['id'] ?>"><img src="../../../shop/img/product_img/<?php echo $sale['img'] ?>"></a>
							</div>
						</div>
						<div class="product-card__description">
							<div class="title-shopee">
		            				<a href="/shop/detail.php?idProduct=<?php echo $sale['id'] ?>"><?php echo $sale['name']; ?></a>
							</div>
							<div class = "shopee-item-card__section-price">
								<div class = "shopee-item-card_sale"><?php echo number_format($sale['price']); ?> đ</div>
							</div>
							<div class = "sale-price">
								<div class = "sale-item-card_"><?php echo number_format($sale['price_sale']); ?> đ</div>
							</div>
							<div class = "quick-buy">
								<button type="submit" class="quick-buy__button">MUA NGAY</button>
							</div>
						</div>
			<?php
				}
			 ?>
		</div>
		<div class="col-md-12">
			<div class="new-product">
				<h3 class="text-primary text-product">TIN TUC</h3>
			</div>
			<div class="detail-product">
				<p class="detail-product">Cách Mạng Mua Sắm Online: Sự kiện mua sắm trực tuyến số 1 Đông Nam Á
				Một lần nữa LAZADA lại tổ chức sự kiện mua sắm trực tuyến lớn nhất Việt Nam cũng các nước khu vực Đông Nam Á như: Indonesia, Malaysia, Philippines, Thái Lan tại thời điểm cuối năm, nhằm thu hút người mua sắm tham gia trong năm nay. </p>
			</div>
		</div>
		<div class="col-lg-6">
			<?php 
				for ($i=1; $i < 3; $i++) { 
				?>
					<div class="media">
	                  <a class="pull-left" href="#"> <img src="/shop/img/review.jpg"> </a>
	                  	<div class="media-body">
	                     	<a href="#" class="media-heading">Các hãng hàng không Mỹ ban hành lệnh "hạn chế" đem vali thông minh lên máy bay</a>
	                     	<div class="module line-clamp">
	                        	<p class="text-famus ">Vali thông minh (hay còn gọi là hành lí thông minh) đã trở nên khá phổ biến và dễ dàng bắt gặp tại những sân bay trong vài tháng trở lại đây.Mặc dù vali thông minh thực sự tiện lợi đối với những người thường xuyên xuất nhập cảnh, nhưng những vali này chứa các pin lithium có nguy cơ gây cháy nổ.</p>
	                     	</div>
	                  	</div>
	               </div>
					<?php
				}
			?>
		</div>
		<div class="col-lg-6">
			<?php 
				for ($i=1; $i < 3; $i++) { 
				?>
					<div class="media">
	                  <a class="pull-left" href="#"> <img src="/shop/img/review.jpg"> </a>
	                  	<div class="media-body">
	                     	<a href="#" class="media-heading">Các hãng hàng không Mỹ ban hành lệnh "hạn chế" đem vali thông minh lên máy bay</a>
	                     	<div class="module line-clamp">
	                        	<p class="text-famus ">Vali thông minh (hay còn gọi là hành lí thông minh) đã trở nên khá phổ biến và dễ dàng bắt gặp tại những sân bay trong vài tháng trở lại đây.Mặc dù vali thông minh thực sự tiện lợi đối với những người thường xuyên xuất nhập cảnh, nhưng những vali này chứa các pin lithium có nguy cơ gây cháy nổ.</p>
	                     	</div>
	                  	</div>
	               </div>
				<?php
				}
			?>
		</div>
	</div>
</div>




<!-- end list product -->
