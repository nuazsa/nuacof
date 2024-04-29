<?php
require_once __DIR__ . '/../component/navigation.php';
?>

<section id="main">
    <div class="title">
        <h1>EDIT PRODUCT</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="container">
                <!-- Label yang terhubung dengan input file -->
                <label class="image" for="uploadImage">
                    <!-- Gambar dengan gaya tambahan -->
                    <img src="/images/burger.jpeg" width="70px" style="border-radius: 50%; cursor: pointer;" alt="Burger Image">
                </label>
                <!-- Input file yang disembunyikan dari tampilan -->
                <input type="file" id="uploadImage" style="display: none;">
                <p>Upload Photo</p>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <label for="productName">Product Name<div class="required">*</div></label>
                    <input type="text" id="productName" name="productName" placeholder="Enter product name">
                    <label for="price">Price<div class="required">*</div></label>
                    <input type="text" id="price" name="price" placeholder="Enter product price">
                    <label for="discount">Discount</label>
                    <input type="text" id="discount" name="discount" placeholder="Enter product discount">
                    <label for="piece">Piece<div class="required">*</div></label>
                    <input type="text" id="piece" name="piece" placeholder="Enter product piece">
                    <label for="description">Description<div class="required">*</div></label>
                    <input type="text" id="description" name="description" placeholder="Enter product description">
                    <label for="category">Category<div class="required">*</div></label>
                    <select name="category">
                        <option value="Coffee">Coffee</option>
                        <option value="Food">Food</option>
                        <option value="Snack">Snack</option>
                    </select>
                    <button>Add Now</button>
                </form>
            </div>
            <div class="col">
                <form action="" method="get">
                    <label for="avalibleCustomize">Avalible Customize</label>
                    <input type="text" id="avalibleCustomize" name="avalibleCustomize" placeholder="Enter product customize">

                    <div class="col">
                        <input type="text" id="avalibleCustomize" name="avalibleCustomize" placeholder="Enter type customize">
                        <input type="text" id="avalibleCustomize" name="avalibleCustomize" placeholder="Enter price">
                    </div>
                    <div class="col">
                        <input type="text" id="avalibleCustomize" name="avalibleCustomize" placeholder="Enter type customize">
                        <input type="text" id="avalibleCustomize" name="avalibleCustomize" placeholder="Enter price">
                    </div>
                    <div class="col">
                        <input type="text" id="avalibleCustomize" name="avalibleCustomize" placeholder="Enter type customize">
                        <input type="text" id="avalibleCustomize" name="avalibleCustomize" placeholder="Enter price">
                    </div>

                    <button>Add Customize</button>
                </form>
            </div>
            <div class="col">
                <div class="CustomizeList">
                    <div class="Costumize">
                        <p style="color: green; font-weight: bold;">1. Size -></p>
                        <p>Regular: Rp0, <br>Medium: Rp3.000 , <br>Large: Rp6.000</p>
                        <a href="edit" class="edit">edit</a>
                        <a href="delete" class="delete">delete</a>
                    </div>
                    <div class="Costumize">
                        <p style="color: green; font-weight: bold;">2. Variant -></p>
                        <p>Regular: Rp0, <br>Medium: Rp3.000 , <br>Large: Rp6.000</p>
                        <a href="edit" class="edit">edit</a>
                        <a href="delete" class="delete">delete</a>
                    </div>
                    <div class="Costumize">
                        <p style="color: green; font-weight: bold;">3. Sugar -></p>
                        <p>Regular: Rp0, <br>Medium: Rp3.000 , <br>Large: Rp6.000</p>
                        <a href="edit" class="edit">edit</a>
                        <a href="delete" class="delete">delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="/js/admin/script.js"></script>


</body>

</html>