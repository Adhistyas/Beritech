<?php
/**
 * Custom pager view — dipakai dengan $pager->links('default', 'frontend_pager')
 */
?>
<?php if ($pager->getPageCount() > 1): ?>
<nav aria-label="Navigasi halaman" class="flex items-center justify-center gap-1.5 font-mono text-sm">
  <?php if ($pager->hasPrevious()): ?>
    <a href="<?= $pager->getPreviousPageURI() ?>" class="w-9 h-9 flex items-center justify-center rounded-lg border border-hair hover:border-signal hover:text-signal transition-colors">‹</a>
  <?php else: ?>
    <span class="w-9 h-9 flex items-center justify-center rounded-lg border border-hair text-muted/40">‹</span>
  <?php endif; ?>

  <?php foreach ($pager->links() as $link): ?>
    <a href="<?= $link['uri'] ?>"
       class="w-9 h-9 flex items-center justify-center rounded-lg border transition-colors <?= $link['active'] ? 'bg-signal border-signal text-white' : 'border-hair hover:border-signal hover:text-signal' ?>">
      <?= $link['title'] ?>
    </a>
  <?php endforeach; ?>

  <?php if ($pager->hasNext()): ?>
    <a href="<?= $pager->getNextPageURI() ?>" class="w-9 h-9 flex items-center justify-center rounded-lg border border-hair hover:border-signal hover:text-signal transition-colors">›</a>
  <?php else: ?>
    <span class="w-9 h-9 flex items-center justify-center rounded-lg border border-hair text-muted/40">›</span>
  <?php endif; ?>
</nav>
<?php endif; ?>
