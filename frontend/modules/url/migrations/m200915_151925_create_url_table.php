<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%url}}`.
 */
class m200915_151925_create_url_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%url}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(),
            'title' => $this->string(),
            'keyword' => $this->string(),
            'param' => $this->integer(),
            'route' => $this->string(),
            'description' => $this->string(),
            'status' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%url}}');
    }
}
