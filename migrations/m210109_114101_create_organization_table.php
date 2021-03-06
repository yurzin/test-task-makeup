<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%organization}}`.
 */
class m210109_114101_create_organization_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%organization}}', [
            'id' => $this->primaryKey(),
            'resume_id' => $this->integer(100),
            'organization' =>  $this->string(100),
            'start_month' =>  $this->string(100),
            'start_year' =>  $this->integer(100),
            'end_month' =>  $this->string(100),
            'end_year' =>  $this->integer(100),
            'position' =>  $this->string(100),
            'duties' =>  $this->text()
        ]);

        $this->createIndex(
            'idx-organization-resume_id',
            'organization',
            'id'
        );

        $this->addForeignKey(
            'fk-organization-resume_id',
            'organization',
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
        $this->dropTable('{{%organization}}');
    }
}
