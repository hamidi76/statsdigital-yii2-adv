<?php

use yii\db\Migration;

/**
 * Class m180627_023828_takwim
 */
class m180627_023828_takwim extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("takwim", [
            "id" => $this->primaryKey(),
            "tajuk" => $this->string(),
            "keterangan" => $this->string(),
            "start_date" => $this->timestamp()->null(),
            "end_date" => $this->timestamp()->null(),
            "created_at" => $this->timestamp()->null(),
            "updated_at" => $this->timestamp()->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180627_023828_takwim cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180627_023828_takwim cannot be reverted.\n";

        return false;
    }
    */
}
