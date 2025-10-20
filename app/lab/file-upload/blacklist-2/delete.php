<?php
if(isset($_GET['file'])){
    // Use basename() to strip directory traversal characters from the input.
    $file = basename($_GET['file']);
    $filepath = "../../unrestricted/uploads/" . $file;

    // Ensure the file exists in the intended directory before deleting.
    if (file_exists($filepath)) {
        unlink($filepath);
    }
    header("Location: index.php");
}
?>