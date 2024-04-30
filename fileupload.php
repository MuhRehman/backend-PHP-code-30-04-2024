<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  // ---------------File_Uploading------------

  $upload_directory = './upload';
  $file_name_array = $_FILES['file']['name'];
  $file_name = $file_name_array;
  $upload_file = $upload_directory ."/". $file_name;

  $image_link = 'http://localhost/tutorial/file-upload/upload/' . $file_name;
  if(!file_exists($upload_directory))
  {
      mkdir($upload_directory, 0777, true);
  }

  if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file))
  {
      echo json_encode([
          'message' => 'File uploaded successfully', 
          'image_link' => $image_link
      ]);
  }
  // ---------------File_Uploading------------







?>