<?php

use frontend\modules\type_exercises\models\TypeExercises;
use frontend\widgets\fabric_widget\FabricWidget;

?>
<?= $task->video->name ;?><br>
<?= $task->teoriya->name ;?><br>
<?php if ($task->exercises): ?>

    <?php foreach ($task->exercises as $exercise): ?>
        <?php
        echo FabricWidget::widget([
            'exercise' => $exercise
        ]);
        ?>
    <?php endforeach; ?>
<?php endif; ?>
