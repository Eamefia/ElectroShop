<!--Top Sale-->
<?php
  shuffle($product_shuffle);
  
  //request method post
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
      if (isset($_POST['top_sale_submit'])){
          //call method cart
          $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
      }
  }
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top sale</h4>
        <hr>

        <!--owl carousel-->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { 
                if($item['Category'] == 'Top Sale'){
                ?>
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'Product.php', $item['item_id']); ?>">
                       <img src="<?php echo $item['item_image'] ?? "./assets/products/1.jpg"; ?>" alt="product1" class="img-fluid"></a>
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
        <!--end owl carousel-->
    </div>
</section>
<!-- end Top Sale-->
