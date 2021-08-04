<?php

namespace app\components;
use Yii;
use yii\widgets\Menu;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;


class MenuFilter extends Menu
{

    public $linkTemplate = '<a {class} href="{url}">{label}</a>';

    protected function renderItem($item)
    {

        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
            return strtr($template, [
                '{class}'=> ($item['active']==1) ? "class='active signin-modal__switch-btn'" : "class='signin-modal__switch-btn'",
                '{url}' => Html::encode(Url::to($item['url'])),
                '{label}' => $item['label'],
            ]);
        } else {
            $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

            return strtr($template, [
                '{label}' => $item['label'],
            ]);
        }
    }
}