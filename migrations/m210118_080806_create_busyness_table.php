<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employment}}`.
 */
class m210118_080806_create_busyness_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%busyness}}', [
            'id' => $this->primaryKey(),
            'resume_id' => $this->integer(100),
            'full_employment' => $this->tinyInteger(),
            'part-time_employment' => $this->tinyInteger(),
            'project_work' => $this->tinyInteger(),
            'internship' => $this->tinyInteger(),
            'volunteering' => $this->tinyInteger(),
        ]);

        $this->createIndex(
            'idx-busyness-resume_id',
            'employment',
            'id'
        );

        $this->addForeignKey(
            'fk-busyness-resume_id',
            'employment',
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
        $this->dropTable('{{%busyness}}');
    }
}
