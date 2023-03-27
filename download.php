<?php
    if (!empty($_GET['filename'])) {
        $filename = basename($_GET['filename']);
        $filepath = 'temp/'.$filename;

        if (!empty($filename)&& file_exists($filepath)) {
         //defie headers
         header('Content-Length:'.filesize($filepath));
         header('Content-Encoding:none');
         header("Cache-Control:public");
         header("Content-Description: File Transfer");
         header("Content-Disposition: attechment; filename=$filename");
         header("Content-Type:application/zip");
         header("Content-Transfer-Encoding: binary");

         //read file 
         readfile($filepath);
         exit;   
        }else{
            echo "the file".$filename.'does not exists';
        }
    }
?>