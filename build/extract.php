<?php
$map = [
 'fooldal'=>'fooldal','Arduino'=>'arduino','Arduino_kod'=>'arduino-kod',
 'ArduinoLinkek'=>'arduino-linkek','WeDorobotok'=>'wedo','SpikeRobotok'=>'spike',
 'mindstorms'=>'mindstorms','3dnyomtatas'=>'3d-nyomtatas','3d_nyomtatas'=>'3d-feladat',
 'galeria'=>'galeria','video'=>'video',
];
$titles = [
 'fooldal'=>'Főoldal','arduino'=>'Arduino szakkör','arduino-kod'=>'Arduino kód',
 'arduino-linkek'=>'Arduino linkek','wedo'=>'WeDo robotok szakkör','spike'=>'Spike robotok szakkör',
 'mindstorms'=>'Mindstorms EV3 szakkör','3d-nyomtatas'=>'3D nyomtatás szakkör','3d-feladat'=>'3D feladat',
 'galeria'=>'Képgaléria','video'=>'Videó',
];
@mkdir(__DIR__.'/../pages',0755,true);
$slugtolink = [];
foreach($map as $orig=>$slug){ $slugtolink[$orig]=$slug; }
file_put_contents(__DIR__.'/../inc/routes.json', json_encode(['map'=>$map,'titles'=>$titles], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));

foreach($map as $orig=>$slug){
 $html = file_get_contents(__DIR__."/../_src/$orig.html");
 if(!preg_match('/<main[^>]*>(.*?)<\/main>/s', $html, $m)){
   echo "NINCS main: $orig\n"; continue;
 }
 $c = $m[1];
 // rewrite links to clean urls
 foreach($slugtolink as $o=>$s){
   $c = str_replace('index.php?main='.$o, '/'.$s, $c);
 }
 $c = str_replace('index.php?main=fooldal', '/', $c);
 $c = str_replace('index.php', '/', $c);
 $c = str_replace('./images/', 'assets/images/', $c);
 $c = str_replace('"images/', '"assets/images/', $c);
 $c = str_replace("'images/", "'assets/images/", $c);
 file_put_contents(__DIR__."/../pages/$slug.html", trim($c));
 echo "OK $orig -> pages/$slug.html (".strlen($c)." b)\n";
}
