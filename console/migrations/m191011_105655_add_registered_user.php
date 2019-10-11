<?php

use yii\db\Migration;

/**
 * Class m191011_105655_add_registered_user
 */
class m191011_105655_add_registered_user extends Migration
{
    private $tableName = 'user';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert($this->tableName, [
            'username' => 'user',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('password'),
            'email' => 'user@user.user',
            'status' => \common\models\User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time(),
            'verification_token' => Yii::$app->security->generateRandomString() . '_' . time()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete($this->tableName, ['username' => 'user']);
    }
}