<?php

use yii\db\Migration;

class m160510_232751_info_tables extends Migration
{
    /*
    public function up()
    {

    }

    public function down()
    {
        echo "m160330_194034_bsr_master cannot be reverted.\n";

        return false;
    }

    */
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
         $this->createTable('treatment', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'brand' => $this->string(64),
            'ingredient' => $this->string(64), 
            'dilution' => $this->string(64), 
            'application' => $this->string(64), 
            'cost' => $this->decimal(10,2),
            'description' => $this->text(),
        ]);
         
         $this->createTable('inspection_codes', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'priority' => $this->string(30),
            'description' => $this->text(),
        ]);
         
         $this->createTable('jnd', [
             'id' => $this->primaryKey(),
             'name' => $this->string(64),
             'description' => $this->text(),
         ]);
         
          $this->createTable('contact_link', [
             'contact_id' => $this->integer(),
             'address_id' => $this->integer(),
         ]);
    }
    
    public function safedown()
    {
        $this->dropTable('{{%treatment}}');
        $this->dropTable('{{%inspection_codes}}');
        $this->dropTable('{{%jnd}}');
        $this->dropTable('{{%contact_link}}');
    }
}