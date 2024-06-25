<?php
require_once __DIR__ . '/../component/navigation.php';
?>


<section id="main">
    <div class="title">
        <h1>PRODUCTS</h1>
    </div>

    <?php
    require_once __DIR__ . '/../component/filter.php';
    ?>

    <div class="ProductListView">
        <table id="productTable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Piece</th>
                    <th>Avalible Costumize</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php for ($i = 0; $i < count($model['product']); $i++) : ?>
                    <tr>
                        <td><img src="/images/uploads/products/<?= $model['product'][$i]['image']; ?>" width="50px" alt="<?= $model['product'][$i]['image']; ?>"></td>
                        <td data-label="Name"><?= $model['product'][$i]['name']; ?></td>
                        <td data-label="Category"><?= $model['product'][$i]['category']; ?></td>
                        <td data-label="Price">Rp<?= number_format($model['product'][$i]['price'], 0, ',', '.'); ?></td>
                        <td data-label="Piece"><?= $model['product'][$i]['piece']; ?></td>
                        <td data-label="Variant">
                        <!-- <p style="color: green; font-weight: bold;"> -->
                            <?php foreach ($model['customizes'][$i] as $customize) : ?>
                                    <?= ucwords($customize['name']); ?>; 
                            <?php endforeach; ?>
                            <!-- </p> -->
                        </td>
                        <td>
                            <div class="action">
                                <a href="editproduct/<?= $model['product'][$i]['id']; ?>">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="draftproduct/<?= $model['product'][$i]['id']; ?>" onclick="return confirm('Change Status! Continue?');">
                                    <i class="fa-solid fa-box <?= ($model['product'][$i]['status'] == 'draft') ? 'warning' : '' ?><?= ($model['product'][$i]['status'] == 'empty') ? 'danger' : '' ?>"></i>
                                </a>
                                <a href="removeproduct/<?= $model['product'][$i]['id']; ?>" onclick="return confirm('Remove Product! Continue?');">
                                    <i class="fa-solid fa-trash-can" style="color: #E33131;"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
    <div class="pagination">
        <p>Showing <?= min($model['pagination'] + 1, $model['count']); ?>-<?= min($model['pagination'] + 5, $model['count']); ?> of <?= $model['count']; ?></p>
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
    </div>
</section>

<script src="/js/admin/script.js"></script>

</body>

</html>