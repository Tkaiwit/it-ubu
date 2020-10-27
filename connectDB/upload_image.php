<?php
    
    // require 'PATH_TO_FROALA_SDK/lib/froala_editor.php';
  require '../../lib/FroalaEditor.php';
    // Store the image.
    try {
      $response = FroalaEditor_Image::upload('../../image/');
      echo stripslashes(json_encode($response));
    }
    catch (Exception $e) {
      http_response_code(404);
    }
?>