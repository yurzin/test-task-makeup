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
                'date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
                'name' => $this->string(100),
                'lastName' => $this->string(100),
                'patronymic' => $this->string(100),
                'dateBirth' => $this->date(),
                'gender' => $this->string(100),
                'city' => $this->string(100),
                'email' => $this->string(100),
                'phone' => $this->string(100),
                'specialization' => $this->string(100),
                'salary' => $this->integer(100),
                'employment' => $this->string(),
                'schedule' => $this->string(),
                'experience' => $this->string(100),
                'lastWork' => $this->string(100),
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
