<?php

namespace app\components;

use yii\widgets\Menu;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;


class MenuFilter extends Menu
{
    protected $item = ['label' => 'Мужчины', 'active' => 'active', 'url' => '/search/resume', 'param' => 'male'];

    public $linkTemplate = '<a {activeClass} href="{url}" class="signin-modal__switch-btn">{label}</a>';

    protected function renderItem($item)
    {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

            return strtr($template, [
//                '{activeClass}' => ($item['active'] == 1) ? 'class="active"' : '',
                '{url}' => Html::encode(Url::to($item['url'])),
//                '{label}' => $item['label'],
            ]);
    }
}

/*protected function renderItem($item)
{
    if ($this->showIcon && isset($item['url'])) {
        if (!strpos($item['label'], '</i>')) {
            $item['label'] = strtr($this->iconTemplate, ['{icon}' => isset($item['icon']) ? $item['icon'] : $this->defaultIcon, '{label}' => $item['label']]);
        }
    }
    if (isset($item['items'])) {
        $item['label'] .= $this->showCountSubmenu ? strtr($this->countSubmenuTemplate, ['{count}' => count($item['items'])]) : '<i class="fa fa-angle-left pull-right"></i>';
    }
    return parent::renderItem($item);
}*/