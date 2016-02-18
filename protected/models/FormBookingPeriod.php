<?php

/**
 * This is the model form.
 */
class FormBookingPeriod extends CFormModel
{
    public $t_incoming;
    public $t_outgoing;
    public $visiter_phone;
    public $visiter_name;
    //public $visiter_email;
    public $room_id;
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('visiter_name, t_incoming, t_outgoing, visiter_phone, room_id','required'),
            array('visiter_name', 'length','min'=>3,'max'=>64),
            array('visiter_name', 'match','pattern'=>'/[\sа-яА-Яa-zA-Z]+$/s',
                    'message'=>'Must contains only letters.'),
            array('t_incoming, t_outgoing', 'date', 'format' => 'dd-MM-yyyy','allowEmpty'=>false),
            array('t_outgoing','compare','compareValue'=>date('d-m-Y'),'operator'=>'>='),
            array('t_incoming',
            'application.components.date-compare.EDateCompare',
            'compareAttribute' => 't_outgoing',
            'dateFormat'=>'d-m-Y',
            'operator' => '<=',
            'message' => Yii::t('site','Begin date must be before or equal finish date.'), 
        ),
        array('t_outgoing',
            'application.components.date-compare.EDateCompare',
            'dateFormat'=>'d-m-Y',
            'compareAttribute' => 't_incoming',
            'operator' => '>=',
            'message' => Yii::t('site','End date must be after or equal begin date.'),
        ),
            array('visiter_phone','match','pattern'=>'/^[+]?([-0-9]{7,18})$/'),
            array('room_id','in','range'=>array(1,2,3)),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'visiter_name'=>Yii::t('site','Name'),
            't_incoming' => Yii::t('site','Date ingoing'),
            't_outgoing' => Yii::t('site','Date outgoing'),
            'visiter_phone'=>Yii::t('site','Phone'),
            'room_id'=>Yii::t('site','Select Room'),            
        );
    }
}
