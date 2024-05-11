<?php
require_once 'component/navigation.php';
?>

<section id="main">
    <div class="title">
        <h1>INVENTORY ORDER</h1>
    </div>

    <div class="ProductFilterSorter">
        <div class="ProductSorter">
            <div class="box">
                <i class="fa-solid fa-filter"></i>
            </div>
            <div class="box">
                <form action="" method="POST" id="sortForm">
                    <select name="filter" id="filter" style="margin-left: 10px;" onchange="document.getElementById('sortForm').submit();">
                        <option value="id">Last Product</option>
                        <option value="name">Product Name</option>
                        <option value="category">Category</option>
                        <option value="price">Price</option>
                        <option value="piece">Piece</option>
                        <option value="updatedAt">Date</option>
                        <option value="status">Status</option>
                    </select>
                </form>
            </div>
        </div>
        <form action="" method="post">
            <div class="ProductFilter">
                <div class="box">
                    <button class="" type="submit" name="sort" value="asc">Asc</button>
                </div>
                <div class="box">
                    <button class="" type="submit" name="sort" value="desc">Desc</button>
                </div>
            </div>
        </form>

        <div class="ProductManager">
            <a href="addproduct" style="color: #03539E;"><?= $model['action']; ?></a>
        </div>
    </div>

    <div class="ProductListView">
        <table>
            <tr>
                <th>ID Transaction</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>000000000000</td>
                <td>Nur Azis Prasetyo</td>
                <td>Rp100.000</td>
                <td>12 Jan 2023</td>
                <td>Gopay</td>
                <td>
                    <div class="status completed">
                        <p>Completed</p>
                    </div>
                </td>
                <td>
                    <div class="action">
                        <i class="fa-solid fa-check"></i>
                        <i class="fa-solid fa-share"></i>
                        <i class="fa-solid fa-trash-can" style="color: #E33131;"></i>
                    </div>
                </td>
            </tr>
            <tr>
                <td>000000000000</td>
                <td>Nur Azis Prasetyo</td>
                <td>Rp100.000</td>
                <td>12 Jan 2023</td>
                <td>Gopay</td>
                <td>
                    <div class="status">
                        <p>Pending</p>
                    </div>
                </td>
                <td>
                    <div class="action">
                        <i class="fa-solid fa-check"></i>
                        <i class="fa-solid fa-share"></i>
                        <i class="fa-solid fa-trash-can" style="color: #E33131;"></i>
                    </div>
                </td>
            </tr>
            <tr>
                <td>000000000000</td>
                <td>Nur Azis Prasetyo</td>
                <td>Rp100.000</td>
                <td>12 Jan 2023</td>
                <td>Gopay</td>
                <td>
                    <div class="status">
                        <p>Pending</p>
                    </div>
                </td>
                <td>
                    <div class="action">
                        <i class="fa-solid fa-check"></i>
                        <i class="fa-solid fa-share"></i>
                        <i class="fa-solid fa-trash-can" style="color: #E33131;"></i>
                    </div>
                </td>
            </tr>
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