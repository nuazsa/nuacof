<?php
require_once __DIR__ . '/../component/navigation.php';
?>

<section id="main">
    <div class="MainSidebar">
        <div class="title">
            <h4>Inventory Order</h4>
        </div>
        <?php for ($i = 0; $i < count($model['orders']); $i++) : ?>
            <div class="order">
                <div class="row">
                    <p><?= $model['orders'][$i]['name']; ?> - <?= substr($model['orders'][$i]['idTransaction'], -4); ?></p>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Rp<?= number_format($model['orders'][$i]['total'], 0, ',', '.'); ?></p>
                        <div class="action">
                            <a href="">
                                <i class="fa-solid fa-receipt"></i>
                            </a>
                            <a href="/admin/vieworder/<?= $model['orders'][$i]['idTransaction']; ?>">
                                <i class="fa-solid fa-share"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>

    <div class="MainMenu">
        <div class="row">
            <div class="title">
                <h1>Inventory Order Info</h1>
            </div>
        </div>
        <div class="OrderInfo">
            <div class="info">
                <p>Name</p>
                <h4>Nur Azis Saputra</h4>
            </div>
            <div class="info">
                <p>Datetime</p>
                <h4>17 Jun 2023</h4>
            </div>
            <div class="info">
                <p>Cashier</p>
                <h4>Rizal</h4>
            </div>
            <div class="info">
                <p>ID Transaction</p>
                <h4>1230817238910237</h4>
            </div>
        </div>

        <div class="OrderLabel">
            <p>Product</p>
            <p class="row cash">Cost</p>
            <p class="row cash">Piece</p>
            <p class="row cash">Sub Total</p>
        </div>
        <div class="OrderValue">
            <div class="Product">
                <div class="row">
                    <h4>Robusta Coffee</h4>
                    <p>Size: Normal, Varian: Ice</p>
                </div>
                <div class="row cash">
                    <p><s>Rp25.000</s></p>
                    <h4>Rp20.000</h4>
                </div>
                <div class="row cash piece">
                    <h4>3</h4>
                </div>
                <div class="row cash">
                    <p><s>Rp75.000</s></p>
                    <h4>Rp60.000</h4>
                </div>
            </div>
            <!-- Repeat for other products as needed -->
        </div>

        <div class="OrderVoucher">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <p><strong>Voucher: </strong>Promo Uji Coba</p>
                    <p><strong>Rp4.000</strong></p>
                </div>
            </div>
        </div>
        <div class="OrderSummary">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <p>Amount</p>
                    <p>Rp340.000</p>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <p>Sales Tax</p>
                    <p>Rp10.000</p>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <p>Coupons Received</p>
                    <p>Rp15.000</p>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <h4>Grand Total</h4>
                    <h4>Rp350.000</h4>
                </div>
            </div>
        </div>
        <div class="action">
            <a href="">
                <i class="fa-solid fa-receipt"></i>
            </a>
            <a href="editproduct/">
                <i class="fa-solid fa-clock"></i>
            </a>
            <a href="draftproduct/" onclick="return confirm('Change Status! Continue?');">
                <i class="fa-solid fa-check-to-slot"></i>
            </a>
            <a href="removeproduct/" onclick="return confirm('Remove Product! Continue?');">
                <i class="fa-solid fa-ban" style="color: #E33131;"></i>
            </a>
        </div>
    </div>
</section>