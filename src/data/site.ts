export type Lang = "hu" | "ro";

export interface NavItem {
  label: string;
  href: string;
  children?: NavItem[];
  external?: boolean;
}

export interface Copy {
  brand: string;
  tagline: string;
  home: string;
  register: string;
  language: string;
  footerAbout: string;
  footerExplore: string;
  footerConnect: string;
  footerRights: string;
  footerCtaTitle: string;
  footerCtaText: string;
  skip: string;
  menu: string;
  close: string;
  lightboxHint: string;
}

export const BASE = "/comprobit/";
export const PARENT_PORTAL = "https://tagsagi.comprobit.ro/lekerdezes/index.php";
export const REGISTER_URL =
  "https://docs.google.com/forms/d/e/1FAIpQLSdnj9QvpO7LKaVmtKP-IkAENdqeXb451go6BFTy-sMXLh7CHw/viewform";

export const copy: Record<Lang, Copy> = {
  hu: {
    brand: "CompRobIT",
    tagline: "Robotika és programozás – Kézdivásárhely",
    home: "Főoldal",
    register: "Jelentkezés",
    language: "Nyelv",
    footerAbout:
      "Robotika és programozás szakkörök Kézdivásárhelyen, 2019 óta. Építs, kódolj, fedezz fel!",
    footerExplore: "Fedezd fel",
    footerConnect: "Kapcsolat",
    footerRights: "Webmaster: Sentes István",
    footerCtaTitle: "Építs velünk robotot!",
    footerCtaText: "Regisztrálj a CompRobIT szakkörre, és fedezd fel a programozás világát.",
    skip: "Ugrás a tartalomra",
    menu: "Menü",
    close: "Bezárás",
    lightboxHint: "Kattints a képre a nagyításhoz",
  },
  ro: {
    brand: "CompRobIT",
    tagline: "Robotică și programare – Târgu Secuiesc",
    home: "Acasă",
    register: "Înscriere",
    language: "Limbă",
    footerAbout:
      "Cercuri de robotică și programare în Târgu Secuiesc, din 2019. Construiește, programează, descoperă!",
    footerExplore: "Explorează",
    footerConnect: "Contact",
    footerRights: "Webmaster: Sentes István",
    footerCtaTitle: "Construiește un robot cu noi!",
    footerCtaText: "Înscrie-te la cercul CompRobIT și descoperă lumea programării.",
    skip: "Sari la conținut",
    menu: "Meniu",
    close: "Închide",
    lightboxHint: "Apasă pe imagine pentru mărire",
  },
};

export const nav: Record<Lang, NavItem[]> = {
  hu: [
    { label: "Főoldal", href: BASE },
    {
      label: "Arduino",
      href: BASE + "arduino/",
      children: [
        { label: "Arduino szakkör", href: BASE + "arduino/" },
        { label: "Arduino kód", href: BASE + "arduino-kod/" },
        { label: "Arduino linkek", href: BASE + "arduino-linkek/" },
      ],
    },
    { label: "WeDo robotok", href: BASE + "wedo/" },
    { label: "Spike robotok", href: BASE + "spike/" },
    { label: "Mindstorms EV3", href: BASE + "mindstorms/" },
    {
      label: "3D nyomtatás",
      href: BASE + "3d-nyomtatas/",
      children: [
        { label: "3D nyomtatás szakkör", href: BASE + "3d-nyomtatas/" },
        { label: "3D feladat", href: BASE + "3d-feladat/" },
      ],
    },
    {
      label: "Média",
      href: BASE + "galeria/",
      children: [
        { label: "Képgaléria", href: BASE + "galeria/" },
        { label: "Videó", href: BASE + "video/" },
      ],
    },
    { label: "Szülői betekintés", href: PARENT_PORTAL, external: true },
  ],
  ro: [
    { label: "Acasă", href: BASE + "ro/" },
    {
      label: "Arduino",
      href: BASE + "ro/arduino/",
      children: [
        { label: "Cerc Arduino", href: BASE + "ro/arduino/" },
        { label: "Cod Arduino", href: BASE + "ro/arduino-kod/" },
        { label: "Linkuri Arduino", href: BASE + "ro/arduino-linkek/" },
      ],
    },
    { label: "Roboți WeDo", href: BASE + "ro/wedo/" },
    { label: "Roboți Spike", href: BASE + "ro/spike/" },
    { label: "Mindstorms EV3", href: BASE + "ro/mindstorms/" },
    {
      label: "Imprimare 3D",
      href: BASE + "ro/3d-nyomtatas/",
      children: [
        { label: "Cerc imprimare 3D", href: BASE + "ro/3d-nyomtatas/" },
        { label: "Sarcină 3D", href: BASE + "ro/3d-feladat/" },
      ],
    },
    {
      label: "Media",
      href: BASE + "ro/galeria/",
      children: [
        { label: "Galerie foto", href: BASE + "ro/galeria/" },
        { label: "Video", href: BASE + "ro/video/" },
      ],
    },
    { label: "Vizualizare părinți", href: PARENT_PORTAL, external: true },
  ],
};

export const footerLinks: Record<Lang, NavItem[]> = {
  hu: [
    { label: "WeDo robotok", href: BASE + "wedo/" },
    { label: "Arduino", href: BASE + "arduino/" },
    { label: "3D nyomtatás", href: BASE + "3d-nyomtatas/" },
    { label: "Képgaléria", href: BASE + "galeria/" },
    { label: "Videó", href: BASE + "video/" },
  ],
  ro: [
    { label: "Roboți WeDo", href: BASE + "ro/wedo/" },
    { label: "Arduino", href: BASE + "ro/arduino/" },
    { label: "Imprimare 3D", href: BASE + "ro/3d-nyomtatas/" },
    { label: "Galerie foto", href: BASE + "ro/galeria/" },
    { label: "Video", href: BASE + "ro/video/" },
  ],
};
