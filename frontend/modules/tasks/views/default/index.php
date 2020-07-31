<?php

use frontend\widgets\fabric_widget\FabricWidget;

?>

<?= $task->video->name; ?><br>
<?= $task->teoriya->name; ?><br>
<?php if ($task->exercises): ?>

    <?php foreach ($task->exercises as $exercise): ?>
        <?php
        echo FabricWidget::widget([
            'exercise' => $exercise
        ]);
        ?>
    <?php endforeach; ?>
<?php endif; ?>


<?= \yii\helpers\Html::button('Проверить все', ['class' => 'btn btn-primary checkAllExercise']);?>

<button class="saveAllExercise">Save</button>