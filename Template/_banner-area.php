<?php
  shuffle($product_shuffle);
?>
<!-- Owl-carousel -->
<section id="banner-area">
    <div class="owl-carousel owl-theme">
    <?php foreach ($product_shuffle as $item) {
         if($item['Category'] == 'Banner'){
        ?>
        <div class="item" style="height: 70vh; margin: 10px;">
        <img src="<?php echo $item['item_image'] ?? "./assets/products/1.jpg"; ?>" alt="product1" class="img-fluid"></a>
        </div>
        <?php
          }
        }
        ?>
    </div>
</section>
<!--end Owl-carousel -->