<?php
require_once 'component/navigation.php';
?>

<section id="main">
    <h1>INVENTORY ORDER</h1>
    <div class="ProductFilterSorter">
        <div class="ProductFilter">
            <div class="box">
                <p><i class="fa-solid fa-filter"></i> filter</p>
            </div>
            <div class="box">
                <p>Ascending</p>
            </div>
            <div class="box">
                <p>Descending</p>
            </div>
        </div>
        <div class="ProductSorter">
            <div class="box">
                <p>Order By</p>
            </div>
            <div class="box">
                <p style="color: #E33131;">Reset</p>
            </div>
        </div>
        <div class="ProductManager">
            <p style="color: #03539E;">Date</p>
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
        <div class="pagination-buttons">
            <button>&lt;</button>
            <button>&gt;</button>
        </div>
    </div>
</section>

<script src="/js/admin/script.js"></script>


</body>

</html>