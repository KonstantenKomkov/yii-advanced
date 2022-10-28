<?php

use common\models\BasePost;
use common\models\BaseUser;
use yii\db\ActiveQuery;
use yii\web\IdentityInterface;

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
class Post extends BasePost implements IdentityInterface {

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

    public static function findIdentity($id): Post
    {
        return static::findOne(['id' => $id]);
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

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        // TODO: Implement getId() method.
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}