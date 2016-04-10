<?php

use yii\db\Migration;

class m160409_150351_news extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->string(),
            'date' => $this->date(),
            'theme_id' => $this->integer(),
            'preview'=> $this->string(256),
            'captiopn' => $this->string(),
            'text' => $this->text(),
            //'password_hash' => $this->string()->notNull(),
            //'password_reset_token' => $this->string()->unique(),
            //'email' => $this->string()->notNull()->unique(),

            //'status' => $this->smallInteger()->notNull()->defaultValue(10),
            //'created_at' => $this->integer()->notNull(),
            //'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%news}}');

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
