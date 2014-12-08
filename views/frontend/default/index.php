<?php

/**
 * Blog list page view.
 *
 * @var \yii\web\View $this View
 * @var \yii\data\ActiveDataProvider $dataProvider DataProvider
 */

use vova07\blogs\Module;
use yii\widgets\ListView;

$this->title = Module::t('blogs', 'FRONTEND_INDEX_TITLE');
$this->params['breadcrumbs'][] = $this->title; ?>
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
        <?= ListView::widget(
            [
                'dataProvider' => $dataProvider,
                'layout' => "{items}\n{pager}",
                'itemView' => '_index_item',
                'options' => [
                    'class' => 'blog'
                ],
                'itemOptions' => [
                    'class' => 'blog-item',
                    'tag' => 'article'
                ]
            ]
        ); ?>
    </div>
</div>