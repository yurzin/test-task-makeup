<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%filter}}`.
 */
class m201231_001527_create_resume_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%resume}}',
            [
                'id' => $this->primaryKey(),
                'photo' => $this->string(100),
                'date' => $this->timestamp(),
                'name' => $this->string(100),
                'lastName' => $this->string(100),
                'patronymic' => $this->string(100),
                'city' => $this->string(100),
                'specialization' => $this->string(100),
                'phone' => $this->string(100),
                'email' => $this->string(100),
                'experience' => $this->string(100),
                'salary' => $this->integer(100),
                'lastWork' => $this->string(100),
                'age' => $this->integer(10),
                'gender' => $this->string(100),
                'date_birth' => $this->date(),
                'employment' => $this->string(),
                'schedule' => $this->string(),
                'about' => $this->string()
            ]
        );
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%resume}}');
    }
}
