<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<article class="max-w-3xl mx-auto px-5 py-12">
  <a href="<?= site_url('artikel') ?>" class="inline-flex items-center gap-1.5 text-sm text-muted hover:text-signal mb-6 font-mono">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
    Kembali ke Semua Artikel
  </a>

  <span class="inline-block font-mono text-xs uppercase tracking-widest bg-signal/10 text-signal px-3 py-1 rounded-full mb-4">
    <?= esc($article['category_name'] ?? 'Umum') ?>
  </span>

  <h1 class="font-display text-3xl md:text-4xl font-bold leading-tight mb-4"><?= esc($article['title']) ?></h1>

  <div class="flex items-center gap-3 text-sm text-muted font-mono mb-8 pb-8 border-b border-hair">
    <span>Oleh <strong class="text-ink"><?= esc($article['author']) ?></strong></span>
    <span>·</span>
    <span><?= date('d F Y', strtotime($article['published_at'])) ?></span>
  </div>

  <?php if ($article['image']): ?>
    <img src="<?= base_url('uploads/articles/' . $article['image']) ?>" alt="<?= esc($article['title']) ?>" class="w-full h-auto rounded-xl mb-10 border border-hair">
  <?php endif; ?>

  <div class="prose-article text-[17px]">
    <?= $article['content'] ?>
  </div>
</article>

<?php if (! empty($related)): ?>
<section class="max-w-3xl mx-auto px-5 pb-16">
  <div class="flex items-center gap-2 font-mono text-xs uppercase tracking-widest text-muted mb-5">
    Artikel Terkait
  </div>
  <div class="grid sm:grid-cols-3 gap-5">
    <?php foreach ($related as $r): ?>
      <a href="<?= site_url('artikel/' . $r['slug']) ?>" class="group bg-card border border-hair rounded-xl overflow-hidden hover:border-signal/50 transition-colors">
        <div class="h-28 bg-hair overflow-hidden">
          <?php if ($r['image']): ?>
            <img src="<?= base_url('uploads/articles/' . $r['image']) ?>" alt="<?= esc($r['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
          <?php endif; ?>
        </div>
        <div class="p-3.5">
          <h4 class="font-display font-bold text-sm leading-snug group-hover:text-signal transition-colors"><?= esc($r['title']) ?></h4>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<?= $this->endSection() ?>
