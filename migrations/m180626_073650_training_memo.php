<?php

use yii\db\Migration;

/**
 * Class m180626_073650_training_memo
 */
class m180626_073650_training_memo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = ['name', 'memo','memo_owner','status_id','created_at','updated_at'];
        $this->batchInsert('{{%memo}}', $columns, [
            ['Monday Memo','Training Memo Day 1',1, 1,gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Tuesday Memo','Training Memo Day 2',1, 1,gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Wednesday Memo','Training Memo Day 3',1, 1,gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Thursday Memo','My Memo',1, 1,gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180626_073650_training_memo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_073650_training_memo cannot be reverted.\n";

        return false;
    }
    */
}
