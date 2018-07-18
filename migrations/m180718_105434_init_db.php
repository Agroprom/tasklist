<?php

use yii\db\Migration;

/**
 * Class m180718_105434_init_db
 */
class m180718_105434_init_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%task}}', [                                  
            'id' =>$this->primaryKey(),
            'uuid' =>$this->string(36)->notNull(),
            'name' => $this->string(56)->notNull(),
            'priority' => $this->smallInteger()->notNull(),    
            'status' => $this->boolean()
            
        ], $tableOptions);
        
        $this->createTable('{{%tag}}', [            
            'id' => $this->integer()->unsigned(),
            'id' => $this->primaryKey(),
            'name' => $this->string(56)->notNull()->unique(), 
            'frequency' => $this->integer(),
        ], $tableOptions);
        
        $this->createTable('{{%task_tag}}', [            
            'task_id' => $this->string(36)->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ], $tableOptions);
    }
/**
 * {@inheritdoc}
 */
    public function down()
    {
        $this->dropTable('{{%task}}');
        $this->dropTable('{{%tag}}');
        $this->dropTable('{{%task_tag}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_105434_init_db cannot be reverted.\n";

        return false;
    }
    */
}
