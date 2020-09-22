<h1>Рифмы к именам</h1>
<!-- Yandex.RTB R-A-632107-1 -->
<div id="yandex_rtb_R-A-632107-1"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-632107-1",
                renderTo: "yandex_rtb_R-A-632107-1",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php foreach ($namesOrfAll as $word): ?>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <a href="<?= $word['url']; ?>" class="accent"><?= $word['word']; ?></a>
            </div>
        <?php endforeach; ?>
        <div class="clearfix"></div>
</div>

<?php if ($patronymics): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Рифмы к отчествам:</h3>
        <?php
        echo $this->render('/rhyme/block/_output_words', [
            'words' => $patronymics,
        ]);
        ?>
    </div>
<?php endif; ?>
