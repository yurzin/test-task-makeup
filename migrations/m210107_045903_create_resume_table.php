<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resume}}`.
 */
class m210107_045903_create_resume_table extends Migration
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
                'last_name' => $this->string(100),
                'patronymic' => $this->string(100),
                'birth_date' => $this->date(),
                'gender' => $this->tinyInteger(10),
                'city_id' => $this->integer(100),
                'email' => $this->string(100),
                'phone' => $this->string(100),
                'specialization_id' => $this->integer(100),
                'salary' => $this->integer(100),
                'employment' => $this->string(100),
                'schedule' => $this->string(100),
                'experience' => $this->string(100),
                'about' => $this->text()
            ]
        );

        $this->createIndex(
            'idx-resume-city_id',
            'resume',
            'city_id'
        );

        $this->addForeignKey(
            'fk-city-resume_id',
            'resume',
            'city_id',
            'city',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-resume-specialization_id',
            'resume',
            'specialization_id'
        );

        $this->addForeignKey(
            'fk-specialization-resume_id',
            'resume',
            'specialization_id',
            'specialization',
            'id',
            'CASCADE'
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
