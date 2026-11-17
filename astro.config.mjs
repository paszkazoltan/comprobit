import { defineConfig } from 'astro/config';
import sitemap from '@astrojs/sitemap';

export default defineConfig({
  site: 'https://paszkazoltan.github.io',
  base: '/comprobit',
  trailingSlash: 'always',
  output: 'static',
  integrations: [sitemap()],
});
