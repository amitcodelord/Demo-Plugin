<?php 
/* 
Template Name: Custom Form Template
 */

get_header();
?>

<main id="Custom_form_section" role="main">

<div class="row">    
<div class="container col-md-6 col-sm-12 col-lg-6 offset-md-3 offset-lg-3">
<form id="custom_form" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
 </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
  <label for="email">Select image to upload:</label>
  <input type="file" name="fileToUpload" id="fileToUpload">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  <br>
  <div class="ajax_result"></div>
  <br>
  <br>
</form>
</div>
</div>

</main>

<?
get_footer();