<?php 
    use frontend\modules\type_exercises\models\TypeExercises;
 ?>

<?php if($task->exercises):?>
    <?php foreach($task->exercises as $exercise):?>
            <?php echo "<pre>"; print_r(TypeExercises::returnTypeExcercise($exercise->type_exercises_id,$exercise->id));die(); ?>
    <?php endforeach;?>
<?php endif;?>
