<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioServiceImpl
 *
 * @author jose.sanchez
 */
class UsuarioServiceImpl implements UsuarioService {
    public function autenticarUsuario($loginUser, $password) {

        if (empty($loginUser)) {
           // throw new Exception('Debe Ingresar el usuario.');
            return array('success' => FALSE,'message'=>'Debe Ingresar el usuario.');
        }
        
        if (empty($password)) {
            //throw new Exception('Debe Ingresar la contrase&ntilde;a.');
            return array('success' => FALSE,'message'=>'Debe Ingresar la contraseña.');
        }
        
        $usuario = $this->obtenerUsuarioByLoginUser($loginUser);
        if (empty($usuario)) {
            //throw new Exception('El usuario no existe');
            return array('success' => FALSE,'message'=>'El usuario no existe');
        }
        $passwordMD5 = md5($password);
        if($passwordMD5!=$usuario['des_password']){
            //throw new Exception('La Clave es incorrecta.');
            return array('success' => FALSE,'message'=>'La Clave es incorrecta.');
        }

        // HIZE CAMBIOS DESDE AQUI ==============================================
        $usuarioSistema = $this->obtenerUsuarioByLoginUser($loginUser, 1);
        $dataUsuario = $this->obtenerDataUsuario($usuario['ide_persona']);
     
        $data = array();
        $data['usuario'] = $usuarioSistema;
        $data['datausuario'] = $dataUsuario;
        $data['success'] = TRUE;
      
        return $data;
        
    }

    /**
      @author Lizandro Alipazaga <lalipazaga.sys@gmail.com>
      Metodo que obtiene el usuario por el des Login
     **/
    public function obtenerUsuarioByLoginUser($loginUser, $tipo=0) {
        $usuarioCriteria = new CDbCriteria();

        // HIZE CAMBIOS DESDE AQUI =================================
        if($tipo==1){
            $usuarioCriteria->select = 'des_usuario, ide_rol';
        }        
        $usuarioCriteria->addSearchCondition('des_usuario', $loginUser);
        $usuario = SisUsuario::model()->find($usuarioCriteria);
        if(empty($usuario)){return NULL;}
        return $usuario->attributes;
    }
    // HIZE CAMBIOS DESDE AQUI ================================================
    // ACTUALIZA TODO ESTE METODO
    public function obtenerDataUsuario($idePersona) {
        $usuarioCriteria = new CDbCriteria();
        $usuarioCriteria->addSearchCondition('ide_persona', $idePersona);
        $usuario = SisPersona::model()->find($usuarioCriteria);
        if(empty($usuario)){return NULL;}
        return $usuario->attributes;
    }

   

    public function findUsuarioByPk($id) {
        try {
            return Usuario::model()->findByPk($id)->attributes;
        } catch (Exception $exc) {
            return null;
        }
    }

    
}

?>
