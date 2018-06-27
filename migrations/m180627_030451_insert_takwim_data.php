<?php

use yii\db\Migration;

/**
 * Class m180627_030451_insert_takwim_data
 */
class m180627_030451_insert_takwim_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = ['tajuk', 'keterangan','start_date','end_date','created_at','updated_at'];
        $this->batchInsert('{{%takwim}}', $columns, [
            ['MBJ','Mesyuarat Bersama Jabatan',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Family Day','Hari keluarga BPM',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Team Building','Team Building BPM',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Jamuan BPM','Jamuan Makan Makan dan Makan',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180627_030451_insert_takwim_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180627_030451_insert_takwim_data cannot be reverted.\n";

        return false;
    }
    */
}
