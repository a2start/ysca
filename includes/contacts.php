<?php

function contactsDataPath(): string
{
    return dirname(__DIR__) . '/data/contacts.json';
}

function getContactSubmissions(): array
{
    $path = contactsDataPath();
    if (!is_file($path)) {
        return [];
    }

    $data = json_decode(file_get_contents($path), true);
    if (!is_array($data)) {
        return [];
    }

    usort($data, static function ($a, $b) {
        return strcmp($b['created_at'] ?? '', $a['created_at'] ?? '');
    });

    return $data;
}

function saveContactSubmissions(array $submissions): bool
{
    $path = contactsDataPath();
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    return file_put_contents(
        $path,
        json_encode(array_values($submissions), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
    ) !== false;
}

function addContactSubmission(array $fields): bool
{
    $submissions = getContactSubmissions();

    $submissions[] = [
        'id' => bin2hex(random_bytes(8)),
        'name' => $fields['name'],
        'email' => $fields['email'],
        'phone' => $fields['phone'],
        'subject' => $fields['subject'],
        'message' => $fields['message'],
        'created_at' => date('Y-m-d H:i:s'),
        'read' => false,
    ];

    return saveContactSubmissions($submissions);
}

function getUnreadContactCount(): int
{
    return count(array_filter(getContactSubmissions(), static function ($item) {
        return empty($item['read']);
    }));
}

function markContactAsRead(string $id): bool
{
    $submissions = getContactSubmissions();
    $found = false;

    foreach ($submissions as &$item) {
        if (($item['id'] ?? '') === $id) {
            $item['read'] = true;
            $found = true;
            break;
        }
    }
    unset($item);

    return $found && saveContactSubmissions($submissions);
}

function deleteContactSubmission(string $id): bool
{
    $submissions = getContactSubmissions();
    $before = count($submissions);
    $submissions = array_values(array_filter($submissions, static function ($item) use ($id) {
        return ($item['id'] ?? '') !== $id;
    }));

    if (count($submissions) === $before) {
        return false;
    }

    return saveContactSubmissions($submissions);
}
