<?php
    if(isset($_GET["file"])){
        $filename = ($_GET["file"]);
    }

    header("Content-type: application/pdf");
    header("Content-Disposition: attachment; filename=$filename");
    readfile("uploads/".$filename);
?>