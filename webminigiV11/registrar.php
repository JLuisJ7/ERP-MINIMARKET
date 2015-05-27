<?php $ruta ="themes/classic";?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SISMIMA | Ingreso</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo $ruta;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo $ruta;?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo $ruta;?>/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Minimarket</b>MARIANA</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body" style="padding: 0px 45px 5px 45px;">
        <p class="login-box-msg">Crea tu cuenta</p>
        <form id="agregarUsuarioForm" method="post"  class="form-horizontal"   onclick="" >                  
<div class="form-group" id="fg-usuario">
<label class="control-label" for="add_Usuario">Usuario</label>
<input id="add_Usuario" name="add_Usuario" type="text" placeholder="" class="form-control input-md" value="">  
<small id="msg-user" class="help-block" style="display:none;"></small>      
</div>

<div class="form-group">
<label class="control-label" for="add_correo">Correo</label>
<input id="add_correo" name="add_correo" type="email" placeholder="" class="form-control input-md" value="">
</div>

 <div class="form-group">
<label class=" control-label" for="add_Password">Contraseña</label>
<input id="add_Password" name="add_Password" type="password" placeholder="" class="form-control input-md" value="">        
</div>
<div class="form-group">
<label class="control-label" for="add_confirmPassword">Confirmar Contraseña</label>

<input id="add_confirmPassword" name="add_confirmPassword" type="password" placeholder="" class="form-control input-md" value="">        

</div>
   

   <div class="form-group">
  
                    
                      <button type="submit" class="btn btn-primary" style="width:100%;  margin-bottom: 10px;">Registrar</button>
                      <a href="login.php"  id="cerrarmodal" class="btn btn-danger"    rel="tooltip" title="Retornar" style="width:100%;"><i class="fa fa-long-arrow-left"></i> Retornar</a>
                    
                  </div>
  </form><!-- /# usuarioForm -->
       
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo $ruta;?>/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo $ruta;?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo $ruta;?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="<?php echo $ruta;?>/bootstrap/js/bootstrapValidator.js" type="text/javascript"></script>
    <script>
      $(document).ready(function() {

        $("#add_Usuario").blur(function(event) {
          var des_usuario=$(this).val();
          if(des_usuario!=""){
            $.ajax({
                         type: "POST",
                            url: 'index.php?r=login/AjaxVerificarUsuario',
                            data: {
                                    des_usuario:des_usuario                                   

                                },
                       })
                       .done(function(resp) {                       
             data = resp.output;
             if(data.valor==1){
                  $("#msg-user").text(data.message);
                  $("#msg-user").show();
                  $("#fg-usuario").addClass('has-error');
                  $("#fg-usuario").removeClass('has-success');
             }else{
               $("#msg-user").text(data.message);
               $("#msg-user").hide();
               $("#fg-usuario").addClass('has-success')
               $("#fg-usuario").removeClass('has-error');
             }
             
                       })
          }
          


        });


        $('#agregarUsuarioForm').bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',                    
                    fields : {                        
                       /* 
                        
                        add_Rol: {
                            validators: {
                                notEmpty: {
                                    message: 'Seleccione un rol'
                                }
                             }
                        },*/
                        add_Usuario: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese un nombre de usuario'
                                }
                             }
                        },
                        add_correo: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese su correo electronico'
                                },
                                emailAddress: {
                                    message: 'Ingrese una direccion de correo valida'
                                }
                             }
                        },
                        add_Password: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese una contraseña'
                                }/*,
                                identical: {
                                    field: 'add_confirmPassword',
                                    message: 'The password and its confirm are not the same'
                                }*/
                             }
                        },
                        add_confirmPassword: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese nuevamente la contraseña'
                                },
                                identical: {
                                    field: 'add_Password',
                                    message: 'Las contraseñas no coinciden'
                                },
                            
                            }
                        }
                    },
                    submitHandler : function(form) {
                        var des_usuario=$("#add_Usuario").val();
                        var des_password=$("#add_Password").val();
                        var ide_rol=$("#add_Rol").val();
                        var des_correo=$("#add_correo").val();                  
                  
                       
                     
                       $.ajax({
                         type: "POST",
                            url: 'index.php?r=login/AjaxVerificarCorreo',
                            data: {
                                    /*des_usuario:des_usuario,
                                    des_password:des_password,
                                    ide_rol:6,*/
                                    des_correo:des_correo
                                },
                       })
                       .done(function(resp) {
                        
              data = resp.output;
              console.log(data);
              
              if(data.valor==0){
               alert("lo sentimos usted no pertenece a ala Empresa");
               $('#agregarUsuarioForm').bootstrapValidator('resetForm', true);
               $("#add_Usuario").val('');
               $("#msg-user").hide();
               $("#msg-user").text('');
               $("#fg-usuario").removeClass('has-success');
               $("#fg-usuario").removeClass('has-error');
              }else{
                var ide_persona=data.persona[0].ide_persona;
//-------------------------------------------------------------
               $.ajax({
                         type: "POST",
                            url: 'index.php?r=login/AjaxRegistrarUsuario',
                            data: {
                                    des_usuario:des_usuario,
                                    des_password:des_password,
                                    ide_rol:6,
                                    ide_persona:ide_persona,
                                    des_correo:des_correo

                                },
                       })
                       .done(function(resp) {
                        
             $('#agregarUsuarioForm').bootstrapValidator('resetForm', true);
             $("#add_Usuario").val('');
$("#msg-user").hide();
               $("#msg-user").text('');
               $("#fg-usuario").removeClass('has-success');
               $("#fg-usuario").removeClass('has-error');
              console.log("susses");
             
                       })

}
//--------------------------------------------------
                       })



                    }
                });
      });
    </script>
  </body>
</html>