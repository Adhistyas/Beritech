<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="max-w-md">
  <a href="<?= site_url('admin/categories') ?>" class="inline-flex items-center gap-1.5 text-sm text-muted hover:text-signal mb-5 font-mono">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
    Kembali ke daftar kategori
  </a>

  <form action="<?= $category ? site_url('admin/categories/update/' . $category['id']) : site_url('admin/categories/store') ?>"
        method="post" class="bg-card border border-hair rounded-xl p-6 space-y-5">
    <?= csrf_field() ?>

    <div>
      <label class="block text-sm font-medium mb-1.5">Nama Kategori <span class="text-red-500">*</span></label>
      <input type="text" name="name" value="<?= esc(old('name') ?? ($category['name'] ?? '')) ?>"
             placeholder="Minimal 3 karakter"
             class="w-full border border-hair rounded-lg px-3.5 py-2.5 text-sm outline-none focus:ring-2 focus:ring-signal focus:border-signal transition">
    </div>

    <div class="flex gap-3 pt-2">
      <button type="submit" class="bg-signal hover:bg-signal/90 text-white font-semibold rounded-lg px-5 py-2.5 text-sm transition-colors">
        <?= $category ? 'Simpan Perubahan' : 'Tambah Kategori' ?>
      </button>
      <a href="<?= site_url('admin/categories') ?>" class="border border-hair rounded-lg px-5 py-2.5 text-sm font-semibold hover:bg-paper transition-colors">Batal</a>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
