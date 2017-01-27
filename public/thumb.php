<?php

$file = '/mnt/cloud/abhishekgahlot007@gmail.com/thumbnails/$088b4a7035330c10e6e774bb19f9e492aa47663c_bd66d73f-dd6f-43a9-80da-9feac7058ed4_642741373_200X150_.jpg';
$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
$mime = finfo_file($finfo, $file);
finfo_close($finfo);
header('Content-Type:'.$mime);
//echo $mime;
readfile($file);

?>