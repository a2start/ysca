const fs = require('fs');
const path = require('path');
const puppeteer = require('puppeteer-core');

const baseUrl = process.env.YSCA_BASE_URL || 'http://127.0.0.1:4173';
const outputRoot = process.env.YSCA_VISUAL_OUTPUT || path.join('artifacts', 'visual', 'before');
const chromePath = process.env.CHROME_PATH || 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';
const routes = [
  '', 'about', 'our-programs', 'program-foundation-cricket', 'program-junior-development',
  'program-senior-performance', 'program-professional-coaching', 'cricket-training',
  'net-practice', 'hostel', 'gym', 'coach', 'coach-kapil-pratap-singh',
  'coach-rajeev-gupta', 'coach-lokesh-bharti', 'coach-manoj-gupta',
  'coach-nayan-bhardwaj', 'coach-nikhil-yadav', 'coach-suryabhan-singh',
  'photo-gallery', 'contact'
];
const viewports = [320, 375, 390, 768, 1024, 1280, 1440, 1920];

async function main() {
  fs.mkdirSync(outputRoot, { recursive: true });
  const browser = await puppeteer.launch({
    executablePath: chromePath,
    headless: true,
    args: ['--no-sandbox', '--disable-gpu', '--font-render-hinting=medium']
  });
  const results = [];
  try {
    for (const route of routes) {
      const file = route ? `${route}.html` : 'index.html';
      for (const width of viewports) {
        const page = await browser.newPage();
        await page.setViewport({ width, height: 900, deviceScaleFactor: 1 });
        const response = await page.goto(`${baseUrl}/${file}`, { waitUntil: 'domcontentloaded', timeout: 20000 });
        await page.evaluate(() => document.fonts.ready);
        await new Promise((resolve) => setTimeout(resolve, 250));
        const data = await page.evaluate(() => {
          const header = document.querySelector('header, .header-area, .zite-header');
          const h1 = document.querySelector('h1');
          const bodyStyle = getComputedStyle(document.body);
          const headingStyle = h1 ? getComputedStyle(h1) : null;
          return {
            documentWidth: document.documentElement.scrollWidth,
            viewportWidth: window.innerWidth,
            overflowX: document.documentElement.scrollWidth > window.innerWidth,
            bodyFont: bodyStyle.fontFamily,
            bodyColor: bodyStyle.color,
            h1Font: headingStyle?.fontFamily || null,
            h1Size: headingStyle?.fontSize || null,
            headerHeight: header ? Math.round(header.getBoundingClientRect().height) : null
          };
        });
        const name = `${route || 'home'}-${width}.png`;
        await page.screenshot({ path: path.join(outputRoot, name), fullPage: true });
        results.push({ route: `/${route}`, width, status: response?.status() || null, screenshot: name, ...data });
        await page.close();
      }
    }
  } finally {
    await browser.close();
  }
  fs.writeFileSync(path.join(outputRoot, 'inventory.json'), JSON.stringify(results, null, 2));
  const failed = results.filter((item) => !item.status || item.status < 200 || item.status >= 400 || item.overflowX);
  console.log(JSON.stringify({ captures: results.length, failed }, null, 2));
  if (failed.length) process.exitCode = 1;
}

main().catch((error) => {
  console.error(error);
  process.exit(1);
});
