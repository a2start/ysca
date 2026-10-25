<?php

require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
require_once dirname(__DIR__) . '/includes/gallery.php';
require_once dirname(__DIR__) . '/includes/contacts.php';

cmsRequireLogin();

$message = '';
$messageType = '';
$section = $_GET['section'] ?? 'overview';

if (!in_array($section, ['overview', 'gallery', 'contacts', 'change_password'], true)) {
    $section = 'overview';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!cmsVerifyCsrf($_POST['csrf'] ?? '')) {
        $message = 'Invalid request. Please try again.';
        $messageType = 'error';
    } elseif (isset($_POST['delete_image'])) {
        $section = 'gallery';
        $imageToDelete = $_POST['delete_image'] ?? '';
        $images = getGalleryImages();
        $images = array_values(array_filter($images, static function ($img) use ($imageToDelete) {
            return $img !== $imageToDelete;
        }));

        if (saveGalleryImages($images)) {
            if (strpos($imageToDelete, CMS_UPLOAD_URL_PREFIX) === 0) {
                $filePath = dirname(__DIR__) . '/' . $imageToDelete;
                if (is_file($filePath)) {
                    unlink($filePath);
                }
            }
            $message = 'Image removed successfully.';
            $messageType = 'success';
        } else {
            $message = 'Could not update gallery.';
            $messageType = 'error';
        }
    } elseif (isset($_FILES['gallery_image'])) {
        $section = 'gallery';
        $file = $_FILES['gallery_image'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $message = 'Upload failed. Please try again.';
            $messageType = 'error';
        } else {
            $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);

            if (!in_array($mime, $allowed, true)) {
                $message = 'Only JPG, PNG, WEBP or GIF images are allowed.';
                $messageType = 'error';
            } else {
                $extMap = [
                    'image/jpeg' => 'jpg',
                    'image/png' => 'png',
                    'image/webp' => 'webp',
                    'image/gif' => 'gif',
                ];
                $ext = $extMap[$mime];
                $filename = 'gallery-' . date('Ymd-His') . '-' . bin2hex(random_bytes(4)) . '.' . $ext;

                if (!is_dir(CMS_UPLOAD_DIR)) {
                    mkdir(CMS_UPLOAD_DIR, 0755, true);
                }

                $destination = CMS_UPLOAD_DIR . '/' . $filename;
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $relativePath = CMS_UPLOAD_URL_PREFIX . $filename;
                    $images = getGalleryImages();
                    $images[] = $relativePath;
                    if (saveGalleryImages($images)) {
                        $message = 'Image uploaded successfully.';
                        $messageType = 'success';
                    } else {
                        unlink($destination);
                        $message = 'Image uploaded but gallery could not be saved.';
                        $messageType = 'error';
                    }
                } else {
                    $message = 'Could not save uploaded file.';
                    $messageType = 'error';
                }
            }
        }
    } elseif (isset($_POST['create_album'])) {
        $section = 'gallery';
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        if ($title === '') {
            $message = 'Album title is required.';
            $messageType = 'error';
        } else {
            $album = createAlbum($title, $description);
            if ($album) {
                $message = 'Album "' . htmlspecialchars($title) . '" created successfully.';
                $messageType = 'success';
            } else {
                $message = 'Could not create album.';
                $messageType = 'error';
            }
        }
    } elseif (isset($_POST['edit_album'])) {
        $section = 'gallery';
        $albumId = $_POST['album_id'] ?? '';
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        if ($albumId === '' || $title === '') {
            $message = 'Album ID and Title are required.';
            $messageType = 'error';
        } else {
            if (updateAlbum($albumId, ['title' => $title, 'description' => $description])) {
                $message = 'Album updated successfully.';
                $messageType = 'success';
            } else {
                $message = 'Could not update album.';
                $messageType = 'error';
            }
        }
    } elseif (isset($_POST['delete_album'])) {
        $section = 'gallery';
        $albumId = $_POST['delete_album'] ?? '';
        $album = getAlbumById($albumId);
        if ($album) {
            foreach ($album['images'] as $image) {
                if (strpos($image, CMS_UPLOAD_URL_PREFIX) === 0) {
                    $filePath = dirname(__DIR__) . '/' . $image;
                    if (is_file($filePath)) {
                        unlink($filePath);
                    }
                }
            }
            if (deleteAlbum($albumId)) {
                $message = 'Album deleted successfully.';
                $messageType = 'success';
            } else {
                $message = 'Could not delete album.';
                $messageType = 'error';
            }
        } else {
            $message = 'Album not found.';
            $messageType = 'error';
        }
    } elseif (isset($_POST['upload_album_image'])) {
        $section = 'gallery';
        $albumId = $_POST['album_id'] ?? '';
        $files = $_FILES['album_images'] ?? null;

        if (!$albumId || !$files || !is_array($files['name'])) {
            $message = 'No files selected or invalid request.';
            $messageType = 'error';
        } else {
            $successCount = 0;
            $failCount = 0;
            $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
            $extMap = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/webp' => 'webp',
                'image/gif' => 'gif',
            ];

            foreach ($files['name'] as $key => $name) {
                if ($files['error'][$key] !== UPLOAD_ERR_OK) {
                    $failCount++;
                    continue;
                }

                $tmpName = $files['tmp_name'][$key];
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $tmpName);
                finfo_close($finfo);

                if (!in_array($mime, $allowed, true)) {
                    $failCount++;
                    continue;
                }

                $ext = $extMap[$mime];
                $filename = 'gallery-' . date('Ymd-His') . '-' . bin2hex(random_bytes(4)) . '.' . $ext;

                if (!is_dir(CMS_UPLOAD_DIR)) {
                    mkdir(CMS_UPLOAD_DIR, 0755, true);
                }

                $destination = CMS_UPLOAD_DIR . '/' . $filename;
                if (move_uploaded_file($tmpName, $destination)) {
                    $relativePath = CMS_UPLOAD_URL_PREFIX . $filename;
                    if (addImageToAlbum($albumId, $relativePath)) {
                        $successCount++;
                    } else {
                        unlink($destination);
                        $failCount++;
                    }
                } else {
                    $failCount++;
                }
            }

            if ($successCount > 0 && $failCount === 0) {
                $message = $successCount . ' image(s) uploaded and added to album successfully.';
                $messageType = 'success';
            } elseif ($successCount > 0 && $failCount > 0) {
                $message = $successCount . ' image(s) uploaded successfully, ' . $failCount . ' failed.';
                $messageType = 'success';
            } else {
                $message = 'Failed to upload any images.';
                $messageType = 'error';
            }
        }
    } elseif (isset($_POST['set_album_cover'])) {
        $section = 'gallery';
        $albumId = $_POST['album_id'] ?? '';
        $imagePath = $_POST['set_album_cover'] ?? '';
        if ($albumId && $imagePath) {
            if (updateAlbum($albumId, ['cover' => $imagePath])) {
                $message = 'Album cover updated successfully.';
                $messageType = 'success';
            } else {
                $message = 'Could not update album cover.';
                $messageType = 'error';
            }
        }
    } elseif (isset($_POST['remove_album_image'])) {
        $section = 'gallery';
        $albumId = $_POST['album_id'] ?? '';
        $imagePath = $_POST['remove_album_image'] ?? '';
        if ($albumId && $imagePath) {
            if (removeImageFromAlbum($albumId, $imagePath)) {
                if (strpos($imagePath, CMS_UPLOAD_URL_PREFIX) === 0) {
                    $filePath = dirname(__DIR__) . '/' . $imagePath;
                    if (is_file($filePath)) {
                        unlink($filePath);
                    }
                }
                $message = 'Image removed from album successfully.';
                $messageType = 'success';
            } else {
                $message = 'Could not remove image from album.';
                $messageType = 'error';
            }
        }
    } elseif (isset($_POST['mark_read'])) {
        $section = 'contacts';
        if (markContactAsRead($_POST['mark_read'])) {
            $message = 'Message marked as read.';
            $messageType = 'success';
        }
    } elseif (isset($_POST['delete_contact'])) {
        $section = 'contacts';
        if (deleteContactSubmission($_POST['delete_contact'])) {
            $message = 'Message deleted.';
            $messageType = 'success';
        } else {
            $message = 'Could not delete message.';
            $messageType = 'error';
        }
    } elseif (isset($_POST['change_password'])) {
        $section = 'change_password';
        $currentPw  = $_POST['current_password'] ?? '';
        $newPw      = $_POST['new_password'] ?? '';
        $confirmPw  = $_POST['confirm_password'] ?? '';

        if ($newPw !== $confirmPw) {
            $message = 'New password and confirmation do not match.';
            $messageType = 'error';
        } else {
            $result = cmsChangePassword($currentPw, $newPw);
            if ($result === true) {
                $message = 'Password changed successfully. Please use your new password next time you log in.';
                $messageType = 'success';
            } else {
                $message = $result; 
                $messageType = 'error';
            }
        }
    }
}

$albums = getAlbums();
$activeAlbumId = $_GET['album_id'] ?? '';
$activeAlbum = null;
if ($activeAlbumId !== '') {
    $activeAlbum = getAlbumById($activeAlbumId);
}

$galleryImages = getGalleryImages();
$contactSubmissions = getContactSubmissions();
$unreadCount = getUnreadContactCount();
$csrf = cmsCsrfToken();

$pageTitles = [
    'overview'        => 'Dashboard Overview',
    'gallery'         => 'Photo Gallery',
    'contacts'        => 'Contact Messages',
    'change_password' => 'Change Password',
];
$pageTitle = $pageTitles[$section];
if ($section === 'gallery' && $activeAlbum) {
    $pageTitle = 'Manage Album: ' . htmlspecialchars($activeAlbum['title']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> | Young Cricket CMS</title>
    <link rel="stylesheet" href="assets/admin.css">
</head>
<body>
    <div class="admin-layout">
        <?php cmsRenderSidebar($section, $unreadCount); ?>

        <div class="main-content">
            <?php cmsRenderHeader($pageTitle); ?>

            <div class="page-body">
                <?php if ($message): ?>
                    <div class="alert <?= htmlspecialchars($messageType) ?>">
                        <?= htmlspecialchars($message) ?>
                    </div>
                <?php endif; ?>

                <?php if ($section === 'overview'): ?>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="label">Gallery Images</div>
                            <div class="value"><?= count($galleryImages) ?></div>
                        </div>
                        <div class="stat-card accent">
                            <div class="label">Total Messages</div>
                            <div class="value"><?= count($contactSubmissions) ?></div>
                        </div>
                        <div class="stat-card warning">
                            <div class="label">Unread Messages</div>
                            <div class="value"><?= $unreadCount ?></div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3>Quick Actions</h3>
                        </div>
                        <div style="display:flex; gap:12px; flex-wrap:wrap;">
                            <a href="dashboard.php?section=gallery" class="btn btn-primary">Manage Gallery</a>
                            <a href="dashboard.php?section=contacts" class="btn btn-outline">View Messages</a>
                        </div>
                    </div>

                    <?php if (!empty($contactSubmissions)): ?>
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Messages</h3>
                            <a href="dashboard.php?section=contacts" class="btn btn-outline btn-sm">View All</a>
                        </div>
                        <div class="messages-list">
                            <?php foreach (array_slice($contactSubmissions, 0, 3) as $item): ?>
                                <?php include __DIR__ . '/includes/message-card.php'; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                <?php elseif ($section === 'gallery'): ?>
                    <?php if ($activeAlbum): ?>
                        <div class="breadcrumbs">
                            <a href="dashboard.php?section=gallery">🖼️ Albums</a>
                            <span>&raquo;</span>
                            <span><?= htmlspecialchars($activeAlbum['title']) ?></span>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px; margin-bottom: 24px;">
                            <div class="card" style="margin-bottom: 0;">
                                <div class="card-header">
                                    <h3>Edit Album Details</h3>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
                                    <input type="hidden" name="edit_album" value="1">
                                    <input type="hidden" name="album_id" value="<?= htmlspecialchars($activeAlbum['id']) ?>">
                                    
                                    <div class="form-group">
                                        <label for="title">Album Title</label>
                                        <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars($activeAlbum['title']) ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Short Description</label>
                                        <textarea id="description" name="description" class="form-control"><?= htmlspecialchars($activeAlbum['description'] ?? '') ?></textarea>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Details</button>
                                </form>
                            </div>

                            <div class="card" style="margin-bottom: 0;">
                                <div class="card-header">
                                    <h3>Upload Images to Album</h3>
                                </div>
                                <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
                                    <input type="hidden" name="upload_album_image" value="1">
                                    <input type="hidden" name="album_id" value="<?= htmlspecialchars($activeAlbum['id']) ?>">
                                    
                                    <div class="form-group">
                                        <label for="album_images">Select Images</label>
                                        <input type="file" id="album_images" name="album_images[]" accept="image/jpeg,image/png,image/webp,image/gif" multiple required style="border: 1px dashed var(--border); padding: 12px; width: 100%; border-radius: 8px; background: #f8fafc;">
                                    </div>
                                    <p class="hint" style="margin-top: -8px; margin-bottom: 16px;">Supported: JPG, PNG, WEBP, GIF (Select multiple files)</p>
                                    <button class="btn btn-primary" type="submit">Upload Images</button>
                                </form>
                            </div>
                        </div>

                        <div class="card" style="margin-top: 24px;">
                            <div class="card-header">
                                <h3>Images in this Album (<?= count($activeAlbum['images'] ?? []) ?>)</h3>
                            </div>
                            <?php if (empty($activeAlbum['images'])): ?>
                                <div class="empty-state">
                                    <div class="icon">🖼️</div>
                                    <p>No images in this album yet. Upload your first photo above.</p>
                                </div>
                            <?php else: ?>
                                <div class="gallery-grid">
                                    <?php foreach ($activeAlbum['images'] as $image): ?>
                                        <?php
                                        $exists = galleryImageExists($image);
                                        $imgSrc = '../' . ltrim($image, '/');
                                        $isCover = (isset($activeAlbum['cover']) && $activeAlbum['cover'] === $image);
                                        ?>
                                        <div class="gallery-item" style="display: flex; flex-direction: column;">
                                            <div style="position: relative; height: 130px; overflow: hidden;">
                                                <img src="<?= htmlspecialchars($imgSrc) ?>" alt="Album image" style="height: 100%; width: 100%; object-fit: cover;">
                                                <?php if ($isCover): ?>
                                                    <span class="badge badge-new" style="position: absolute; top: 8px; left: 8px; font-size: 0.65rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">Cover</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="actions" style="padding: 10px; margin-top: auto; display: flex; flex-direction: column; gap: 6px;">
                                                <?php if (!$exists): ?>
                                                    <p class="hint" style="color:#b91c1c; margin: 0 0 6px 0; text-align: center;">File missing</p>
                                                <?php endif; ?>
                                                
                                                <?php if (!$isCover): ?>
                                                    <form method="post" style="display: inline;">
                                                        <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
                                                        <input type="hidden" name="album_id" value="<?= htmlspecialchars($activeAlbum['id']) ?>">
                                                        <input type="hidden" name="set_album_cover" value="<?= htmlspecialchars($image) ?>">
                                                        <button class="btn btn-outline btn-sm" type="submit" style="width: 100%; font-size: 0.78rem; padding: 5px 8px;">Set Cover</button>
                                                    </form>
                                                <?php endif; ?>
                                                
                                                <form method="post" onsubmit="return confirm('Remove this image from album?');" style="display: inline;">
                                                    <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
                                                    <input type="hidden" name="album_id" value="<?= htmlspecialchars($activeAlbum['id']) ?>">
                                                    <input type="hidden" name="remove_album_image" value="<?= htmlspecialchars($image) ?>">
                                                    <button class="btn btn-danger btn-sm" type="submit" style="width: 100%; font-size: 0.78rem; padding: 5px 8px;">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php else: ?>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3>Create New Album</h3>
                            </div>
                            <form method="post" style="max-width: 600px;">
                                <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
                                <input type="hidden" name="create_album" value="1">
                                
                                <div class="form-group">
                                    <label for="new_title">Album Title</label>
                                    <input type="text" id="new_title" name="title" class="form-control" placeholder="e.g. Summer Camp 2026" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_description">Short Description</label>
                                    <textarea id="new_description" name="description" class="form-control" placeholder="Provide a brief description of the album's photos..."></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">Create Album</button>
                            </form>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3>Albums Directory (<?= count($albums) ?>)</h3>
                            </div>
                            <?php if (empty($albums)): ?>
                                <div class="empty-state">
                                    <div class="icon">📁</div>
                                    <p>No albums created yet. Create your first album above.</p>
                                </div>
                            <?php else: ?>
                                <div class="album-grid">
                                    <?php foreach ($albums as $album): ?>
                                        <?php
                                        $cover = $album['cover'] ?? '';
                                        $hasCover = ($cover !== '' && galleryImageExists($cover));
                                        $coverSrc = $hasCover ? '../' . ltrim($cover, '/') : '';
                                        $imgCount = count($album['images'] ?? []);
                                        ?>
                                        <div class="album-card">
                                            <div class="album-cover">
                                                <?php if ($hasCover): ?>
                                                    <img src="<?= htmlspecialchars($coverSrc) ?>" alt="Album Cover">
                                                <?php else: ?>
                                                    <div class="no-cover">📁</div>
                                                <?php endif; ?>
                                                <span class="album-badge"><?= $imgCount ?> <?= $imgCount === 1 ? 'photo' : 'photos' ?></span>
                                            </div>
                                            <div class="album-details">
                                                <h4><?= htmlspecialchars($album['title']) ?></h4>
                                                <p><?= htmlspecialchars($album['description'] ?? '') ?></p>
                                                <div style="font-size: 0.78rem; color: var(--muted); margin-bottom: 8px;">
                                                    Created: <?= htmlspecialchars($album['created_at'] ?? 'N/A') ?>
                                                </div>
                                            </div>
                                            <div class="album-actions">
                                                <a href="dashboard.php?section=gallery&album_id=<?= urlencode($album['id'] ?? '') ?>" class="btn btn-primary btn-sm">Manage</a>
                                                <form method="post" onsubmit="return confirm('Delete this album and all its images?');" class="inline-form" style="flex: 1;">
                                                    <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
                                                    <input type="hidden" name="delete_album" value="<?= htmlspecialchars($album['id'] ?? '') ?>">
                                                    <button class="btn btn-danger btn-sm" type="submit" style="width: 100%;">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                <?php elseif ($section === 'contacts'): ?>
                    <div class="card">
                        <div class="card-header">
                            <h3>Contact Form Submissions (<?= count($contactSubmissions) ?>)</h3>
                            <?php if ($unreadCount > 0): ?>
                                <span class="badge badge-new"><?= $unreadCount ?> new</span>
                            <?php endif; ?>
                        </div>

                        <?php if (empty($contactSubmissions)): ?>
                            <div class="empty-state">
                                <div class="icon">✉️</div>
                                <p>No messages yet. When someone fills the contact form, it will appear here.</p>
                            </div>
                        <?php else: ?>
                            <div class="messages-list">
                                <?php foreach ($contactSubmissions as $item): ?>
                                    <?php include __DIR__ . '/includes/message-card.php'; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php elseif ($section === 'change_password'): ?>
                    <div class="card" style="max-width: 520px;">
                        <div class="card-header">
                            <h3>🔑 Change Admin Password</h3>
                        </div>
                        <p style="margin-bottom: 20px; color: var(--muted); font-size: 0.9rem;">
                            Enter your current password to verify your identity, then choose a new password
                            (minimum 8 characters). The new password is saved immediately.
                        </p>
                        <form method="post" id="changePasswordForm" autocomplete="off">
                            <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
                            <input type="hidden" name="change_password" value="1">

                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <div style="position:relative;">
                                    <input type="password" id="current_password" name="current_password"
                                           class="form-control" required autocomplete="current-password"
                                           placeholder="Enter your current password">
                                    <button type="button" class="pw-toggle" data-target="current_password"
                                            style="position:absolute;right:12px;top:50%;transform:translateY(-50%);
                                                   background:none;border:none;cursor:pointer;font-size:1.1rem;
                                                   color:var(--muted);padding:0;" aria-label="Show/hide password">👁</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <div style="position:relative;">
                                    <input type="password" id="new_password" name="new_password"
                                           class="form-control" required minlength="8" autocomplete="new-password"
                                           placeholder="At least 8 characters">
                                    <button type="button" class="pw-toggle" data-target="new_password"
                                            style="position:absolute;right:12px;top:50%;transform:translateY(-50%);
                                                   background:none;border:none;cursor:pointer;font-size:1.1rem;
                                                   color:var(--muted);padding:0;" aria-label="Show/hide password">👁</button>
                                </div>
                                <div style="margin-top:8px;">
                                    <div id="pw-strength-bar" style="height:5px;border-radius:4px;background:#e2e8f0;transition:all .3s;">
                                        <div id="pw-strength-fill" style="height:100%;border-radius:4px;width:0%;transition:width .3s,background .3s;"></div>
                                    </div>
                                    <p id="pw-strength-label" class="hint" style="margin-top:4px;"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password</label>
                                <div style="position:relative;">
                                    <input type="password" id="confirm_password" name="confirm_password"
                                           class="form-control" required minlength="8" autocomplete="new-password"
                                           placeholder="Repeat your new password">
                                    <button type="button" class="pw-toggle" data-target="confirm_password"
                                            style="position:absolute;right:12px;top:50%;transform:translateY(-50%);
                                                   background:none;border:none;cursor:pointer;font-size:1.1rem;
                                                   color:var(--muted);padding:0;" aria-label="Show/hide password">👁</button>
                                </div>
                                <p id="confirm-match-hint" class="hint" style="margin-top:4px;"></p>
                            </div>

                            <button class="btn btn-primary" type="submit" id="changePasswordBtn">Update Password</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('open');
        });

        (function () {
            document.querySelectorAll('.pw-toggle').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var targetId = btn.getAttribute('data-target');
                    var input    = document.getElementById(targetId);
                    if (!input) return;
                    if (input.type === 'password') {
                        input.type = 'text';
                        btn.textContent = '🙈';
                    } else {
                        input.type = 'password';
                        btn.textContent = '👁';
                    }
                });
            });

            var newPwInput    = document.getElementById('new_password');
            var strengthFill  = document.getElementById('pw-strength-fill');
            var strengthLabel = document.getElementById('pw-strength-label');

            if (newPwInput && strengthFill && strengthLabel) {
                newPwInput.addEventListener('input', function () {
                    var pw = newPwInput.value;
                    var score = 0;
                    if (pw.length >= 8)  score++;
                    if (pw.length >= 12) score++;
                    if (/[A-Z]/.test(pw) && /[a-z]/.test(pw)) score++;
                    if (/[0-9]/.test(pw)) score++;
                    if (/[^A-Za-z0-9]/.test(pw)) score++;

                    var levels = [
                        { pct: '0%',   color: '#e2e8f0', label: ''          },
                        { pct: '25%',  color: '#ef4444', label: '⚠️ Weak'    },
                        { pct: '50%',  color: '#f97316', label: '🔶 Fair'    },
                        { pct: '75%',  color: '#eab308', label: '🔷 Good'    },
                        { pct: '100%', color: '#22c55e', label: '✅ Strong'  },
                    ];

                    var level = pw.length === 0 ? 0 : Math.min(score, 4);
                    strengthFill.style.width      = levels[level].pct;
                    strengthFill.style.background = levels[level].color;
                    strengthLabel.textContent     = levels[level].label;
                });
            }

            var confirmInput  = document.getElementById('confirm_password');
            var matchHint     = document.getElementById('confirm-match-hint');

            function checkMatch() {
                if (!confirmInput || !newPwInput || !matchHint) return;
                if (confirmInput.value === '') {
                    matchHint.textContent = '';
                    matchHint.style.color = '';
                    return;
                }
                if (confirmInput.value === newPwInput.value) {
                    matchHint.textContent = '✅ Passwords match';
                    matchHint.style.color = '#22c55e';
                } else {
                    matchHint.textContent = '❌ Passwords do not match';
                    matchHint.style.color = '#ef4444';
                }
            }

            confirmInput?.addEventListener('input', checkMatch);
            newPwInput?.addEventListener('input', checkMatch);

            document.getElementById('changePasswordForm')?.addEventListener('submit', function (e) {
                if (newPwInput && confirmInput && newPwInput.value !== confirmInput.value) {
                    e.preventDefault();
                    if (matchHint) {
                        matchHint.textContent = '❌ Passwords do not match';
                        matchHint.style.color = '#ef4444';
                    }
                    confirmInput.focus();
                }
            });
        })();
    </script>
</body>
</html>
