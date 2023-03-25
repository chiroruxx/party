<?php

declare(strict_types=1);

if (count($argv) !== 4) {
    fputs(STDERR, "party: arg count does not match.\n");
    fputs(STDERR, "usage: php party.php original_image_path frame_image_path result_image_path\n");
    exit(1);
}
[$_, $originalPath, $framePath, $outputPath] = $argv;

$originalSizeInfo = getimagesize($originalPath);
if (!isset($originalSizeInfo['mime'])) {
    fputs(STDERR, "party: cannot get original image mime type.\n");
    exit(1);
}
$originalMime = $originalSizeInfo['mime'];
switch ($originalMime) {
    case 'image/jpeg':
        $originalImage = imagecreatefromjpeg($originalPath);
        break;
    case 'image/png':
        $originalImage = imagecreatefrompng($originalPath);
        break;
    default:
        fputs(STDERR, "party: mime {$originalMime} is not supported.\n");
        exit(1);
}

if (!isset($originalSizeInfo[0], $originalSizeInfo[1])) {
    fputs(STDERR, "party: cannot get original image size.\n");
    exit(1);
}
$originalWidth = $originalSizeInfo[0];
$originalHeight = $originalSizeInfo[1];

$frameImage = imagecreatefrompng($framePath);
[$frameWidth, $frameHeight] = getimagesize($framePath);

$resultImage = imagecreatetruecolor($frameWidth, $frameHeight);

imagecopyresized($resultImage, $originalImage, 0, 0, 0, 0, $frameWidth, $frameHeight, $originalWidth, $originalHeight);
imagecopy($resultImage, $frameImage, 0, 0,0, 0, $frameWidth, $frameHeight);
imagepng($resultImage, $outputPath);
