<?php
// Root Router – delegates requests to backend
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Serve static files (css, js, images, fonts)
if (preg_match('/\.(?:png|jpg|jpeg|gif|webp|css|js|ico|ttf|woff|woff2|eot|svg)$/', $uri)) {
    // If the file exists directly at the requested URI (e.g. /public/images/logo.png)
    if (file_exists(__DIR__ . $uri)) {
        return false; 
    }
    
    // If we want to map something like /assets/... to /frontend/assets/...
    $frontendFile = __DIR__ . '/frontend' . $uri;
    if (file_exists($frontendFile)) {
        $mime = mime_content_type($frontendFile);
        if ($mime) header("Content-Type: $mime");
        // For css/js mime_content_type might return text/plain. Hardcode common ones:
        if (str_ends_with($uri, '.css')) header('Content-Type: text/css');
        if (str_ends_with($uri, '.js')) header('Content-Type: application/javascript');
        if (str_ends_with($uri, '.svg')) header('Content-Type: image/svg+xml');
        readfile($frontendFile);
        exit;
    }
}

// All other requests go to backend
$_SERVER['SCRIPT_NAME'] = '/index.php';
require_once __DIR__ . '/backend/router.php';
