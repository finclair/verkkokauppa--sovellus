<div class = "product-content">
    <?php
    if (file_exists('img/' . $product['id'] . '.jpg')) : ?>
        <img class ="product-image" src="img/<?php echo $product['id'] . ".jpg"?>" alt="tuotekuva">
    <?php else : ?>
        <img class ="product-image" src="img/default.jpg" alt="tuotekuva">
    <?php endif; ?>
    <div class="product-container">
        <h2 class="product-title">
            <a href="product-info.php?id=<?php echo $product['id']; ?> "><?php echo $product['name']; ?></a>
        </h2>
        <h3 class="product-category"><?php echo $product['category']; ?></h3>
        <h4 class="product-price"><?php echo $product['price'] . ' €' ; ?></h4>
        <h4 class="product-price"><?php echo 'Varastosaldo: ' . $product['saldo']  ; ?></h4>

        <form method="POST" action="add-to-cart.php">
            <input type="hidden" name="index" value="<?php echo $product['id']; ?>" >
            <br>
            <input type="text" name="quantity" value="0" size="1" maxlength="1">
            <br>
            <input type="submit" name="submit" value="Lisää koriin">
        </form>
    </div> <!-- end of product- -container -->
</div> <!-- end of product- -content-->

