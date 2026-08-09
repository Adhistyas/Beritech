<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
  <div class="bg-card border border-hair rounded-xl p-5">
    <p class="font-mono text-[11px] uppercase tracking-widest text-muted mb-2">Total Artikel</p>
    <p class="font-display text-3xl font-bold"><?= $total_articles ?></p>
  </div>
  <div class="bg-card border border-hair rounded-xl p-5">
    <p class="font-mono text-[11px] uppercase tracking-widest text-muted mb-2">Total Kategori</p>
    <p class="font-display text-3xl font-bold"><?= $total_categories ?></p>
  </div>
  <div class="bg-card border border-hair rounded-xl p-5">
    <p class="font-mono text-[11px] uppercase tracking-widest text-muted mb-2">Dipublikasikan</p>
    <p class="font-display text-3xl font-bold text-teal"><?= $total_published ?></p>
  </div>
  <div class="bg-card border border-hair rounded-xl p-5">
    <p class="font-mono text-[11px] uppercase tracking-widest text-muted mb-2">Draft</p>
    <p class="font-display text-3xl font-bold text-signal"><?= $total_draft ?></p>
  </div>
</div>

<div class="bg-card border border-hair rounded-xl overflow-hidden">
  <div class="flex items-center justify-between px-5 py-4 border-b border-hair">
    <h2 class="font-display font-bold">Artikel Terbaru</h2>
    <a href="<?= site_url('admin/articles') ?>" class="text-signal text-sm font-semibold hover:underline">Kelola semua →</a>
  </div>
  <?php if (empty($latest_articles)): ?>
    <p class="text-muted text-sm px-5 py-8 text-center">Belum ada artikel. <a href="<?= site_url('admin/articles/create') ?>" class="text-signal font-semibold">Tambah artikel pertama</a>.</p>
  <?php else: ?>
    <table class="w-full text-sm">
      <thead>
        <tr class="text-left text-muted font-mono text-xs uppercase tracking-wide bg-paper/60">
          <th class="px-5 py-3">Judul</th>
          <th class="px-5 py-3">Kategori</th>
          <th class="px-5 py-3">Penulis</th>
          <th class="px-5 py-3">Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($latest_articles as $a): ?>
          <tr class="border-t border-hair">
            <td class="px-5 py-3 font-medium"><?= esc($a['title']) ?></td>
            <td class="px-5 py-3 text-muted"><?= esc($a['category_name'] ?? '-') ?></td>
            <td class="px-5 py-3 text-muted"><?= esc($a['author']) ?></td>
            <td class="px-5 py-3 text-muted font-mono text-xs"><?= date('d M Y', strtotime($a['published_at'])) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
