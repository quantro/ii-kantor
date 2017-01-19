<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property integer $id_berita
 * @property string $judul
 * @property string $isi
 * @property integer $id_user
 *
 * @property Users $user
 */
class Berita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_berita', 'judul', 'isi', 'id_user'], 'required'],
            [['id_berita', 'id_user'], 'integer'],
            [['isi'], 'string'],
            [['judul'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_berita' => 'Id Berita',
            'judul' => 'Judul',
            'isi' => 'Isi',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'id_user']);
    }
}
