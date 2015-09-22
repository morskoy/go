<?php

/**
 * This is the model class for table "city".
 *
 * The followings are the available columns in table 'city':
 * @property integer $id
 * @property string $city
 * @property integer $country_id
 *
 * The followings are the available model relations:
 * @property Cargo[] $cargos
 * @property Cargo[] $cargos1
 * @property Country $country
 * @property CityLang[] $cityLangs
 * @property Transport[] $transports
 * @property Transport[] $transports1
 */
class City extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city, country_id', 'required'),
			array('country_id', 'numerical', 'integerOnly'=>true),
			array('city', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, city, country_id', 'safe', 'on'=>'search'),
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
			'cargoStart' => array(self::HAS_MANY, 'Cargo', 'city_start_id'),
			'cargoFinish' => array(self::HAS_MANY, 'Cargo', 'city_finish_id'),
			'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
			'cityLangs' => array(self::HAS_MANY, 'CityLang', 'city_id'),
			'transportStart' => array(self::HAS_MANY, 'Transport', 'city_start_id'),
			'transportFinish' => array(self::HAS_MANY, 'Transport', 'city_finish_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city' => 'City',
			'country_id' => 'Country',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.city',$this->city,true);
		$criteria->compare('t.country_id',$this->country_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$this->ml->modifySearchCriteria($criteria),
		));
	}

    public function behaviors()
    {
        return array(
            'ml' => array(
                'class' => 'ext.multilangual.MultilingualBehavior',
                'localizedAttributes' => array(
                    'city',
                ),
                'langClassName' => 'CityLang',
                'langTableName' => '{{city_lang}}',
                'languages' => Yii::app()->params['translatedLanguages'],
                'defaultLanguage' => Yii::app()->params['defaultLanguage'],
                'langForeignKey' => 'city_id',
                'dynamicLangClass' => true,
            ),
        );
    }

    public function defaultScope()
    {
        return $this->ml->localizedCriteria();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return City the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
