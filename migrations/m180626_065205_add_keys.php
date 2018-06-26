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
            "status", "id", "cascade", "cascade");


        $columns = ['name','memo', 'memo_owner','status_id', 'created_at','updated_at'];
        $this->batchInsert('{{%memo}}', $columns, [
            ['Summer Memo','Start of Summer Memo Event',1, 1,date('Y-m-d '),date('Y-m-d '), gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Spring Memo','Start of Spring Memo Event',1, 1,date('Y-m-d '),date('Y-m-d '),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Winter Memo','Start of Winter Memo Event',1, 1,date('Y-m-d '),date('Y-m-d '),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Autumn Memo','Start of Autumn Memo Event',1, 1,date('Y-m-d '),date('Y-m-d '),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
        ]);

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
