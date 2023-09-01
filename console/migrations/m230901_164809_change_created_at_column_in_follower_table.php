<?php

use yii\db\Migration;

/**
 * Class m230901_164809_change_created_at_column_in_follower_table
 */
class m230901_164809_change_created_at_column_in_follower_table extends Migration
{

    private const TABLE_NAME = 'follower';
    private const FIELD_CREATED_AT = 'created_at';
    private const FIELD_FOLLOWED_AT = 'followed_at';

    public function safeUp()
    {
        $this->renameColumn(
            self::TABLE_NAME,
            self::FIELD_CREATED_AT,
            self::FIELD_FOLLOWED_AT
        );

        return true;
    }

    public function safeDown()
    {
        $this->renameColumn(
            self::TABLE_NAME,
            self::FIELD_FOLLOWED_AT,
            self::FIELD_CREATED_AT
        );

        return true;
    }
}