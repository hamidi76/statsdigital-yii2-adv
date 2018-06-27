<?php

use yii\db\Migration;

/**
 * Class m180627_025804_insert_takwim_data_faiz
 */
class m180627_025804_insert_takwim_data_faiz extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = ['tajuk', 'keterangan','start_date','end_date','created_at','updated_at'];
        $this->batchInsert('{{%takwim}}', $columns, [
            ['Raya Aidilfitri','Raya Aidilfitri',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Raya Korban','Raya Korban',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Deepavali','Deepavali',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['Raya Cina','Raya Cina',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180627_025804_insert_takwim_data_faiz cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180627_025804_insert_takwim_data_faiz cannot be reverted.\n";

        return false;
    }
    */
}
