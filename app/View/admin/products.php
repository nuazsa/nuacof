<?php
require_once 'component/navigation.php';
?>


<section id="main">
    <h1>PRODUCTS</h1>
    <div class="ProductFilterSorter">
        <div class="ProductFilter">
            <div class="box">
                <p>filter</p>
            </div>
            <div class="box">
                <p>ascending</p>
            </div>
            <div class="box">
                <p>descending</p>
            </div>
        </div>
        <div class="ProductSorter">
            <div class="box">
                <p>oreder by</p>
            </div>
            <div class="box">
                <p>reset</p>
            </div>
        </div>
        <div class="ProductManager">
            <p>add new product</p>
        </div>

    </div>
    <div class="ProductListView">
        
    </div>
</section>

<script>
    document.querySelector('.toggle').addEventListener('click', function() {
        document.querySelector('#sidebar').classList.toggle('collapsed');
        document.querySelector('#navbar').classList.toggle('collapsed');
    });
</script>

</body>

</html>