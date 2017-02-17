<?php

namespace mosesfender\publication\models;

use Yii;

/**
 * This is the model class for table "{{%pub_content}}".
 *
 * @property integer $id
 * @property string $pub_title
 * @property string $pub_subtitle
 * @property string $pub_suptext
 * @property string $pub_text
 * @property string $pub_subtext
 * @property string $created_at
 * @property string $update_at
 * @property integer $status
 */
class PubContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pub_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pub_title'], 'required'],
            [['pub_suptext', 'pub_text', 'pub_subtext'], 'string'],
            [['created_at', 'update_at'], 'safe'],
            [['status'], 'integer'],
            [['pub_title', 'pub_subtitle'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('pub', 'ID'),
            'pub_title' => Yii::t('pub', 'Pub Title'),
            'pub_subtitle' => Yii::t('pub', 'Pub Subtitle'),
            'pub_suptext' => Yii::t('pub', 'Pub Suptext'),
            'pub_text' => Yii::t('pub', 'Pub Text'),
            'pub_subtext' => Yii::t('pub', 'Pub Subtext'),
            'created_at' => Yii::t('pub', 'Created At'),
            'update_at' => Yii::t('pub', 'Update At'),
            'status' => Yii::t('pub', 'Status'),
        ];
    }
}
