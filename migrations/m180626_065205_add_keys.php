<?php

use yii\db\Migration;

/**
 * Class m180626_065205_add_keys
 */
class m180626_065205_add_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex("status_id_idx", "memo", "status_id");

        $this->addForeignKey("status_id_fk", "memo", "status_id",
            "status", "status_id", "cascade", "cascade");


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180626_065205_add_keys cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_065205_add_keys cannot be reverted.\n";

        return false;
    }
    */
}
