<?php

const GALLERY_IMAGES_PER_ROW = 4;

// Scans a folder (relative to this file) for image files and prints a Bootstrap-compatible grid of thumbnails
// Adjust $galleryDir and $thumbDir as needed.
$galleryDir = __DIR__ . '/images/gallery/';
$thumbDir = 'images/thumbnails/'; // relative path used in src attribute

// Allowed image extensions (case-insensitive)
$allowed = ['jpg','jpeg','png','gif','bmp','webp'];

if (!is_dir($galleryDir)) {
    echo "<!-- gallery folder not found: {$galleryDir} -->\n";
    return;
}

$files = array_values(array_filter(scandir($galleryDir), function($f) use ($galleryDir, $allowed) {

    // ignore this dir and parent dir entries
    if ($f === '.' || $f === '..') {
        return false;
    }

    $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
    return in_array($ext, $allowed);
}));

// group images into rows of 3
$total = count($files);
for ($i = 0; $i < $total; $i += GALLERY_IMAGES_PER_ROW) {
    echo "<div class=\"row justify-content-center\">\n";

    for ($j = 0; $j < GALLERY_IMAGES_PER_ROW; $j++) {
        $idx = $i + $j;
        if ($idx >= $total) {
            // fill empty columns to keep grid spacing (optional: keep as empty cols)
            echo "  <div class=\"col-lg-3 col-md-6 pb-4\"></div>\n";
            continue;
        }

        $file = $files[$idx];
        $imageName = htmlspecialchars($file, ENT_QUOTES | ENT_SUBSTITUTE);
        // determine if thumbnail exists; if not, fall back to original image
        $thumbFullPath = __DIR__ . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'thumbnails' . DIRECTORY_SEPARATOR . $file;
        $thumbWebPath = $thumbDir . $imageName;
        $galleryWebPath = 'images/gallery/' . $imageName;
        $imgSrc = file_exists($thumbFullPath) ? $thumbWebPath : $galleryWebPath;

        echo "  <div class=\"col-lg-3 col-md-6 pb-4\">\n";
        echo "    <img src=\"{$imgSrc}\" class=\"img-thumbnail\" data-bs-src=\"{$galleryWebPath}\" data-bs-toggle=\"modal\" data-bs-target=\"#imageModal\">\n";
        echo "  </div>\n";
    }

    echo "</div>\n";
}
?>