<?php

use frontend\modules\type_exercises\modules\tests\widgets\testWidget\TestsFabricsWidget;

?>
<div class="group_test_checks">
    <?php foreach ($model->tests as $test): ?>
        <?= TestsFabricsWidget::widget(['test' => $test]); ?>
    <?php endforeach; ?>
</div>