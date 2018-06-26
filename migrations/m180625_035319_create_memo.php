<?php

use yii\db\Migration;

/**
 * Class m180625_035319_create_memo
 */
class m180625_035319_create_memo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("memo", [
            "id" => $this->primaryKey(),
            "name" => $this->string(),
            "memo" => $this->text(),
            "memo_owner" => $this->integer(),
            "created_at" => $this->timestamp()->null(),
            "updated_at" => $this->timestamp()->null()
        ]);

        $this->createIndex("memo_owner_idx", "memo", "memo_owner");

        $this->addForeignKey("memo_owner_fk", "memo", "memo_owner",
            "user", "id", "cascade", "cascade");

        $columns = ['name','memo', 'memo_owner','status_id', 'created_at','updated_at'];
        $this->batchInsert('{{%memo}}', $columns, [
            ['Monday Memo','Training Memo Day 1',1, 1,date('Y-m-d '),date('Y-m-d '), gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Tuesday Memo','Training Memo Day 2',1, 1,date('Y-m-d '),date('Y-m-d '),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Wednesday Memo','Training Memo Day 3',1, 1,date('Y-m-d '),date('Y-m-d '),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Thursday Memo','My Memo',1, 1,date('Y-m-d '),date('Y-m-d '),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180625_035319_create_memo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180625_035319_create_memo cannot be reverted.\n";

        return false;
    }
    */
}
