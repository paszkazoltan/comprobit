<?php
declare(strict_types=1);
/**
 * CompRobIT – új, felújított weboldal
 * Clean-URL router, biztonsági fejlécek, sablon alapú oldalak.
 */
$ROOT = __DIR__;
$routes = json_decode((string)file_get_contents($ROOT.'/inc/routes.json'), true);
$titles = $routes['titles'];

/* ---- Biztonsági fejlécek ---- */
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
header("Content-Security-Policy: default-src 'self'; img-src 'self' data: https:; style-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com https://cdn.jsdelivr.net; script-src 'self' https://cdn.jsdelivr.net; font-src 'self' https://cdnjs.cloudflare.com data:; frame-src https://www.youtube.com https://www.youtube-nocookie.com; base-uri 'self'; form-action 'self' https://docs.google.com");
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');

/* ---- Útvonal feloldása ---- */
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$path = '/' . trim($path, '/');

/* ---- Nyelv (HU alapértelmezett, RO a /ro/ előtaggal) ---- */
$lang = 'hu';
if (preg_match('#^/ro(/.*)?$#', $path, $m)) {
    $lang = 'ro';
    $path = empty($m[1]) ? '/' : $m[1];
}
$L = require $ROOT.'/inc/lang/'.$lang.'.php';

$slug = $path === '/' ? 'fooldal' : ltrim($path, '/');
$pageFile = $ROOT.'/pages/'.$lang.'/'.$slug.'.html';
if (!is_file($pageFile)) {
    $pageFile = $ROOT.'/pages/'.$slug.'.html'; // visszaesés a magyar tartalomra
}
$valid = preg_match('/^[a-z0-9\-]+$/', $slug) && is_file($pageFile);

http_response_code($valid ? 200 : 404);
$title = $valid ? ($titles[$slug] ?? ucfirst($slug)) : $L['notfound_title'];
$content = $valid ? (string)file_get_contents($pageFile)
    : '<div class="text-center py-5"><h1>404</h1><p class="lead">'.$L['notfound_text'].'</p><a class="btn btn-maroon" href="'.($lang==='ro'?'/ro/':'/').'">'.$L['back_home'].'</a></div>';
require $ROOT.'/inc/layout.php';
