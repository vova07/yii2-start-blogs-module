<?php

namespace vova07\blogs\controllers\frontend;

use vova07\blogs\models\frontend\Blog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;
use Module;

/**
 * Default controller.
 */
class DefaultController extends Controller
{
    /**
     * Blog list page.
     */
    function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Blog::find()->published(),
            'pagination' => [
                'pageSize' => $this->module->recordsPerPage
            ]
        ]);

        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider
            ]
        );
    }

    /**
     * Blog page.
     *
     * @param integer $id Blog ID
     * @param string $alias Blog alias
     *
     * @return mixed
     *
     * @throws \yii\web\HttpException 404 if blog was not found
     */
    public function actionView($id, $alias)
    {
        if (($model = Blog::findOne(['id' => $id, 'alias' => $alias])) !== null) {
            return $this->render(
                'view',
                [
                    'model' => $model
                ]
            );
        } else {
            throw new HttpException(404);
        }
    }
}
