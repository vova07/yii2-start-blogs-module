<?php

/**
 * Blog update view.
 *
 * @var yii\base\View $this View
 * @var vova07\blogs\models\backend\Blog $model Model
 * @var array $statusArray Statuses array
 * @var \backend\themes\admin\widgets\Box $box Box widget instance
 */

use backend\themes\admin\widgets\Box;
use vova07\blogs\Module;

$this->title = Module::t('blogs', 'BACKEND_UPDATE_TITLE');
$this->params['subtitle'] = Module::t('blogs', 'BACKEND_UPDATE_SUBTITLE');
$this->params['breadcrumbs'] = [
    [
        'label' => $this->title,
        'url' => ['index'],
    ],
    $this->params['subtitle']
]; ?>
<div class="row">
    <div class="col-sm-12">
        <?php $box = Box::begin(
            [
                'title' => $this->params['subtitle'],
                'renderBody' => false,
                'options' => [
                    'class' => 'box-success'
                ],
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'buttonsTemplate' => '{cancel} {delete}'
            ]
        );
        echo $this->render(
            '_form',
            [
                'model' => $model,
                'statusArray' => $statusArray,
                'box' => $box
            ]
        );
        Box::end(); ?>
    </div>
</div>
