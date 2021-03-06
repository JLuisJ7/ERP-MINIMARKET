<?php

/**
 * This is the model class for table "sisusuario".
 *
 * The followings are the available columns in table 'sisusuario':
 * @property string $ide_usuario
 * @property string $des_usuario
 * @property string $des_password
 * @property string $ide_rol
 * @property string $ide_persona
 */
class SisUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sisusuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('des_usuario, des_password, ide_rol, ide_persona', 'required'),
			array('des_usuario', 'length', 'max'=>50),
			array('des_password', 'length', 'max'=>20),
			array('ide_rol, ide_persona', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ide_usuario, des_usuario, des_password, ide_rol, ide_persona', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ide_usuario' => 'Ide Usuario',
			'des_usuario' => 'Des Usuario',
			'des_password' => 'Des Password',
			'ide_rol' => 'Ide Rol',
			'ide_persona' => 'Ide Persona',
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

		$criteria->compare('ide_usuario',$this->ide_usuario,true);
		$criteria->compare('des_usuario',$this->des_usuario,true);
		$criteria->compare('des_password',$this->des_password,true);
		$criteria->compare('ide_rol',$this->ide_rol,true);
		$criteria->compare('ide_persona',$this->ide_persona,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SisUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
