<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($title) ? esc($title) . ' — BeriTech' : 'BeriTech' ?></title>
<meta name="description" content="BeriTech — portal berita teknologi terkini seputar gadget, aplikasi, AI, dan startup.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          ink: '#10131C',
          paper: '#F3F4F6',
          card: '#FFFFFF',
          signal: '#3652FF',
          teal: '#00B8A9',
          muted: '#5B6270',
          hair: '#E4E6EB',
        },
        fontFamily: {
          display: ['"Space Grotesk"', 'sans-serif'],
          body: ['Inter', 'sans-serif'],
          mono: ['"IBM Plex Mono"', 'monospace'],
        },
      }
    }
  }
</script>
<link rel="stylesheet" href="<?= base_url('assets/css/frontend.css') ?>">
</head>
<body class="bg-paper text-ink font-body antialiased">

<header class="sticky top-0 z-40 bg-white border-b border-hair text-ink shadow-sm">
  <div class="max-w-6xl mx-auto px-5">
    <div class="flex items-center justify-between h-16">
      <a href="<?= site_url('/') ?>" class="flex items-center gap-2.5 group">
        <span class="font-display text-xl font-bold tracking-tight text-ink">Beri<span class="text-signal">Tech</span></span>
      </a>
      <nav class="hidden md:flex items-center gap-8 font-medium text-sm">
        <a href="<?= site_url('/') ?>" class="hover:text-signal transition-colors <?= uri_string() === '' ? 'text-signal font-semibold' : 'text-muted' ?>">Beranda</a>
        <a href="<?= site_url('artikel') ?>" class="hover:text-signal transition-colors <?= strpos(uri_string(), 'artikel') === 0 ? 'text-signal font-semibold' : 'text-muted' ?>">Semua Artikel</a>
        <a href="<?= site_url('tentang') ?>" class="hover:text-signal transition-colors <?= uri_string() === 'tentang' ? 'text-signal font-semibold' : 'text-muted' ?>">Tentang</a>
      </nav>
      <form action="<?= site_url('artikel') ?>" method="get" class="hidden sm:flex items-center bg-paper border border-hair rounded-full pl-4 pr-1 py-1 focus-within:ring-2 focus-within:ring-signal">
        <input type="text" name="q" placeholder="Cari artikel..." value="<?= esc($_GET['q'] ?? '') ?>" class="bg-transparent text-sm text-ink placeholder-muted outline-none w-36 lg:w-48">
        <button class="bg-signal hover:bg-signal/90 transition-colors rounded-full w-8 h-8 flex items-center justify-center" aria-label="Cari">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.4" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </button>
      </form>
    </div>
  </div>
</header>

<nav class="md:hidden bg-white text-ink text-sm font-medium flex items-center justify-around py-2.5 border-b border-hair">
  <a href="<?= site_url('/') ?>" class="hover:text-signal <?= uri_string() === '' ? 'text-signal font-semibold' : 'text-muted' ?>">Beranda</a>
  <a href="<?= site_url('artikel') ?>" class="hover:text-signal <?= strpos(uri_string(), 'artikel') === 0 ? 'text-signal font-semibold' : 'text-muted' ?>">Semua Artikel</a>
  <a href="<?= site_url('tentang') ?>" class="hover:text-signal <?= uri_string() === 'tentang' ? 'text-signal font-semibold' : 'text-muted' ?>">Tentang</a>
</nav>

<main>
  <?= $this->renderSection('content') ?>
</main>

<footer class="bg-white border-t border-hair text-muted mt-20">
  <div class="max-w-6xl mx-auto px-5 py-14 grid gap-10 md:grid-cols-3">
    <div>
      <div class="flex items-center gap-2.5 mb-3">
        <span class="font-display text-lg font-bold text-ink">Beri<span class="text-signal">Tech</span></span>
      </div>
      <p class="text-sm leading-relaxed max-w-xs text-muted">Membaca detak teknologi Indonesia — gadget, aplikasi, kecerdasan buatan, hingga startup, dirangkum tiap hari.</p>
    </div>
    <div>
      <p class="font-mono text-xs uppercase tracking-widest text-muted mb-3 font-semibold">Navigasi</p>
      <ul class="space-y-2 text-sm">
        <li><a href="<?= site_url('/') ?>" class="hover:text-signal">Beranda</a></li>
        <li><a href="<?= site_url('artikel') ?>" class="hover:text-signal">Semua Artikel</a></li>
        <li><a href="<?= site_url('tentang') ?>" class="hover:text-signal">Tentang</a></li>
        <li><a href="<?= site_url('admin/login') ?>" class="hover:text-signal">Login Admin</a></li>
      </ul>
    </div>
    <div>
      <p class="font-mono text-xs uppercase tracking-widest text-muted mb-3 font-semibold">Kategori</p>
      <ul class="space-y-2 text-sm">
        <?php foreach (($categories ?? []) as $cat): ?>
          <li><a href="<?= site_url('artikel') ?>?kategori=<?= $cat['id'] ?>" class="hover:text-signal"><?= esc($cat['name']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="border-t border-hair py-5 text-center text-xs text-muted font-mono">
    © <?= date('Y') ?> BeriTech — Portal Berita Teknologi
  </div>
</footer>

</body>
</html>
