<aside class="sidebar">
    <?php foreach (admin_sidebar_items() as $item): ?>
        <a href="<?= esc($item['url']) ?>">
            <?= $item['icon'] ?> <?= esc($item['label']) ?>
        </a>
    <?php endforeach; ?>
</aside>
