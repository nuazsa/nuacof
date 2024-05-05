<?php
require_once __DIR__ . '/../component/navigation.php';
?>

<section id="main">
    <div class="title">
        <h1>ADD NEW PRODUCT</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- Label yang terhubung dengan input file -->
                    <label class="image" for="uploadImage">
                        <!-- Gambar dengan gaya tambahan -->
                        <img id="previewImage" src="/images/uploads/products/<?= $model['product']['image']; ?>" width="70px" height="70px" style="border-radius: 50%; cursor: pointer; background-color: #D9D9D9;">
                    </label>
                    <!-- Input file yang disembunyikan dari tampilan -->
                    <input type="file" id="uploadImage" name="uploadImage" style="display: none;">
                    <input type="hidden" id="lastImage" name="lastImage" style="display: none;" value="<?= $model['product']['image']; ?>">
                    <p>Upload Photo</p>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="ProductInput">
                    <label for="productName">Product Name<div class="required">*</div></label>
                    <input type="text" id="productName" name="productName" value="<?= $model['product']['name']; ?>">
                    <label for="price">Price<div class="required">*</div></label>
                    <input type="text" id="price" name="price" value="<?= $model['product']['price']; ?>">
                    <label for="discount">Discount</label>
                    <input type="text" id="discount" name="discount" value="<?= $model['product']['discount']; ?>">
                    <label for="piece">Piece<div class="required">*</div></label>
                    <input type="text" id="piece" name="piece" value="<?= $model['product']['piece']; ?>">
                    <label for="description">Description<div class="required">*</div></label>
                    <input type="text" id="description" name="description" value="<?= $model['product']['description']; ?>">
                    <label for="category">Category<div class="required">*</div></label>
                    <select name="category">
                        <option value="Coffee" <?= ($model['product']['category'] == 'Coffee') ? 'selected' : ''; ?>>Coffee</option>
                        <option value="Food" <?= ($model['product']['category'] == 'Food') ? 'selected' : ''; ?>>Food</option>
                        <option value="Snack"  <?= ($model['product']['category'] == 'Snack') ? 'selected' : ''; ?>>Snack</option>
                    </select>
                    <label for="status">Status<div class="required">*</div></label>
                    <select name="status">
                        <option value="active" <?= ($model['product']['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                        <option value="draft" <?= ($model['product']['status'] == 'draft') ? 'selected' : ''; ?>>Draft</option>
                        <option value="empty" <?= ($model['product']['status'] == 'empty') ? 'selected' : ''; ?>>Empty</option>
                    </select>
                    <button onclick="return confirm('Update product! Continue?');">Update Now</button>
                    </form>
                </div>
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

<script>
    // Ambil elemen input file dan gambar
    const input = document.getElementById('uploadImage');
    const preview = document.getElementById('previewImage');

    // Tambahkan event listener untuk input file
    input.addEventListener('change', function() {
        const file = this.files[0]; // Ambil file yang dipilih
        if (file) {
            const reader = new FileReader(); // Buat objek FileReader
            reader.onload = function() {
                preview.src = reader.result; // Ubah src gambar dengan data URL dari file
            };
            reader.readAsDataURL(file); // Membaca file sebagai URL data
        }
    })
</script>


</body>

</html>