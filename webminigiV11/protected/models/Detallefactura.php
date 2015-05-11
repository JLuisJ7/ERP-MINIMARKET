<?php

/**
 * This is the model class for table "detallefactura".
 *
 * The followings are the available columns in table 'detallefactura':
 * @property string $nroSerie
 * @property string $nroFact
 * @property integer $idProducto
 * @property string $cantidad
 * @property string $precio
 *
 * The followings are the available model relations:
 * @property Producto $idProducto0
 * @property Factura $nroSerie0
 * @property Factura $nroFact0
 */
class Detallefactura extends CActiveRecord
{

	public function agregarDetalleFactura($nroSerie,$nroFact,$idProducto,$cantidad,$Precio){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		



      		$Detalle=new Detallefactura;
      		$Detalle->nroSerie=$nroSerie;
			$Detalle->nroFact=$nroFact;
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
			array('nroSerie, nroFact, idProducto, cantidad, precio', 'required'),
			array('idProducto', 'numerical', 'integerOnly'=>true),
			array('nroSerie', 'length', 'max'=>3),
			array('nroFact, cantidad', 'length', 'max'=>10),
			array('precio', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroSerie, nroFact, idProducto, cantidad, precio', 'safe', 'on'=>'search'),
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
			'nroSerie0' => array(self::BELONGS_TO, 'Factura', 'nroSerie'),
			'nroFact0' => array(self::BELONGS_TO, 'Factura', 'nroFact'),
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
		$criteria->compare('nroFact',$this->nroFact,true);
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
	 * @return Detallefactura the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
