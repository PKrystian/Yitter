<?php

use yii\db\Migration;

/**
 * Class m230907_183426_improve_comment_table
 */
class m230907_183426_improve_comment_table extends Migration
{

    private const TABLE_NAME = 'comment';
    private const FIELD_COMMENT_ID = 'comment_id';
    private const FIELD_CREATED_AT = 'created_at';
    private const FIELD_COMMENTED_AT = 'commented_at';
    private const FIELD_CONTENT = 'content';
    private const FIELD_PARENT_COMMENT_ID = 'parent_comment_id';
    private const FK_COMMENT_PARENT_COMMENT_ID = 'fk_comment_parent_comment_id';

    public function safeUp()
    {
        $this->renameColumn(
            self::TABLE_NAME,
            self::FIELD_CREATED_AT,
            self::FIELD_COMMENTED_AT
        );

        $this->addColumn(
            self::TABLE_NAME,
            self::FIELD_CONTENT,
            $this->string()->defaultValue(null)
        );

        $this->addColumn(
            self::TABLE_NAME,
            self::FIELD_PARENT_COMMENT_ID,
            $this->integer()->defaultValue(null)
        );

        $this->addForeignKey(
            self::FK_COMMENT_PARENT_COMMENT_ID,
            self::TABLE_NAME,
            self::FIELD_PARENT_COMMENT_ID,
            self::TABLE_NAME,
            self::FIELD_COMMENT_ID,
            'CASCADE',
            'CASCADE'
        );

        return true;
    }

    public function safeDown()
    {
        $this->renameColumn(
            self::TABLE_NAME,
            self::FIELD_COMMENTED_AT,
            self::FIELD_CREATED_AT
        );

        $this->dropColumn(self::TABLE_NAME, self::FIELD_CONTENT);

        $this->dropColumn(self::TABLE_NAME, self::FIELD_PARENT_COMMENT_ID);

        $this->dropForeignKey(self::FK_COMMENT_PARENT_COMMENT_ID, self::TABLE_NAME);

        return true;
    }
}