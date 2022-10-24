<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property int $postId
 * @property string|null $title
 * @property string|null $text
 * @property int $userId
 * @property string|null $createdAt
 * @property string|null $updatedAt
 *
 * @property BaseUser $user
 */
class BasePost extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['text'], 'string'],
            [['userId'], 'required'],
            [['userId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => BaseUser::class, 'targetAttribute' => ['userId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'postId' => 'Post ID',
            'title' => 'Title',
            'text' => 'Text',
            'userId' => 'User ID',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(BaseUser::class, ['userId' => 'userId']);
    }
}
