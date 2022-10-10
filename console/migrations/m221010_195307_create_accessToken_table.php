<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%accessToken}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m221010_195307_create_accessToken_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%accessToken}}', [
            'tokenId' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'accessToken' => $this->string(255),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ]);

        // creates index for column `userId`
        $this->createIndex(
            '{{%idx-accessToken-userId}}',
            '{{%accessToken}}',
            'userId'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-accessToken-userId}}',
            '{{%accessToken}}',
            'userId',
            '{{%user}}',
            'userId',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-accessToken-userId}}',
            '{{%accessToken}}'
        );

        // drops index for column `userId`
        $this->dropIndex(
            '{{%idx-accessToken-userId}}',
            '{{%accessToken}}'
        );

        $this->dropTable('{{%accessToken}}');
    }
}
