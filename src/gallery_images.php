<?php

const GALLERY_IMAGES_PER_ROW = 4;
const IMAGES_PER_PAGE = 16;
const GALLERY_DIR = __DIR__ . '/images/gallery/';
// relative path used in src attribute
const THUMBNAIL_DIR = 'images/thumbnails/';

/**
 * Renders pagination controls for the gallery.
 * 
 * @param int $totalPages Total number of pages
 * @param int $page Current page number (1-based)
 */
function render_pagination_controls(int $totalPages, int $page): void {
    // build base URL preserving other query params except 'page'
    $params = $_GET;
    unset($params['page']);
    $baseQuery = http_build_query($params);
    $baseUrl = $_SERVER['PHP_SELF'] . ($baseQuery ? '?' . $baseQuery . '&' : '?');

    echo "<nav aria-label=\"Gallery pagination\">\n";
    echo "  <ul class=\"pagination justify-content-center\">\n";

    // previous
    $prevClass = ($page <= 1) ? ' page-item disabled' : ' page-item';
    $prevLink = htmlspecialchars($baseUrl . 'page=' . max(1, $page - 1));
    echo "    <li class=\"{$prevClass}\"><a class=\"page-link\" href=\"{$prevLink}\" tabindex=\"-1\">&laquo; Předchozí</a></li>\n";

    // page numbers (limit to reasonable range if many pages)
    for ($p = 1; $p <= $totalPages; $p++) {
        $active = ($p === $page) ? ' active' : '';
        $link = htmlspecialchars($baseUrl . 'page=' . $p);
        echo "    <li class=\"page-item{$active}\"><a class=\"page-link\" href=\"{$link}\">{$p}</a></li>\n";
    }

    // next
    $nextClass = ($page >= $totalPages) ? ' page-item disabled' : ' page-item';
    $nextLink = htmlspecialchars($baseUrl . 'page=' . min($totalPages, $page + 1));
    echo "    <li class=\"{$nextClass}\"><a class=\"page-link\" href=\"{$nextLink}\">Následující &raquo;</a></li>\n";

    echo "  </ul>\n";
    echo "</nav>\n";
}

/**
 * Scans a directory for image files and returns an array of filenames.
 * 
 * @param string $galleryDir Directory to scan
 */
function get_gallery_images(string $galleryDir) {
    // Allowed image extensions (case-insensitive)
    $allowed = ['jpg','jpeg','png','gif','bmp','webp'];

    return array_values(array_filter(scandir($galleryDir), function($f) use ($galleryDir, $allowed) {

        // ignore this dir and parent dir entries
        if ($f === '.' || $f === '..') {
            return false;
        }

        $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
        return in_array($ext, $allowed);
    }));
}


if (!is_dir(GALLERY_DIR)) {
    echo "<!-- gallery folder not found: {GALLERY_DIR} -->\n";
    return;
}

$files = get_gallery_images(GALLERY_DIR);

// pagination parameters
$total = count($files);
$totalPages = (int) max(1, ceil($total / IMAGES_PER_PAGE));

// current page from query param
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
if ($page > $totalPages) {
    $page = $totalPages;
}

// 0-based indexing
$start = ($page - 1) * IMAGES_PER_PAGE;
$pageFiles = array_slice($files, $start, IMAGES_PER_PAGE);
$pageTotal = count($pageFiles);

// show controls at top if multiple pages
if ($totalPages > 1) {
    render_pagination_controls($totalPages, $page);
}

// render images for current page in rows of GALLERY_IMAGES_PER_ROW
for ($i = 0; $i < $pageTotal; $i += GALLERY_IMAGES_PER_ROW) {
    echo "<div class=\"row justify-content-center\">\n";

    for ($j = 0; $j < GALLERY_IMAGES_PER_ROW; $j++) {
        $idx = $i + $j;
        if ($idx >= $pageTotal) {
            // fill empty columns to keep grid spacing
            echo "  <div class=\"col-lg-3 col-md-6 pb-4\"></div>\n";
            continue;
        }

        $file = $pageFiles[$idx];
        $imageName = htmlspecialchars($file, ENT_QUOTES | ENT_SUBSTITUTE);
        // determine if thumbnail exists; if not, fall back to original image
        $thumbFullPath = __DIR__ . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'thumbnails' . DIRECTORY_SEPARATOR . $file;
        $thumbWebPath = THUMBNAIL_DIR . $imageName;
        $galleryWebPath = 'images/gallery/' . $imageName;
        $imgSrc = file_exists($thumbFullPath) ? $thumbWebPath : $galleryWebPath;

        echo "  <div class=\"col-lg-3 col-md-6 pb-4\">\n";
        echo "    <img src=\"{$imgSrc}\" class=\"img-thumbnail\" data-bs-src=\"{$galleryWebPath}\" data-bs-toggle=\"modal\" data-bs-target=\"#imageModal\">\n";
        echo "  </div>\n";
    }

    echo "</div>\n";
}

// show controls at bottom if multiple pages
if ($totalPages > 1) {
    render_pagination_controls($totalPages, $page);
}
?>