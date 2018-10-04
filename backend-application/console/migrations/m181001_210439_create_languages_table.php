<?php

use yii\db\Migration;

/**
 * Handles the creation of table `langauges`.
 */
class m181001_210439_create_languages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('languages', [
            'id' => $this->primaryKey(),
            'iso' => $this->string()->notNull(),
            'language' => $this->string(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'order' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createIndex('idx_languages_iso', 'languages', ['iso']);
        $this->createIndex('index_languages_available', 'languages', ['status']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('languages');
    }
}
