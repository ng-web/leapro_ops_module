<?php

use yii\db\Migration;

class m160427_164354_april_27 extends Migration
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
         $this->createTable('event', [
            'id' => $this->primaryKey(),
            'title' => $this->string(32)->notNull(),
            'customer_id' => $this->integer(),
            'description' => $this->text(), 
            'start_date' => $this->date()->notNull(),
            'start_time' => $this->time(),
            'end_date' => $this->date(),
            'end_time' => $this->time(),
            'recurring' => $this->integer(),
            'period' => $this->integer(),
            'type' => $this->integer(),
            'job_id' => $this->integer(),
            'employee_id' => $this->integer(),
            'fleet_id' => $this->integer(),
            'profile_id' => $this->integer(),
        ]);
         
         $this->createTable('fleet', [
            'id' => $this->primaryKey(),
            'make' => $this->string(64)->notNull(),
            'model' => $this->string(64)->notNull(),
            'vin' => $this->string(128),
            'license' => $this->string(32),
            'description' => $this->text(), 
            'year' => $this->date()->notNull(),
            'purchase_year' => $this->date(),
            'starting_miles' => $this->integer(),
        ]);      
    }
    
    public function safedown()
    {
        $this->dropTable('{{%event}}');
        $this->dropTable('{{%fleet}}');
    }
}