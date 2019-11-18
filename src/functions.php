<?php

function add_user($connection, $un, $pw)
{
    $stmt = $connection->prepare('INSERT INTO users VALUES(?,?)');
    $stmt->bind_param('ss', $un, $pw);
    $stmt->execute();
    $stmt->close();
}


function logOut()
{
    session_start();
    
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}


// reformats input for readability/security
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//basic function for uploading images to src/uploads/
function upload_image()
{
    //makes sure file uploads are allowed on server
    ini_set('file_uploads', 'On');
    
    $randomImageID = uniqid();
    $target_dir = "../public_html/img/";
    $target_file = $target_dir . $randomImageID . basename($_FILES["imageToUpload"]["name"]);
    
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Making sure image is real
    if(isset($_POST["submit"]))
    {
        $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
        if($check !== false) 
        {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        else 
        {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    // Check if file already exists
    // note: should be unneccessary now that images are randomly named
    // leaving it in for now
    if (file_exists($target_file)) 
    {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["imageToUpload"]["size"] > 500000) 
    {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Specifies the filetypes allowed to be uploaded
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
       && $imageFileType != "gif" ) 
    {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) 
    {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } 
    // if not, move file to designated file upload repository with new name and return the location + filename
    else
    {
        if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file))
        {
            echo "The file ". basename( $_FILES["imageToUpload"]["name"]). " has been uploaded.";
            return $target_file;
        } 
        else 
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}
?>