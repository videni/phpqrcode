<?php

    // we use merged version of lib (single file)
    include('../lib/merged/phpqrcode.php');
    
    $tempDir = dirname(__FILE__).'/temp/';
    QRcode::png('PHP QR Code :)', $tempDir.'010_merged.png');
        
    // displaying
    echo '<img src="temp/010_merged.png" />';
    
    echo '<br/><br/>Notice this code will chenge every refresh - 
    because merged version of lib does not serach for best mask, 
    but instead select mask by random (to improve speed)';
    