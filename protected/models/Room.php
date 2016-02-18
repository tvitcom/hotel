<?php

/**
 * This is the model class for table "rooms".
 *
 * The followings are the available columns in table 'rooms':
 * @property string $id
 * @property string $hotels_id
 * @property string $room_number
 * @property string $name
 * @property string $description
 * @property string $market_description
 * @property string $maps_location
 * @property string $address_location
 * @property integer $stage
 * @property string $roomtype
 * @property integer $bedrooms
 * @property string $photo1
 * @property string $photo2
 * @property string $photo3
 * @property string $photo4
 * @property string $photo5
 * @property string $photo6
 * @property string $room_cert
 * @property integer $is_vacant
 *
 * The followings are the available model relations:
 * @property Hotels $hotels
 * @property Serviceflow[] $serviceflows
 * @property Visits[] $visits
 */
class Room extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rooms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotels_id', 'required'),
			array('stage, bedrooms, is_vacant', 'numerical', 'integerOnly'=>true),
			array('hotels_id', 'length', 'max'=>21),
			array('room_number', 'length', 'max'=>9),
			array('name', 'length', 'max'=>45),
			array('maps_location, address_location', 'length', 'max'=>128),
			array('roomtype', 'length', 'max'=>10),
			array('photo1, photo2, photo3, photo4, photo5, photo6', 'length', 'max'=>2048),
			array('description, market_description, room_cert', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hotels_id, room_number, name, description, market_description, maps_location, address_location, stage, roomtype, bedrooms, photo1, photo2, photo3, photo4, photo5, photo6, room_cert, is_vacant', 'safe', 'on'=>'search'),
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
			'hotels' => array(self::BELONGS_TO, 'Hotels', 'hotels_id'),
			'serviceflows' => array(self::HAS_MANY, 'Serviceflow', 'room_id'),
			'visits' => array(self::HAS_MANY, 'Visits', 'room_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hotels_id' => 'Hotels',
			'room_number' => 'Room Number',
			'name' => 'Name',
			'description' => 'Description',
			'market_description' => 'Market Description',
			'maps_location' => 'Maps Location',
			'address_location' => 'Address Location',
			'stage' => 'Stage',
			'roomtype' => 'Roomtype',
			'bedrooms' => 'Bedrooms',
			'photo1' => 'Photo1',
			'photo2' => 'Photo2',
			'photo3' => 'Photo3',
			'photo4' => 'Photo4',
			'photo5' => 'Photo5',
			'photo6' => 'Photo6',
			'room_cert' => 'Room Cert',
			'is_vacant' => 'Is Vacant',
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
		$criteria->compare('hotels_id',$this->hotels_id,true);
		$criteria->compare('room_number',$this->room_number,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('market_description',$this->market_description,true);
		$criteria->compare('maps_location',$this->maps_location,true);
		$criteria->compare('address_location',$this->address_location,true);
		$criteria->compare('stage',$this->stage);
		$criteria->compare('roomtype',$this->roomtype,true);
		$criteria->compare('bedrooms',$this->bedrooms);
		$criteria->compare('photo1',$this->photo1,true);
		$criteria->compare('photo2',$this->photo2,true);
		$criteria->compare('photo3',$this->photo3,true);
		$criteria->compare('photo4',$this->photo4,true);
		$criteria->compare('photo5',$this->photo5,true);
		$criteria->compare('photo6',$this->photo6,true);
		$criteria->compare('room_cert',$this->room_cert,true);
		$criteria->compare('is_vacant',$this->is_vacant);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Room the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
