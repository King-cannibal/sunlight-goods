<?php
if (isset($_FILES['upload'])) {
//todo: handle the uploaded file
echo "Your file was uploaded successfully";
} else {
?>
<form action="FileUpload.php" method="post" enctype="multipart/form-data">
<label for="upload">File:</label>
<input type="file" name="upload" id="upload"><br/>
<input type="submit" name="submit" value="Upload">
</form>
<?php
}
?php
    if (isset($_FILES['upload'])) {
        $uploadDir = '/var/www/uploads/'; //path you wish to store you uploaded files
        $uploadedFile = $uploadDir . basename($_FILES['upload']['name']);
        if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadedFile)) {
            echo 'File was uploaded successfully.';
        } else {
            echo 'There was a problem saving the uploaded file';
        }
        echo '<br/><a href="index.html">Back to Uploader</a>';
    } else {
    ?>
        <form action="FileUpload.php" method="post" enctype="multipart/form-data">
            <label for="upload">File:</label>
            <input type="file" name="upload" id="upload"><br/>
            <input type="submit" name="submit" value="Upload">
            </form>
        <?php
    }
?>
