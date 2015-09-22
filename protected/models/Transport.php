<?php

/**
 * This is the model class for table "transport".
 *
 * The followings are the available columns in table 'transport':
 * @property integer $id
 * @property integer $user_id
 * @property integer $country_start_id
 * @property string $city_start
 * @property string $postal_code_start
 * @property string $date_start
 * @property integer $correction_start
 * @property integer $country_finish_id
 * @property string $city_finish
 * @property string $postal_code_finish
 * @property integer $date_finish
 * @property integer $correction_finish
 * @property string $dop_info
 * @property string $contacts
 * @property string $date_add
 * @property integer $visible
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property Country $countryStart
* @property Country $countryFinish
 */
class Transport extends CActiveRecord
{


    /**
	 * @return string the associated database table name
	 */

    public function tableName()
	{
		return 'transport';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_start_id, date_start, country_finish_id, contacts', 'required'),
			array('user_id, country_start_id, correction_start, country_finish_id, correction_finish, visible', 'numerical', 'integerOnly'=>true),
			array('postal_code_start, postal_code_finish', 'length', 'max'=>15),
			array('contacts', 'length', 'max' => 512),
            array('dop_info', 'length', 'max'=>255),
            array('contacts, dop_info, city_start, city_finish', 'filter', 'filter' => array('CHtml', 'encode')),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, country_start_id, city_start, postal_code_start, date_start, correction_start, country_finish_id, city_finish, postal_code_finish, date_finish, correction_finish, dop_info, date_add, visible, contacts', 'safe', 'on'=>'search'),
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

			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'countryStart' => array(self::BELONGS_TO, 'Country', 'country_start_id'),
            'countryFinish' => array(self::BELONGS_TO, 'Country', 'country_finish_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => Yii::t('site','User'),
			'country_start_id' => Yii::t('site','Country'),
            'city_start' => Yii::t('site','City(Town)'),
			'postal_code_start' => Yii::t('site','Post code(ZIP)'),
			'date_start' => Yii::t('site','Date of dispatch'),
			'correction_start' => Yii::t('site','Correction'),
			'country_finish_id' => Yii::t('site','Country'),
			'city_finish' => Yii::t('site','City(Town)'),
			'postal_code_finish' => Yii::t('site','Post code(ZIP)'),
			'date_finish' => Yii::t('site','Date end'),
			'correction_finish' => Yii::t('site','Correction'),
			'dop_info' => Yii::t('site','Info'),
			'contacts' => Yii::t('site','Contacts'),
			'date_add' => Yii::t('site','Date Add'),
			'visible' => 'Visible',
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

		if ($this->date_start == '') {
			$dateStart[0] = '0000-00-00';
			$dateStart[1] = '2050-01-01';
		} else  $dateStart = $this->datesearch($this->date_start);

		if ($this->date_finish == '') {
			$dateFinish[0] = '0000-00-00';
			$dateFinish[1] = '2050-01-01';
		} else  $dateFinish = $this->datesearch($this->date_finish);

		
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('country_start_id',$this->country_start_id);
        //$criteria->compare('code_start',$this->code_start);
		$criteria->compare('city_start',$this->city_start);
		$criteria->compare('postal_code_start',$this->postal_code_start,true);
		//$criteria->compare('date_start','>='.$this->datesearch($this->date_start));
		$criteria->addBetweenCondition('date_start',$dateStart[0],$dateStart[1]);
		$criteria->compare('correction_start',$this->correction_start);
		$criteria->compare('country_finish_id',$this->country_finish_id);
		$criteria->compare('city_finish',$this->city_finish);
		$criteria->compare('postal_code_finish',$this->postal_code_finish);
		$criteria->addBetweenCondition('date_finish',$dateFinish[0],$dateFinish[1]);
		$criteria->compare('correction_finish',$this->correction_finish);
		$criteria->compare('dop_info',$this->dop_info,true);
		$criteria->compare('contacts',$this->contacts,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function datesearch($date) {

		if (isset($date) && $date != '') {
        	$date = explode(" - ",$date);
        	$date[0] = date('Y-m-d',CDateTimeParser::parse($date[0],'dd-MM-yyyy'));
        	$date[1] = date('Y-m-d',CDateTimeParser::parse($date[1],'dd-MM-yyyy'));
        	return $date;
        }

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave(){

         if (isset($this->date_start)) {
             $this->date_start = DateTime::createFromFormat('d-m-Y',$this->date_start);
             $this->date_start = $this->date_start->format('Y-m-d');
         }

        if (isset($this->date_finish)) {
            $this->date_finish = DateTime::createFromFormat('d-m-Y',$this->date_finish);
            $this->date_finish = $this->date_finish->format('Y-m-d');
        }

        if ($this->isNewRecord) $this->date_add = date('Y-m-d H:i:s');
        else unset($this->date_add);

        return parent::beforeSave();
    }


    protected function afterFind() {

        $this->date_start = DateTime::createFromFormat('Y-m-d',$this->date_start);
        $this->date_start =  $this->date_start->format('d-m-Y');

        $this->date_finish = DateTime::createFromFormat('Y-m-d',$this->date_finish);
        $this->date_finish =  $this->date_finish->format('d-m-Y');

        $this->date_add = DateTime::createFromFormat('Y-m-d H:i:s',$this->date_add);
        $this->date_add =  $this->date_add->format('d-m-Y');

        if($this->correction_start == 0) $this->correction_start = '';
        if($this->correction_finish == 0) $this->correction_finish = '';

        return parent::afterFind();
    }
}