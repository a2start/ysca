<?php

function cmsRenderSidebar(string $activeSection, int $unreadCount): void
{
    $galleryActive        = $activeSection === 'gallery'         ? ' active' : '';
    $contactsActive       = $activeSection === 'contacts'        ? ' active' : '';
    $overviewActive       = $activeSection === 'overview'        ? ' active' : '';
    $changePasswordActive = $activeSection === 'change_password' ? ' active' : '';
    ?>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h1>Young Cricket</h1>
            <p>Content Management</p>
        </div>
        <nav class="sidebar-nav">
            <a href="dashboard.php" class="nav-link<?= $overviewActive ?>">
                <span class="icon">📊</span> Overview
            </a>
            <a href="dashboard.php?section=gallery" class="nav-link<?= $galleryActive ?>">
                <span class="icon">🖼️</span> Photo Gallery
            </a>
            <a href="dashboard.php?section=contacts" class="nav-link<?= $contactsActive ?>">
                <span class="icon">✉️</span> Contact Messages
                <?php if ($unreadCount > 0): ?>
                    <span class="nav-badge"><?= (int) $unreadCount ?></span>
                <?php endif; ?>
            </a>
        </nav>
        <div class="sidebar-footer">
            <a href="logout.php" style="color:#f87171;">Logout</a>
        </div>
    </aside>
    <?php
}

function cmsRenderHeader(string $title): void
{
    ?>
    <header class="top-header">
        <div style="display:flex; align-items:center; gap:12px;">
            <button type="button" class="mobile-toggle" id="sidebarToggle" aria-label="Menu">☰</button>
            <h2><?= htmlspecialchars($title) ?></h2>
        </div>
        <div class="user-actions">
            <span style="font-size:.88rem; color:#64748b;">Logged in as <strong>admin</strong></span>
            <a href="logout.php" class="btn btn-outline btn-sm">Logout</a>
        </div>
    </header>
    <?php
}
