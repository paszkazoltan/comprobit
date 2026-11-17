<?php
// Statikus GitHub Pages verzio generalasa a PHP oldalbol.
$base = 'http://127.0.0.1:8899';
$out  = '/tmp/comprobit-pages';

$routes = [
  '/' => 'index',
  '/arduino' => 'arduino', '/arduino-kod' => 'arduino-kod', '/arduino-linkek' => 'arduino-linkek',
  '/wedo' => 'wedo', '/spike' => 'spike', '/mindstorms' => 'mindstorms',
  '/3d-nyomtatas' => '3d-nyomtatas', '/3d-feladat' => '3d-feladat', '/galeria' => 'galeria', '/video' => 'video',
  '/ro/' => 'ro/index',
  '/ro/arduino' => 'ro/arduino', '/ro/arduino-kod' => 'ro/arduino-kod', '/ro/arduino-linkek' => 'ro/arduino-linkek',
  '/ro/wedo' => 'ro/wedo', '/ro/spike' => 'ro/spike', '/ro/mindstorms' => 'ro/mindstorms',
  '/ro/3d-nyomtatas' => 'ro/3d-nyomtatas', '/ro/3d-feladat' => 'ro/3d-feladat', '/ro/galeria' => 'ro/galeria', '/ro/video' => 'ro/video',
];

foreach ($routes as $url => $slug) {
    $html = (string)file_get_contents($base . $url);
    if ($html === '') { fwrite(STDERR, "URES: $url\n"); continue; }
    // absolut belso utvonalak prefixelese
    $html = preg_replace('/(href|src)="\//', '$1="/comprobit/', $html);
    // relatv asset/utvonalak prefixelese
    foreach (['assets/', 'Arduino/', 'Lego_robotok/', '3D_nyomtatas/', 'gallery-images/'] as $p) {
        $html = str_replace('src="' . $p, 'src="/comprobit/' . $p, $html);
        $html = str_replace('href="' . $p, 'href="/comprobit/' . $p, $html);
    }
    $dest = $out . '/' . $slug . '/index.html';
    @mkdir(dirname($dest), 0777, true);
    file_put_contents($dest, $html);
    echo "kesz: /$slug\n";
}
echo "statikus fak kesz\n";
