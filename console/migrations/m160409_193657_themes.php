<?php

use yii\db\Migration;

class m160409_193657_themes extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%themes}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->string(),
            'date' => $this->date(),
            'name' => $this->string(),
        ], $tableOptions);

    }

    public function down()
    {
        //echo "m160409_193657_themes cannot be reverted.\n";
        $this->dropTable('{{%themes}}');
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
