<?php

/**
 * This is the model class for table "detalleordencompra".
 *
 * The followings are the available columns in table 'detalleordencompra':
 * @property string $nroSerie
 * @property string $nroOrden
 * @property integer $idProducto
 * @property string $cantidad
 * @property string $precio
 *
 * The followings are the available model relations:
 * @property Producto $idProducto0
 * @property Ordencompra $nroSerie0
 * @property Ordencompra $nroOrden0
 */
class Detalleordencompra extends CActiveRecord
{

	public function agregarDetalleOrdenCompra($nroSerie,$nroOrden,$idProducto,$cantidad,$Precio){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		



      		$Detalle=new Detalleordencompra;
      		$Detalle->nroSerie=$nroSerie;
			$Detalle->nroOrden=$nroOrden;
			$Detalle->idProducto=$idProducto;
			$Detalle->cantidad=$cantidad;
			$Detalle->precio=$Precio;

			$Detalle->save();

		return $resultado;
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalleordencompra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroSerie, nroOrden, idProducto, cantidad, precio', 'required'),
			array('idProducto', 'numerical', 'integerOnly'=>true),
			array('nroSerie', 'length', 'max'=>3),
			array('nroOrden, cantidad', 'length', 'max'=>10),
			array('precio', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroSerie, nroOrden, idProducto, cantidad, precio', 'safe', 'on'=>'search'),
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
			'idProducto0' => array(self::BELONGS_TO, 'Producto', 'idProducto'),
			'nroSerie0' => array(self::BELONGS_TO, 'Ordencompra', 'nroSerie'),
			'nroOrden0' => array(self::BELONGS_TO, 'Ordencompra', 'nroOrden'),
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
			'idProducto' => 'Id Producto',
			'cantidad' => 'Cantidad',
			'precio' => 'Precio',
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
		$criteria->compare('idProducto',$this->idProducto);
		$criteria->compare('cantidad',$this->cantidad,true);
		$criteria->compare('precio',$this->precio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detalleordencompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
