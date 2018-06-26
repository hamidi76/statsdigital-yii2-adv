<?php

use yii\db\Migration;

/**
 * Class m180626_070223_insert_status
 */
class m180626_070223_insert_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = ['status_name', 'class', 'created_at','updated_at'];
        $this->batchInsert('{{%status}}', $columns, [
            ['Active','success',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Inactive','default',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Pending','warning',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Approved','primary',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Reject','danger',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180626_070223_insert_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_070223_insert_status cannot be reverted.\n";

        return false;
    }
    */
}
