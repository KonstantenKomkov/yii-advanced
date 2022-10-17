<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template - Post API</h1>
    <br>
</p>

Комманды для миграций
```
php yii migrate/create create_user_table --fields="userId:primaryKey,name:string(255),middleName:string(255),surname:string(255),email:string(255),phone:string(12),createdAt:dateTime,updatedAt:dateTime"
php yii migrate/create create_accessToken_table --fields="tokenId:primaryKey,userId:integer:notNull:foreignKey(user),accessToken:string(255),createdAt:dateTime,updatedAt:dateTime"
php yii migrate/create create_post_table --fields="postId:primaryKey,title:string(255),text:text,userId:integer:notNull:foreignKey(user),createdAt:dateTime,updatedAt:dateTime"
php yii migrate
```
