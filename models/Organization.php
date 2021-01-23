<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property int|null $resume_id
 * @property string|null $name
 * @property string|null $start_month
 * @property int|null $start_year
 * @property string|null $end_month
 * @property int|null $end_year
 * @property string|null $position
 * @property string|null $duties
 *
 * @property Resume $resume
 */
class Organization extends \yii\db\ActiveRecord
{
    public $experience;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resume_id', 'start_year', 'end_year', 'experience'], 'integer'],
            [['duties'], 'string'],
            [['name', 'start_month', 'end_month', 'position'], 'string', 'max' => 100],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::class, 'targetAttribute' => ['resume_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resume_id' => 'Resume ID',
            'name' => 'Name',
            'start_month' => 'Start Month',
            'start_year' => 'Start Year',
            'end_month' => 'End Month',
            'end_year' => 'End Year',
            'position' => 'Position',
            'duties' => 'Duties',
        ];
    }

    /**
     * Gets query for [[Resume]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResume()
    {
        return $this->hasOne(Resume::class, ['id' => 'resume_id']);
    }
}