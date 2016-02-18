<?php

/**
 * This is the model form.
 */
class FormBookingHourly extends CFormModel
{
    public $visiter_name;
    public $visiter_phone;
    public $visit_datetm;
    public $visit_duration;
    public $room_id;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('visiter_name, visiter_phone, visit_duration, visit_datetm','required'),
            array('visiter_name', 'match','pattern'=>'/^([\sА-Яа-яA-Za-z]{3,30})+$/'),
            array('visit_datetm','date','format'=>'yyyy-MM-dd H:i'),
            array('visit_daytime', 'compare', 'compareValue' => date('Y-m-d H:i'), 'operator' => '>=', 'message'=>'{attribute} must be later or equal now day.'),
            array('available_rooms','in','allowEmpty'=>false,'range'=>array(1,2,3)),
            array('visit_duration','in','allowEmpty'=>false,'range'=>array(1,2,3,4)),
            array('visiter_phone','match','pattern'=>'/^[+]?([-\s0-9]{7,12})$/'),
    );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'visiter_name' => 'Visiter name',
            'visiter_phone' => 'Visiter name',
            'room_id' => 'Room',
            't_ingoing' => 'Time ingoing',
            't_outgoing' => 'Time outgoing',
        );
    }
}
