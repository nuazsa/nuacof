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
                        <img id="previewImage" src="/images/uploads/products/upload.png" width="70px" height="70px" style="border-radius: 50%; cursor: pointer; background-color: #D9D9D9;">
                    </label>
                    <!-- Input file yang disembunyikan dari tampilan -->
                    <input type="file" id="uploadImage" name="uploadImage" style="display: none;">
                    <p>Upload Photo</p>
            </div>
        </div>


        <div class="row">
            <div class="ProductInput">
                <div class="col">
                    <label for="productName">Product Name<div class="required">*</div></label>
                    <input type="text" id="productName" name="productName" placeholder="Enter product name">
                    <label for="price">Price<div class="required">*</div></label>
                    <input type="number" id="price" name="price" placeholder="Enter product price">
                    <label for="discount">Discount</label>
                    <input type="number" id="discount" name="discount" value="" placeholder="Enter product discount">
                </div>
                <div class="col">
                    <label for="piece">Piece<div class="required">*</div></label>
                    <input type="number" id="piece" name="piece" placeholder="Enter product piece">
                    <label for="description">Description<div class="required">*</div></label>
                    <textarea name="description" id="description" placeholder="Enter product description"></textarea>
                </div>
                <div class="col">
                    <label for="category">Category<div class="required">*</div></label>
                    <select name="category">
                        <option value="Coffee">Coffee</option>
                        <option value="Food">Food</option>
                        <option value="Snack">Snack</option>
                    </select>
                    <label for="status">Status<div class="required">*</div></label>
                    <select name="status">
                        <option value="active">Active</option>
                        <option value="draft" selected>Draft</option>
                        <option value="empty">Empty</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <button>Add Now</button>
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