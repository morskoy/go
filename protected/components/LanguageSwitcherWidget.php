<?php
class LanguageSwitcherWidget extends CWidget
{
    public function run()
    {

        $currentUrl = ltrim(Yii::app()->request->url, '/');
        //echo    $currentUrl;

        $links = array();
        foreach (DMultilangHelper::suffixList() as $prefix => $name){
            $url = '/' . ($prefix ? $prefix . '/' : '') . $currentUrl;
           if ($name == 'Russian') {
                $img = Chtml::image(Yii::app()->baseUrl.'/images/russia_flag.png');
                $links[] = CHtml::link($img, $url);
           } else {
                $img = Chtml::image(Yii::app()->baseUrl.'/images/united_kingdom_flag.png');
                $links[] = CHtml::link($img, $url);
           }
           
        }
        echo CHtml::tag('div', array('class'=>'pull-right'), implode("&nbsp;&nbsp;&nbsp;", $links));
    }
}