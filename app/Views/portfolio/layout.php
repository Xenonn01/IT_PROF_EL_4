<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($meta['title']) ?></title>
    <meta name="description" content="<?= esc($meta['description']) ?>">
    <meta name="author" content="<?= esc($meta['author']) ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= esc($meta['title']) ?>">
    <meta property="og:description" content="<?= esc($meta['description']) ?>">
    <meta property="og:image" content="<?= base_url($profile['photo']) ?>">

    <link rel="icon" type="image/svg+xml" href="<?= base_url('assets/img/favicon.svg') ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <?= $this->renderSection('head') ?>
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>

    <!-- Header / Nav -->
    <header class="site-header" id="header">
        <div class="container nav-wrap">
            <a href="#home" class="brand" aria-label="Home">
                <span class="brand-mark"><?= esc(substr($profile['first'], 0, 1)) ?></span>
                <span class="brand-name"><?= esc($profile['name']) ?></span>
            </a>

            <nav class="nav" id="nav" aria-label="Primary">
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#projects">Projects</a>
                <a href="#experience">Experience</a>
                <a href="#contact">Contact</a>
            </nav>

            <div class="nav-actions">
                <button class="theme-toggle" id="themeToggle" type="button" aria-label="Toggle theme" title="Toggle theme">
                    <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M12 3a9 9 0 1 0 9 9 7 7 0 0 1-9-9Z"/></svg>
                </button>
                <button class="menu-toggle" id="menuToggle" type="button" aria-label="Toggle menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
        <div class="scroll-progress" id="scrollProgress"></div>
    </header>

    <main id="main">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container footer-wrap">
            <p>&copy; <?= date('Y') ?> <?= esc($profile['name']) ?>. All rights reserved.</p>
            <p class="footer-note">Built with <span class="accent">CodeIgniter 4</span></p>
        </div>
    </footer>

    <button class="to-top" id="toTop" type="button" aria-label="Back to top">&uarr;</button>

    <script src="<?= base_url('assets/js/main.js') ?>" defer></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
