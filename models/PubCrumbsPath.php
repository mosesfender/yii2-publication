<?php

namespace mosesfender\publication\models;

use Yii;

/**
 * This is the model class for table "{{%pub_crumbs_path}}".
 *
 * @property integer $crumb_parent_id
 * @property integer $crumb_child_id
 */
class PubCrumbsPath extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pub_crumbs_path}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crumb_parent_id', 'crumb_child_id'], 'required'],
            [['crumb_parent_id', 'crumb_child_id'], 'integer'],
            [['crumb_parent_id', 'crumb_child_id'], 'unique', 'targetAttribute' => ['crumb_parent_id', 'crumb_child_id'], 'message' => 'The combination of Crumb Parent ID and Crumb Child ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crumb_parent_id' => Yii::t('pub', 'Crumb Parent ID'),
            'crumb_child_id' => Yii::t('pub', 'Crumb Child ID'),
        ];
    }
}
