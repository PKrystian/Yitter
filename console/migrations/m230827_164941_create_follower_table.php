<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%follower}}`.
 */
class m230827_164941_create_follower_table extends Migration
{

    private const TABLE_NAME = 'follower';
    private const FIELD_FOLLOWER_ID = 'follower_id';
    private const FIELD_USER_ID = 'user_id';
    private const FIELD_FOLLOWER_USER_ID = 'follower_user_id';
    private const FIELD_CREATED_AT = 'created_at';
    private const FK_FOLLOWER_USER = 'fk_follower_user';
    private const FK_FOLLOWER_USER_FOLLOWER = 'fk_follower_user_follower';
    private const FOREIGN_TABLE_NAME = 'user';
    private const FOREIGN_FIELD_USER_ID = 'id';

    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_FOLLOWER_ID => $this->primaryKey(),
                self::FIELD_USER_ID => $this->integer()->notNull(),
                self::FIELD_FOLLOWER_USER_ID => $this->integer()->notNull(),
                self::FIELD_CREATED_AT => $this->timestamp()->notNull(),
            ]
        );

        $this->addForeignKey(
            self::FK_FOLLOWER_USER,
            self::TABLE_NAME,
            [self::FIELD_USER_ID],
            self::FOREIGN_TABLE_NAME,
            self::FOREIGN_FIELD_USER_ID,
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            self::FK_FOLLOWER_USER_FOLLOWER,
            self::TABLE_NAME,
            [self::FIELD_FOLLOWER_USER_ID],
            self::FOREIGN_TABLE_NAME,
            self::FOREIGN_FIELD_USER_ID,
            'CASCADE',
            'CASCADE'
        );

        return true;
    }

    public function safeDown()
    {
        $this->dropForeignKey(self::FK_FOLLOWER_USER, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);

        return true;
    }
}
