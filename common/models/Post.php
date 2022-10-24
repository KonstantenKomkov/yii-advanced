<?php

use common\models\BasePost;
use common\models\BaseUser;

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
class Post extends BasePost {

}