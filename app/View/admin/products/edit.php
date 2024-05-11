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
            <div class="ProductInput">
                <div class="col">
                    <label for="productName">Product Name<div class="required">*</div></label>
                    <input type="text" id="productName" name="productName" value="<?= $model['product']['name']; ?>">
                    <label for="price">Price<div class="required">*</div></label>
                    <input type="number" id="price" name="price" value="<?= $model['product']['price']; ?>">
                    <label for="discount">Discount</label>
                    <input type="number" id="discount" name="discount" value="<?= $model['product']['discount']; ?>">
                </div>
                <div class="col">
                    <label for="piece">Piece<div class="required">*</div></label>
                    <input type="number" id="piece" name="piece" value="<?= $model['product']['piece']; ?>">
                    <label for="description">Description<div class="required">*</div></label>
                    <textarea name="description" id="description"><?= $model['product']['description']; ?></textarea>
                </div>
                <div class="col">
                    <label for="category">Category<div class="required">*</div></label>
                    <select name="category">
                        <option value="Coffee" <?= ($model['product']['category'] == 'Coffee') ? 'selected' : ''; ?>>Coffee</option>
                        <option value="Food" <?= ($model['product']['category'] == 'Food') ? 'selected' : ''; ?>>Food</option>
                        <option value="Snack" <?= ($model['product']['category'] == 'Snack') ? 'selected' : ''; ?>>Snack</option>
                    </select>
                    <label for="status">Status<div class="required">*</div></label>
                    <select name="status">
                        <option value="active" <?= ($model['product']['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                        <option value="draft" <?= ($model['product']['status'] == 'draft') ? 'selected' : ''; ?>>Draft</option>
                        <option value="empty" <?= ($model['product']['status'] == 'empty') ? 'selected' : ''; ?>>Empty</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <button onclick="return confirm('Update product! Continue?');">Update Now</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="ProductInput">
                <div class="col">
                    <form action="" method="POST">
                        <div class="row">
                            <label for="avalibleCustomize">Avalible Customize</label>
                            <input type="text" id="avalibleCustomize" name="avalibleCustomize" placeholder="Enter product customize">
                        </div>
                        <div class="row">
                            <label for="avaliblzeCustomize">Customize Type</label>
                            <input type="text" id="avalibleCustomize" name="avalibleCustomize" placeholder="Enter type customize">
                            <label for="avalibleCustomize">Customize Price</label>
                            <input type="text" id="avalibleCustomize" name="avalibleCustomize" placeholder="Enter price">
                        </div>
                </div>
                <div class="col">
                    <div class="Costumize">
                        <p style="color: green; font-weight: bold;">1. Size -></p>
                        <p>Regular: Rp0, Medium: Rp3.000, Large: Rp6.000</p>
                        <a href="edit" class="edit">edit</a>
                        <a href="delete" class="delete">delete</a>
                    </div>
                    <div class="Costumize">
                        <p style="color: green; font-weight: bold;">1. Size -></p>
                        <p>Regular: Rp0, Medium: Rp3.000, Large: Rp6.000</p>
                        <a href="edit" class="edit">edit</a>
                        <a href="delete" class="delete">delete</a>
                    </div>
                    <div class="Costumize">
                        <p style="color: green; font-weight: bold;">1. Size -></p>
                        <p>Regular: Rp0, Medium: Rp3.000, Large: Rp6.000</p>
                        <a href="edit" class="edit">edit</a>
                        <a href="delete" class="delete">delete</a>
                    </div>
                    <div class="Costumize">
                        <p style="color: green; font-weight: bold;">1. Size -></p>
                        <p>Regular: Rp0, Medium: Rp3.000, Large: Rp6.000</p>
                        <a href="edit" class="edit">edit</a>
                        <a href="delete" class="delete">delete</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <button onclick="return confirm('Update product! Continue?');">Update Now</button>
            </form>
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