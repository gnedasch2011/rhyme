<?php foreach ($test->qustions as $qustion): ?>
    <h3><?= $qustion->name; ?></h3>
    <div class="" data-id-qustion="<?= $qustion->id; ?>">
        <?php foreach ($qustion->answers as $answer): ?>
            <a class="item_test" data-id-answers="<?= $answer->id; ?>"
               href="#"><?= $answer->text; ?></a>
        <?php endforeach; ?>
    </div> <br>
<?php endforeach; ?>


<?php
$script = <<< JS

JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>


<?php
$script = <<< JS
 var button = $(".item_test")

// handle click and add class
button.on("click", function(e){
  e.preventDefault()
	$(this).toggleClass('item_test_active')
})	

 
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>

<style>
    .item_test {
        padding: 10px;
        background: #000;
        color: white;
    }

    .item_test_active {
        padding: 10px;
        background: green;
        color: white;
    }

</style>
