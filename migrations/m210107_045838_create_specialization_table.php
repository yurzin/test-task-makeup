<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%specialization}}`.
 */
class m210107_045838_create_specialization_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%specialization}}',
            [
                'id' => $this->primaryKey(),
                'specialization' => $this->string(100)
            ]);

        $this->createIndex(
            'idx-specialization-resume_id',
            'specialization',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%specialization}}');
    }
}
