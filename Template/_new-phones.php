<!--new phones-->
<?php
shuffle($product_shuffle);
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['new_phones_submit'])){
        //call method cart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<section id="new-phones">
    <div class="container">
        <h4 class="font-rubik font-size-20">New Phones</h4>
        <hr>

        <div class="container-fluid">
            <?php foreach ($product_shuffle as $item) { 
                if($item['Category'] == 'Phone Assesories'){
                ?>
                <div class="item py-2 bg-light">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'Product.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/1.jpg"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="rating text-warning font-size-20">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price'] ?? '0'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
         } //closing for foreach function ?>
        </div>
    </div>
</section>
<!--end new phones-->
