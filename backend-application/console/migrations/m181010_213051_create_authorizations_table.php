<?php

use yii\db\Migration;

/**
 * Handles the creation of table `authorizations`.
 */
class m181010_213051_create_authorizations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('authorizations', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->unsigned(),
            'token' => $this->string(),
            'expired_at' => $this->dateTime(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createIndex('idx_authorizations_user', 'authorizations', 'user_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('authorizations');
    }
}
