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
                        <div class="action <?= ($model['orders'][$i]['idTransaction'] != $model['order']['idTransaction']) ? 'disable' : ''; ?>">
                            <?php if ($model['orders'][$i]['status'] === 'Pay Required') : ?>
                                <a href="/admin/vieworder/<?= $model['orders'][$i]['idTransaction']; ?>" id="openModalBtn"><i class="fa-solid fa-receipt"></i></a>
                            <?php elseif ($model['orders'][$i]['status'] === 'Pending') : ?>
                                <a href="/admin/vieworder/<?= $model['orders'][$i]['idTransaction']; ?>"><i class="fa-solid fa-clock"></i></a>
                            <?php elseif ($model['orders'][$i]['status'] === 'Processing') : ?>
                                <a href="/admin/vieworder/<?= $model['orders'][$i]['idTransaction']; ?>"><i class="fa-solid fa-check-to-slot"></i></a>
                            <?php endif; ?>
                            <a href="/admin/vieworder/<?= $model['orders'][$i]['idTransaction']; ?>"><i class="fa-solid fa-share"></i></a>
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
                <h4><?= $model['order']['name']; ?></h4>
            </div>
            <div class="info">
                <p>Datetime</p>
                <h4><?= $model['order']['createdAt']; ?></h4>
            </div>
            <div class="info">
                <p>Cashier</p>
                <h4><?= $model['cashier']; ?></h4>
            </div>
            <div class="info">
                <p>ID Transaction</p>
                <h4><?= $model['order']['idTransaction']; ?></h4>
            </div>
        </div>



        <div class="OrderLabel">
            <p>Product</p>
            <p class="row cash">Cost</p>
            <p class="row cash">Qty</p>
            <p class="row cash">Sub Total</p>
        </div>
        <div class="OrderValue">
            <?php foreach ($model['products'] as $index => $product) :?>
            <div class="Product">
                <div class="row">
                <h4><?= $model['productsDetails'][$index]['name']; ?></h4>
                    <p>Size: Normal, Varian: Ice</p>
                </div>
                <div class="row cash">
                    <p><s>Rp25.000</s></p>
                    <h4>Rp<?= number_format($product['product_price'], '0', ',', '.'); ?></h4>
                </div>
                <div class="row cash piece">
                    <h4><?= $product['product_quantity']; ?></h4>
                </div>
                <div class="row cash">
                    <p><s>Rp75.000</s></p>
                    <h4>Rp<?= number_format(($product['product_price'] * $product['product_quantity']), '0', ',', '.'); ?></h4>
                </div>
            </div>
            <?php endforeach; ?>
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
                    <p>Rp<?= number_format($model['order']['amount'], '0', ',', '.'); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <p>Sales Tax</p>
                    <p>Rp<?= number_format($model['order']['tax'], '0', ',', '.'); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <p>Coupons Received</p>
                    <p>Rp<?= number_format($model['order']['coupon'], '0', ',', '.'); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <h4>Grand Total</h4>
                    <h4>Rp<?= number_format($model['order']['total'], '0', ',', '.'); ?></h4>
                </div>
            </div>
        </div>
        <div class="action">
            <a href="order/pay/">
                <i class="fa-solid fa-receipt"></i>
            </a>

            <!-- DisableClass -->
            <?php $disableClass = ($model['order']['status'] == 'Pay Required') ? 'disable' : ''; ?>

            <a href="order/pending/" class="<?= $disableClass; ?>" onclick="return confirm('Change Status! Continue?');">
                <i class="fa-solid fa-clock"></i>
            </a>
            <a href="order/complete/" class="<?= $disableClass; ?>" onclick="return confirm('Change Status! Continue?');">
                <i class="fa-solid fa-check-to-slot"></i>
            </a>
            <a href="order/cancle/" class="<?= $disableClass; ?>" onclick="return confirm('Remove Product! Continue?');">
                <i class="fa-solid fa-ban" style="color: #E33131;"></i>
            </a>
        </div>
    </div>
</section>