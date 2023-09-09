<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hashtag}}`.
 */
class m230908_175817_create_hashtag_table extends Migration
{

    private const TABLE_NAME = 'hashtag';
    private const FIELD_HASHTAG_ID = 'hashtag_id';
    private const FIELD_TAG = 'tag';
    private const FIELD_CREATED_AT = 'created_at';

    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_HASHTAG_ID => $this->primaryKey(),
                self::FIELD_TAG => $this->string()->unique()->notNull(),
                self::FIELD_CREATED_AT => $this->timestamp()->notNull(),
            ]
        );

        return true;
    }

    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);

        return true;
    }
}
