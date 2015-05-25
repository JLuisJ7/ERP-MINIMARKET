<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $idProducto
 * @property string $desc_Prod
 * @property string $presentacion
 * @property integer $idProveedor
 * @property string $tipoProd
 * @property integer $stock
 * @property integer $idMarca
 * @property integer $idCategoria
 * @property string $fecha_creacion
 * @property string $estadoProd
 * @property string $Precio
 *
 * The followings are the available model relations:
 * @property Detallefactura[] $detallefacturas
 * @property Detalleordencompra[] $detalleordencompras
 * @property Inventario[] $inventarios
 * @property Proveedor $idProveedor0
 * @property Categoria $idCategoria0
 * @property Marca $idMarca0
 */
class Producto extends CActiveRecord
{

		public function ContadorProductosAgotados(){

$sql = "select count(*) as numero from producto where stock=0;";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}

	public function ListaProductosAgotados(){

$sql = "select *  from producto where stock=0;";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}

	/**
	* Se listan las personas por catalogo
	**/
public function listadoProductos(){

$sql = "select idProducto,desc_Prod,presentacion,IF(tipoProd = '1', 'No Perecible','Perecible') as tipoProd,stock,m.nomMarca,c.nomCategoria,estadoProd,precio  from producto as p inner join Categoria as c ON c.idCategoria=p.idCategoria inner join Marca as m ON m.idMarca=p.idMarca where estadoProd=1 order by desc_Prod asc";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}

public function BuscarProductoVenta($query){

$sql = "SELECT idProducto,desc_Prod FROM Producto WHERE stock>0 and desc_Prod LIKE '%".$query."%'";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}

public function BuscarProductoCompra($query){

$sql = "SELECT idProducto,desc_Prod FROM Producto WHERE  desc_Prod LIKE '%".$query."%'";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}

	public function actualizarEstadoProducto($idProducto, $estadoProd){
		$resultado = array('data'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$producto = Producto::model()->findByPk($idProducto);

		
			$producto->estadoProd=$estadoProd;
		
			if(!$producto->save()){
				$resultado = array('data'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		

		return $resultado;
	}
/**
*Se muestra los productos por codigo	obtenerProductoxId
**/
public function obtenerProductoxId($idProducto){
		
		
		$sql="select * From Producto where idProducto=".$idProducto;
		

		return Yii::app()->db->createCommand($sql)->queryAll();
	}
	public function obtenerProductoxId_upd($idProducto){
		
		
		$sql="select * from producto where idProducto=".$idProducto;
		

		return Yii::app()->db->createCommand($sql)->queryAll();
	}


	/**
	* Se elimina una persona
	**/
	public function actualizarProducto($idProducto,$desc_Prod,$presentacion,$tipoProd,$stock,$idProveedor,$idMarca,$idCategoria,$estadoProd,$Precio){
		$resultado = array('valorupd'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$producto = Producto::model()->findByPk($idProducto);

		if(count($producto)>0){
	$producto->desc_Prod=$desc_Prod;
	$producto->presentacion=$presentacion;
	$producto->tipoProd=$tipoProd;
	$producto->stock=$stock;
	$producto->idProveedor=$idProveedor;
	$producto->idMarca=$idMarca;
	$producto->idCategoria=$idCategoria;
	$producto->estadoProd=$estadoProd;
	$producto->Precio=$Precio;
	

		
			if(!$producto->save()){
				$resultado = array('valorupd'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		}

		return $resultado;
	}
	public function agregarProducto($desc_Prod,$presentacion,$tipoProd,$stock,$idProveedor,$idMarca,$idCategoria,$precio){
		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$producto=new Producto;

		
	
		
			$producto->desc_Prod=$desc_Prod;
			$producto->presentacion=$presentacion;
			$producto->tipoProd=$tipoProd;
			$producto->stock=$stock;
			$producto->idProveedor=$idProveedor;
			$producto->idMarca=$idMarca;
			$producto->idCategoria=$idCategoria;
			$producto->Precio=$precio;
			if(!$producto->save()){
				$resultado = array('valor'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		

		return $resultado;
	}
	public function eliminarProducto($idProducto){

		$resultado = 'Producto Eliminado';
		$producto=Producto::model()->findByPk($idProducto); // asumiendo que existe un post cuyo ID es 10
		$producto->delete(); // borra la fila de la tabla de la base de datos

		// borra todas las filas que coincidan con la condición especificada
		//Productos::model()->deleteAll($condition,$params);
		// borra todas las filas que coincidan con la condición especificada y con la(s) clave(s) primaria(s)

		//Productos::model()->deleteByPk($idProducto);
		return $resultado;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desc_Prod, presentacion, stock', 'required'),
			array('idProveedor, stock, idMarca, idCategoria', 'numerical', 'integerOnly'=>true),
			array('desc_Prod', 'length', 'max'=>100),
			array('presentacion', 'length', 'max'=>20),
			array('tipoProd, estadoProd', 'length', 'max'=>1),
			array('Precio', 'length', 'max'=>8),
			array('fecha_creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProducto, desc_Prod, presentacion, idProveedor, tipoProd, stock, idMarca, idCategoria, fecha_creacion, estadoProd, Precio', 'safe', 'on'=>'search'),
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
			'detallefacturas' => array(self::HAS_MANY, 'Detallefactura', 'idProducto'),
			'detalleordencompras' => array(self::HAS_MANY, 'Detalleordencompra', 'idProducto'),
			'inventarios' => array(self::HAS_MANY, 'Inventario', 'idproducto'),
			'idProveedor0' => array(self::BELONGS_TO, 'Proveedor', 'idProveedor'),
			'idCategoria0' => array(self::BELONGS_TO, 'Categoria', 'idCategoria'),
			'idMarca0' => array(self::BELONGS_TO, 'Marca', 'idMarca'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProducto' => 'Id Producto',
			'desc_Prod' => 'Desc Prod',
			'presentacion' => 'Presentacion',
			'idProveedor' => 'Id Proveedor',
			'tipoProd' => 'Tipo Prod',
			'stock' => 'Stock',
			'idMarca' => 'Id Marca',
			'idCategoria' => 'Id Categoria',
			'fecha_creacion' => 'Fecha Creacion',
			'estadoProd' => 'Estado Prod',
			'Precio' => 'Precio',
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

		$criteria->compare('idProducto',$this->idProducto);
		$criteria->compare('desc_Prod',$this->desc_Prod,true);
		$criteria->compare('presentacion',$this->presentacion,true);
		$criteria->compare('idProveedor',$this->idProveedor);
		$criteria->compare('tipoProd',$this->tipoProd,true);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('idMarca',$this->idMarca);
		$criteria->compare('idCategoria',$this->idCategoria);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('estadoProd',$this->estadoProd,true);
		$criteria->compare('Precio',$this->Precio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
