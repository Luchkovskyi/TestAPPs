<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $event_id
 * @property string $event_title
 * @property string $event_description
 * @property integer $event_start
 * @property integer $event_end
 * @property string $event_image
 * @property string $event_country
 * @property string $event_state
 * @property string $event_city
 * @property string $event_zip
 * @property string $event_place
 * @property string $event_address
 * @property string $event_help_link
 * @property integer $category_id
 * @property integer $event_status
 * @property integer $id_user_key
 *
 * @property EventCategories $category
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_title', 'event_description', 'event_start', 'event_end', 'event_image', 'event_country', 'event_state', 'event_city', 'event_zip', 'event_place', 'event_address', 'event_help_link', 'category_id', 'event_status', 'id_user_key'], 'required'],
            [['event_description'], 'string'],
            [['event_start', 'event_end', 'category_id', 'event_status', 'id_user_key'], 'integer'],
            [['event_title', 'event_image', 'event_city', 'event_place', 'event_address', 'event_help_link'], 'string', 'max' => 255],
            [['event_country'], 'string', 'max' => 2],
            [['event_state'], 'string', 'max' => 100],
            [['event_zip'], 'string', 'max' => 10],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventCategories::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'event_title' => 'Event Title',
            'event_description' => 'Event Description',
            'event_start' => 'Event Start',
            'event_end' => 'Event End',
            'event_image' => 'Event Image',
            'event_country' => 'Event Country',
            'event_state' => 'Event State',
            'event_city' => 'Event City',
            'event_zip' => 'Event Zip',
            'event_place' => 'Event Place',
            'event_address' => 'Event Address',
            'event_help_link' => 'Event Help Link',
            'category_id' => 'Category ID',
            'event_status' => 'Event Status',
            'id_user_key' => 'Id User Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(EventCategories::className(), ['category_id' => 'category_id']);
    }
}
