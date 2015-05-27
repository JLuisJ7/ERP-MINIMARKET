<?php

/**
 * This is the model class for table "boleta".
 *
 * The followings are the available columns in table 'boleta':
 * @property string $nroSerie
 * @property string $nroBol
 * @property integer $idCliente
 * @property integer $idEmpleado
 * @property string $fechEmic
 * @property string $Total
 * @property string $estadoFact
 * @property string $fechaElim
 *
 * The followings are the available model relations:
 * @property Cliente $idCliente0
 * @property Detalleboleta[] $detalleboletas
 * @property Detalleboleta[] $detalleboletas1
 */
class Boleta extends CActiveRecord
{


public function agregarBoleta($nroSerie,$nroBol, $idCliente,$idEmpleado,$Total){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		
		$Boleta=new Boleta;
		$Boleta->nroSerie=$nroSerie;
		$Boleta->nroBol=$nroBol;
		$Boleta->idCliente=$idCliente;
		$Boleta->idEmpleado=$idEmpleado;	
		$Boleta->Total=$Total;

      		
if(!$Boleta->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');

}
			

		return $resultado;
	}
public function ObtenerNroBoleta($nroSerie){

$sql = "select count(nroBol)+1 as nroComp from Boleta where nroSerie='".$nroSerie."'";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}

	public function listadoBoletas(){

$sql = "select nroSerie,nroBol,c.RazSoc_Cli as Cliente,idEmpleado as Empleado,DATE_FORMAT(FechEmic,'%d-%m-%Y') as Fecha,Total from boleta as f inner join Cliente as c ON c.idCliente=f.idCliente";
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'boleta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroSerie, Total', 'required'),
			array('idCliente, idEmpleado', 'numerical', 'integerOnly'=>true),
			array('nroSerie', 'length', 'max'=>3),
			array('nroBol', 'length', 'max'=>10),
			array('Total', 'length', 'max'=>8),
			array('estadoFact', 'length', 'max'=>1),
			array('fechaElim', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroSerie, nroBol, idCliente, idEmpleado, fechEmic, Total, estadoFact, fechaElim', 'safe', 'on'=>'search'),
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
			'idCliente0' => array(self::BELONGS_TO, 'Cliente', 'idCliente'),
			'detalleboletas' => array(self::HAS_MANY, 'Detalleboleta', 'nroSerie'),
			'detalleboletas1' => array(self::HAS_MANY, 'Detalleboleta', 'nroBol'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nroSerie' => 'Nro Serie',
			'nroBol' => 'Nro Bol',
			'idCliente' => 'Id Cliente',
			'idEmpleado' => 'Id Empleado',
			'fechEmic' => 'Fech Emic',
			'Total' => 'Total',
			'estadoFact' => 'Estado Fact',
			'fechaElim' => 'Fecha Elim',
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

		$criteria->compare('nroSerie',$this->nroSerie,true);
		$criteria->compare('nroBol',$this->nroBol,true);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('idEmpleado',$this->idEmpleado);
		$criteria->compare('fechEmic',$this->fechEmic,true);
		$criteria->compare('Total',$this->Total,true);
		$criteria->compare('estadoFact',$this->estadoFact,true);
		$criteria->compare('fechaElim',$this->fechaElim,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Boleta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
