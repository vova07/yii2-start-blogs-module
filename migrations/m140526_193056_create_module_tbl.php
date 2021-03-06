<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * CLass m140526_193056_create_module_tbl
 * @package vova07\blogs\migrations
 *
 * Create module tables.
 *
 * Will be created 1 table:
 * - `{{%blogs}}` - Blogs table.
 */
class m140526_193056_create_module_tbl extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
      $tableOptions = null;


        // MySql table options
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        }
        // Blogs table
        $this->createTable('{{%blogs}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(100) NOT NULL',
            'alias' => Schema::TYPE_STRING . '(100) NOT NULL',
            'snippet' => Schema::TYPE_TEXT . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'image_url' => Schema::TYPE_STRING . '(64) NOT NULL',
            'preview_url' => Schema::TYPE_STRING . '(64) NOT NULL',
            'views' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'status_id' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL'
        ], $tableOptions);

        // Indexes
        $this->createIndex('status_id', '{{%blogs}}', 'status_id');
        $this->createIndex('views', '{{%blogs}}', 'views');
        $this->createIndex('created_at', '{{%blogs}}', 'created_at');
        $this->createIndex('updated_at', '{{%blogs}}', 'updated_at');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%blogs}}');
    }
}
