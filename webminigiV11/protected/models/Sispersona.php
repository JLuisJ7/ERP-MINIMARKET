<?php

/**
 * This is the model class for table "sispersona".
 *
 * The followings are the available columns in table 'sispersona':
 * @property string $ide_persona
 * @property string $des_nombres
 * @property string $des_apepat
 * @property string $des_apemat
 * @property string $des_razonsocial
 * @property string $nro_documento
 * @property string $ide_tipodocumento
 * @property string $des_telefono
 * @property string $des_correo
 * @property string $ide_tipopersona
 * @property string $ide_condicion
 * @property string $ide_sexo
 * @property string $ide_estcivil
 * @property string $fec_nacimiento
 * @property string $ide_estado
 */
class SisPersona extends CActiveRecord
{
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
	* Se muestran los detalles de un empleado por codigo
	**/
	/*public function obtenerPersonaPorIde($idePersona){
		$sql = "";
		//echo "IDE PERSONA=".$ide_persona;
		$sql .= "SELECT ide_persona, des_nombres, des_apepat, des_apemat, des_razonsocial, nro_documento, des_telefono, ";
		$sql .= "des_correo, DATE_FORMAT(fec_nacimiento,'%d/%m/%Y') AS fec_nacimiento, ide_estado, ide_tipodocumento, ";
		$sql .= "ide_tipopersona, ide_sexo, ide_estcivil, ";
		$sql .= "(SELECT des_abrev FROM admcatalogo ac WHERE ac.ide_elemento=sp.ide_tipodocumento) AS des_tipodocumento, ";
		$sql .= "(SELECT des_nombre FROM admcatalogo ac WHERE ac.ide_elemento=sp.ide_tipopersona) AS des_tipopersona, ";
		$sql .= "(SELECT des_nombre FROM admcatalogo ac WHERE ac.ide_elemento=sp.ide_sexo) AS des_sexo, ";
		$sql .= "(SELECT des_nombre FROM admcatalogo ac WHERE ac.ide_elemento=sp.ide_estcivil) AS des_estcivil ";
		$sql .= "FROM sispersona sp ";
		$sql .= "WHERE sp.ide_persona=".$idePersona;

		return $this->findAllBySql($sql);
	}*/

	/**
	* Se elimina una persona
	**/
	/*public function actualizaEstadoPersonaPorIde($idePersona, $estado){
		$resultado = array('data'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		$persona = Sispersona::model()->findByPk($idePersona);

		if(count($persona)>0){
			$persona->ide_estado=$estado;

			if(!$persona->save()){
				$resultado = array('data'=>0, 'message'=>'No hemos podido realizar su 

					solicitud, intentelo nuevamente');
			}
		}else{
			$resultado = array('data'=>0, 'message'=>'No se pudo encontrar a la persona 

				seleccionada. ');
		}

		return $resultado;
	}*/
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
			array('nro_documento, ide_tipodocumento, ide_tipopersona, ide_condicion, ide_estado', 'required'),
			array('des_nombres, des_apepat, des_apemat, des_razonsocial', 'length', 'max'=>250),
			array('nro_documento', 'length', 'max'=>20),
			array('ide_tipodocumento, ide_tipopersona, ide_condicion, ide_sexo, ide_estcivil', 'length', 'max'=>10),
			array('des_telefono, des_correo, fec_nacimiento', 'length', 'max'=>45),
			array('ide_estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ide_persona, des_nombres, des_apepat, des_apemat, des_razonsocial, nro_documento, ide_tipodocumento, des_telefono, des_correo, ide_tipopersona, ide_condicion, ide_sexo, ide_estcivil, fec_nacimiento, ide_estado', 'safe', 'on'=>'search'),
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
			//'admcatalogo'=>array(),
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
			'des_razonsocial' => 'Des Razonsocial',
			'nro_documento' => 'Nro Documento',
			'ide_tipodocumento' => 'Ide Tipodocumento',
			'des_telefono' => 'Des Telefono',
			'des_correo' => 'Des Correo',
			'ide_tipopersona' => 'Ide Tipopersona',
			'ide_condicion' => 'Ide Condicion',
			'ide_sexo' => 'Ide Sexo',
			'ide_estcivil' => 'Ide Estcivil',
			'fec_nacimiento' => 'Fec Nacimiento',
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
		$criteria->compare('des_razonsocial',$this->des_razonsocial,true);
		$criteria->compare('nro_documento',$this->nro_documento,true);
		$criteria->compare('ide_tipodocumento',$this->ide_tipodocumento,true);
		$criteria->compare('des_telefono',$this->des_telefono,true);
		$criteria->compare('des_correo',$this->des_correo,true);
		$criteria->compare('ide_tipopersona',$this->ide_tipopersona,true);
		$criteria->compare('ide_condicion',$this->ide_condicion,true);
		$criteria->compare('ide_sexo',$this->ide_sexo,true);
		$criteria->compare('ide_estcivil',$this->ide_estcivil,true);
		$criteria->compare('fec_nacimiento',$this->fec_nacimiento,true);
		$criteria->compare('ide_estado',$this->ide_estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SisPersona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
