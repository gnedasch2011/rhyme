<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach ($array_urls as $url): ?>
        <url>
            <loc><?= \Yii::$app->request->hostInfo; ?><?php echo $url; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    <?php endforeach; ?>
</urlset>