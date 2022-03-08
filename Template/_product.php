<?php

ob_start();

  //request method post
   $item_id = $_GET['item_id'];
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "e-commerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>

<script>
function show(){
	document.getElementById("phone").style.display = "block";
}
</script>

<section id="product" class="py-3 px-5">
    <div class="owl-carousel owl-theme">

        <?php

        $sql = "SELECT * FROM childImages";
        $init = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($init)){
            if ($row['orderUploads'] == $item_id) {?>
              <div class="item">
                  <img src="./assets/childImages/<?php echo $row['image_name']?>">
              </div>
            <?php
            }
        }

        ?>

    </div>







                <?php
                foreach ($product->getData() as $item):
                if ($item['item_id'] == $item_id):

                ?>
        <div class="Cart">				  
                <div class = "Contact btn btn-warning font-baloo font-size-16">
				   <a href="tel:<?php echo $item['Contact']?>">Call to order</a>
				</div>                       
            
            <div class="p-8">
                <div class="text-center">
                    <h4 class="font-baloo pt-5 font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h4>
                    <h6 class="font-baloo font-size-16">by <?php echo $item['item_brand'] ?? "Brand"; ?></h6>
                </div>

                <hr class="m-2">
                <!---    product price       -->

                <div class="row">
                    <table class="my-4 col-6">
                        <tr class="font-rale px-4 font-size-14">
                            <td>Actual Price:</td>
                            <td><strike>$<?php echo $item['Strike_Price'] ?? "Unknown"; ?></strike></td>
                        </tr>
                        <tr class="font-rale font-size-14">
                            <td>Discounted Price:</td>
                            <td class="font-size-20 text-danger">$<span><?php echo $item['item_price'] ?? 0; ?></span></td>
                        </tr>
                        <tr id="order-details" class="font-rale text-dark">
                            <td><small>Sold by <a href="#">Daily Electronics </a></small></td>
                            <td><small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small></td>
                        </tr>
                    </table>
                    <!---    !product price       -->

                    <!--    #policy -->
                    <div id="policy" class="policy col-6">
                        <div class="policy-section">
                            <div class="return mr-5">
                                <div class="font-size-20 my-2 color-second">
                                    <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                </div>
                                <a href="#" class="font-rale font-size-12">Daily Tuition <br>Delivered</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--    !policy -->
                <hr>

                <!-- order-details -->
                <!-- !order-details -->


            </div>

            <div class="col-12 pt-3">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
				
                <p class="font-rale font-size-14"><?php echo $item['Description'] ?? "Unknown"; ?></p>
               
            </div>
        </div>
</section>
<!--   !product  -->





<?php
endif;
endforeach;
?>

<!-- end product-->


