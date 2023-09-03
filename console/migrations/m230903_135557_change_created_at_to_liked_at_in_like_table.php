<?php

use yii\db\Migration;

/**
 * Class m230903_135557_change_created_at_to_liked_at_in_like_table
 */
class m230903_135557_change_created_at_to_liked_at_in_like_table extends Migration
{

    private const TABLE_NAME = 'like';
    private const FIELD_CREATED_AT = 'created_at';
    private const FIELD_LIKED_AT = 'liked_at';

    public function safeUp()
    {
        $this->renameColumn(
            self::TABLE_NAME,
            self::FIELD_CREATED_AT,
            self::FIELD_LIKED_AT
        );

        return true;
    }

    public function safeDown()
    {
        $this->renameColumn(
            self::TABLE_NAME,
            self::FIELD_LIKED_AT,
            self::FIELD_CREATED_AT
        );

        return true;
    }
}