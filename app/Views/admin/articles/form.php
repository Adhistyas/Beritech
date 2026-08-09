<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="max-w-3xl">
  <a href="<?= site_url('admin/articles') ?>" class="inline-flex items-center gap-1.5 text-sm text-muted hover:text-signal mb-5 font-mono">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
    Kembali ke daftar artikel
  </a>

  <form action="<?= $article ? site_url('admin/articles/update/' . $article['id']) : site_url('admin/articles/store') ?>"
        method="post" enctype="multipart/form-data" class="bg-card border border-hair rounded-xl p-6 space-y-5">
    <?= csrf_field() ?>

    <div>
      <label class="block text-sm font-medium mb-1.5">Judul Artikel <span class="text-red-500">*</span></label>
      <input type="text" name="title" value="<?= esc(old('title') ?? ($article['title'] ?? '')) ?>"
             placeholder="Minimal 10 karakter"
             class="w-full border border-hair rounded-lg px-3.5 py-2.5 text-sm outline-none focus:ring-2 focus:ring-signal focus:border-signal transition">
    </div>

    <div class="grid sm:grid-cols-2 gap-5">
      <div>
        <label class="block text-sm font-medium mb-1.5">Kategori <span class="text-red-500">*</span></label>
        <select name="category_id" class="w-full border border-hair rounded-lg px-3.5 py-2.5 text-sm outline-none focus:ring-2 focus:ring-signal focus:border-signal transition bg-white">
          <option value="">-- Pilih Kategori --</option>
          <?php foreach ($categories as $cat): ?>
            <?php $selected = (old('category_id') ?? ($article['category_id'] ?? null)) == $cat['id']; ?>
            <option value="<?= $cat['id'] ?>" <?= $selected ? 'selected' : '' ?>><?= esc($cat['name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium mb-1.5">Penulis <span class="text-red-500">*</span></label>
        <input type="text" name="author" value="<?= esc(old('author') ?? ($article['author'] ?? '')) ?>"
               placeholder="Minimal 3 karakter"
               class="w-full border border-hair rounded-lg px-3.5 py-2.5 text-sm outline-none focus:ring-2 focus:ring-signal focus:border-signal transition">
      </div>
    </div>

    <div class="grid sm:grid-cols-2 gap-5">
      <div>
        <label class="block text-sm font-medium mb-1.5">Tanggal Publikasi <span class="text-red-500">*</span></label>
        <input type="date" name="published_at"
               value="<?= esc(old('published_at') ?? ($article['published_at'] ?? date('Y-m-d'))) ?>"
               class="w-full border border-hair rounded-lg px-3.5 py-2.5 text-sm outline-none focus:ring-2 focus:ring-signal focus:border-signal transition">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1.5">Status</label>
        <select name="status" class="w-full border border-hair rounded-lg px-3.5 py-2.5 text-sm outline-none focus:ring-2 focus:ring-signal focus:border-signal transition bg-white">
          <?php $status = old('status') ?? ($article['status'] ?? 'published'); ?>
          <option value="published" <?= $status === 'published' ? 'selected' : '' ?>>Published</option>
          <option value="draft" <?= $status === 'draft' ? 'selected' : '' ?>>Draft</option>
        </select>
      </div>
    </div>

    <div>
      <label class="block text-sm font-medium mb-1.5">
        Gambar Artikel <?= $article ? '' : '<span class="text-red-500">*</span>' ?>
      </label>
      <?php if ($article && $article['image']): ?>
        <img src="<?= base_url('uploads/articles/' . $article['image']) ?>" alt="" class="w-40 h-28 object-cover rounded-lg border border-hair mb-2">
        <p class="text-xs text-muted mb-2">Kosongkan jika tidak ingin mengganti gambar.</p>
      <?php endif; ?>
      <input type="file" name="image" accept="image/*"
             class="w-full border border-hair rounded-lg px-3.5 py-2.5 text-sm outline-none focus:ring-2 focus:ring-signal focus:border-signal transition bg-white file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-signal/10 file:text-signal file:font-semibold file:text-sm">
    </div>

    <div>
      <label class="block text-sm font-medium mb-1.5">Isi Artikel <span class="text-red-500">*</span></label>
      <textarea id="content" name="content" class="w-full"><?= old('content') ?? ($article['content'] ?? '') ?></textarea>
    </div>

    <div class="flex gap-3 pt-2">
      <button type="submit" class="bg-signal hover:bg-signal/90 text-white font-semibold rounded-lg px-5 py-2.5 text-sm transition-colors">
        <?= $article ? 'Simpan Perubahan' : 'Publikasikan Artikel' ?>
      </button>
      <a href="<?= site_url('admin/articles') ?>" class="border border-hair rounded-lg px-5 py-2.5 text-sm font-semibold hover:bg-paper transition-colors">Batal</a>
    </div>
  </form>
</div>

<!-- Summernote Rich Text Editor (CDN) -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
  $(document).ready(function () {
    $('#content').summernote({
      placeholder: 'Tulis isi artikel di sini...',
      tabsize: 2,
      height: 320,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link']],
        ['view', ['fullscreen', 'codeview']],
      ],
    });
  });
</script>

<?= $this->endSection() ?>
