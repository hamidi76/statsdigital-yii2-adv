<?php

use yii\db\Migration;

/**
 * Class m180625_083302_status
 */
class m180625_083302_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("status", [
            "status_id" => $this->primaryKey(),
            "status_name" => $this->string(),
            "class" => $this->string(),
            "created_at" => $this->timestamp()->null(),
            "updated_at" => $this->timestamp()->null()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180625_083302_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180625_083302_status cannot be reverted.\n";

        return false;
    }
    */
}
