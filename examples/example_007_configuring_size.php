<?php

	include('../lib/full/qrlib.php');

	// how to configure pixel "zoom" factor
	
	$tempDir = dirname(__FILE__).'/temp/';
	
	$codeContents = '123456DEMO';
	
	// generating
	QRcode::png($codeContents, $tempDir.'007_1.png', QR_ECLEVEL_L, 1);
	QRcode::png($codeContents, $tempDir.'007_2.png', QR_ECLEVEL_L, 2);
	QRcode::png($codeContents, $tempDir.'007_3.png', QR_ECLEVEL_L, 3);
	QRcode::png($codeContents, $tempDir.'007_4.png', QR_ECLEVEL_L, 4);
		
	// displaying
	echo '<img src="temp/007_1.png" />';
	echo '<img src="temp/007_2.png" />';
	echo '<img src="temp/007_3.png" />';
	echo '<img src="temp/007_4.png" />';
	