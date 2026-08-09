<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- HERO -->
<section class="bg-white border-b border-hair text-ink">
  <div class="max-w-6xl mx-auto px-5 pt-14 pb-16">
    <div class="flex items-center gap-2 font-mono text-xs uppercase tracking-widest text-signal font-semibold mb-6">
      Berita Hari Ini
    </div>

    <?php if ($headline): ?>
      <a href="<?= site_url('artikel/' . $headline['slug']) ?>" class="grid lg:grid-cols-2 gap-10 items-center group">
        <div>
          <span class="inline-block font-mono text-xs uppercase tracking-widest bg-signal/10 text-signal px-3 py-1 rounded-full mb-5 font-medium"><?= esc($headline['category_name'] ?? 'Umum') ?></span>
          <h1 class="font-display text-3xl md:text-5xl font-bold leading-tight mb-5 text-ink group-hover:text-signal transition-colors">
            <?= esc($headline['title']) ?>
          </h1>
          <p class="text-muted text-sm font-mono mb-6">
            <?= esc($headline['author']) ?> · <?= date('d M Y', strtotime($headline['published_at'])) ?>
          </p>
          <span class="inline-flex items-center gap-2 text-signal font-semibold text-sm">
            Baca selengkapnya
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </span>
        </div>
        <div class="rounded-xl overflow-hidden border border-hair bg-paper">
          <?php if ($headline['image']): ?>
            <img src="<?= base_url('uploads/articles/' . $headline['image']) ?>" alt="<?= esc($headline['title']) ?>" class="w-full h-72 md:h-96 object-cover group-hover:scale-[1.02] transition-transform duration-500">
          <?php else: ?>
            <div class="w-full h-72 md:h-96 bg-paper flex items-center justify-center text-muted font-mono text-sm">Tanpa gambar</div>
          <?php endif; ?>
        </div>
      </a>
    <?php else: ?>
      <p class="text-muted">Belum ada artikel yang dipublikasikan.</p>
    <?php endif; ?>
  </div>
</section>

<!-- LATEST ARTICLES -->
<section class="max-w-6xl mx-auto px-5 py-14">
  <div class="flex items-end justify-between mb-8">
    <h2 class="font-display text-2xl font-bold">Artikel Terbaru</h2>
    <a href="<?= site_url('artikel') ?>" class="text-signal text-sm font-semibold hover:underline">Lihat semua →</a>
  </div>

  <?php if (empty($articles)): ?>
    <p class="text-muted">Belum ada artikel lain untuk ditampilkan.</p>
  <?php else: ?>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($articles as $a): ?>
        <a href="<?= site_url('artikel/' . $a['slug']) ?>" class="group bg-card rounded-xl border border-hair overflow-hidden hover:border-signal/50 hover:shadow-lg hover:shadow-signal/5 transition-all">
          <div class="h-44 bg-hair overflow-hidden">
            <?php if ($a['image']): ?>
              <img src="<?= base_url('uploads/articles/' . $a['image']) ?>" alt="<?= esc($a['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <?php else: ?>
              <div class="w-full h-full flex items-center justify-center text-muted font-mono text-xs">Tanpa gambar</div>
            <?php endif; ?>
          </div>
          <div class="p-5">
            <span class="font-mono text-[11px] uppercase tracking-widest text-signal"><?= esc($a['category_name'] ?? 'Umum') ?></span>
            <h3 class="font-display font-bold text-lg mt-2 mb-2 leading-snug group-hover:text-signal transition-colors"><?= esc($a['title']) ?></h3>
            <p class="text-xs text-muted font-mono"><?= esc($a['author']) ?> · <?= date('d M Y', strtotime($a['published_at'])) ?></p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>

<?= $this->endSection() ?>
