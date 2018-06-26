<?php

use yii\db\Migration;

/**
 * Class m180626_075630_meeting_memo
 */
class m180626_075630_meeting_memo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = ['name', 'memo','memo_owner','status_id','created_at','updated_at'];
        $this->batchInsert('{{%memo}}', $columns, [
            ['Meeting Memo 1','Technical Meeting 1/2018',1, 1,gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Meeting Memo 2','PIT Meeting 1/2018',1, 1,gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Meeting Memo 3','SC Meeting 2/2018',1, 1,gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Meeting Memo 4','Progress Meeting 1/2018',1, 1,gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180626_075630_meeting_memo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_075630_meeting_memo cannot be reverted.\n";

        return false;
    }
    */
}
