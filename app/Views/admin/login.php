<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin — BeriTech</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = { theme: { extend: {
    colors: { ink:'#10131C', paper:'#F3F4F6', signal:'#3652FF', teal:'#00B8A9', muted:'#5B6270', hair:'#E4E6EB' },
    fontFamily: { display:['"Space Grotesk"','sans-serif'], body:['Inter','sans-serif'], mono:['"IBM Plex Mono"','monospace'] }
  }}}
</script>
<link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body class="bg-paper min-h-screen flex items-center justify-center px-5 text-ink">

<div class="w-full max-w-sm">
  <div class="flex items-center justify-center gap-2.5 mb-8">
    <span class="font-display text-2xl font-bold text-ink">Beri<span class="text-signal">Tech</span></span>
  </div>

  <div class="bg-white rounded-2xl p-8 border border-hair shadow-xl">
    <p class="font-mono text-[11px] uppercase tracking-widest text-signal mb-1 text-center">Panel Admin</p>
    <h1 class="font-display text-2xl font-bold text-ink mb-6 text-center">Masuk ke akun Anda</h1>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="mb-5 bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg px-4 py-3">
        <?= esc(session()->getFlashdata('error')) ?>
      </div>
    <?php endif; ?>
    <?php $errors = session()->getFlashdata('errors'); ?>
    <?php if ($errors): ?>
      <div class="mb-5 bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg px-4 py-3">
        <ul class="list-disc pl-5 space-y-0.5">
          <?php foreach ($errors as $err): ?><li><?= esc($err) ?></li><?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="<?= site_url('admin/login') ?>" method="post" class="space-y-4">
      <?= csrf_field() ?>
      <div>
        <label class="block text-sm font-medium text-ink mb-1.5">Username</label>
        <input type="text" name="username" value="<?= esc(old('username')) ?>" required
               class="w-full border border-hair rounded-lg px-3.5 py-2.5 text-sm outline-none focus:ring-2 focus:ring-signal focus:border-signal transition">
      </div>
      <div>
        <label class="block text-sm font-medium text-ink mb-1.5">Password</label>
        <input type="password" name="password" required
               class="w-full border border-hair rounded-lg px-3.5 py-2.5 text-sm outline-none focus:ring-2 focus:ring-signal focus:border-signal transition">
      </div>
      <button type="submit" class="w-full bg-signal hover:bg-signal/90 text-white font-semibold rounded-lg py-2.5 text-sm transition-colors">
        Masuk
      </button>
    </form>

    <p class="text-xs text-muted font-mono mt-6 text-center">default: admin / admin123</p>
  </div>

  <a href="<?= site_url('/') ?>" class="block text-center text-muted hover:text-ink text-sm mt-6 transition-colors font-medium">← Kembali ke situs</a>
</div>

</body>
</html>
