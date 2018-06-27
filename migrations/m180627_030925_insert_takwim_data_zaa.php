<?php

use yii\db\Migration;

/**
 * Class m180627_030925_insert_takwim_data_zaa
 */
class m180627_030925_insert_takwim_data_zaa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = ['tajuk', 'keterangan','start_date','end_date','created_at','updated_at'];
        $this->batchInsert('{{%takwim}}', $columns, [
            ['Syura Pagi','Semua Sektor',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Mesyuarat Pengurusan','Semua Bahagian',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Mesyuarat JTP','Semua Unit Aplikasi 2',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Mesyuarat JPP ','Ketua Unit BPM',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180627_030925_insert_takwim_data_zaa cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180627_030925_insert_takwim_data_zaa cannot be reverted.\n";

        return false;
    }
    */
}
