<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $userId
 * @property string|null $name
 * @property string|null $middleName
 * @property string|null $surname
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $createdAt
 * @property string|null $updatedAt
 *
 * @property Accesstoken[] $accesstokens
 * @property Post[] $posts
 */
class BaseUser extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['createdAt', 'updatedAt'], 'safe'],
            [['name', 'middleName', 'surname', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'userId' => 'User ID',
            'name' => 'Name',
            'middleName' => 'Middle Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'phone' => 'Phone',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Accesstokens]].
     *
     * @return ActiveQuery
     */
    public function getAccesstokens(): ActiveQuery
    {
        return $this->hasMany(Accesstoken::class, ['userId' => 'userId']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return ActiveQuery
     */
    public function getPosts(): ActiveQuery
    {
        return $this->hasMany(Post::class, ['userId' => 'userId']);
    }
}
