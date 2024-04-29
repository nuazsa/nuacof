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
        <table>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Piece</th>
                <th>Avalible Costumize</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><img src="/images/burger.jpeg" width="50px" alt="Coffee 5"></td>
                <td>Latte</td>
                <td>Hot Coffee</td>
                <td>Rp35.000</td>
                <td>10</td>
                <td>Size - Variant - Sugar - Ice</td>
                <td>
                    <div class="action">
                        <a href="editproduct"><i class="fa-regular fa-pen-to-square"></a></i>
                        <i class="fa-solid fa-box"></i>
                        <i class="fa-solid fa-trash-can" style="color: #E33131;"></i>
                    </div>
                </td>
            </tr>
            <tr>
                <td><img src="/images/burger.jpeg" width="50px" alt="Coffee 5"></td>
                <td>Latte</td>
                <td>Hot Coffee</td>
                <td>$4.49</td>
                <td>10</td>
                <td>No</td>
                <td>
                    <div class="action">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <i class="fa-solid fa-box"></i>
                        <i class="fa-solid fa-trash-can" style="color: #E33131;"></i>
                    </div>
                </td>
            </tr>
            <tr>
                <td><img src="/images/burger.jpeg" width="50px" alt="Coffee 1"></td>
                <td>Robusta Coffee</td>
                <td>Hot Coffee</td>
                <td>$5.99</td>
                <td>10</td>
                <td>Yes</td>
                <td>
                    <div class="action">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <i class="fa-solid fa-box"></i>
                        <i class="fa-solid fa-trash-can" style="color: #E33131;"></i>
                    </div>
                </td>
            </tr>
            <tr>
                <td><img src="/images/burger.jpeg" width="50px" alt="Coffee 2"></td>
                <td>Arabica Coffee</td>
                <td>Cold Coffee</td>
                <td>$6.99</td>
                <td>15</td>
                <td>No</td>
                <td>
                    <div class="action">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <i class="fa-solid fa-box"></i>
                        <i class="fa-solid fa-trash-can" style="color: #E33131;"></i>
                    </div>
                </td>
            </tr>
            <tr>
                <td><img src="/images/burger.jpeg" width="50px" alt="Coffee 3"></td>
                <td>Espresso</td>
                <td>Hot Coffee</td>
                <td>$4.99</td>
                <td>8</td>
                <td>Yes</td>
                <td>
                    <div class="action">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <i class="fa-solid fa-box"></i>
                        <i class="fa-solid fa-trash-can" style="color: #E33131;"></i>
                    </div>
                </td>
            </tr>
            <tr>
                <td><img src="/images/burger.jpeg" width="50px" alt="Coffee 4"></td>
                <td>Cappuccino</td>
                <td>Hot Coffee</td>
                <td>$5.49</td>
                <td>12</td>
                <td>Yes</td>
                <td>
                    <div class="action">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <i class="fa-solid fa-box"></i>
                        <i class="fa-solid fa-trash-can" style="color: #E33131;"></i>
                    </div>
                </td>
            </tr>
            <tr>
                <td><img src="/images/burger.jpeg" width="50px" alt="Coffee 5"></td>
                <td>Latte</td>
                <td>Hot Coffee</td>
                <td>$4.49</td>
                <td>10</td>
                <td>No</td>
                <td>
                    <div class="action">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <i class="fa-solid fa-box"></i>
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