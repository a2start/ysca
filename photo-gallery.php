<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="Young Star Cricket Academy">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Young Star Cricket Academy</title>
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/plugins/slick.css">
        <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/plugins/aos.css">
        <link rel="stylesheet" href="assets/css/spacings.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css">

<style>
.album-section-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
}
@media (max-width: 768px) {
    .album-section-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}
@media (max-width: 576px) {
    .album-section-grid {
        grid-template-columns: 1fr;
    }
}
.album-section-card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    border: 1px solid #eef2f6;
    height: 100%;
}
.album-section-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(11, 23, 71, 0.1);
}
.album-section-cover {
    height: 220px;
    background: #f1f5f9;
    position: relative;
    overflow: hidden;
}
.album-section-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.album-section-card:hover .album-section-cover img {
    transform: scale(1.04);
}
.album-section-cover .no-cover {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #94a3b8;
    font-size: 3rem;
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
}
.album-section-badge {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background: rgba(11, 23, 71, 0.85);
    color: #ffffff;
    font-size: 0.78rem;
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 20px;
    backdrop-filter: blur(4px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}
.album-section-content {
    padding: 24px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.album-section-content h3 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #0b1747;
    margin-bottom: 10px;
    font-family: 'Philosopher', sans-serif;
}
.album-section-content p {
    font-size: 0.92rem;
    color: #475569;
    line-height: 1.6;
    margin-bottom: 20px;
    flex: 1;
}
.album-section-btn {
    margin-top: auto;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: #e89903;
    color: #ffffff !important;
    padding: 11px 22px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.88rem;
    text-decoration: none;
    transition: background 0.2s, transform 0.1s;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(232, 153, 3, 0.2);
}
.album-section-btn:hover {
    background: #cd8202;
    transform: translateY(-1px);
}
.back-to-albums-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #0b1747;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    margin-bottom: 30px;
    transition: color 0.2s;
}
.back-to-albums-btn:hover {
    color: #e89903;
}
.album-header-details {
    margin-bottom: 40px;
    max-width: 800px;
}
.album-header-details p {
    font-size: 1.05rem;
    color: #475569;
    line-height: 1.6;
}
</style>

    </head>
    <body>
             <?php
                include_once 'header.php';
                require_once __DIR__ . '/includes/gallery.php';
                
                $activeAlbumId = $_GET['album'] ?? '';
                $activeAlbum = null;
                if ($activeAlbumId !== '') {
                    $activeAlbum = getAlbumById($activeAlbumId);
                }
             ?>

             <div id="smooth-wrapper">
                  <div id="smooth-content">
                    <main>
                    <section class="page-hero bg_cover p-r z-1" data-src="assets/images/abt-bg.jpg">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="page-content text-center">
                                        <h1>Gallery</h1>
                                        <ul>
                                            <li><a href="./">Home</a></li>
                                            <li>Photo Gallery</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-10">
                                <div class="section-title text-center mb-55">
                                    <?php if ($activeAlbum): ?>
                                        <h2 class="text-anm"><?= htmlspecialchars($activeAlbum['title']) ?></h2>
                                    <?php else: ?>
                                        <h2 class="text-anm">Photo Gallery</h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="container">

                            <?php if ($activeAlbum): ?>
                                <div class="row">
                                    <div class="col-12">
                                        <a href="photo-gallery" class="back-to-albums-btn">
                                            <i class="fas fa-arrow-left"></i> Back to Albums
                                        </a>
                                        
                                        <?php if (!empty($activeAlbum['description'])): ?>
                                            <div class="album-header-details">
                                                <p><?= htmlspecialchars($activeAlbum['description']) ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div id="lightgallery" class="custom-gallery">
                                    <?php if (!empty($activeAlbum['images'])): ?>
                                        <?php foreach ($activeAlbum['images'] as $image): ?>
                                            <?php if (galleryImageExists($image)): ?>
                                                <a href="<?= htmlspecialchars($image) ?>">
                                                    <img src="<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($activeAlbum['title']) ?>">
                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="col-12 text-center py-5">
                                            <p class="text-muted">No images in this album yet. Check back soon!</p>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            <?php else: ?>
                                <?php $albums = getAlbums(); ?>
                                <?php if (!empty($albums)): ?>
                                    <div class="album-section-grid">
                                        <?php foreach ($albums as $album): ?>
                                            <?php
                                             $cover = $album['cover'] ?? '';
                                            $hasCover = ($cover !== '' && galleryImageExists($cover));
                                            $imgCount = count($album['images'] ?? []);
                                            ?>
                                            <div class="album-section-card">
                                                <div class="album-section-cover">
                                                    <?php if ($hasCover): ?>
                                                        <img src="<?= htmlspecialchars($cover) ?>" alt="<?= htmlspecialchars($album['title']) ?>">
                                                    <?php else: ?>
                                                        <div class="no-cover">🖼️</div>
                                                    <?php endif; ?>
                                                    <span class="album-section-badge">
                                                        <i class="far fa-images"></i> <?= $imgCount ?> <?= $imgCount === 1 ? 'Photo' : 'Photos' ?>
                                                    </span>
                                                </div>
                                                <div class="album-section-content">
                                                    <h3><?= htmlspecialchars($album['title']) ?></h3>
                                                    <p><?= htmlspecialchars($album['description'] ?? '') ?></p>
                                                    <a href="photo-gallery?album=<?= urlencode($album['id']) ?>" class="album-section-btn">
                                                        View Album <i class="fas fa-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center py-5">
                                        <p class="text-muted">No albums available. Please check back later.</p>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>
                    </section>

                </main>
                 <?php
                   include_once 'fotter.php';
                  ?>

            </div>
        </div>
        <script src="assets/js/plugins/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/thumbnail/lg-thumbnail.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/zoom/lg-zoom.min.js"></script>
        <script>
        (function () {
            var lgEl = document.getElementById('lightgallery');
            if (lgEl && typeof lightGallery === 'function') {
                lightGallery(lgEl, {
                    speed: 400,
                    thumbnail: true,
                    zoom: true,
                    download: false,
                    actualSize: false,
                    counter: true,
                    mobileSettings: {
                        controls: true,
                        showCloseIcon: true,
                        download: false
                    }
                });
            }
        })();
        </script>
        <script src="assets/js/plugins/popper.min.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/plugins/gsap/gsap.min.js"></script>
        <script src="assets/js/plugins/gsap/SplitText.min.js"></script>
        <script src="assets/js/plugins/gsap/ScrollSmoother.min.js"></script>
        <script src="assets/js/plugins/gsap/ScrollTrigger.min.js"></script>
        <script src="assets/js/plugins/slick.min.js"></script>
        <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/plugins/jquery.waypoints.js"></script>
        <script src="assets/js/plugins/jquery.counterup.min.js"></script>
        <script src="assets/js/plugins/aos.js"></script>
        <script src="assets/js/theme.js"></script>
    </body>
</html>