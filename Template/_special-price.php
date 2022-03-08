
<!--special price-->
<?php
  $brand = array_map(function ($pro){ return $pro['item_brand'];}, $product_shuffle);
  $unique = array_unique($brand);
  sort($unique);
  shuffle($product_shuffle);

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])){
        //call method cart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart'));

?>
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="">All Brand</button>
            <?php
              array_map(function ($brand){
                  printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
              }, $unique);
            ?>
        </div>

        <div class="grid">
            <?php array_map(function ($item) use ($in_cart){
                if($item['Category'] == 'Special Price'){
                ?>
            <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand"; ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'Product.php', $item['orderUploads']); ?>">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/13.jpg"; ?>" alt="product2" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price'] ?? '0'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
         }, $product_shuffle) ?>
        </div>
    </div>
</section>
