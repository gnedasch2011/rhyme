<?php
echo "<?xml version='1.0' encoding='UTF-8'?>";
?>
<sitemapindex xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>
    <?php for ($i = 0; $i <= $countPage; $i++): ?>
        <sitemap>
            <loc><?= \Yii::$app->request->hostInfo; ?>/sitemap/<?= $i; ?></loc>
        </sitemap>
    <?php endfor; ?>
</sitemapindex>