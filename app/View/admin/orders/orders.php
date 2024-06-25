<?php
require_once __DIR__ . '/../component/navigation.php';
?>

<section id="main">
    <div class="title">
        <h1>INVENTORY ORDER</h1>
    </div>

    <div class="OrderFilterSorter">
        <div class="OrderSorter">
            <div class="box">
                <i class="fa-solid fa-filter"></i>
            </div>
            <div class="box">
                <form action="" method="POST" id="sortForm">
                    <select name="filter" id="filter" style="margin-left: 10px;" onchange="document.getElementById('sortForm').submit();">
                        <option value="id">Last Order</option>
                        <option value="name">Datetime</option>
                        <option value="name" <?= ($model['filter'] == 'name') ? 'selected' : ''; ?>>Product Name</option>
                        <option value="category" <?= ($model['filter'] == 'category') ? 'selected' : ''; ?>>Category</option>
                    </select>
                </form>
            </div>
        </div>
        <form action="" method="post">
            <div class="OrderFilter">
                <div class="box">
                    <button class="" type="submit" name="sort" value="asc">Asc</button>
                </div>
                <div class="box">
                    <button class="" type="submit" name="sort" value="desc">Desc</button>
                </div>
            </div>
        </form>

        <div class="OrderManager">
            <a href="addorder" style="color: #03539E;"><?= $model['action']; ?></a>
        </div>
    </div>

    <div class="OrderListView">
        <table>
            <thead>
                <tr>
                    <th>ID Transaction</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Date/Time</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php for ($i = 0; $i < count($model['orders']); $i++) : ?>
                    <td><?= $model['orders'][$i]['idTransaction']; ?></td>
                    <td><?= $model['orders'][$i]['name']; ?></td>
                    <td>Rp<?= number_format($model['orders'][$i]['amount'], 0, ',', '.'); ?></td>
                    <td><?= $model['orders'][$i]['updatedAt']; ?></td>
                    <td><?= $model['orders'][$i]['payment']; ?></td>
                    <td>
                        <?php
                        $statusClassMap = [
                            'Pay Required' => 'pay-required',
                            'Pending' => 'pending',
                            'Processing' => 'processing',
                            'Completed' => 'completed',
                            'Cancelled' => 'cancelled'
                        ];
                        $statusClass = isset($statusClassMap[$model['orders'][$i]['status']]) ? $statusClassMap[$model['orders'][$i]['status']] : '';
                        ?>
                        <div class="status <?= $statusClass ?>">
                            <p><?= $model['orders'][$i]['status'] ?></p>
                        </div>
                    </td>
                    <td>
                        <div class="action">
                            <?php if ($model['orders'][$i]['status'] !== 'Completed' && $model['orders'][$i]['status'] !== 'Pay Required') : ?>
                                <a href="/admin/completeorder/<?= $model['orders'][$i]['idTransaction']; ?>"><i class="fa-solid fa-check" onclick="return confirm('Completed Order! Continue?');"></i></a>
                            <?php endif; ?>
                            <a href="/admin/vieworder/<?= $model['orders'][$i]['idTransaction']; ?>"><i class="fa-solid fa-share"></i></a>
                        </div>
                    </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
            <tr>
        </table>
    </div>
    <div class="pagination">
        <p>Showing 1-5 of 30</p>
        <form action="" method="post">
            <div class="pagination-buttons">
                <button class="" type="submit" name="pagination" value="-">
                    <i class="fa-solid fa-angles-left"></i>
                </button>
                <button class="" type="submit" name="pagination" value="+">
                    <i class="fa-solid fa-angles-right"></i>
                </button>
            </div>
        </form>
</section>

<script src="/js/admin/script.js"></script>


</body>

</html>