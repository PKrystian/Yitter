<?php

use yii\db\Migration;

/**
 * Class m230906_155319_change_tablename_in_reyeet_table
 */
class m230906_155319_change_tablename_in_reyeet_table extends Migration
{

    private const TABLE_NAME = 'reyeet';
    private const FIELD_CREATED_AT = 'created_at';
    private const FIELD_REYEETED_AT = 'reyeeted_at';

    public function safeUp()
    {
        $this->renameColumn(
            self::TABLE_NAME,
            self::FIELD_CREATED_AT,
            self::FIELD_REYEETED_AT
        );

        return true;
    }

    public function safeDown()
    {
        $this->renameColumn(
            self::TABLE_NAME,
            self::FIELD_REYEETED_AT,
            self::FIELD_CREATED_AT
        );

        return true;
    }
}