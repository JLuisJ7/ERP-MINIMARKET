<?php

/**
 * This is the model class for table "empleado".
 *
 * The followings are the available columns in table 'empleado':
 * @property string $idEmpleado
 * @property string $apePat
 * @property string $apeMat
 * @property string $nombres
 * @property string $fechaNac
 * @property string $DNI
 * @property string $telefono
 * @property string $sexo
 * @property string $fechaReg
 * @property string $estado
 */
class Empleado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empleado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaReg', 'required'),
			array('apePat, apeMat, nombres', 'length', 'max'=>50),
			array('DNI', 'length', 'max'=>8),
			array('telefono', 'length', 'max'=>9),
			array('sexo, estado', 'length', 'max'=>1),
			array('fechaNac', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEmpleado, apePat, apeMat, nombres, fechaNac, DNI, telefono, sexo, fechaReg, estado', 'safe', 'on'=>'search'),
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
			'idEmpleado' => 'Id Empleado',
			'apePat' => 'Ape Pat',
			'apeMat' => 'Ape Mat',
			'nombres' => 'Nombres',
			'fechaNac' => 'Fecha Nac',
			'DNI' => 'Dni',
			'telefono' => 'Telefono',
			'sexo' => 'Sexo',
			'fechaReg' => 'Fecha Reg',
			'estado' => 'Estado',
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

		$criteria->compare('idEmpleado',$this->idEmpleado,true);
		$criteria->compare('apePat',$this->apePat,true);
		$criteria->compare('apeMat',$this->apeMat,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('fechaNac',$this->fechaNac,true);
		$criteria->compare('DNI',$this->DNI,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('fechaReg',$this->fechaReg,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empleado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
