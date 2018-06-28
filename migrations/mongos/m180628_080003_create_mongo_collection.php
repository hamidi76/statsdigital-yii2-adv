<?php


/**
 * Class m180628_080003_create_mongo_collection
 */
class m180628_080003_create_mongo_collection extends \yii\mongodb\Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createCollection("memo");
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m180628_080003_create_mongo_collection cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180628_080003_create_mongo_collection cannot be reverted.\n";

        return false;
    }
    */
}
