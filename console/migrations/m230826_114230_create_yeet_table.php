<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%yeet}}`.
 */
class m230826_114230_create_yeet_table extends Migration
{
    private const TABLE_NAME = 'yeet';
    private const FIELD_YEET_ID = 'yeet_id';
    private const FIELD_USER_ID = 'user_id';
    private const FIELD_CONTENT = 'content';
    private const FIELD_CREATED_AT = 'created_at';
    private const FK_USER = 'fk_user';
    private const FOREIGN_TABLE_NAME = 'user';
    private const FOREIGN_FIELD_USER_ID = 'id';

    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_YEET_ID => $this
                    ->primaryKey(),
                self::FIELD_USER_ID => $this
                    ->integer()
                    ->notNull(),
                self::FIELD_CONTENT => $this
                    ->string()
                    ->notNull(),
                self::FIELD_CREATED_AT => $this
                    ->timestamp()
                    ->notNull(),
            ]
        );

        $this->addForeignKey(
            self::FK_USER,
            self::TABLE_NAME,
            self::FIELD_USER_ID,
            self::FOREIGN_TABLE_NAME,
            self::FOREIGN_FIELD_USER_ID,
            'CASCADE',
            'CASCADE'
        );

        return true;
    }

    public function safeDown()
    {
        $this->dropForeignKey(self::FK_USER, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);

        return true;
    }
}
