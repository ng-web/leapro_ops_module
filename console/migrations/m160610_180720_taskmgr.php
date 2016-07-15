<?php

use yii\db\Migration;

class m160610_180720_taskmgr extends Migration
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
         $this->createTable('{{%task}}', [
            'task_id' => $this->primaryKey(),
            'task_name' => $this->string(128)->notNull(),
            'task_desc' => $this->text(),
            'task_completed' => $this->boolean(),
            'project_id' => $this->integer(),
            'task_due_date' => $this->dateTime(),
            'task_created_date' => $this->dateTime(),
            'task_updated_date' => $this->dateTime(),
            
        ]);

         $this->createTable('{{%project}}', [
            'project_id' => $this->primaryKey(),
            'project_name' => $this->string(128),
            'project_desc' => $this->text(),
            'project_completed' => $this->boolean(),
            'project_due_date' => $this->dateTime(),
            'project_created_date' => $this->dateTime(),
            'project_updated_date' => $this->dateTime(),
        ]);
         
          // creates index for column `author_id`
        $this->createIndex(
            'idx-task-project_id',
            'task',
            'project_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-task-post_id',
            'task',
            'project_id',
            'project',
            'project_id',
            'CASCADE'
        );
         
         
    }

    public function safedown()
    {
        $this->dropForeignKey('fk-task-post_id', 'task');
        $this->dropTable('{{%task}}');
        $this->dropTable('{{%project}}');
       
    }
}