<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property string $id
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $passhash
 * @property string $photo1
 * @property string $voicecall
 * @property string $privs
 * @property string $notes
 * @property integer $is_active
 * @property string $user_sert
 *
 * The followings are the available model relations:
 * @property Visits[] $visits
 */
class Client extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return 'clients';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('phone', 'required'),
            array('is_active', 'numerical', 'integerOnly'=>true),
            array('fullname, email, passhash', 'length', 'max'=>64),
            array('phone', 'length', 'max'=>18),
            array('phone','match','pattern'=>'/^[+]?([-0-9]{7,18})$/'),

            array('photo1', 'length', 'max'=>2048),
            array('voicecall', 'length', 'max'=>45),
            array('privs, notes, user_sert', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, email, phone, passhash, is_active', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
                'visits' => array(self::HAS_MANY, 'Visit', 'visiter_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' =>Yii::t('site', 'ID'),
            'fullname' =>Yii::t('site', 'Full Name'),
            'email' =>Yii::t('site', 'E-mail'),
            'phone' =>Yii::t('site', 'Phone'),
            'passhash' =>Yii::t('site', 'pass_hash'),
            'photo1' =>Yii::t('site', 'User photo'),
            'voicecall' =>Yii::t('site', 'Voicecall'),
            'privs' =>Yii::t('site', 'Priveleges'),
            'notes' =>Yii::t('site', 'Notes'),
            'is_active' =>Yii::t('site', 'Is active'),
            'user_sert' =>Yii::t('site', 'User Sert'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('phone',$this->phone,true);
        $criteria->compare('passhash',$this->passhash,true);
        $criteria->compare('is_active',$this->is_active);

        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Client the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /*
     * Find by phone with PDO for speed increase.
     * @return int id record in db;
     * @phone_string string for find with like operator;
     */    
    public function findByPhone($phone) {
        $phone = '%'.$phone;
        $sql = 'select id from clients where phone like :phone limit 1';
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $command->bindValue(':phone',$phone, PDO::PARAM_STR);
        $row = $command->queryRow();
        return (empty($row)) ? false : $row['id']+0;    
    }

    /*
     * Save new booking client from booking form.
     */
    public function saveBookingClient($phone, $name='', $pass='')
    {
        $sql = 'insert into clients(id, phone, fullname, passhash, is_active) '
                . 'values(null, :phone, :fullname, :passhash, :is_active)';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(':phone', $phone, PDO::PARAM_STR);
        $command->bindValue(':fullname', $name, PDO::PARAM_STR);
        $command->bindValue(':passhash', $pass, PDO::PARAM_STR);
        $command->bindValue(':is_active', 1, PDO::PARAM_INT);
        return ($command->execute()) ? Yii::app()->db->getLastInsertID() : false;
    }
}
