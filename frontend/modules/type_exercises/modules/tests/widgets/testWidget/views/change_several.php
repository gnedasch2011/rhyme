    <h3><?= $test->name; ?></h3>

    <div class="testBlock" data-test-id="<?= $test->id; ?>">
        <?php foreach ($test->qustions as $qustion): ?>
            <h4><?= $qustion->name; ?></h4>

            <div class="qustionBlock exercise_check_tests"
                 data-id-qustion="<?= $qustion->id; ?>"
                 data-id-tests="<?= $test->id; ?>"
            >
                <?php foreach ($qustion->answers as $answer): ?>
                    <a class="item_test_change_several" data-id-answers="<?= $answer->id; ?>"
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
     var button = $(".item_test_change_several")
        
    // handle click and add class
    button.on("click", function(e){
      e.preventDefault()
        $(this).toggleClass('item_active item_test_change_several_active')
    })	
    
            $('.group_test_checks').bind('tests_several_check')          
             
                $(document).on('tests_several_check',function (e) {
                    let allTestBlock = $('.testBlock')
                        arrDataResultTest = []
                    ;
                                    //отправлять пачкой данных
                    $.each(allTestBlock, function(_, blockTest){
                        let testBlock = ($(blockTest)),                     
                             idTest = testBlock.attr('data-test-id'),
                             qustionBlocks = testBlock.find('.qustionBlock')
                             ;  
                             let  arrIdQuestion = []; 
                            //массив вида id_test:{id_вопроса:{id_ответов}}
                             $.each(qustionBlocks, function(_, questionBlock) { 
                                   idQuestion = $(questionBlock).attr('data-id-qustion'),
                                   idCheckItems =  $(questionBlock).find('.item_active') 
                                   ;
                           
                             let arrIdAnswers = [];
                                
                               $.each(idCheckItems, function(_, answer){                              
                                 let idCheckAnswer = $(answer).attr('data-id-answers');                                                 arrIdAnswers.push(idCheckAnswer)
                               })
                                 res = {
                                  idTest:idTest,
                                  idQuestion:idQuestion,
                                  arrIdAnswers:arrIdAnswers  
                              }                           
                              arrDataResultTest.push(res);
                             })
                            
                    })              
                    
                    $.ajax({
                                 url:"/type_exercises/tests/ajax/check-tests",
                                method: "post",
                                data: {arrDataResultTest:arrDataResultTest},
                                
                               success: function (data) {
                                   console.log(data);
                                  
                               }
                            });    
                })
                
                
    
     
JS;
    //маркер конца строки, обязательно сразу, без пробелов и табуляции
    $this->registerJs($script, yii\web\View::POS_READY);
    ?>

    <style>
        .item_test_change_several {
            padding: 10px;
            background: #000;
            color: white;
        }

        .item_test_change_several_active {
            padding: 10px;
            background: green;
            color: white;
        }

    </style>
