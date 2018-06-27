<?php

use yii\db\Migration;

/**
 * Class m180627_030259_insert_takwim_data_amzari
 */
class m180627_030259_insert_takwim_data_amzari extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = ['tajuk', 'keterangan','start_date','end_date','created_at','updated_at'];
        $this->batchInsert('{{%takwim}}', $columns, [
            ['World Cup 2018 - Game 1','Arg vs Mex',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['World Cup 2018 - Game 2','Mal vs Brazil',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['World Cup 2018 - Game 3','Arab vs Portugal',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
            ['World Cup 2018 - Game 4','Separuh Akhir',gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s'),gmdate('Y-m-d H:i:s')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180627_030259_insert_takwim_data_amzari cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180627_030259_insert_takwim_data_amzari cannot be reverted.\n";

        return false;
    }
    */
}
