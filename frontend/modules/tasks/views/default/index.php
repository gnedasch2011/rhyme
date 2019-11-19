<?php

use frontend\modules\type_exercises\models\TypeExercises;
use frontend\widgets\fabric_widget\FabricWidget;

?>
<?php if ($task->exercises): ?>
    <?php foreach ($task->exercises as $exercise): ?>
        <?php
        echo FabricWidget::widget([
            'exercise' => $exercise
        ]);
        ?>
    <?php endforeach; ?>
<?php endif; ?>
