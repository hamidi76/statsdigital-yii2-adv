<?php

use yii\db\Migration;

/**
 * Class m180625_085246_alter_memo
 */
class m180625_085246_alter_memo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('memo','status_id',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180625_085246_alter_memo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180625_085246_alter_memo cannot be reverted.\n";

        return false;
    }
    */
}
