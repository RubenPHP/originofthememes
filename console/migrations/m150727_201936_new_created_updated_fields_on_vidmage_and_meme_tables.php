<?php

use yii\db\Schema;
use yii\db\Migration;

class m150727_201936_new_created_updated_fields_on_vidmage_and_meme_tables extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `vidmage`
            ADD `created_by` int(11) NULL,
            ADD `updated_by` int(11) NULL AFTER `created_by`,
            ADD `created_at` int unsigned NOT NULL AFTER `updated_by`,
            ADD `updated_at` int unsigned NOT NULL AFTER `created_at`,
            ADD FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL,
            ADD FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL;
        ");

        $this->execute("ALTER TABLE `meme`
            ADD `created_by` int(11) NULL,
            ADD `updated_by` int(11) NULL AFTER `created_by`,
            ADD `created_at` int unsigned NOT NULL AFTER `updated_by`,
            ADD `updated_at` int unsigned NOT NULL AFTER `created_at`,
            ADD FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL,
            ADD FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL;
        ");
    }

    public function down()
    {
        echo "m150727_201936_new_created_updated_fields_on_vidmage_and_meme_tables cannot be reverted.\n";

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
