<?php

    include('../lib/full/qrlib.php');

    // debuging vector subshapes
    // visible object categories:
    // pixels (black), rectangles (gray), LShapes (blue), markers(green)
    // and complicated paths (outlined color)
    
    $codeContents   = 'Let see what the code structure looks like with a little bit bigger code';
    $eccLevel       = QR_ECLEVEL_H;
    $pixelPerPoint  = 12;
    $marginSize     = 2;
    $tempDir        = dirname(__FILE__).'/temp/';
    $fileName       = '723_path_debug.png';
    
    // because PHP does not have macros or closures
    function mapCoord($pos) {
        return ($pos+2)*12;
    }
    
    // from: http://stackoverflow.com/questions/3597417/php-hsv-to-rgb-formula-comprehension by: Artefacto
    function HSVtoRGB(array $hsv) {
        list($H,$S,$V) = $hsv;
        $H *= 6;
        $I = floor($H);
        $F = $H - $I;
        $M = $V * (1 - $S);
        $N = $V * (1 - $S * $F);
        $K = $V * (1 - $S * (1 - $F));
        switch ($I) {
            case 0:
                list($R,$G,$B) = array($V,$K,$M);
                break;
            case 1:
                list($R,$G,$B) = array($N,$V,$M);
                break;
            case 2:
                list($R,$G,$B) = array($M,$V,$K);
                break;
            case 3:
                list($R,$G,$B) = array($M,$N,$V);
                break;
            case 4:
                list($R,$G,$B) = array($K,$M,$V);
                break;
            case 5:
            case 6: //for when $H=1 is given
                list($R,$G,$B) = array($V,$M,$N);
                break;
        }
        return array($R, $G, $B);
    }
    
    $enc = QRencode::factory($eccLevel, 1, 0);
    $tab_src = $enc->encode($codeContents, false);
    $area = new QRarea($tab_src);
    $area->detectGroups();
    $area->detectAreas();
  
    $imgW = $area->width;
    $imgH = $area->width;
    
    $target_image = ImageCreate(($imgW + $marginSize*2) * $pixelPerPoint, ($imgH + $marginSize*2) * $pixelPerPoint);
    
    $colBg = ImageColorAllocate($target_image, 255, 255, 255);      // BG, white 
    $colTxt  = ImageColorAllocate($target_image, 0, 0, 0);          // TXT, black 
    
    $colPix     = ImageColorAllocate($target_image, 40, 40, 40);    // Pixel 
    $colRect    = ImageColorAllocate($target_image, 190, 190, 190); // Rect 
    $colTracker = ImageColorAllocate($target_image, 0, 220, 0);     // Tracker 
    $colTrackBg = ImageColorAllocate($target_image, 0, 255, 0);     // Tracker-Bg
    $colLshape  = ImageColorAllocate($target_image, 30, 30, 255);   // L-Shape 
    $colBgL     = ImageColorAllocate($target_image, 240, 240, 255); // L-Shape Cut-out 
    
    $pNum = 0;
    
    // shape rendering ------------------------
    
    foreach ($area->paths as $path) {
        switch ($path[0]) {
            case QR_AREA_PATH:

                    foreach($path[1] as $pathDetails) {
                        
                        $points = array();
                        $px = array_shift($pathDetails);
                        $py = array_shift($pathDetails);
                        $rle_steps = array_shift($pathDetails);

                        $points[] = mapCoord($px);
                        $points[] = mapCoord($py);
                        
                        $rgb = HSVtoRGB(array(
                            mt_rand(0, 360) / 360.0,
                            ((mt_rand(0, 25))+75) / 100.0,
                            0.8
                        ));
                        
                        $colShape = ImageColorAllocate($target_image, floor($rgb[0]*255), floor($rgb[1]*255), floor($rgb[2]*255));
                        
                        imagestring($target_image, 1, mapCoord($px)+2, mapCoord($py)+2, $pNum, $colShape);
                        
                        while(count($rle_steps) > 0) {
                        
                            $delta = 1;
                            
                            $operator = array_shift($rle_steps);
                            if (($operator != 'R') && ($operator != 'L') && ($operator != 'T') && ($operator != 'B')) {
                                $delta = (int)$operator;
                                $operator = array_shift($rle_steps);
                            }
                            
                            if ($operator == 'R') $px += $delta;
                            if ($operator == 'L') $px -= $delta;
                            if ($operator == 'T') $py -= $delta;
                            if ($operator == 'B') $py += $delta;
                        
                            $points[] = mapCoord($px);
                            $points[] = mapCoord($py);
                        }
                        
                        imagesetthickness($target_image, 2);
                        imagepolygon($target_image, $points, count($points)/2 , $colShape);
                        
                        $pNum++;
                    }
                    
                break;
                
            case QR_AREA_POINT:
                        
                    $symb = array_shift($path);
                    
                    while(count($path) > 0) {
                        $px = array_shift($path);
                        $py = array_shift($path);
                        
                        imagefilledrectangle($target_image, mapCoord($px), mapCoord($py), mapCoord($px+1)-1, mapCoord($py+1)-1, $colPix);
                    }
                    
                break;
                
            case QR_AREA_RECT:
                    
                    $symb = array_shift($path);
                    
                    while(count($path) > 0) {
                        $px = array_shift($path);
                        $py = array_shift($path);
                        $ex = array_shift($path);
                        $ey = array_shift($path);
                        
                        imagefilledrectangle($target_image, mapCoord($px), mapCoord($py), mapCoord($ex)-1, mapCoord($ey)-1, $colRect);
                    }
                    
                break;                      
                
            case QR_AREA_LSHAPE:

                    $symb = array_shift($path);
                    
                    while(count($path) > 0) {
                        $px = array_shift($path);
                        $py = array_shift($path);
                        $mode = (int)array_shift($path);
                        
                        imagefilledrectangle($target_image, mapCoord($px), mapCoord($py), mapCoord($px+2)-1, mapCoord($py+2)-1, $colLshape);
                    
                        $offsetX = $px + ($mode % 2);
                        $offsetY = $py + floor($mode / 2);
                        imagefilledrectangle($target_image, mapCoord($offsetX), mapCoord($offsetY), mapCoord($offsetX+1)-1, mapCoord($offsetY+1)-1, $colBgL);
                    }
                    
                break;
                
            case QR_AREA_TRACKER:
                    
                    $symb = array_shift($path);
                    
                    $px = array_shift($path);
                    $py = array_shift($path);
                        
                    imagefilledrectangle($target_image, mapCoord($px), mapCoord($py), mapCoord($px+7)-1, mapCoord($py+7)-1, $colTracker);
                    imagefilledrectangle($target_image, mapCoord($px+1), mapCoord($py+1), mapCoord($px+6)-1, mapCoord($py+6)-1, $colTrackBg);
                    imagefilledrectangle($target_image, mapCoord($px+2), mapCoord($py+2), mapCoord($px+5)-1, mapCoord($py+5)-1, $colTracker);
                    
                    
                break;  
        }
    }
            
    ImagePng($target_image, $tempDir.$fileName);
    ImageDestroy($target_image);
    
    // displaying
    
    echo '<img src="temp/'.$fileName.'" />';