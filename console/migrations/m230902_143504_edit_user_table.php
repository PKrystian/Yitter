<?php

use yii\db\Migration;

/**
 * Class m230902_143504_edit_user_table
 */
class m230902_143504_edit_user_table extends Migration
{
    private const TABLE_NAME = 'user';
    private const FIELD_PROFILE_IMAGE = 'profile_image';
    private const FIELD_BIO = 'bio';
    private const FIELD_LOCATION = 'location';
    private const FIELD_WEBSITE = 'website';

    public function safeUp()
    {
        $this->addColumn(
            self::TABLE_NAME,
            self::FIELD_PROFILE_IMAGE,
            $this->string()->defaultValue(null)
        );
        $this->addColumn(
            self::TABLE_NAME,
            self::FIELD_BIO,
            $this->string()->defaultValue(null)
        );
        $this->addColumn(
            self::TABLE_NAME,
            self::FIELD_LOCATION,
            $this->string()->defaultValue(null)
        );
        $this->addColumn(
            self::TABLE_NAME,
            self::FIELD_WEBSITE,
            $this->string()->defaultValue(null)
        );

        return true;
    }

    public function safeDown()
    {
        $this->dropColumn(
            self::TABLE_NAME,
            self::FIELD_PROFILE_IMAGE
        );
        $this->dropColumn(
            self::TABLE_NAME,
            self::FIELD_BIO
        );
        $this->dropColumn(
            self::TABLE_NAME,
            self::FIELD_LOCATION
        );
        $this->dropColumn(
            self::TABLE_NAME,
            self::FIELD_WEBSITE
        );
        
        return true;
    }
}
