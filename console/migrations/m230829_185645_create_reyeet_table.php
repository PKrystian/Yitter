<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reyeet}}`.
 */
class m230829_185645_create_reyeet_table extends Migration
{

    private const TABLE_NAME = 'reyeet';
    private const FIELD_REYEET_ID = 'reyeet_id';
    private const FIELD_USER_ID = 'user_id';
    private const FIELD_YEET_ID = 'yeet_id';
    private const FIELD_CREATED_AT = 'created_at';
    private const FK_USER_REYEET = 'fk_user_reyeet';
    private const FK_YEET_REYEET = 'fk_yeet_reyeet';
    private const FOREIGN_TABLE_NAME_1 = 'user';
    private const FOREIGN_TABLE_NAME_2 = 'yeet';
    private const FOREIGN_FIELD_USER_ID = 'id';
    private const FOREIGN_FIELD_YEET_ID = 'yeet_id';

    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_REYEET_ID => $this->primaryKey(),
                self::FIELD_USER_ID => $this->integer()->notNull(),
                self::FIELD_YEET_ID => $this->integer()->notNull(),
                self::FIELD_CREATED_AT => $this->timestamp()->notNull(),
            ]
        );

        $this->addForeignKey(
            self::FK_USER_REYEET,
            self::TABLE_NAME,
            [self::FIELD_USER_ID],
            self::FOREIGN_TABLE_NAME_1,
            self::FOREIGN_FIELD_USER_ID,
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            self::FK_YEET_REYEET,
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
        $this->dropForeignKey(self::FK_USER_REYEET, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_YEET_REYEET, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);

        return true;
    }
}

