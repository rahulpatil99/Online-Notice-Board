<?php

//------------------------------------
// methods_test.php
// provides form elements for testing 
// API endpoints
// created: October 2016
// author: Steve Rucker
//------------------------------------

include('Kairos.php');

?>

<html>
  	<head>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="assets/js/scripts.js"></script>
	    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/styles.css" rel="stylesheet">
	   <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

    <div class="container">
      	<div class="row">
        	<h3 class="white">API Keys:</h3>
            <form>
          		APP ID: ####<input type="hidden" class="app_id" value="65c5e877" disabled>
            	APP KEY: ####<input type="hidden" class="app_key" value="86896bae836fd173a12298486cd1694d" disabled>
              <input type="button" id="validateKeys" value="Validate" />
            </form>
      	</div>
      	<div class="row">
        	<div id="apiMethodsTests">
<!--
          		<h3>Test API Methods</h3>
				<div class="row">
					<div class="method-test">
				  		<span class="glyphicon glyphicon-play"></span><h4>viewGalleries() Method</h4>
				  		<form>
				    		<input type="button" id="testViewGalleries" value="Test" />
				  		</form>
					</div>
				</div>
-->
<!--
      	<div class="row">
            <div class="method-test">
              	<span class="glyphicon glyphicon-play"></span><h4>enroll() Method</h4>
              	<form id="enrollForm">
                	  Image (public URL or base64 data): <input type="text" class="image" name="Image">
                    Image (local file): <input type="file" class="image-upload" name="Image Upload">
                  	Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
                  	Subject ID: <input type="text" class="subject_id" name="Subject ID">
                  	<input type="button" id="testEnroll" value="Test" />
              	</form>
            </div>
      	</div>
-->
<!--
      	<div class="row">
            <div class="method-test">
              	<span class="glyphicon glyphicon-play"></span><h4>viewSubjectsInGallery() Method</h4>
              	<form id="viewSubjectsInGalleryForm">
                	Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
                  	<input type="button" id="testViewSubjectsInGallery" value="Test" />
              	</form>
            </div>
      	</div>
-->
<!--
          	<div class="row">
            	<div class="method-test">
              	<span class="glyphicon glyphicon-play"></span><h4>removeSubjectFromGallery() Method</h4>
              	<form id="removeSubjectFromGalleryForm">
                  	Subject ID: <input type="text" class="subject_id" name="Subject ID">
                  	Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
                  	<input type="button" id="testRemoveSubjectFromGallery" value="Test" />
              	</form>
            </div>
      	</div>
-->
<!--
      	<div class="row">
        	<div class="method-test">
          		<span class="glyphicon glyphicon-play"></span><h4>removeGallery() Method</h4>
          		<form id="removeGalleryForm">
              		Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
              		<input type="button" id="testRemoveGallery" value="Test" />
          		</form>
        	</div>
      	</div>
-->
        <div class="row">
          <div class="method-test">
              <span class="glyphicon glyphicon-play"></span>
			  <h3 class="white">Recognize face:</h3>
              <form id="recognizeForm">
                  <!-- Image (public URL or base64 data): <input type="text" class="image" name="Image"> -->
                  Image (local file): <input type="file" class="image-upload form-control" name="Image Upload">
                  Gallery Name: <input type="text" class="gallery_name form-control" name="Gallery Name">
				  <div class="spacer" style="padding-top:40px"></div>
                  <input type="button" id="testRecognize" value="Detect" class="form-control btn btn-lg btn-success" />
              </form>
          </div>
        </div>
<!--
      	<div class="row">
        	<div class="method-test">
          		<span class="glyphicon glyphicon-play"></span><h4>detect() Method</h4>
          		<form id="detectForm" enctype="multipart/form-data">
            		  Image (public URL or base64 data): <input type="text" class="image" name="Image">
                  Image (local file): <input type="file" class="image-upload" name="Image Upload">
              		<input type="button" id="testDetect" value="Test" />
          		</form>
        	</div>
      	</div>
-->
<!--
        <div class="row">
          <div class="method-test">
              <span class="glyphicon glyphicon-play"></span><h4>verify() Method</h4>
              <form id="verifyForm">
                  Image (public URL or base64 data): <input type="text" class="image" name="Image">
                  Image (local file): <input type="file" class="image-upload" name="Image Upload">
                  Subject ID: <input type="text" class="subject_id" name="Subject ID">
                  Gallery Name: <input type="text" class="gallery_name" name="Gallery Name">
                  <input type="button" id="testVerify" value="Test" />
              </form>
          </div>
        </div>
-->
        <div class="row">
          <!-- <h5>Time:</h5>
          <div id="timer" class="col-lg-8"></div> -->
        </div>
      	<div class="row">
        	<h5>Response:</h5>
        	<img src="assets/images/loading.gif" id="loader">
        	<div id="view_data" class="col-lg-8"></div>
      	</div>
    </div>
        </div>
      </div>
  </body>
</html> 