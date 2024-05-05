<div class="ProductFilterSorter">
    <div class="ProductSorter">
        <div class="box">
            <i class="fa-solid fa-filter"></i>
        </div>
        <div class="box">
            <form action="" method="POST" id="sortForm">
                <select name="filter" id="filter" style="margin-left: 10px;" onchange="document.getElementById('sortForm').submit();">
                    <option value="id" <?= ($model['filter'] == 'id') ? 'selected' : ''; ?>>Last Product</option>
                    <option value="name" <?= ($model['filter'] == 'name') ? 'selected' : ''; ?>>Product Name</option>
                    <option value="category" <?= ($model['filter'] == 'category') ? 'selected' : ''; ?>>Category</option>
                    <option value="price" <?= ($model['filter'] == 'price') ? 'selected' : ''; ?>>Price</option>
                    <option value="piece" <?= ($model['filter'] == 'piece') ? 'selected' : ''; ?>>Piece</option>
                    <option value="updatedAt" <?= ($model['filter'] == 'updatedAt') ? 'selected' : ''; ?>>Date</option>
                    <option value="status" <?= ($model['filter'] == 'status') ? 'selected' : ''; ?>>Status</option>
                </select>
            </form>
        </div>
    </div>
    <form action="" method="post">
        <div class="ProductFilter">
            <div class="box">
                <button class="<?= ($model['sort'] == 'asc') ? 'selected' : ''; ?>" type="submit" name="sort" value="asc">Asc</button>
            </div>
            <div class="box">
                <button class="<?= ($model['sort'] == 'desc') ? 'selected' : ''; ?>" type="submit" name="sort" value="desc">Desc</button>
            </div>
        </div>
    </form>

    <div class="ProductManager">
        <a href="addproduct" style="color: #03539E;"><?= $model['action']; ?></a>
    </div>
</div>