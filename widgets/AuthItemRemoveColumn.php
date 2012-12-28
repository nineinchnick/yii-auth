<?php

class AuthItemRemoveColumn extends AuthItemColumn
{
    /**
     * Initializes the column.
     */
    public function init()
    {
        if (isset($this->htmlOptions['class']))
            $this->htmlOptions['class'] .= ' auth-actions-column';
        else
            $this->htmlOptions['class'] = 'auth-actions-column';
    }

    /**
     * Renders the data cell content.
     * @param integer $row the row number (zero-based)
     * @param mixed $data the data associated with the row
     */
    protected function renderDataCellContent($row, $data)
    {
        /* @var $am CAuthManager|AuthBehavior */
        $am = Yii::app()->getAuthManager();

        if ($am->hasParent($this->itemName, $data['name']))
        {
            $this->grid->owner->widget('bootstrap.widgets.TbButton', array(
                'type' => 'link',
                'size' => 'mini',
                'icon' => 'remove',
                'url' => array('removeParent', 'itemName' => $this->itemName, 'parentName' => $data['name']),
                'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('AuthModule.main', 'Remove')),
            ));
        }
        else if ($am->hasChild($this->itemName, $data['name']))
        {
            $this->grid->owner->widget('bootstrap.widgets.TbButton', array(
                'type' => 'link',
                'size' => 'mini',
                'icon' => 'remove',
                'url' => array('removeChild', 'itemName' => $this->itemName, 'childName' => $data['name']),
                'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('AuthModule.main', 'Remove')),
            ));
        }
    }
}
