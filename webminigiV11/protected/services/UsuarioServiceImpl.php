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
     
        $data = array();
        $data['usuario'] = $usuario;
        $data['success'] = TRUE;
      
        return $data;
        
    }

    /**
      @author Lizandro Alipazaga <lalipazaga.sys@gmail.com>
      Metodo que obtiene el usuario por el des Login
     **/
    public function obtenerUsuarioByLoginUser($loginUser) {
        $usuarioCriteria = new CDbCriteria();
        $usuarioCriteria->addSearchCondition('des_usuario', $loginUser);
        $usuario = SisUsuario::model()->find($usuarioCriteria);
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
