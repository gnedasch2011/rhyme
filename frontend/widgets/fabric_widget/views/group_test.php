<?php

use frontend\modules\type_exercises\modules\tests\widgets\testWidget\TestsFabricsWidget;
?>

<?php foreach ($model->tests as $test): ?>
    <?= TestsFabricsWidget::widget(['test' => $test]); ?>
<?php endforeach; ?>
