<?php

use yii\db\Schema;
use yii\db\Migration;

class m150727_201857_new_download_url_on_platform_table extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `platform`
            ADD `download_url_pattern` varchar(2083) COLLATE 'utf8_general_ci' NOT NULL;
        ");
    }

    public function down()
    {
        echo "m150727_201857_new_download_url_on_platform_table cannot be reverted.\n";

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
