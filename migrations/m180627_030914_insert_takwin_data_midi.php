<?php

use yii\db\Migration;

/**
 * Class m180627_030914_insert_takwin_data_midi
 */
class m180627_030914_insert_takwin_data_midi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = ['tajuk', 'keterangan','start_date','end_date','created_at','updated_at'];
        $this->batchInsert('{{%takwim}}', $columns, [
            ['Nasi Ayam','Nasi Ayam Royal',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Nasi Ayam','Nasi Ayam Madu',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Roti Canai','Roti Bawang',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Roti Canai','Roti Sardin',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Roti Canai','Roti Telor',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180627_030914_insert_takwin_data_midi cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180627_030914_insert_takwin_data_midi cannot be reverted.\n";

        return false;
    }
    */
}
