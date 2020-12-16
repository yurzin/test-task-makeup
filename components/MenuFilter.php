<?php

namespace app\components;

use yii\widgets\Menu;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;


class MenuFilter extends Menu
{

    public $linkTemplate = '<a {activeClass} href="{url}" class="signin-modal__switch-btn">{label}</a>';

    protected function renderItem($item)
    {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

            return strtr($template, [
                '{activeClass}' => ($item['active'] == 1) ? 'class="active"' : '',
                '{url}' => Html::encode(Url::to($item['url'])),
                '{label}' => $item['label'],
            ]);
    }
}