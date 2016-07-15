<?php

use yii\db\Migration;

class m160509_035326_pmi_report extends Migration
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
         $this->createTable('pmi_report', [
            'pmi_id' => $this->primaryKey(),
            'pmi_docnum' => $this->string(32)->notNull(),
            'approved_by' => $this->string(255),
            'verified_by' => $this->string(255), 
            'pmi_date' => $this->date()->notNull(),
            'address_id' => $this->integer(),
            'job_id' => $this->integer(),
            'employee_id' => $this->integer(),
            
        ]);
         
         $this->createTable('pmi_activity', [
            'id' => $this->primaryKey(),
            'pest_id' => $this->integer(),
            'activity_type' => $this->integer(),
            'count' => $this->integer(),
            'comments' => $this->text(), 
            'action' => $this->integer(),
            'area_id' => $this->integer(),
            'pmi_id' => $this->integer(),
        ]);
         
         $this->createTable('pest', [
             'pest_id' => $this->primaryKey(),
             'pest_name' => $this->string(64),
             'pest_description' => $this->text(),
         ]);
         
         
    }
    
    public function safedown()
    {
        $this->dropTable('{{%pmi_report}}');
        $this->dropTable('{{%pmi_activity}}');
        $this->dropTable('{{%pest}}');
    }
}