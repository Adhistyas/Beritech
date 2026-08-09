<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="flex justify-end mb-6">
  <a href="<?= site_url('admin/categories/create') ?>" class="inline-flex items-center gap-2 bg-signal hover:bg-signal/90 text-white font-semibold rounded-lg px-4 py-2 text-sm transition-colors">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Tambah Kategori
  </a>
</div>

<div class="bg-card border border-hair rounded-xl overflow-hidden">
  <?php if (empty($categories)): ?>
    <p class="text-muted text-sm px-5 py-10 text-center">Belum ada kategori.</p>
  <?php else: ?>
    <table class="w-full text-sm">
      <thead>
        <tr class="text-left text-muted font-mono text-xs uppercase tracking-wide bg-paper/60">
          <th class="px-5 py-3">Nama Kategori</th>
          <th class="px-5 py-3">Slug</th>
          <th class="px-5 py-3">Jumlah Artikel</th>
          <th class="px-5 py-3 text-right">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $cat): ?>
          <tr class="border-t border-hair">
            <td class="px-5 py-3 font-medium"><?= esc($cat['name']) ?></td>
            <td class="px-5 py-3 text-muted font-mono text-xs"><?= esc($cat['slug']) ?></td>
            <td class="px-5 py-3 text-muted"><?= (int) $cat['articles_count'] ?></td>
            <td class="px-5 py-3">
              <div class="flex justify-end gap-3">
                <a href="<?= site_url('admin/categories/edit/' . $cat['id']) ?>" class="text-signal hover:underline font-medium">Edit</a>
                <a href="<?= site_url('admin/categories/delete/' . $cat['id']) ?>"
                   onclick="return confirm('Hapus kategori &quot;<?= esc($cat['name'], 'js') ?>&quot;?')"
                   class="text-red-500 hover:underline font-medium">Hapus</a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
