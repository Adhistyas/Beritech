<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<section class="bg-white border-b border-hair text-ink">
  <div class="max-w-4xl mx-auto px-5 py-16">
    <div class="flex items-center gap-2 font-mono text-xs uppercase tracking-widest text-signal font-semibold mb-5">
      Tentang Kami
    </div>
    <h1 class="font-display text-3xl md:text-4xl font-bold leading-tight mb-5">Membaca detak teknologi, satu artikel setiap harinya.</h1>
    <p class="text-muted max-w-2xl leading-relaxed">BeriTech adalah portal berita teknologi yang merangkum perkembangan gadget, aplikasi, kecerdasan buatan, dan dunia startup dengan bahasa yang ringkas dan mudah dipahami.</p>
  </div>
</section>

<section class="max-w-4xl mx-auto px-5 py-14 grid md:grid-cols-3 gap-8">
  <div class="bg-card border border-hair rounded-xl p-6">
    <div class="w-10 h-10 rounded-lg bg-signal/10 text-signal flex items-center justify-center mb-4 font-display font-bold">01</div>
    <h3 class="font-display font-bold mb-2">Cepat &amp; Ringkas</h3>
    <p class="text-sm text-muted leading-relaxed">Setiap artikel ditulis padat agar kamu bisa mengikuti perkembangan teknologi tanpa menghabiskan banyak waktu.</p>
  </div>
  <div class="bg-card border border-hair rounded-xl p-6">
    <div class="w-10 h-10 rounded-lg bg-teal/10 text-teal flex items-center justify-center mb-4 font-display font-bold">02</div>
    <h3 class="font-display font-bold mb-2">Beragam Topik</h3>
    <p class="text-sm text-muted leading-relaxed">Dari gadget terbaru, aplikasi, kecerdasan buatan, hingga kabar startup lokal maupun global.</p>
  </div>
  <div class="bg-card border border-hair rounded-xl p-6">
    <div class="w-10 h-10 rounded-lg bg-signal/10 text-signal flex items-center justify-center mb-4 font-display font-bold">03</div>
    <h3 class="font-display font-bold mb-2">Dikurasi Manual</h3>
    <p class="text-sm text-muted leading-relaxed">Seluruh artikel ditulis dan disunting oleh tim redaksi sebelum dipublikasikan ke pembaca.</p>
  </div>
</section>

<?= $this->endSection() ?>
