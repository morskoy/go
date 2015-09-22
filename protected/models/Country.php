<?php

/**
 * This is the model class for table "country".
 *
 * The followings are the available columns in table 'country':
 * @property integer $id
 * @property string $country
 *
 * The followings are the available model relations:
 * @property Cargo[] $cargos
 * @property City[] $cities
 * @property CountryLang[] $countryLangs
 * @property Transport[] $transports
 * @property Transport[] $transports1
 */
class Country extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country', 'required'),
			array('country', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, country', 'safe', 'on'=>'search'),
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
            'cargoStart' => array(self::HAS_MANY, 'Cargo', 'country_start_id'),
			'cargoFinish' => array(self::HAS_MANY, 'Cargo', 'country_finish_id'),
			'cities' => array(self::HAS_MANY, 'City', 'country_id'),
			'countryLangs' => array(self::HAS_MANY, 'CountryLang', 'country_id'),
			'transportStart' => array(self::HAS_MANY, 'Transport', 'country_start_id'),
			'transportsFinish' => array(self::HAS_MANY, 'Transport', 'country_finish_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'country' => 'Country',
            'code' => 'Code',
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
		$criteria->compare('t.country',$this->country,true);
        $criteria->compare('t.code',$this->code,true);

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
                    'country',
                ),
                'langClassName' => 'CountryLang',
                'langTableName' => '{{country_lang}}',
                'languages' => Yii::app()->params['translatedLanguages'],
                'defaultLanguage' => Yii::app()->params['defaultLanguage'],
                'langForeignKey' => 'country_id',
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
	 * @return Country the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
