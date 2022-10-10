<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m221010_195344_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'postId' => $this->primaryKey(),
            'title' => $this->string(255),
            'text' => $this->text(),
            'userId' => $this->integer()->notNull(),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ]);

        // creates index for column `userId`
        $this->createIndex(
            '{{%idx-post-userId}}',
            '{{%post}}',
            'userId'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-post-userId}}',
            '{{%post}}',
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
            '{{%fk-post-userId}}',
            '{{%post}}'
        );

        // drops index for column `userId`
        $this->dropIndex(
            '{{%idx-post-userId}}',
            '{{%post}}'
        );

        $this->dropTable('{{%post}}');
    }
}
