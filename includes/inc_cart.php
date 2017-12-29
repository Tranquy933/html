<div class="cart-main clearfix">
    <div class="cart-product-list size2of3 unit">
        <div data-role="message-holder"></div>
        <form id="cart-items-list-form" action="libs/update_cart.php" method="post">
            <div class="product-list-table">
                <table class="width_100 ">
                    <thead id="tableheader">
                        <tr>
                            <td class="width_20"> sản phẩm</td>
                            <td class="width_40"></td>
                            <td class="width_15 item-price-head">Giá</td>
                            <td class="size1of5 center">Số lượng</td>
                            <td class="width_15 item-price-head">Tổng tiền</td>
                            <td class="right_align lastcolumn">Delete</td>
                            <td class="right_align lastcolumn">Update</td>
                        </tr>
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
                            <td class="width_20">
                                <a href=""> <img src="../../../shop/img/product_img/<?php echo $value['img'] ?>" width="117" height="117" alt="" ></a>
                            </td>
                            <td class="width_40 position-relative">
                                <div class="productdescription"><?php echo $value['name']; ?></div>
                                <div class="productdetails ">Midea</div>
                                <div class="stock"> ✓ Còn hàng</div>
                                <span class="productlink">
                                   <a href=""><i class="fa fa-heart-o" aria-hidden="true"></i>Thêm vào danh sách yêu thích</a>
                                </span>
                            </td>
                            <td class="width_15 ">
                                <span class="txt-bold "><?php echo number_format($value['price']); ?> đ</span>
                            </td>
                            <td class="size1of5  center">
                                <input type="text" id="quantity" name="<?php echo $value['id'] ?>" class="form-control input-number" value="<?php echo $value['quantity'];?>" min="1" max="100">
                            </td>
                              <td class="width_15 ">
                                <span class="txt-bold "><?php echo number_format($prices); ?> đ</span>
                            </td>
                            <td class="right_align price lastcolumn">
                                <span class="productlink">
                                <a onclick="return confirm('Ban co muon xoa san pham nay khong ?');" href="libs/delete_cart.php?id=<?php echo $value["id"] ?>"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                </span>
                            </td>
                            <td class="right_align price lastcolumn">
                                <span class="productlink">
                                <input type="submit" name="update" class="btn btn-success" value="Update">
                                </span>
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
                <h3 class="txt-right"><?php echo number_format($totalPrice); ?> đ </h3>
            </div>
            <div class="summary-control table mt15 mbs">
                <a href="http://localhost/shop/pay.php"><input type="submit" class="totalAmountCartItems" value="Tiến hành thanh toán"></a>
            </div>
        </div>
    </div>    
</div>