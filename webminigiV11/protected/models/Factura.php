<?php

/**
 * This is the model class for table "factura".
 *
 * The followings are the available columns in table 'factura':
 * @property string $nroSerie
 * @property string $nroFact
 * @property integer $idCliente
 * @property integer $idEmpleado
 * @property string $fechEmic
 * @property string $subTotal
 * @property string $IGV
 * @property string $Total
 * @property string $estadoFact
 * @property string $fechaElim
 *
 * The followings are the available model relations:
 * @property Detallefactura[] $detallefacturas
 * @property Detallefactura[] $detallefacturas1
 * @property Cliente $idCliente0
 */
class Factura extends CActiveRecord
{

	public function listadoFacturas(){

$sql = "select nroSerie,nroFact,c.RazSoc_Cli as Cliente,idEmpleado as Empleado,DATE_FORMAT(FechEmic,'%d-%m-%Y') as Fecha,SubTotal,IGV,Total from factura as f inner join Cliente as c ON c.idCliente=f.idCliente";
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}

public function ObtenerNroFactura(){

$sql = "select count(nroFact)+1 as nroFact from factura";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}

	public function agregarFactura($nroSerie,$nroFact, $idCliente,$idEmpleado,$subTotal,$IGV,$Total){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		
		$Factura=new Factura;
		$Factura->nroSerie=$nroSerie;
		$Factura->nroFact=$nroFact;
		$Factura->idCliente=$idCliente;
		$Factura->idEmpleado=$idEmpleado;
		$Factura->subTotal=$subTotal;
		$Factura->IGV=$IGV;
		$Factura->Total=$Total;

      		
if(!$Factura->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');

}
			

		return $resultado;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'factura';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroSerie, subTotal, IGV, Total', 'required'),
			array('idCliente, idEmpleado', 'numerical', 'integerOnly'=>true),
			array('nroSerie', 'length', 'max'=>3),
			array('nroFact', 'length', 'max'=>10),
			array('subTotal, IGV, Total', 'length', 'max'=>8),
			array('estadoFact', 'length', 'max'=>1),
			array('fechaElim', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroSerie, nroFact, idCliente, idEmpleado, fechEmic, subTotal, IGV, Total, estadoFact, fechaElim', 'safe', 'on'=>'search'),
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
			'detallefacturas' => array(self::HAS_MANY, 'Detallefactura', 'nroSerie'),
			'detallefacturas1' => array(self::HAS_MANY, 'Detallefactura', 'nroFact'),
			'idCliente0' => array(self::BELONGS_TO, 'Cliente', 'idCliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nroSerie' => 'Nro Serie',
			'nroFact' => 'Nro Fact',
			'idCliente' => 'Id Cliente',
			'idEmpleado' => 'Id Empleado',
			'fechEmic' => 'Fech Emic',
			'subTotal' => 'Sub Total',
			'IGV' => 'Igv',
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
		$criteria->compare('nroFact',$this->nroFact,true);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('idEmpleado',$this->idEmpleado);
		$criteria->compare('fechEmic',$this->fechEmic,true);
		$criteria->compare('subTotal',$this->subTotal,true);
		$criteria->compare('IGV',$this->IGV,true);
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
	 * @return Factura the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
