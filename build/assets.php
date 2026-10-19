<?php
$ROOT = dirname(__DIR__);
$base = 'https://comprobit.ro/';
$refs = [];
foreach (array_merge(glob($ROOT.'/pages/*.html'), glob($ROOT.'/pages/ro/*.html')) as $f) {
    $h = (string)file_get_contents($f);
    if (preg_match_all('/(?:src|href)=["\']([^"\']+)["\']/', $h, $m)) {
        foreach ($m[1] as $u) { $refs[$u] = true; }
    }
}
$skip = '/^(https?:|#|mailto:|javascript:|\/|data:)/i';
$todo = [];
foreach (array_keys($refs) as $u) {
    if (preg_match($skip, $u)) continue;
    $u = ltrim($u, '/');
    if ($u === '') continue;
    if (is_file($ROOT.'/'.$u)) continue;
    $todo[] = $u;
}
$todo = array_values(array_unique($todo));
echo count($todo)." letöltendő fájl\n";
$ch = curl_init();
foreach ($todo as $u) {
    $dest = $ROOT.'/'.$u;
    @mkdir(dirname($dest), 0777, true);
    $fp = fopen($dest, 'w');
    curl_setopt_array($ch, [CURLOPT_URL => $base.str_replace(' ', '%20', $u), CURLOPT_FILE => $fp, CURLOPT_FOLLOWLOCATION => true, CURLOPT_TIMEOUT => 60, CURLOPT_USERAGENT => 'Mozilla/5.0']);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    fclose($fp);
    if ($code !== 200) { @unlink($dest); echo "  MISS $code $u\n"; }
}
curl_close($ch);
echo "kesz\n";
