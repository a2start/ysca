const puppeteer = require('puppeteer-core');

const baseUrl = process.env.YSCA_BASE_URL || 'http://127.0.0.1:4173';
const chromePath = process.env.CHROME_PATH || 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';
const routes = [
  '', 'about', 'our-programs', 'program-foundation-cricket', 'program-junior-development',
  'program-senior-performance', 'program-professional-coaching', 'cricket-training',
  'net-practice', 'hostel', 'gym', 'coach', 'coach-kapil-pratap-singh',
  'coach-rajeev-gupta', 'coach-lokesh-bharti', 'coach-manoj-gupta',
  'coach-nayan-bhardwaj', 'coach-nikhil-yadav', 'coach-suryabhan-singh',
  'photo-gallery', 'contact'
];

async function main() {
  const browser = await puppeteer.launch({ executablePath: chromePath, headless: true, args: ['--no-sandbox', '--disable-gpu'] });
  const failures = [];
  try {
    for (const route of routes) {
      const page = await browser.newPage();
      await page.setViewport({ width: 390, height: 844, deviceScaleFactor: 1 });
      const response = await page.goto(`${baseUrl}/${route ? `${route}.html` : 'index.html'}`, { waitUntil: 'domcontentloaded', timeout: 20000 });
      await page.evaluate(() => document.fonts.ready);
      const checks = await page.evaluate(() => {
        const links = [...document.querySelectorAll('link[rel="stylesheet"]')].map((link) => link.href);
        const h1s = document.querySelectorAll('h1').length;
        const overflow = document.documentElement.scrollWidth > window.innerWidth;
        const focusTarget = document.querySelector('a, button, input, textarea, select');
        let focusVisible = false;
        if (focusTarget) {
          focusTarget.focus();
          const style = getComputedStyle(focusTarget);
          focusVisible = style.outlineStyle !== 'none' || style.boxShadow !== 'none';
        }
        return { h1s, overflow, focusVisible, hasTheme: links.some((href) => href.endsWith('/assets/css/ysca-theme.css')) };
      });
      if (!response || response.status() >= 400) failures.push({ route, issue: `HTTP ${response?.status()}` });
      if (checks.h1s !== 1) failures.push({ route, issue: `H1 count ${checks.h1s}` });
      if (checks.overflow) failures.push({ route, issue: 'horizontal overflow at 390px' });
      if (!checks.hasTheme) failures.push({ route, issue: 'missing global theme stylesheet' });
      if (!checks.focusVisible) failures.push({ route, issue: 'no computed focus treatment on first control' });
      await page.close();
    }
  } finally {
    await browser.close();
  }
  console.log(JSON.stringify({ pages: routes.length, failures }, null, 2));
  if (failures.length) process.exitCode = 1;
}

main().catch((error) => {
  console.error(error);
  process.exit(1);
});
