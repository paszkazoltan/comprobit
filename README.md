# CompRobIT – új weboldal (Astro + TypeScript)

A [comprobit.ro](https://comprobit.ro/) robotika szakkör oldalának újraírt, kétnyelvű változata.

A korábbi PHP implementáció a `backup/php` ágon érhető el. A jelenlegi `main` egy **Astro + TypeScript** statikus oldal, amit a GitHub Pages szolgál ki:

**https://paszkazoltan.github.io/comprobit/**

## Technológia

- **Astro 5** – statikus HTML kimenet, nulla futásidejű JavaScript
- **TypeScript** – típusos navigáció és tartalomadatok (`src/data/site.ts`)
- **@astrojs/sitemap** – automatikus `sitemap-index.xml`
- Egyedi CSS design-system (`src/styles/global.css`) – nincs Bootstrap függőség
- Vanilla JS a mobil menühöz és a galéria lightboxhoz

## Dizájn

A [Kombai Maplewood Day School](https://kombai.com/gallery/inspirations/maplewood/) referenciája alapján: krém vászon (`#FBF3E0`), sötétkék (`#243A6B`), teal (`#2E7D7B`), piros (`#E2483B`) és sárga (`#F6C544`) akcentusok, 3px kék keretek és kemény árnyékok. Betűkészlet: **Bitter** (címek), **Cabin** (szöveg), **Kalam** (kézzel írt kiegészítők). A főoldalon osztott hero egyedi robot-bagoly kabalafigurával, krétás aláhúzással és sötétkék „jegykártya" sávval.

## Tartalom

- `/` – magyar, `/ro/` – román
- 11 tartalmi oldal nyelvenként, tiszta URL-lel (`/wedo/`, `/ro/wedo/` stb.)
- A magyar tartalom az élő `comprobit.ro` aktuális oldalairól származik, beleértve a legújabb változásokat:
  - **Szülői betekintés** menüpont és átirányítás a szülői portálra
  - WeDo / Spike / Mindstorms videószakaszok
  - **CompRobIT 2025-Arduino** galéria és a friss 2026-os képek
  - Frissített videócímek
- A román fordítás a korábbi `pages/ro/` tartalomból származik, a new elemekkel kiegészítve

## Fejlesztés

```bash
npm install
npm run dev      # http://localhost:4321/comprobit/
npm run build    # kimenet: dist/
npm run preview
```

## Publikálás

A `dist/` tartalma megy a `gh-pages` ágra. A `.nojekyll` fájl biztosítja, hogy a GitHub Pages ne dolgozza fel Jekyllként az `_astro` könyvtárt.

## Biztonság

- CSP-barát, statikus kimenet – nincs szerveroldali kód, nincs adatbázis
- hreflang és canonical linkek minden oldalon
- A korábban a logokban szereplő hitelesítő adatok eltávolításra kerültek; az aktív GitHub token a helyi git credential store-ban (600 jog) van
