<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%yeethashtag}}`.
 */
class m230909_075922_create_yeethashtag_table extends Migration
{

    private const TABLE_NAME = 'yeet_hashtag';
    private const FIELD_YEET_HASHTAG_ID = 'yeet_hashtag_id';
    private const FIELD_YEET_ID = 'yeet_id';
    private const FIELD_HASHTAG_ID = 'hashtag_id';
    private const FIELD_USED_AT = 'used_at';
    private const FK_YEET_YEET_HASHTAG = 'fk_yeet_yeet_hashtag';
    private const FK_HASHTAG_YEET_HASHTAG = 'fk_hashtag_yeet_hashtag';
    private const FOREIGN_TABLE_NAME_1 = 'yeet';
    private const FOREIGN_TABLE_NAME_2 = 'hashtag';
    private const FOREIGN_FIELD_YEET_ID = 'yeet_id';
    private const FOREIGN_FIELD_HASHTAG_ID = 'hashtag_id';

    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_YEET_HASHTAG_ID => $this->primaryKey(),
                self::FIELD_YEET_ID => $this->integer()->notNull(),
                self::FIELD_HASHTAG_ID => $this->integer()->notNull(),
                self::FIELD_USED_AT => $this->timestamp()->notNull(),
            ]
        );

        $this->addForeignKey(
            self::FK_YEET_YEET_HASHTAG,
            self::TABLE_NAME,
            [self::FIELD_YEET_ID],
            self::FOREIGN_TABLE_NAME_1,
            self::FOREIGN_FIELD_YEET_ID,
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            self::FK_HASHTAG_YEET_HASHTAG,
            self::TABLE_NAME,
            [self::FIELD_HASHTAG_ID],
            self::FOREIGN_TABLE_NAME_2,
            self::FOREIGN_FIELD_HASHTAG_ID,
            'CASCADE',
            'CASCADE'
        );

        return true;
    }

    public function safeDown()
    {
        $this->dropForeignKey(self::FK_YEET_YEET_HASHTAG, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_HASHTAG_YEET_HASHTAG, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);

        return true;
    }
}

