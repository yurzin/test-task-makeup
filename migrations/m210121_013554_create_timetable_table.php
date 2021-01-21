<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%timetable}}`.
 */
class m210121_013554_create_timetable_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%timetable}}', [
            'id' => $this->primaryKey(),
            'resume_id' => $this->integer(100),
            'full_day' => $this->tinyInteger(),
            'shift_work' => $this->tinyInteger(),
            'flexible_work' => $this->tinyInteger(),
            'remote_work' => $this->tinyInteger(),
            'shift_method' => $this->tinyInteger(),
        ]);

        $this->createIndex(
            'idx-timetable-resume_id',
            'timetable',
            'id'
        );

        $this->addForeignKey(
            'fk-timetable-resume_id',
            'timetable',
            'resume_id',
            'resume',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%timetable}}');
    }
}
