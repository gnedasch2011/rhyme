<h3><?= $test->name; ?></h3>

<div class="testBlock">
    <?php foreach ($test->qustions as $qustion): ?>
        <h4><?= $qustion->name; ?></h4>

        <div class="qustionBlock exercise_check_tests"
             data-id-qustion="<?= $qustion->id; ?>"
             data-id-tests="<?= $test->id; ?>"
        >
            <?php foreach ($qustion->answers as $answer): ?>
                <a class="item_test" data-id-answers="<?= $answer->id; ?>"
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
 var button = $(".item_test")
    
// handle click and add class
button.on("click", function(e){
  e.preventDefault()
	$(this).toggleClass('item_test_active')
})	

        $('.qustionBlock').bind('tests_several_check')          
         
            $(document).on('tests_several_check',function (e) {
                let allTestBlock = $('.testBlock');
                
                $.each(allTestBlock, function(_, testBlock){
                    let question = testBlock.find('.qustionBlock'),
                         idCheckItems = testBlock.find('.item_test .item_test_active'),
                         idQustions =1,
                         idTest=1
                         ;
                        
                    
                })
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
