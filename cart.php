<?php
ob_start();
// include header.php file
include ("header.php");
?>

<?php
/* include cart-template*/
count($product->getData('cart')) ? include ("Template/_cart-template.php"):include ("Template/notFound/_cart-notFound.php");
/* emd include cart-template*/

/* include wishlist-template*/
count($product->getData('wishlist')) ? include ("Template/_wishlist_template.php"):include ("Template/notFound/_wishlist-notFound.php");
/* emd include wishlist-template*/

/* include new phones*/
include ("Template/_new-phones.php");
/* emd include new phones*/
?>

<?php
// include footer.php file
include ("footer.php");
?>
