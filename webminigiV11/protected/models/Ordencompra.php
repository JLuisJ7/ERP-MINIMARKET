<?php

/**
 * This is the model class for table "ordencompra".
 *
 * The followings are the available columns in table 'ordencompra':
 * @property string $nroSerie
 * @property string $nroOrden
 * @property integer $idProveedor
 * @property integer $idEmpleado
 * @property string $FechaOrden
 * @property string $subTotal
 * @property string $IGV
 * @property string $Total
 * @property string $estadoOrden
 * @property string $fechaElim
 *
 * The followings are the available model relations:
 * @property Detalleordencompra[] $detalleordencompras
 * @property Detalleordencompra[] $detalleordencompras1
 * @property Proveedor $idProveedor0
 */
class Ordencompra extends CActiveRecord
{

public function listadoOrdenesC(){

$sql = "select nroSerie,nroOrden,prov.RazSoc_Prov as Proveedor,idEmpleado as Empleado,DATE_FORMAT(FechaOrden,'%d-%m-%Y') as Fecha,subTotal,IGV,Total from ordencompra as oc inner join proveedor as prov ON prov.idProveedor=oc.idProveedor ";
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}


	public function agregarOrdenCompra($nroSerie,$nroOrden,$idProveedor,$idEmpleado,$subTotal,$IGV,$Total){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		
		$OrdenCompra=new OrdenCompra;
		$OrdenCompra->nroSerie=$nroSerie;
		$OrdenCompra->nroOrden=$nroOrden;
		$OrdenCompra->idProveedor=$idProveedor;
		$OrdenCompra->idEmpleado=$idEmpleado;
		$OrdenCompra->subTotal=$subTotal;
		$OrdenCompra->IGV=$IGV;
		$OrdenCompra->Total=$Total;

      		
if(!$OrdenCompra->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');

}
			

		return $resultado;
	}

	public function ObtenerNroOrden(){

$sql = "select count(nroOrden)+1 as nroOrden from OrdenCompra";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordencompra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroSerie, nroOrden', 'required'),
			array('idProveedor, idEmpleado', 'numerical', 'integerOnly'=>true),
			array('nroSerie', 'length', 'max'=>3),
			array('nroOrden', 'length', 'max'=>10),
			array('subTotal, IGV, Total', 'length', 'max'=>8),
			array('estadoOrden', 'length', 'max'=>1),
			array('FechaOrden, fechaElim', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroSerie, nroOrden, idProveedor, idEmpleado, FechaOrden, subTotal, IGV, Total, estadoOrden, fechaElim', 'safe', 'on'=>'search'),
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
			'detalleordencompras' => array(self::HAS_MANY, 'Detalleordencompra', 'nroSerie'),
			'detalleordencompras1' => array(self::HAS_MANY, 'Detalleordencompra', 'nroOrden'),
			'idProveedor0' => array(self::BELONGS_TO, 'Proveedor', 'idProveedor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nroSerie' => 'Nro Serie',
			'nroOrden' => 'Nro Orden',
			'idProveedor' => 'Id Proveedor',
			'idEmpleado' => 'Id Empleado',
			'FechaOrden' => 'Fecha Orden',
			'subTotal' => 'Sub Total',
			'IGV' => 'Igv',
			'Total' => 'Total',
			'estadoOrden' => 'Estado Orden',
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
		$criteria->compare('nroOrden',$this->nroOrden,true);
		$criteria->compare('idProveedor',$this->idProveedor);
		$criteria->compare('idEmpleado',$this->idEmpleado);
		$criteria->compare('FechaOrden',$this->FechaOrden,true);
		$criteria->compare('subTotal',$this->subTotal,true);
		$criteria->compare('IGV',$this->IGV,true);
		$criteria->compare('Total',$this->Total,true);
		$criteria->compare('estadoOrden',$this->estadoOrden,true);
		$criteria->compare('fechaElim',$this->fechaElim,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ordencompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
