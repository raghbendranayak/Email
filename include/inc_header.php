<?php  
/**
 * Travel
 * @package		Dashboard index 
 * @author		SIPL Dev Team (Devendra Jain)
 * @Modify by 	
 */
?>
<?php include("include/class.php"); ?>
<?php include("include/ps_pagination.php"); ?>
<div id="wrapper">
<div class="logo"><!--<img src="">--></div>
<div class="flags"><a href="#" title="English"><img src="" border="0" width="20" height="14"/></a>&nbsp;
<a href="" title="Turkish"><!--<img src="" border="0" width="20" height="15"/>--></a></div>
<ul id="jsddm">
  <li><a href="<?php echo ADMIN_URL ?>menu.php">Home</a></li>
  <li><a href="<?php echo ADMIN_URL ?>edit.php">Reset Password</a></li>
  <li><a href="<?php echo ADMIN_URL ?>category.php">Category</a>
    <ul>
      <?php /*?><li><a href="<?php echo ADMIN_URL ?>create_category.php">Add New Category</a></li><?php */?>
    </ul>
  </li>
  <li><a href="<?php echo ADMIN_URL ?>subpage.php">Pages</a>
    <ul>
   <?php /*?>   <li><a href="<?php echo ADMIN_URL ?>create_page.php">Add New Pages</a></li><?php */?>
    </ul>
        <!--   <li><a href="<?php //echo ADMIN_URL ?>subpage.php">View Pages</a></li>-->
   </li>
  <?php /*?> <li><a href="<?php echo ADMIN_URL ?>news.php">News</a><?php */?>
     <ul>
      <!-- <li><a href="<?php //echo ADMIN_URL ?>create_news.php">Add News</a></li>-->
     </ul>
   </li>
   <li><a href="<?php echo ADMIN_URL ?>gallery_images.php">Gallery</a>
      <ul>
<?php /*?>       <li><a href="<?php echo ADMIN_URL ?>create_gallery.php">Create Gallery</a></li><?php */?>
        <li><a href="<?php echo ADMIN_URL ?>manageGallery.php">Manage Gallery</a></li>
     </ul>
   </li>
   <li><a href="<?php echo ADMIN_URL ?>article.php">Articles</a>
      <ul>
     	  <?php /*?><li><a href="<?php echo ADMIN_URL ?>create_article.php">Add Articles</a></li><?php */?>
      </ul>
   </li>
   <li><a href="<?php echo ADMIN_URL ?>review.php">Reviews</a>
   	  <ul>
        <?php /*?><li><a href="<?php echo ADMIN_URL ?>review.php">View Reviews</a></li><?php */?>
        <?php /*?><li><a href="<?php echo ADMIN_URL ?>review_add.php">Add Reviews</a></li><?php */?>
        <?php /*?><li><a href="<?php echo ADMIN_URL ?>review_view.php">Reviews</a></li><?php */?>
     </ul>
   </li>
   <li><a href="<?php echo ADMIN_URL ?>view_booking_transfer_detail.php">Transfer Booking</a></li>
   <li><a href="<?php echo ADMIN_URL ?>view_booking_hotel_detail.php">Hotel Booking</a></li>
    <li><a href="<?php echo ADMIN_URL ?>view_booking_detail.php">Booking</a>
   	  <ul>      
        <li><a href="<?php echo ADMIN_URL ?>view_blocked_date.php">Booking Calender</a></li>
         <li><a href="<?php echo ADMIN_URL ?>book.php">How to Book Content</a></li>
       
     </ul>
   </li>
   
    <li><a href="<?php echo ADMIN_URL ?>manage_slider.php">Slider</a>
   	  <ul>
<?php /*?>        <li><a href="<?php echo ADMIN_URL ?>review.php">View Reviews</a></li>
        <li><a href="<?php echo ADMIN_URL ?>review_view.php">Reviews</a></li><?php */?>
     </ul>
   </li>
        
    <li><a href="<?php echo ADMIN_URL ?>view_price.php">Tour Price</a></li>   
    <li><a href="<?php echo ADMIN_URL ?>logo.php">Change Logo</a></li>
    <li><a href="<?php echo ADMIN_URL ?>backGround.php">Change BackGround Image</a></li>
    <li><a href="<?php echo ADMIN_URL ?>contact.php">Change Contact Number</a></li>
    <li><a href="<?php echo ADMIN_URL ?>excursions.php">Tour of the Day</a></li>
    <li><a href="<?php echo ADMIN_URL ?>aboutus.php">About Us</a></li>
    <li><a href="<?php echo ADMIN_URL ?>terms.php">Add Terms & Conditions</a></li>
    <li><a href="<?php echo ADMIN_URL ?>packages.php">Packages</a></li>
    <li><a href="<?php echo ADMIN_URL ?>adventure.php">Adventure</a></li>
    <li><a href="<?php echo ADMIN_URL ?>relaxation.php">Relaxation</a></li>
    <li><a href="<?php echo ADMIN_URL ?>hotels.php">Hotels</a></li>
    <li><a href="<?php echo ADMIN_URL ?>luxor.php">Luxor Experience</a></li>
    <li><a href="<?php echo ADMIN_URL ?>popular.php">Popular Tours</a></li>
    <li><a href="<?php echo ADMIN_URL ?>cairo.php">Cairo Experience</a></li>
    <li><a href="<?php echo ADMIN_URL ?>faq_ans.php">FAQ</a></li>
    <li><a href="<?php echo ADMIN_URL ?>logout.php">Logout</a></li>
</ul>
</div>