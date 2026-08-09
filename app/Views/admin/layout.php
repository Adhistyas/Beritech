<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($title) ? esc($title) . ' — Admin BeriTech' : 'Admin BeriTech' ?></title>
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
<link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body class="bg-paper text-ink">

<div class="flex min-h-screen">
  <!-- SIDEBAR -->
  <aside class="w-64 bg-white border-r border-hair text-ink flex-shrink-0 hidden lg:flex flex-col">
    <div class="h-16 flex items-center gap-2.5 px-6 border-b border-hair">
      <span class="font-display font-bold text-ink text-lg">Beri<span class="text-signal">Tech</span></span>
    </div>
    <nav class="flex-1 px-3 py-6 space-y-1 text-sm font-medium">
      <p class="font-mono text-[10px] uppercase tracking-widest text-muted px-3 mb-2 font-semibold">Menu</p>
      <a href="<?= site_url('admin/dashboard') ?>" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-paper text-muted hover:text-ink transition-colors <?= strpos(uri_string(), 'admin/dashboard') !== false ? 'active' : '' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
        Dashboard
      </a>
      <a href="<?= site_url('admin/articles') ?>" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-paper text-muted hover:text-ink transition-colors <?= strpos(uri_string(), 'admin/articles') !== false ? 'active' : '' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
        Artikel
      </a>
      <a href="<?= site_url('admin/categories') ?>" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-paper text-muted hover:text-ink transition-colors <?= strpos(uri_string(), 'admin/categories') !== false ? 'active' : '' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41 11 3.83A2 2 0 0 0 9.59 3.24H4a1 1 0 0 0-1 1v5.59a2 2 0 0 0 .59 1.41l9.58 9.59a2 2 0 0 0 2.83 0l4.59-4.59a2 2 0 0 0 0-2.83z"/><circle cx="7.5" cy="7.5" r="1"/></svg>
        Kategori
      </a>
    </nav>
    <div class="px-3 py-4 border-t border-hair">
      <a href="<?= site_url('/') ?>" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-paper text-muted hover:text-ink text-sm transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
        Lihat Situs
      </a>
      <a href="<?= site_url('admin/logout') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-red-50 text-sm transition-colors text-red-600 font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        Keluar
      </a>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="flex-1 flex flex-col min-w-0">
    <header class="h-16 bg-card border-b border-hair flex items-center justify-between px-6">
      <h1 class="font-display font-bold text-lg"><?= esc($title ?? 'Admin') ?></h1>
      <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-full bg-signal/10 text-signal flex items-center justify-center font-display font-bold text-sm">
          <?= esc(strtoupper(substr(session('admin_name') ?? 'A', 0, 1))) ?>
        </div>
        <span class="text-sm font-medium hidden sm:block"><?= esc(session('admin_name') ?? 'Admin') ?></span>
      </div>
    </header>

    <main class="flex-1 p-6">
      <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-5 bg-teal/10 border border-teal/30 text-teal font-medium text-sm rounded-lg px-4 py-3">
          <?= esc(session()->getFlashdata('success')) ?>
        </div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-5 bg-red-50 border border-red-200 text-red-600 font-medium text-sm rounded-lg px-4 py-3">
          <?= esc(session()->getFlashdata('error')) ?>
        </div>
      <?php endif; ?>
      <?php $errors = session()->getFlashdata('errors'); ?>
      <?php if ($errors): ?>
        <div class="mb-5 bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg px-4 py-3">
          <p class="font-semibold mb-1">Periksa kembali form Anda:</p>
          <ul class="list-disc pl-5 space-y-0.5">
            <?php foreach ($errors as $err): ?>
              <li><?= esc($err) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?= $this->renderSection('content') ?>
    </main>
  </div>
</div>

</body>
</html>
