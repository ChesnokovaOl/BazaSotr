<?php

    namespace app\models;

    use yii\db\ActiveRecord;
    use yii\vendor\autoload;
    
    class manager extends ActiveRecord
    {
       /* private $id;
        private $name;
        private $post;
        private $date_birth;
        private $date_employment;
        private $nomber;
        private $email;
        private $activity;
*/
        public $imageFile;

        public function rules(){
            return[
                [[
                'name', 
                'post', 
                'date_birth', 
                'date_employment', 
                'nomber', 
                'email', ], 'required'],
             
            ];
        }
        
        public function getFullName() {
            return $this->name;
        }

        public function attributeLabels(){
            return[
        //        'fullName' => Yii::t('app', 'Full Name'),
                'id'=>'номер',
                'name'=>'ФИО', 
                'post'=>'Должность', 
                'foto'=>'Фото', 
                'date_birth'=>'Дата рождения', 
                'date_employment'=>'Дата трудоустройства', 
                'nomber'=>'Номер', 
                'email'=>'Почта', 
            ];
        }

        public function upload(){

            if ($this->validate()) {
                $way = 'img/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
                $this->imageFile->saveAs($way);
                $this->foto = '/' .$way;
                return true;
            } else {
                return false;
            }
        }

    }

?>