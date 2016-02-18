<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $fio
 * @property string $login
 * @property string $passhash
 * @property string $phone
 * @property string $email
 * @property string $position
 * @property string $t_employment
 * @property string $privileges
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property Serviceflow[] $serviceflows
 */
class User extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    array('is_active', 'numerical', 'integerOnly'=>true),
                    array('fio, position', 'length', 'max'=>45),
                    array('login', 'length', 'max'=>20),
                    array('passhash', 'length', 'max'=>64),
                    array('phone', 'length', 'max'=>30),
                    array('email', 'length', 'max'=>55),
                    array('t_employment, privileges', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, fio, login, passhash, phone, email, position, t_employment, privileges, is_active', 'safe', 'on'=>'search'),
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
                    'serviceflows' => array(self::HAS_MANY, 'Serviceflow', 'users_id'),
            );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
            return array(
                    'id' => 'ID',
                    'fio' => 'Fio',
                    'login' => 'Login',
                    'passhash' => 'Passhash',
                    'phone' => 'Phone',
                    'email' => 'Email',
                    'position' => 'Position',
                    't_employment' => 'T Employment',
                    'privileges' => 'Privileges',
                    'is_active' => 'Is Active',
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
            $criteria->compare('fio',$this->fio,true);
            $criteria->compare('login',$this->login,true);
            $criteria->compare('passhash',$this->passhash,true);
            $criteria->compare('phone',$this->phone,true);
            $criteria->compare('email',$this->email,true);
            $criteria->compare('position',$this->position,true);
            $criteria->compare('t_employment',$this->t_employment,true);
            $criteria->compare('privileges',$this->privileges,true);
            $criteria->compare('is_active',$this->is_active);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }
        
    /*
     * Saving data to database
     * Return boolean as result from saving record request to db.
     */
    public function savingItem($id,$room_id,$visiter_id,$t_ingoing,$t_outgoing)
    {
        return;
    }
}
