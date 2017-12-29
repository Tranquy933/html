<div class="cart-main clearfix">
    <div class=" size2of3 unit">
        <div data-role="message-holder"></div>
        <form id="cart-items-list-form" action="libs/update_cart.php" method="post">
            <div class="product-list-table">
                <table class="width_100 ">
                    <thead id="tableheader">
                        <tr>
                            <td class="width_40 price-text">Sản phẩm</td>
                            <td class=" item-price-head price-text">Giá</td>
                            <td class="size1of5 center price-text">Số lượng</td>
                            <td class=" item-price-head price-text">Tổng tiền</td>
                    </thead>
                   <?php 
                      $totalPrice = 0;
                      $total = '';
                      foreach ($_SESSION['cart'] as $value) { 
                      $total = $value['quantity'];
                      $prices = $value['price'] * $value['quantity'];
                      $totalPrice += $prices;
                   ?>
                   <tbody>
                        <tr style="background: #ececec;">
                            <td class="position-relative">
                                <div class="productdescription name_product"><?php echo $value['name']; ?></div>
                            <td class="price_item">
                                <span class="txt-bold price-text "><?php echo number_format($value['price']); ?> đ</span>
                            </td>
                            <td class="quantity center">
                                <input type="text" id="quantity" name="<?php echo $value['id'] ?>" class="form-control input-number" value="<?php echo $value['quantity'];?>" min="1" max="100">
                            </td>
                              <td class="price_sums">
                                <span class="txt-bold price-text"><?php echo number_format($prices); ?> đ</span>
                            </td>
                        </tr>
                    </tbody>
                    <?php }  ?>
                </table>
            </div>
         <!--END PRODUCT LISTS-->
        </form>
    </div>
    <div class="cart-order-summary">
        <div class="cart-summary order-summary-cart-page">
            <h5 class="summary-header mbl">
                Thông tin đơn hàng            
            </h5>
            <div class="summary-total table ">
                <span class="txt-size-small">
                <span class="txt-bold txt-black">Tổng tiền</span>
                <span class="txt-grey">(Đã bao gồm VAT):</span>
                </span>
                <h1 class="text-danger"><?php echo number_format($totalPrice); ?> đ </h1>
            </div>
        </div>
    </div>    
</div>