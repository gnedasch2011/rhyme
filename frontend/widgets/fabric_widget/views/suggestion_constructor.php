<?php foreach($model->suggestionConstructor as $suggestionConstructor):?>
        <?php foreach($suggestionConstructor->partsSuggestion as $partsSuggestion):?>
       <span class="words"><?= $partsSuggestion->text;?></span>
        <?php endforeach;?>
<?php endforeach;?>

<style>
    .words{
        padding: 10px;
        background: #ddd;
        margin-left: 10px;
        cursor: pointer;
    }
</style>
