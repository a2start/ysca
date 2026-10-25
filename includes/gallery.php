<?php

function galleryDataPath(): string
{
    return dirname(__DIR__) . '/data/gallery.json';
}

function getGalleryImages(): array
{
    $path = galleryDataPath();
    if (!is_file($path)) {
        return [];
    }

    $data = json_decode(file_get_contents($path), true);
    if (!is_array($data)) {
        return [];
    }

    return array_values(array_filter($data, static function ($item) {
        return is_string($item) && $item !== '';
    }));
}

function saveGalleryImages(array $images): bool
{
    $path = galleryDataPath();
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    $images = array_values(array_unique(array_filter($images, static function ($item) {
        return is_string($item) && $item !== '';
    })));

    return file_put_contents(
        $path,
        json_encode($images, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
    ) !== false;
}

function galleryImageExists(string $relativePath): bool
{
    $fullPath = dirname(__DIR__) . '/' . ltrim(str_replace(['../', '..\\'], '', $relativePath), '/\\');
    return is_file($fullPath);
}

function albumsDataPath(): string
{
    return dirname(__DIR__) . '/data/albums.json';
}

function getAlbums(): array
{
    $path = albumsDataPath();
    if (!is_file($path)) {
        return [];
    }

    $data = json_decode(file_get_contents($path), true);
    if (!is_array($data)) {
        return [];
    }

    return $data;
}

function getAlbumById(string $id): ?array
{
    $albums = getAlbums();
    foreach ($albums as $album) {
        if (isset($album['id']) && $album['id'] === $id) {
            return $album;
        }
    }
    return null;
}

function saveAlbums(array $albums): bool
{
    $path = albumsDataPath();
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    return file_put_contents(
        $path,
        json_encode($albums, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
    ) !== false;
}

function generateAlbumId(string $title): string
{
    $slug = strtolower(trim($title));
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');
    if ($slug === '') {
        $slug = 'album';
    }
    return $slug . '-' . bin2hex(random_bytes(4));
}

function createAlbum(string $title, string $description, string $cover = ''): ?array
{
    $albums = getAlbums();
    $album = [
        'id' => generateAlbumId($title),
        'title' => $title,
        'description' => $description,
        'cover' => $cover,
        'images' => [],
        'created_at' => date('Y-m-d'),
    ];

    if ($cover !== '') {
        $album['images'][] = $cover;
    }

    $albums[] = $album;
    if (saveAlbums($albums)) {
        return $album;
    }
    return null;
}

function updateAlbum(string $id, array $updates): bool
{
    $albums = getAlbums();
    foreach ($albums as &$album) {
        if (isset($album['id']) && $album['id'] === $id) {
            if (isset($updates['title'])) {
                $album['title'] = $updates['title'];
            }
            if (isset($updates['description'])) {
                $album['description'] = $updates['description'];
            }
            if (isset($updates['cover'])) {
                $album['cover'] = $updates['cover'];
            }
            return saveAlbums($albums);
        }
    }
    return false;
}

function deleteAlbum(string $id): bool
{
    $albums = getAlbums();
    $albums = array_values(array_filter($albums, static function ($a) use ($id) {
        return ($a['id'] ?? '') !== $id;
    }));
    return saveAlbums($albums);
}

function addImageToAlbum(string $albumId, string $imagePath): bool
{
    $albums = getAlbums();
    foreach ($albums as &$album) {
        if (isset($album['id']) && $album['id'] === $albumId) {
            if (!in_array($imagePath, $album['images'], true)) {
                $album['images'][] = $imagePath;
            }
            
            if (empty($album['cover'])) {
                $album['cover'] = $imagePath;
            }
            return saveAlbums($albums);
        }
    }
    return false;
}

function removeImageFromAlbum(string $albumId, string $imagePath): bool
{
    $albums = getAlbums();
    foreach ($albums as &$album) {
        if (isset($album['id']) && $album['id'] === $albumId) {
            $album['images'] = array_values(array_filter(
                $album['images'],
                static function ($img) use ($imagePath) {
                    return $img !== $imagePath;
                }
            ));
            
            if ($album['cover'] === $imagePath) {
                $album['cover'] = $album['images'][0] ?? '';
            }
            return saveAlbums($albums);
        }
    }
    return false;
}
