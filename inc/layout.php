<?php
$cur = $path;
$isRo = $L['code'] === 'ro';
$url = fn(string $h): string => $h === '#' ? '#' : ($isRo ? ($h === '/' ? '/ro/' : '/ro'.$h) : $h);
$active = fn(string $h): string => ($h !== '#' && ($cur === $h || ($h !== '/' && str_starts_with($cur, $h)))) ? ' active' : '';
?><!DOCTYPE html>
<html lang="<?= $L['code'] ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title) ?> – CompRobIT</title>
<meta name="description" content="<?= $isRo ? 'CompRobIT – cercuri de robotică și programare pentru copii la Târgu Secuiesc: LEGO WeDo, Spike, Mindstorms EV3, Arduino și imprimare 3D.' : 'CompRobIT K.F.T. – robotika és programozás szakkörök Kézdivásárhelyen: LEGO WeDo, Spike, Mindstorms EV3, Arduino és 3D nyomtatás.' ?>">
<meta property="og:title" content="<?= htmlspecialchars($title) ?> – CompRobIT">
<meta property="og:type" content="website">
<meta property="og:image" content="/assets/images/logo.jpg">
<link rel="icon" href="/assets/images/logo.png">
<link rel="canonical" href="<?= $url($cur === '/' ? '/' : $cur) ?>">
<link rel="alternate" hreflang="hu" href="<?= $cur === '/' ? '/' : $cur ?>">
<link rel="alternate" hreflang="ro" href="<?= $cur === '/' ? '/ro/' : '/ro'.$cur ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/style.css?v=2">
</head>
<body>
<a href="#main" class="skip-link"><?= $isRo?'Sari la conținut':'Ugrás a tartalomra' ?></a>
<nav class="navbar navbar-expand-lg navbar-dark bg-maroon fixed-top" aria-label="Nav">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?= $url('/') ?>">
      <img src="/assets/images/logo.jpg" alt="CompRobIT" height="38" class="me-2 rounded"> CompRobIT
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-label="Menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <?php foreach ($L['nav'] as [$href, $label, $sub]): ?>
          <?php if ($sub): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle<?= $active($href) ?>" href="<?= $url($href) ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $label ?></a>
              <ul class="dropdown-menu">
                <?php foreach ($sub as [$sh, $sl]): ?>
                  <li><a class="dropdown-item<?= $active($sh) ?>" href="<?= $url($sh) ?>"><?= $sl ?></a></li>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link<?= $active($href) ?>" href="<?= $url($href) ?>"><?= $label ?></a></li>
          <?php endif; ?>
        <?php endforeach; ?>
        <li class="nav-item"><a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSdnj9QvpO7LKaVmtKP-IkAENdqeXb451go6BFTy-sMXLh7CHw/viewform" rel="noopener" target="_blank"><i class="fa-solid fa-user-plus me-1"></i><?= $L['register'] ?></a></li>
        <li class="nav-item ms-lg-2"><a class="btn btn-sm btn-light fw-bold" href="<?= $isRo ? ($cur==='/'?'/':$cur) : ($cur==='/'?'/ro/':'/ro'.$cur) ?>"><i class="fa-solid fa-globe me-1"></i><?= $L['other_label'] ?></a></li>
      </ul>
    </div>
  </div>
</nav>
<main id="main" class="container pt-5 mt-5">
<?= $content ?>
</main>
<footer class="bg-maroon text-white py-4 mt-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <h5 class="fw-bold">CompRobIT K.F.T.</h5>
        <p class="mb-0"><?= $L['footer_about'] ?></p>
      </div>
      <div class="col-md-4">
        <h5 class="fw-bold"><?= $L['footer_follow'] ?></h5>
        <a class="text-white" href="https://www.facebook.com/Robotika.Kezdi" rel="noopener" target="_blank"><i class="fa-brands fa-facebook me-1"></i>Robotika Kézdivásárhely</a>
      </div>
      <div class="col-md-4">
        <h5 class="fw-bold"><?= $L['footer_contact'] ?></h5>
        <p class="mb-1"><i class="fa-solid fa-envelope me-1"></i><a class="text-white" href="mailto:contact@comprobit.ro">contact@comprobit.ro</a></p>
        <p class="mb-0"><i class="fa-solid fa-mobile-screen me-1"></i>0757 530 759</p>
      </div>
    </div>
    <hr class="border-light opacity-25">
    <p class="text-center mb-0 small">© <?= date('Y') ?> Comprobit KFT · <?= $L['footer_rights'] ?></p>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.5/dist/index.bundle.min.js"></script>
</body>
</html>
