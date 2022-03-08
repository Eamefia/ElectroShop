<?php
   ob_start();
   // include header.php file
   include ("header.php");
?>

<?php
    /* include banner-area*/
     include ("Template/_banner-area.php");
    /* emd include banner-area*/

     /* include top-sale*/
     include ("Template/_top-sale.php");
    /* emd include top-sale*/

    /* include special-price*/
      include ("Template/_special-price.php");
     /* emd include special-price*/

    /* include banner-ads*/
     include ("Template/_banner-ads.php");
     /* emd include banner-ads*/

     /* include new phones*/
     include ("Template/_new-phones.php");
     /* emd include new phones*/
?>

<?php
// include footer.php file
include ("footer.php");
?>

</html>