<?php

/**
 * Blog page view.
 *
 * @var \yii\web\View $this View
 * @var \vova07\blogs\models\frontend\Blog $model Model
 */

use vova07\base\helpers\System;
use vova07\blogs\Module;
use yii\helpers\Html;

$this->title = $model['title'];
$this->params['breadcrumbs'] = [
    [
        'label' => Module::t('blogs', 'BACKEND_INDEX_TITLE'),
        'url' => ['index']
    ],
    $this->title
]; ?>
<div class="row">
    <aside class="col-sm-4 col-sm-push-8">
        <div class="widget ads">
            <div class="row">
                <div class="col-xs-6">
                    <img class="img-responsive img-rounded" src="<?= $this->assetManager->publish('@vova07/themes/site/assets/images/ads/ad1.png')[1] ?>" alt="Ads" />
                </div>

                <div class="col-xs-6">
                    <img class="img-responsive img-rounded" src="<?= $this->assetManager->publish('@vova07/themes/site/assets/images/ads/ad2.png')[1] ?>" alt="Ads" />
                </div>
            </div>
            <p> </p>
            <div class="row">
                <div class="col-xs-6">
                    <img class="img-responsive img-rounded" src="<?= $this->assetManager->publish('@vova07/themes/site/assets/images/ads/ad3.png')[1] ?>" alt="Ads" />
                </div>

                <div class="col-xs-6">
                    <img class="img-responsive img-rounded" src="<?= $this->assetManager->publish('@vova07/themes/site/assets/images/ads/ad4.png')[1] ?>" alt="Ads" />
                </div>
            </div>
        </div><!--/.ads-->
    </aside>

    <div class="col-sm-8 col-sm-pull-4">
        <div class="blog">
            <div class="blog-item">
                <?php if ($model->preview_url) : ?>
                    <?= Html::img(
                        $model->urlAttribute('preview_url'),
                        ['class' => 'img-responsive img-blog', 'width' => '100%', 'alt' => $model->title]
                    ) ?>
                <?php endif; ?>
                <div class="blog-content">
                    <h3><?= $model->title ?></h3>
                    <div class="entry-meta">
                        <span><i class="icon-calendar"></i> <?= $model->created ?></span>
                        <span><i class="icon-eye-open"></i> <?= $model->views ?></span>
                    </div>
                    <?= $model->content ?>

                    <?php if (Yii::$app->base->hasExtension('comments') && Yii::$app->user->can('viewComments')) :
                        echo \vova07\comments\widgets\Comments::widget(
                            [
                                'model' => $model,
                                'jsOptions' => [
                                    'offset' => 80
                                ]
                            ]
                        );
                    endif; ?>

                </div>
            </div><!--/.blog-item-->
        </div>
    </div><!--/.col-md-8-->
</div><!--/.row-->