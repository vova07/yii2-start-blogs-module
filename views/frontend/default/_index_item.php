<?php

/**
 * Blog list item view.
 *
 * @var \yii\web\View $this View
 * @var \vova07\blogs\models\frontend\Blog $model Model
 */

use vova07\blogs\Module;
use yii\helpers\Html;

?>
<?php if ($model->preview_url) : ?>
    <?= Html::a(
        Html::img(
            $model->urlAttribute('preview_url'),
            ['class' => 'img-responsive img-blog', 'width' => '100%', 'alt' => $model->title]
        ),
        ['view', 'id' => $model->id, 'alias' => $model->alias]
    ) ?>
<?php endif; ?>

<div class="blog-content">
    <h3>
        <?= Html::a($model->title, ['view', 'id' => $model->id, 'alias' => $model->alias]) ?>
    </h3>

    <div class="entry-meta">
        <span><i class="icon-calendar"></i> <?= $model->created ?></span>
        <span><i class="icon-eye-open"></i> <?= $model->views ?></span>
    </div>
    <?= $model->snippet ?>
    <?= Html::a(
        Module::t('blogs', 'FRONTEND_INDEX_READ_MORE_BTN') . ' <i class="icon-angle-right"></i>',
        ['view', 'id' => $model->id, 'alias' => $model->alias],
        ['class' => 'btn btn-default']
    ) ?>
</div>