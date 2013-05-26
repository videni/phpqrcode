<?php

    include('../lib/full/qrlib.php');
    include('config.php');
    
    // Compressed SVGZ support
    
    $tempDir = EXAMPLE_TMP_SERVERPATH;
     
    $dataText   = 'PHP QR Code :)';
    $svgTagId   = 'id-of-svg';
    $saveToFile = '204_demo.svgz';
    $width      = false; // auto calculated
    $size       = false;
    $margin     = 4;
    $compress   = true;
    
    // it is saved to file but also returned from function
    $svgCode = QRcode::svg(
        $dataText, false, $tempDir.$saveToFile, 
        QR_ECLEVEL_L, $width, $size, $margin, $compress
    );
    
    $svgCodeFromFile = file_get_contents($tempDir.$saveToFile);
    
    $sizeOrig = strlen($svgCode);
    $sizeGzip = strlen($svgCodeFromFile);
    $saved = ((($sizeOrig+1) - $sizeGzip) / ($sizeOrig+1))*100;
    
    echo '<b>Raw SVG size:</b> '.$sizeOrig.' B <br/>';
    echo '<b>Compressed SVGZ size:</b> '.$sizeGzip.' B <br/>';
    echo '<b>Saved:</b>: '.number_format($saved, 3).'%<br/>';
    
    echo '<br/>Notice: some browsers will open SVGZ files (like Opera) some wont (like Chrome)<br/>';
    echo '<iframe src="temp/'.$saveToFile.'" style="width:98%;height:160px"></iframe>';