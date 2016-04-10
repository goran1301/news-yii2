<?php

namespace common\widgets;

use yii\base\Widget;
use common\models\News;
use yii\helpers\Html;

class DatesNews extends Widget
{
    private $news;
    private  $dates = [];
    public function  init(){
        parent::init();
        $this->news = News::find()->select('id,date')->all();
        foreach ($this->news as $new){
            if($new->date !== null){
                //$this->dates[] = date('Y M d', strtotime($new->date));
                $date = explode('-', $new->date);
                $currentDate = explode(' ', date('Y M d', strtotime($new->date)));
                $this->sortByDate($currentDate, $date[1]);
            }
        }
    }
    
    private function sortByDate($currentDate, $month){
        if(isset($this->dates[$currentDate[0]]['monthes'][$currentDate[1]])){
                    $this->dates[$currentDate[0]]['monthes'][$currentDate[1]]['count']+= 1;
                }else{
                    $this->dates[$currentDate[0]]['monthes'][$currentDate[1]]['count'] = 1;
                    $this->dates[$currentDate[0]]['year'] = $currentDate[0];
                    $this->dates[$currentDate[0]]['monthes'][$currentDate[1]]['value'] = $currentDate[1];
                    $this->dates[$currentDate[0]]['monthes'][$currentDate[1]]['id'] = $month;
                }
    }

    public function run(){
        echo '<div class="newsDatesWidget">';
        foreach($this->dates as $date){
            echo '<div class="year">';
            echo '<span>'.$date['year'].'</span>';
            foreach ($date['monthes'] as $month){
                //echo '<a href="">'.$month['value'].'('.$month['count'].')</a>';
                echo '<div>'.Html::a($month['value'].'('.$month['count'].')', 
                        ['month', 'date' => $date['year'].'-'.$month['id']]
                ).'</div>';
            }
            echo '</div>';
        }
        echo '</div>';
    }
}

