<h2>Поиск по слову: <?= $searchWord; ?></h2>

<?php if (empty($items)): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p>Поиск не дал результатов</p>
    </div>

<?php endif; ?>

<?php foreach ($items as $item): ?>
    <?php
    echo $this->render('@votpuskView/modules/items/views/default/_block/item/search', [
            'model' => $item,
        ]
    );
    ?>
<?php endforeach; ?>

