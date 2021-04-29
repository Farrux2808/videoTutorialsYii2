<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $full_name
 * @property string $img
 * @property string $about
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public $file;
    public function rules()
    {
        return [
            [['full_name', 'img', 'about'], 'required'],
            [['about'], 'string'],
            [['full_name', 'img'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $path = 'uploads/' . uniqid(md5($this->file->baseName)) . '.' . $this->file->extension;
            $this->file->saveAs($path);
            $this->img = $path;
            $this->save(false);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'img' => Yii::t('app', 'Img'),
            'about' => Yii::t('app', 'About'),
        ];
    }
}
