<?php

namespace common\models;

use Yii;

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
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
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
    public function attributeLabels()
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
     * @return \yii\db\ActiveQuery
     */
    public function getAccesstokens()
    {
        return $this->hasMany(Accesstoken::class, ['userId' => 'userId']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['userId' => 'userId']);
    }
}
