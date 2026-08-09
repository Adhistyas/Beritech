<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<section class="bg-white border-b border-hair text-ink">
  <div class="max-w-6xl mx-auto px-5 py-10">
    <div class="flex items-center gap-2 font-mono text-xs uppercase tracking-widest text-signal font-semibold mb-3">
      Arsip
    </div>
    <h1 class="font-display text-3xl font-bold">Semua Artikel</h1>
  </div>
</section>

<section class="max-w-6xl mx-auto px-5 py-10 grid lg:grid-cols-[1fr_260px] gap-10">
  <div>
    <?php if (empty($articles)): ?>
      <div class="bg-card border border-hair rounded-xl p-10 text-center text-muted">
        Tidak ada artikel yang cocok dengan pencarianmu.
      </div>
    <?php else: ?>
      <div class="space-y-6">
        <?php foreach ($articles as $a): ?>
          <a href="<?= site_url('artikel/' . $a['slug']) ?>" class="group flex flex-col sm:flex-row gap-5 bg-card border border-hair rounded-xl overflow-hidden hover:border-signal/50 hover:shadow-lg hover:shadow-signal/5 transition-all">
            <div class="sm:w-56 h-44 sm:h-auto bg-hair shrink-0 overflow-hidden">
              <?php if ($a['image']): ?>
                <img src="<?= base_url('uploads/articles/' . $a['image']) ?>" alt="<?= esc($a['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
              <?php else: ?>
                <div class="w-full h-full flex items-center justify-center text-muted font-mono text-xs">Tanpa gambar</div>
              <?php endif; ?>
            </div>
            <div class="p-5 flex flex-col justify-center">
              <span class="font-mono text-[11px] uppercase tracking-widest text-signal"><?= esc($a['category_name'] ?? 'Umum') ?></span>
              <h3 class="font-display font-bold text-xl mt-2 mb-2 leading-snug group-hover:text-signal transition-colors"><?= esc($a['title']) ?></h3>
              <p class="text-xs text-muted font-mono"><?= esc($a['author']) ?> · <?= date('d M Y', strtotime($a['published_at'])) ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>

      <div class="mt-10">
        <?= $pager->links('default', 'frontend_pager') ?>
      </div>
    <?php endif; ?>
  </div>

  <aside class="space-y-8">
    <form action="<?= site_url('artikel') ?>" method="get" class="bg-card border border-hair rounded-xl p-5">
      <label class="font-mono text-[11px] uppercase tracking-widest text-muted block mb-2">Cari Artikel</label>
      <div class="flex gap-3 w-full">
        <input type="text" name="q" value="<?= esc($keyword ?? '') ?>" placeholder="Kata kunci..." class="min-w-0 flex-1 h-12 border border-hair rounded-lg px-3 text-sm outline-none focus:ring-2 focus:ring-signal">
        <button class="shrink-0 h-12 px-5 bg-signal text-white rounded-lg text-sm font-semibold">Cari</button>
      </div>
    </form>

    <div class="bg-card border border-hair rounded-xl p-5">
      <p class="font-mono text-[11px] uppercase tracking-widest text-muted mb-3">Kategori</p>
      <ul class="space-y-1.5 text-sm">
        <li>
          <a href="<?= site_url('artikel') ?>" class="block px-2 py-1.5 rounded-lg <?= !$categoryId ? 'bg-signal/10 text-signal font-semibold' : 'hover:bg-hair' ?>">Semua Kategori</a>
        </li>
        <?php foreach ($categories as $cat): ?>
          <li>
            <a href="<?= site_url('artikel') ?>?kategori=<?= $cat['id'] ?>" class="block px-2 py-1.5 rounded-lg <?= (string)$categoryId === (string)$cat['id'] ? 'bg-signal/10 text-signal font-semibold' : 'hover:bg-hair' ?>"><?= esc($cat['name']) ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </aside>
</section>

<?= $this->endSection() ?>
