<?php

use yii\db\Migration;

/**
 * Class m230831_170940_edit_yeet_table
 */
class m230831_170940_edit_yeet_table extends Migration
{
    private const TABLE_NAME = 'yeet';
    private const FIELD_YEET_ID = 'yeet_id';
    private const FIELD_CONTENT = 'content';
    private const FIELD_MEDIA_ATTACHMENTS = 'media_attachments';
    private const FIELD_IS_REYEET = 'is_reyeet';
    private const FIELD_ORGINAL_YEET_ID = 'orginal_yeet_id';
    private const FK_USER = 'fk_yeet_orginal';

    public function safeUp()
    {
        $this->addColumn(
            self::TABLE_NAME,
            self::FIELD_MEDIA_ATTACHMENTS,
            $this->json()->defaultValue(null)->after(self::FIELD_CONTENT)
        );
        $this->addColumn(
            self::TABLE_NAME,
            self::FIELD_IS_REYEET,
            $this->boolean()->defaultValue(false)->after(self::FIELD_MEDIA_ATTACHMENTS)
        );
        $this->addColumn(
            self::TABLE_NAME,
            self::FIELD_ORGINAL_YEET_ID,
            $this->integer()->defaultValue(null)->after(self::FIELD_IS_REYEET)
        );
        $this->addForeignKey(
            self::FK_USER,
            self::TABLE_NAME,
            self::FIELD_ORGINAL_YEET_ID,
            self::TABLE_NAME,
            self::FIELD_YEET_ID,
            null,
            null
        );

        return true;
    }

    public function safeDown()
    {
        $this->dropColumn(
            self::TABLE_NAME,
            self::FIELD_MEDIA_ATTACHMENTS
        );
        $this->dropColumn(
            self::TABLE_NAME,
            self::FIELD_IS_REYEET
        );
        $this->dropColumn(
            self::TABLE_NAME,
            self::FIELD_ORGINAL_YEET_ID
        );
        $this->dropForeignKey(
            self::FK_USER,
            self::TABLE_NAME
        );
        
        return true;
    }
}
