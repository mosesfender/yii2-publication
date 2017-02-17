<?php

namespace mosesfender\publication\models;

use Yii;

/**
 * This is the model class for table "{{%pub_crumb}}".
 *
 * @property integer $id
 * @property string $crumb_title
 * @property string $crumb_description
 * @property integer $status
 * @property string $created_at
 * @property string $update_at
 */
class PubCrumb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pub_crumb}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crumb_title'], 'required'],
            [['crumb_description'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['crumb_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('pub', 'ID'),
            'crumb_title' => Yii::t('pub', 'Crumb Title'),
            'crumb_description' => Yii::t('pub', 'Crumb Description'),
            'status' => Yii::t('pub', 'Status'),
            'created_at' => Yii::t('pub', 'Created At'),
            'update_at' => Yii::t('pub', 'Update At'),
        ];
    }
}
