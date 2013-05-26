<?php

	// proxy to serve SF persistent temp dir
	
    include('config.php');
    
    $fileName = $_GET['file'];
    $fileName = join('', explode('/', $fileName));
    $fileName = join('', explode('\\', $fileName));
    
    $fullFile = EXAMPLE_TMP_SERVERPATH.$fileName;
    
    if (file_exists($fullFile)) {
    
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        header("Content-Type: ".finfo_file($finfo, $fullFile));
        header("Content-Length: " . filesize($fullFile));
        readfile($fullFile);
        
    } else {
    
        header("HTTP/1.0 404 Not Found");
        
    }