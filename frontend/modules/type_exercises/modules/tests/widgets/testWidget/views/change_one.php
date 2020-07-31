<?php

use yii\web\View;

?>
<h3><?= $test->name; ?></h3>

<div class="testBlock" data-test-id="<?= $test->id; ?>">
    <?php foreach ($test->qustions as $qustion): ?>
        <h4><?= $qustion->name; ?></h4>

        <div class="qustionBlock exercise_check_tests"
             data-id-qustion="<?= $qustion->id; ?>"
             data-id-tests="<?= $test->id; ?>"
        >
            <?php foreach ($qustion->answers as $answer): ?>
                <a class="item_test_change_one " data-id-answers="<?= $answer->id; ?>"
                   href="#"><?= $answer->text; ?></a>
            <?php endforeach; ?>
        </div>
        <br>
    <?php endforeach; ?>
</div>

<?php
$script = <<< JS

JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>


<?php
$script = <<< JS
 var button = $(".item_test_change_one")
    
// handle click and add class
button.on("click", function(e){
  e.preventDefault()
	  
	let parentBlock = $(this).parents('.testBlock'),
	      items = parentBlock.find(button)
	      classActve = 'item_test_change_one_active item_active';
	      ;
      $.each(items, function(_, item) {        
            $(item).removeClass(classActve)        
      })
      
      $(this).addClass(classActve)
    
})	

JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>

<style>
    .item_test_change_one {
        padding: 10px;
        background: #000;
        color: white;
    }

    .item_test_change_one_active {
        padding: 10px;
        background: green;
        color: white;
    }

</style>
