<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m230830_172745_create_comment_table extends Migration
{

    private const TABLE_NAME = 'comment';
    private const FIELD_COMMENT_ID = 'comment_id';
    private const FIELD_USER_ID = 'user_id';
    private const FIELD_YEET_ID = 'yeet_id';
    private const FIELD_CREATED_AT = 'created_at';
    private const FK_USER_COMMENT = 'fk_user_comment';
    private const FK_YEET_COMMENT = 'fk_yeet_comment';
    private const FOREIGN_TABLE_NAME_1 = 'user';
    private const FOREIGN_TABLE_NAME_2 = 'yeet';
    private const FOREIGN_FIELD_USER_ID = 'id';
    private const FOREIGN_FIELD_YEET_ID = 'yeet_id';

    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_COMMENT_ID => $this->primaryKey(),
                self::FIELD_USER_ID => $this->integer()->notNull(),
                self::FIELD_YEET_ID => $this->integer()->notNull(),
                self::FIELD_CREATED_AT => $this->timestamp()->notNull(),
            ]
        );

        $this->addForeignKey(
            self::FK_USER_COMMENT,
            self::TABLE_NAME,
            [self::FIELD_USER_ID],
            self::FOREIGN_TABLE_NAME_1,
            self::FOREIGN_FIELD_USER_ID,
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            self::FK_YEET_COMMENT,
            self::TABLE_NAME,
            [self::FIELD_YEET_ID],
            self::FOREIGN_TABLE_NAME_2,
            self::FOREIGN_FIELD_YEET_ID,
            'CASCADE',
            'CASCADE'
        );

        return true;
    }

    public function safeDown()
    {
        $this->dropForeignKey(self::FK_USER_COMMENT, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_YEET_COMMENT, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);

        return true;
    }
}

