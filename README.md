# CompRobIT – felújított weboldal

A `comprobit.ro` (CompRobIT K.F.T., Kézdivásárhely) robotika szakkör oldal
újraépített, feljavított változata. Kétnyelvű: **magyar (HU)** és **román (RO)**.

## Főbb fejlesztések az eredetihez képest

- **Tiszta URL-ek**: `?main=Arduino` helyett `/arduino`
- **Kétnyelvűség**: `/` = magyar, `/ro/` = román (nyelvváltó a menüben)
- **Biztonság**: CSP, `X-Frame-Options`, `X-Content-Type-Options`,
  `Referrer-Policy`, HSTS fejlécek; a gép által listázható könyvtárak tiltása
  (`Options -Indexes`); az admin hivatkozás eltávolítva a nyilvános menüből
- **Sablonrendszer**: egységes fejléc/lábléc (`inc/layout.php`), router (`index.php`)
- **SEO**: `robots.txt`, `sitemap.xml`, Open Graph tagek, `hreflang` jelölések
- **Akadálymentesség**: „Ugrás a tartalomra” link, ARIA címkék
- **Modern design**: saját design-system (`assets/css/style.css`)

## Szerkezet

```
index.php            router (clean URL + nyelv + biztonsági fejlécek)
inc/layout.php       közös fejléc/lábléc
inc/lang/{hu,ro}.php nyelvi szótár (menü, feliratok)
inc/routes.json      útvonal- és cím-térkép
pages/*.html         magyar tartalom
pages/ro/*.html      román tartalom
assets/              CSS és képek
build/extract.php    az eredeti oldal tartalmát kinyerő script
```

## Futtatás

```bash
php -S localhost:8000
# http://localhost:8000/        (HU)
# http://localhost:8000/ro/     (RO)
```

> GitHub Pages nem futtat PHP-t; ez a repó a forráskód. Élesítés PHP-t futtató
> tárhelyen (Apache/nginx) történik.
