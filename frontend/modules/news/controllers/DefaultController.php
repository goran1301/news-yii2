<?php

namespace frontend\modules\news\controllers;

use yii\web\Controller;
use \common\models\News;
use \yii\data\Pagination;

/**
 * Default controller for the `news` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query = News::find()->select('id, date, captiopn, preview');
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count()
        ]);
        $news = $query->orderBy(['date'=> SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        return $this->render('index',[
            'news' => $news,
            'pagination' => $pagination,
        ]);
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionMonth($date)
    {
        $model = News::find()->select('id, date, captiopn, preview')
                ->andWhere(['between', 'date', $date.'-01', $date.'-31'])//'date > :date',[':date'=>$date.'-01'])
                    //->andWhere('date > :date',[':date'=>$date.'-01'])
                    //->andWhere('date < :date',[':date'=>$date.'-32'])
                    ->all();
        return $this->render('by_param', [
            'news' => $model,
        ]);
    }
    public function actionTheme($id)
    {
        $model = News::find()->select('id, date, captiopn, preview')->where(['theme_id'=>$id])->all();
        return $this->render('by_param', [
            'news' => $model,
        ]);
    }
    
    protected function findModel($id)
    {
        if (($model = News::find()->where(['news.id'=>$id])->joinWith('theme')->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
