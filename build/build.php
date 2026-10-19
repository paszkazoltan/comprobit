<?php
$ROOT = dirname(__DIR__);

/* 1) Galéria blokkok kinyerése a magyar oldalakból és beillesztése a RO helyőrzőkbe */
function galleryFrom(string $file): string {
    $html = (string)file_get_contents($file);
    if (preg_match_all('/<div class="col-6 col-md-3">.*?<\/a>\s*<\/div>/s', $html, $m)) {
        return implode("\n            ", array_map('trim', $m[0]));
    }
    return '';
}
foreach (glob($ROOT.'/pages/ro/*.html') as $roFile) {
    $ro = (string)file_get_contents($roFile);
    if (preg_match_all('/\{\{GALLERY:([a-z0-9\-]+)\}\}/', $ro, $mm)) {
        foreach ($mm[1] as $i => $slug) {
            $gal = galleryFrom($ROOT.'/pages/'.$slug.'.html');
            $ro = str_replace($mm[0][$i], $gal, $ro);
        }
        file_put_contents($roFile, $ro);
        echo "galeria beillesztve: ".basename($roFile)."\n";
    }
}

/* 2) Kódgaléria / 3D feladat oldalak fordítása (célzott cserék) */
$small = [
  'arduino-kod.html' => [
    'Kódgaléria' => 'Galerie de cod',
    'Megvalósításaink Arduino projektekből.' => 'Proiecte Arduino realizate de noi.',
    'Letöltés:' => 'Descărcare:',
  ],
  '3d-feladat.html' => [
    'Kódgaléria' => 'Galerie',
    '3D nyomtatás projektek.' => 'Proiecte de imprimare 3D.',
    'képek' => 'imagini',
  ],
  'video.html' => [],
];
foreach ($small as $name => $repl) {
    $src = $ROOT.'/pages/'.$name;
    $html = (string)file_get_contents($src);
    foreach ($repl as $hu => $ro) { $html = str_replace($hu, $ro, $html); }
    file_put_contents($ROOT.'/pages/ro/'.$name, $html);
    echo "fordítva: pages/ro/$name\n";
}

/* 3) Útvonal-normalizálás minden oldalon: './' és '/images/' javítása */
foreach (array_merge(glob($ROOT.'/pages/*.html'), glob($ROOT.'/pages/ro/*.html')) as $f) {
    $h = (string)file_get_contents($f);
    $h = preg_replace('/(["\'])\.\//', '$1', $h);
    $h = preg_replace('/(["\'(])\/images\//', '${1}assets/images/', $h);
    $h = str_replace('/assets/images/', 'assets/images/', $h);
    file_put_contents($f, $h);
}
echo "kesz\n";
