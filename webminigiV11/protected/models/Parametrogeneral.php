<?php

/**
 * This is the model class for table "parametrogeneral".
 *
 * The followings are the available columns in table 'parametrogeneral':
 * @property string $idParametro
 * @property string $desc_Param
 * @property double $valor_Param
 */
class Parametrogeneral extends CActiveRecord
{

public function actualizarParametroGeneral($idParametro,$valor_Param){
		$resultado = array('data'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$parametro = Parametrogeneral::model()->findByPk($idParametro);

		
			$parametro->valor_Param=$valor_Param;
		
			if(!$parametro->save()){
				$resultado = array('data'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		

		return $resultado;
	}

		public function ObtenerParametroGeneral($idParametro){

$sql = "select * from Parametrogeneral where idParametro=".$idParametro;
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parametrogeneral';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desc_Param, valor_Param', 'required'),
			array('valor_Param', 'numerical'),
			array('desc_Param', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idParametro, desc_Param, valor_Param', 'safe', 'on'=>'search'),
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
			'idParametro' => 'Id Parametro',
			'desc_Param' => 'Desc Param',
			'valor_Param' => 'Valor Param',
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

		$criteria->compare('idParametro',$this->idParametro,true);
		$criteria->compare('desc_Param',$this->desc_Param,true);
		$criteria->compare('valor_Param',$this->valor_Param);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Parametrogeneral the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
