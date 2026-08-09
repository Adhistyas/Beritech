<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
  <form action="<?= site_url('admin/articles') ?>" method="get" class="flex gap-2">
    <input type="text" name="q" value="<?= esc($keyword ?? '') ?>" placeholder="Cari judul artikel..."
           class="border border-hair rounded-lg px-3.5 py-2 text-sm outline-none focus:ring-2 focus:ring-signal w-64">
    <button class="bg-signal text-white rounded-lg px-4 text-sm font-semibold hover:bg-signal/90 transition-colors">Cari</button>
  </form>
  <a href="<?= site_url('admin/articles/create') ?>" class="inline-flex items-center gap-2 bg-signal hover:bg-signal/90 text-white font-semibold rounded-lg px-4 py-2 text-sm transition-colors">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Tambah Artikel
  </a>
</div>

<div class="bg-card border border-hair rounded-xl overflow-hidden">
  <?php if (empty($articles)): ?>
    <p class="text-muted text-sm px-5 py-10 text-center">Belum ada artikel yang cocok.</p>
  <?php else: ?>
    <table class="w-full text-sm">
      <thead>
        <tr class="text-left text-muted font-mono text-xs uppercase tracking-wide bg-paper/60">
          <th class="px-5 py-3">Judul</th>
          <th class="px-5 py-3">Kategori</th>
          <th class="px-5 py-3">Penulis</th>
          <th class="px-5 py-3">Tanggal</th>
          <th class="px-5 py-3">Status</th>
          <th class="px-5 py-3 text-right">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($articles as $a): ?>
          <tr class="border-t border-hair">
            <td class="px-5 py-3 font-medium max-w-xs"><?= esc($a['title']) ?></td>
            <td class="px-5 py-3 text-muted"><?= esc($a['category_name'] ?? '-') ?></td>
            <td class="px-5 py-3 text-muted"><?= esc($a['author']) ?></td>
            <td class="px-5 py-3 text-muted font-mono text-xs"><?= date('d M Y', strtotime($a['published_at'])) ?></td>
            <td class="px-5 py-3">
              <span class="font-mono text-[11px] uppercase tracking-wide px-2 py-1 rounded-full <?= $a['status'] === 'published' ? 'bg-teal/10 text-teal' : 'bg-hair text-muted' ?>">
                <?= esc($a['status']) ?>
              </span>
            </td>
            <td class="px-5 py-3">
              <div class="flex justify-end gap-3">
                <a href="<?= site_url('admin/articles/edit/' . $a['id']) ?>" class="text-signal hover:underline font-medium">Edit</a>
                <a href="<?= site_url('admin/articles/delete/' . $a['id']) ?>"
                   onclick="return confirm('Hapus artikel &quot;<?= esc($a['title'], 'js') ?>&quot;?')"
                   class="text-red-500 hover:underline font-medium">Hapus</a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<div class="mt-6">
  <?= $pager->links() ?>
</div>

<?= $this->endSection() ?>
