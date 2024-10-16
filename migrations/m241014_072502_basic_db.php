<?php

use yii\db\Migration;

/**
 * Class m241014_072502_basic_db
 */
class m241014_072502_basic_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241014_072502_basic_db cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241014_072502_basic_db cannot be reverted.\n";

        return false;
    }
    */
}
