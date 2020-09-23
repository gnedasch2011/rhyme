<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%url}}`.
 */
class m200915_151922_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'template' => $this->string(),
            'body' => $this->text(),
            'status' => $this->boolean()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page}}');
    }
}
