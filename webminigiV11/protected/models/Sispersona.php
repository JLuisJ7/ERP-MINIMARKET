<?php

/**
 * This is the model class for table "sispersona".
 *
 * The followings are the available columns in table 'sispersona':
 * @property string $ide_persona
 * @property string $des_nombres
 * @property string $des_apepat
 * @property string $des_apemat
 * @property string $nro_documento
 * @property string $des_telefono
 * @property string $des_correo
 * @property string $sexo
 * @property string $ide_estcivil
 * @property string $fec_nacimiento
 * @property string $Sueldo
 * @property string $ide_estado
 *
 * The followings are the available model relations:
 * @property Sisusuario[] $sisusuarios
 */
class Sispersona extends CActiveRecord
{

public function verificarCorreo($des_correo){
		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');
		
	
		$sql="select * from sispersona where des_correo='".$des_correo."'";
		if (count(Yii::app()->db->createCommand($sql)->queryAll())>0 ) {
			$resultado =array('valor'=>1, 'message'=>'El correo existe','persona'=>$this->findAllBySql($sql));
		}
		
		if(count(Yii::app()->db->createCommand($sql)->queryAll())<1 ){			
			$resultado = array('valor'=>0, 'message'=>'El correo no existe','persona'=>$this->findAllBySql($sql));
		}
	
		
			
		
		
		return $resultado;
	}


	public function ListarEmpleadoCombo(){
		
		
		$sql="select e.ide_persona as ide,concat(e.des_apepat,' ',e.des_apemat,' ',e.des_nombres) as descripcion from sispersona as e left join sisusuario as u ON u.ide_persona=e.ide_persona where u.ide_persona is null";
		

		return Yii::app()->db->createCommand($sql)->queryAll();
	}

	public function listadoEmpleados(){

$sql = "select ide_Persona as idEmpleado,concat(des_nombres,' ',des_apepat,' ',des_apemat) as Empleado,nro_documento as DNI,des_Telefono as Telefono ,des_correo as Correo  from sispersona ";
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}
public function obtenerEmpleadoxId($idEmpleado){		
		$sql = "SELECT * FROM sispersona  WHERE ide_Persona=".$idEmpleado;
	

		return $this->findAllBySql($sql);
	}

	public function actualizarEmpleado($ide_persona,$des_nombres,$des_apepat,$des_apemat,$nro_documento,$fec_nacimiento,$des_telefono,$desCorreo,$Sueldo,$ide_estcivil,$sexo,$ide_estado){
		$resultado = array('valorupd'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$empleado = SisPersona::model()->findByPk($ide_persona);

		
			

		
$empleado->des_nombres=$des_nombres;
$empleado->des_apepat=$des_apepat;
$empleado->des_apemat=$des_apemat;
$empleado->nro_documento=$nro_documento;
$empleado->fec_nacimiento=$fec_nacimiento;
$empleado->des_telefono=$des_telefono;
$empleado->des_correo=$desCorreo;
$empleado->Sueldo=$Sueldo;
$empleado->ide_estcivil=$ide_estcivil;
$empleado->sexo=$sexo;
$empleado->ide_estado=$ide_estado;

			if(!$empleado->save()){
				$resultado = array('valorupd'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		

		return $resultado;
	}


	public function agregarEmpleado($des_nombres,$des_apepat,$des_apemat,$nro_documento,$fec_nacimiento,$des_telefono,$desCorreo,$Sueldo,$ide_estcivil,$sexo,$ide_estado){
		$resultado = array('valorupd'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

$empleado=new SisPersona;

		
			

		
$empleado->des_nombres=$des_nombres;
$empleado->des_apepat=$des_apepat;
$empleado->des_apemat=$des_apemat;
$empleado->nro_documento=$nro_documento;
$empleado->fec_nacimiento=$fec_nacimiento;
$empleado->des_telefono=$des_telefono;
$empleado->des_correo=$desCorreo;
$empleado->Sueldo=$Sueldo;
$empleado->ide_estcivil=$ide_estcivil;
$empleado->sexo=$sexo;
$empleado->ide_estado=$ide_estado;

			if(!$empleado->save()){
				$resultado = array('valorupd'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		

		return $resultado;
	}

public function actualizarEstadoEmpleado($ide_persona, $ide_estado){
		$resultado = array('data'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$empleado = SisPersona::model()->findByPk($ide_persona);

	
			$empleado->ide_estado=$ide_estado;
		
			if(!$empleado->save()){
				$resultado = array('data'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		

		return $resultado;
	}
	/*public $des_tipodocumento;
	public $des_tipopersona;
	public $des_sexo;
	public $des_estcivil;*/

	/**
	* Se listan las personas por catalogo
	**/
	public function listaPersonasPorCondicion($ideCondicion){

		$dataProvider=new CActiveDataProvider('Sispersona', array(
			'criteria' => array(
				'join' => 'INNER JOIN admcatalogo ac ON ac.ide_elemento=t.ide_condicion',
				'condition' =>'ac.ide_elemento='.$ideCondicion,
				),
			'pagination'=>array('pageSize'=>6),
			));

		return $dataProvider;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sispersona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nro_documento, Sueldo, ide_estado', 'required'),
			array('des_nombres, des_apepat, des_apemat', 'length', 'max'=>250),
			array('nro_documento', 'length', 'max'=>20),
			array('des_telefono', 'length', 'max'=>9),
			array('des_correo', 'length', 'max'=>45),
			array('sexo, ide_estcivil, ide_estado', 'length', 'max'=>1),
			array('Sueldo', 'length', 'max'=>10),
			array('fec_nacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ide_persona, des_nombres, des_apepat, des_apemat, nro_documento, des_telefono, des_correo, sexo, ide_estcivil, fec_nacimiento, Sueldo, ide_estado', 'safe', 'on'=>'search'),
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
			'sisusuarios' => array(self::HAS_MANY, 'Sisusuario', 'ide_persona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ide_persona' => 'Ide Persona',
			'des_nombres' => 'Des Nombres',
			'des_apepat' => 'Des Apepat',
			'des_apemat' => 'Des Apemat',
			'nro_documento' => 'Nro Documento',
			'des_telefono' => 'Des Telefono',
			'des_correo' => 'Des Correo',
			'sexo' => 'Sexo',
			'ide_estcivil' => 'Ide Estcivil',
			'fec_nacimiento' => 'Fec Nacimiento',
			'Sueldo' => 'Sueldo',
			'ide_estado' => 'Ide Estado',
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

		$criteria->compare('ide_persona',$this->ide_persona,true);
		$criteria->compare('des_nombres',$this->des_nombres,true);
		$criteria->compare('des_apepat',$this->des_apepat,true);
		$criteria->compare('des_apemat',$this->des_apemat,true);
		$criteria->compare('nro_documento',$this->nro_documento,true);
		$criteria->compare('des_telefono',$this->des_telefono,true);
		$criteria->compare('des_correo',$this->des_correo,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('ide_estcivil',$this->ide_estcivil,true);
		$criteria->compare('fec_nacimiento',$this->fec_nacimiento,true);
		$criteria->compare('Sueldo',$this->Sueldo,true);
		$criteria->compare('ide_estado',$this->ide_estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sispersona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
