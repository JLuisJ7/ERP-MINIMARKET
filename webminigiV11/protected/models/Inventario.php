<?php

/**
 * This is the model class for table "inventario".
 *
 * The followings are the available columns in table 'inventario':
 * @property string $idMovimiento
 * @property string $tipo_documento
 * @property string $serie
 * @property string $nro_documento
 * @property string $fecha
 * @property string $tipo
 * @property integer $idproducto
 * @property string $cantidad
 * @property string $valor_unitario
 * @property string $total
 *
 * The followings are the available model relations:
 * @property Producto $idproducto0
 */
class Inventario extends CActiveRecord
{
		public function agregarInventario($tipo_documento,$nroSerie,$nro_documento,$tipo,$idProducto,$cantidad,$Precio,$Total){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		
      		$Inventario=new Inventario;
      		$Inventario->tipo_documento=$tipo_documento;
      		$Inventario->serie=$nroSerie;
      		$Inventario->nro_documento=$nro_documento;
      		$Inventario->tipo=$tipo;
      		$Inventario->idproducto=$idProducto;
      		$Inventario->cantidad=$cantidad;
      		$Inventario->valor_unitario=$Precio;
      		$Inventario->total=$Total;
			$Inventario->save();

		return $resultado;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inventario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('fecha', 'required'),
			array('idproducto', 'numerical', 'integerOnly'=>true),
			array('tipo_documento, tipo', 'length', 'max'=>1),
			array('serie', 'length', 'max'=>3),
			array('nro_documento, cantidad', 'length', 'max'=>10),
			array('valor_unitario, total', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idMovimiento, tipo_documento, serie, nro_documento, fecha, tipo, idproducto, cantidad, valor_unitario, total', 'safe', 'on'=>'search'),
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
			'idproducto0' => array(self::BELONGS_TO, 'Producto', 'idproducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMovimiento' => 'Id Movimiento',
			'tipo_documento' => 'Tipo Documento',
			'serie' => 'Serie',
			'nro_documento' => 'Nro Documento',
			'fecha' => 'Fecha',
			'tipo' => 'Tipo',
			'idproducto' => 'Idproducto',
			'cantidad' => 'Cantidad',
			'valor_unitario' => 'Valor Unitario',
			'total' => 'Total',
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

		$criteria->compare('idMovimiento',$this->idMovimiento,true);
		$criteria->compare('tipo_documento',$this->tipo_documento,true);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('nro_documento',$this->nro_documento,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('cantidad',$this->cantidad,true);
		$criteria->compare('valor_unitario',$this->valor_unitario,true);
		$criteria->compare('total',$this->total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inventario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
