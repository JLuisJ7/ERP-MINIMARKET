<?php

/**
 * This is the model class for table "detallefactura".
 *
 * The followings are the available columns in table 'detallefactura':
 * @property integer $nroFact
 * @property integer $idProducto
 * @property integer $cantidad
 * @property string $Precio
 * @property string $valor_Venta
 */
class Detallefactura extends CActiveRecord
{

	public function agregarDetalleFactura($array){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$Detalle=new Detallefactura;

	

foreach($array as $obj){
       
			$Detalle->nroFact=1;
			$Detalle->idProducto=$obj['Codigo'];
			$Detalle->cantidad=$obj['Cantidad'];
			$Detalle->Precio=$obj['Precio'];
			$Detalle->valor_Venta=$obj['Importe'];

			$Detalle->save();

}
		

			

		return $resultado;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detallefactura';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroFact, idProducto, cantidad', 'numerical', 'integerOnly'=>true),
			array('Precio, valor_Venta', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroFact, idProducto, cantidad, Precio, valor_Venta', 'safe', 'on'=>'search'),
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
			'nroFact' => 'Nro Fact',
			'idProducto' => 'Id Producto',
			'cantidad' => 'Cantidad',
			'Precio' => 'Precio',
			'valor_Venta' => 'Valor Venta',
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

		$criteria->compare('nroFact',$this->nroFact);
		$criteria->compare('idProducto',$this->idProducto);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('Precio',$this->Precio,true);
		$criteria->compare('valor_Venta',$this->valor_Venta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detallefactura the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
