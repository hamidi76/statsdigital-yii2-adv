<?php

use yii\db\Migration;

/**
 * Class m180625_083545_create_document_pdf
 */
class m180625_083545_create_document_pdf extends Migration
{
    public function safeUp()
    {$this->createTable("document", [
        "id" => $this->primaryKey(),
        "name" => $this->string(),
        "path" => $this->text()->notNull(),
        "status_id" => $this->integer(),
        "created_at" => $this->timestamp()->null(),
        "updated_at" => $this->timestamp()->null()
    ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180625_083545_create_document_pdf cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180625_083545_create_document_pdf cannot be reverted.\n";

        return false;
    }
    */
}
