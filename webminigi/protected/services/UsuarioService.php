<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Lizandro Alipazaga
 */
interface UsuarioService {
    //put your code here
    public function autenticarUsuario($loginUser, $password);
    public function obtenerUsuarioByLoginUser($loginUser);
    public function findUsuarioByPk($id);
}

?>
