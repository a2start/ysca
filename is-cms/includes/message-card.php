<?php

$isUnread = empty($item['read']);
$cardClass = $isUnread ? 'message-card unread' : 'message-card';
?>
<article class="<?= $cardClass ?>">
    <div class="message-card-header">
        <div>
            <h4><?= htmlspecialchars($item['name'] ?? 'Unknown') ?></h4>
            <?php if ($isUnread): ?>
                <span class="badge badge-new">New</span>
            <?php else: ?>
                <span class="badge badge-read">Read</span>
            <?php endif; ?>
        </div>
        <time style="font-size:.82rem; color:#64748b;"><?= htmlspecialchars($item['created_at'] ?? '') ?></time>
    </div>

    <div class="message-meta">
        <span>📧 <a href="mailto:<?= htmlspecialchars($item['email'] ?? '') ?>"><?= htmlspecialchars($item['email'] ?? '') ?></a></span>
        <span>📞 <?= htmlspecialchars($item['phone'] ?? '') ?></span>
    </div>

    <div class="message-subject"><?= htmlspecialchars($item['subject'] ?? '') ?></div>

    <?php if (!empty($item['message'])): ?>
        <div class="message-body"><?= htmlspecialchars($item['message']) ?></div>
    <?php endif; ?>

    <div class="message-actions">
        <?php if ($isUnread): ?>
            <form method="post" style="display:inline;">
                <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
                <input type="hidden" name="mark_read" value="<?= htmlspecialchars($item['id'] ?? '') ?>">
                <button type="submit" class="btn btn-outline btn-sm">Mark as Read</button>
            </form>
        <?php endif; ?>
        <form method="post" style="display:inline;" onsubmit="return confirm('Delete this message permanently?');">
            <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">
            <input type="hidden" name="delete_contact" value="<?= htmlspecialchars($item['id'] ?? '') ?>">
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</article>
