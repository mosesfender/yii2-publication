<?php

namespace mosesfender\publication\models;

use Yii;

/**
 * This is the model class for table "{{%pub_content_crumbs}}".
 *
 * @property integer $pub_id
 * @property integer $crumb_id
 */
class PubContentCrumps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pub_content_crumbs}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pub_id', 'crumb_id'], 'required'],
            [['pub_id', 'crumb_id'], 'integer'],
            [['pub_id', 'crumb_id'], 'unique', 'targetAttribute' => ['pub_id', 'crumb_id'], 'message' => 'The combination of Pub ID and Crumb ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pub_id' => Yii::t('pub', 'Pub ID'),
            'crumb_id' => Yii::t('pub', 'Crumb ID'),
        ];
    }
}
