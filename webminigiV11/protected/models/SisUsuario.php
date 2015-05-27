<?php

/**
 * This is the model class for table "sisusuario".
 *
 * The followings are the available columns in table 'sisusuario':
 * @property string $ide_usuario
 * @property string $des_usuario
 * @property string $des_password
 * @property string $ide_rol
 * @property string $ide_persona
 * @property string $correo
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Sispersona $idePersona
 * @property Admrol $ideRol
 */
class Sisusuario extends CActiveRecord
{
	public function actualizarEstadoUsuario($ide_usuario, $estado){
		$resultado = array('data'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$usuario = sisusuario::model()->findByPk($ide_usuario);

		
			$usuario->estado=$estado;
		
			if(!$usuario->save()){
				$resultado = array('data'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		

		return $resultado;
	}

	public function actualizarRolUsuario($ide_usuario, $ide_rol){
		$resultado = array('data'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$usuario = sisusuario::model()->findByPk($ide_usuario);

		
			$usuario->ide_rol=$ide_rol;
		
			if(!$usuario->save()){
				$resultado = array('data'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		

		return $resultado;
	}


	public function verificarUsuario($des_usuario){
		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');
		
	
		$sql="select * from sisusuario where des_usuario='".$des_usuario."'";
		if (count(Yii::app()->db->createCommand($sql)->queryAll())>0 ) {
			$resultado =array('valor'=>1, 'message'=>'El Usuario ya existe');
		}
		
		if(count(Yii::app()->db->createCommand($sql)->queryAll())<1 ){			
			$resultado = array('valor'=>0, 'message'=>'El Usuario no existe');
		}
	
		
			
		
		
		return $resultado;
	}


	public function registrarUsuario($des_usuario,$des_password,$ide_rol,$ide_persona,$des_correo){
		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$usuario=new sisusuario;
		$usuario->des_usuario=$des_usuario;
		$usuario->des_password=md5($des_password);
		$usuario->ide_rol=$ide_rol;
		$usuario->ide_persona=$ide_persona;
		$usuario->correo=$des_correo;
		
		
		
		
			if(!$usuario->save()){
				$resultado = array('valor'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		

		return $resultado;
	}

		public function RestablecerPassword($ide_usuario, $des_password){
		$resultado = array('data'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$Usuario = sisusuario::model()->findByPk($ide_usuario);

		
			$Usuario->des_password=$des_password;
		
			if(!$Usuario->save()){
				$resultado = array('data'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');
			}
		

		return $resultado;
	}
	
	public function obtenerUsuarioxId($ide_usuario){		
		$sql = "select ide_usuario,des_usuario as Usuario,concat(e.des_apepat,' ',e.des_apemat,' ',e.des_nombres) as Empleado,r.des_nombre as Rol,estado from sisusuario as u Inner Join sispersona as e ON e.ide_persona=u.ide_persona Inner Join admrol as r ON r.ide_rol=u.ide_rol  WHERE ide_usuario=".$ide_usuario;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}

	public function obtenerUsuarioRolxId($ide_usuario){		
		$sql = "select ide_usuario,des_usuario as Usuario,concat(e.des_apepat,' ',e.des_apemat,' ',e.des_nombres) as Empleado,r.ide_rol as Rol,estado from sisusuario as u Inner Join sispersona as e ON e.ide_persona=u.ide_persona Inner Join admrol as r ON r.ide_rol=u.ide_rol  WHERE ide_usuario=".$ide_usuario;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}


	public function listadoUsuarios(){

$sql = "SELECT ide_usuario,des_usuario as Usuario,concat(p.des_nombres,' ',p.des_apepat,' ',p.des_apemat) as Empleado,r.des_nombre as Rol,estado  FROM sisusuario as u inner join admrol as r ON r.ide_rol=u.ide_rol inner join sispersona as p ON p.ide_persona=u.ide_persona";
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sisusuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('des_usuario, des_password, ide_rol, ide_persona, correo, estado', 'required'),
			array('des_usuario, des_password', 'length', 'max'=>50),
			array('ide_rol, ide_persona', 'length', 'max'=>10),
			array('correo', 'length', 'max'=>30),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ide_usuario, des_usuario, des_password, ide_rol, ide_persona, correo, estado', 'safe', 'on'=>'search'),
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
			'idePersona' => array(self::BELONGS_TO, 'Sispersona', 'ide_persona'),
			'ideRol' => array(self::BELONGS_TO, 'Admrol', 'ide_rol'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ide_usuario' => 'Ide Usuario',
			'des_usuario' => 'Des Usuario',
			'des_password' => 'Des Password',
			'ide_rol' => 'Ide Rol',
			'ide_persona' => 'Ide Persona',
			'correo' => 'Correo',
			'estado' => 'Estado',
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

		$criteria->compare('ide_usuario',$this->ide_usuario,true);
		$criteria->compare('des_usuario',$this->des_usuario,true);
		$criteria->compare('des_password',$this->des_password,true);
		$criteria->compare('ide_rol',$this->ide_rol,true);
		$criteria->compare('ide_persona',$this->ide_persona,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sisusuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
