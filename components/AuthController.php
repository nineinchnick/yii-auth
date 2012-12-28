<?php

class AuthController extends CController
{
    /**
     * @var string the default layout for the controller view.
     */
    public $layout = 'auth.views.layouts.main';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page.
     */
    public $breadcrumbs = array();

    /**
     * @param string $type
     * @param boolean $plural
     * @return string
     * @throws CException
     */
    public function getItemTypeText($type, $plural = true)
    {
        $n = $plural ? 2 : 1;
        switch ($type)
        {
            case CAuthItem::TYPE_OPERATION:
                $name = Yii::t('AuthModule.main', 'operation|operations', $n);
                break;

            case CAuthItem::TYPE_TASK:
                $name = Yii::t('AuthModule.main', 'task|tasks', $n);
                break;

            case CAuthItem::TYPE_ROLE:
                $name = Yii::t('AuthModule.main', 'role|roles', $n);
                break;

            default:
                throw new CException('Auth item type "' . $type . '" is valid.');
        }

        return $name;
    }
}
