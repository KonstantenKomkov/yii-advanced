<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "accesstoken".
 *
 * @property int $tokenId
 * @property int $userId
 * @property string|null $accessToken
 * @property string|null $createdAt
 * @property string|null $updatedAt
 *
 * @property BaseUser $user
 */
class BaseAccessToken extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'accesstoken';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['userId'], 'required'],
            [['userId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['accessToken'], 'string', 'max' => 255],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => BaseUser::class, 'targetAttribute' => ['userId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'tokenId' => 'Token ID',
            'userId' => 'User ID',
            'accessToken' => 'Access Token',
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
