<?php

/**
 * This is the model class for table "visits".
 *
 * The followings are the available columns in table 'visits':
 * @property string $id
 * @property string $visiter_id
 * @property string $room_id
 * @property string $t_ingoing
 * @property string $t_outgoing
 * @property string $user_note
 * @property string $user_review
 * @property integer $user_rating
 * @property string $promo_code
 * @property integer $ammount
 * @property integer $to_pay
 * @property integer $payment
 * @property string $payment_sign
 * @property string $payment_descr
 * @property string $discount_id
 *
 * The followings are the available model relations:
 * @property Rooms $room
 * @property Clients $visiter
 */
class Visit extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return 'visits';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    array('visiter_id, room_id, t_ingoing, t_outgoing', 'required'),
                    array('user_rating, ammount, to_pay, payment', 'numerical', 'integerOnly'=>true),
                    array('visiter_id, room_id, discount_id', 'numerical','integerOnly'=>true),
                    array('user_note', 'length', 'max'=>512,'encoding' => 'utf-8'),
                    array('user_review', 'length', 'max'=>1024,'encoding' => 'utf-8'),
                    array('promo_code', 'length', 'max'=>16,'encoding' => 'utf-8'),
                    array('payment_descr', 'length', 'max'=>128,'encoding' => 'utf-8'),
                    array('payment_sign', 'length', 'max'=>32636,'encoding' => 'utf-8'),
                    array('payment_sign', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, visiter_id, room_id, t_ingoing, t_outgoing, user_note, user_review, user_rating, promo_code, ammount, to_pay, payment, payment_sign, payment_descr, discount_id', 'safe', 'on'=>'search'),
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
                    'room' => array(self::BELONGS_TO, 'Room', 'room_id'),
                    'visiter' => array(self::BELONGS_TO, 'Client', 'visiter_id'),
            );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
            return array(
                    'id' => 'ID',
                    'visiter_id' => 'Visiter',
                    'room_id' => 'Room',
                    't_ingoing' => 'Time ingoing',
                    't_outgoing' => 'Time outgoing',
                    'user_note' => 'Notes from user',
                    'user_review' => 'Review',
                    'user_rating' => 'Rating of 5',
                    'promo_code' => 'Promo Code',
                    'ammount' => 'Ammount',
                    'to_pay' => 'To Pay',
                    'payment' => 'Payment',
                    'payment_sign' => 'Payment Sign',
                    'payment_descr' => 'Payment Descr',
                    'discount_id' => 'id discount',
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
            $criteria->compare('visiter_id',$this->visiter_id,true);
            $criteria->compare('room_id',$this->room_id,true);
            $criteria->compare('t_ingoing',$this->t_ingoing,true);
            $criteria->compare('t_outgoing',$this->t_outgoing,true);
            $criteria->compare('to_pay',$this->to_pay);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Visit the static model class
     */
    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }
    
    /*
     * Saving data to database
     * Return boolean as result from saving record request to db.
     */
    public function savingItem($room_id,$visiter_id,$t_ingoing,$t_outgoing)
    {
        $sql = 'insert into visits (id, room_id, visiter_id, t_ingoing, t_outgoing) values (
        null, :room_id, :visiter_id, :t_ingoing, :t_outgoing)';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(':room_id',$room_id, PDO::PARAM_INT);
        $command->bindValue(':visiter_id',$visiter_id, PDO::PARAM_INT);
        $command->bindValue(':t_ingoing',$t_ingoing, PDO::PARAM_STR);
        $command->bindValue(':t_outgoing',$t_outgoing, PDO::PARAM_STR);
        return $command->execute();
    }
}
