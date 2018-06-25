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
