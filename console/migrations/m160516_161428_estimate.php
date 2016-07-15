<?php

use yii\db\Migration;

class m160516_161428_estimate extends Migration
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
         $this->createTable('{{%estimate}}', [
            'id' => $this->primaryKey(),
            'doc_num' => $this->string(64)->notNull(),
            'summary' => $this->text(),
            'amount' => $this->decimal(10,2),
            'issue_date' => $this->date(),
            'followup_date' => $this->date(),
            'status_id' => $this->integer(),
            'substat_id' => $this->integer(),
            'treatment_id' => $this->integer(),
            'campaign_id' => $this->integer(),
            'customer_id' => $this->integer(),
            'address_id' => $this->integer(),
            'employee_id' => $this->integer(),
        ]);

         $this->createTable('{{%estimate_status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'description' => $this->text(),
            'color' => $this->string(16),
        ]);

         $this->createTable('{{%estimate_substat}}', [
             'id' => $this->primaryKey(),
             'name' => $this->string(64),
             'description' => $this->text(),
             'color' => $this->string(16),
         ]);

          $this->createTable('{{%advertising_campaign}}', [
             'id' => $this->primaryKey(),
             'name' => $this->string(64),
             'description' => $this->text(),
         ]);
    }

    public function safedown()
    {
        $this->dropTable('{{%estimate}}');
        $this->dropTable('{{%estimate_status}}');
        $this->dropTable('{{%estimate_substat}}');
        $this->dropTable('{{%advertising_campaign}}');
    }
}
