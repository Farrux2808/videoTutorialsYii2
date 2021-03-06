<?php

namespace app\modules\admin\models;

use yii\web\UploadedFile;
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
            [['full_name', 'about'], 'required'],
            [['about'], 'string'],
            [['full_name'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions' => 'png, jpg'],
        ];
    }
    
    
    public function beforeSave($insert)
    {
    if(Yii::$app->controller->action->id != 'delimg'){
      $main = $this::find()->all();
    
      $id = $this->id - 1;
    
      $this->img = $main[$id]->img;
      $old = $main[$id]->img;
      if($file = UploadedFile::getInstance($this, 'img')){
        if(!empty($file)){
          $dir = 'uploads/' . date("Y-m-d") . '/';
          if(!is_dir($dir)){
            $oldmask = umask(0);
                        mkdir($dir, 0777);
                        umask($oldmask);
          }
            $file_name = uniqid() . '_' . $file->baseName . '.' . $file->extension;
            $this->img = $dir . $file_name;
            $file->saveAs($this->img);
            if (file_exists($old)) unlink($old);
        }
        
      }
      
      return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
    return parent::beforeSave($insert);
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
