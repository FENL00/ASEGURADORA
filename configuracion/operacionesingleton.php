<?php
require_once "singleton.php";
class Operaciones
{

    public function mostrarasuradorapersona()
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM usuario";
        $result = $con->db->prepare($sql);
        $result->execute(); // ejecutar result
        $affected_rows = $result->fetchAll();
        return ($affected_rows);
        //retorna numerico
    }

    public function mostrarusuarioID($id)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM usuario WHERE id=:id";
        $result = $con->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
        $affected_rows = $result->fetch(PDO::FETCH_ASSOC);
        return ($affected_rows);
        //retorna numerico
    }

    public function validarsesion($usuario, $contrasena)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT count(*) FROM usuario WHERE u_identificacion=:usuario AND u_contrasena=:contrasena ";
        $result = $con->db->prepare($sql);
        $params = array("usuario" => $usuario, "contrasena" => $contrasena);
        $result->execute($params);
        $affected_rows = $result->fetchColumn();
        return ($affected_rows);
        //retorna numerico
    }

    public function sesionID($usuario, $contrasena)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM usuario WHERE u_identificacion=:usuario AND u_contrasena=:contrasena ";
        $result = $con->db->prepare($sql);
        $params = array("usuario" => $usuario, "contrasena" => $contrasena);
        $result->execute($params);
        $affected_rows = $result->fetchAll();
        return ($affected_rows);
    }

    public function mostrarsesiones()
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM usuario, sesion WHERE s_id = u_id ORDER BY s_id DESC ";
        $result = $con->db->prepare($sql);
        $result->execute();
        $affected_rows = $result->fetchAll();
        return ($affected_rows);
    }

    public function mostrarsesionesbuscar($identificacion)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM usuario, sesion WHERE s_id = u_id AND u_identificacion=:identificacion ORDER BY s_id DESC ";
        $result = $con->db->prepare($sql);
        $params = array("identificacion" => $identificacion);
        $result->execute($params);
        $affected_rows = $result->fetchAll();
        return ($affected_rows);
    }

    public function nuevasesion($usuario, $ip, $fecha)
    {
        $con = Singleton::getInstance();
        $sql = "INSERT INTO sesion(s_usuario, s_ip, s_fecha) ";
        $sql .= " VALUES( ";
        $sql .= " :usuario,:ip,:fecha)";
        $result = $con->db->prepare($sql);
        $params = array("usuario" => $usuario, "ip" => $ip, "fecha" => $fecha);
        $result->execute($params);
    }


    public function eliminarsesion($id)
    {
        $con = Singleton::getInstance();
        $sql = "DELETE FROM sesion WHERE s_id=:id";
        $result = $con->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
    }


    public function validarusuario($identificacion)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT count(*) FROM usuario WHERE u_identificacion=:identificacion ";
        $result = $con->db->prepare($sql);
        $params = array("identificacion" => $identificacion);
        $result->execute($params);
        $affected_rows = $result->fetchColumn();
        return ($affected_rows);
        //retorna numerico
    }
    public function mostrarpersonas()
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM usuario, persona WHERE u_id = p_usuario ORDER BY p_id DESC;";
        $result = $con->db->prepare($sql);
        $result->execute(); // ejecutar result
        $affected_rows = $result->fetchAll();
        return ($affected_rows);
        //retorna numerico
    }

    public function mostrarpersonasidentificacion($identificacion)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM usuario, persona WHERE u_id = p_usuario AND u_identificacion=:identificacion ORDER BY p_id DESC;";
        $result = $con->db->prepare($sql);
        $params = array("identificacion" => $identificacion);
        $result->execute($params);
        $affected_rows = $result->fetchAll();
        return ($affected_rows);
        //retorna numerico
    }


    

    public function nuevousuario($identificacion, $nombres, $apellidos, $celular, $correo, $contrasena, $rol)
    {
        $con = Singleton::getInstance();
        $sql = "INSERT INTO usuario(u_identificacion, u_nombres, u_apellidos, u_celular, u_correo, u_contrasena, u_rol) ";
        $sql .= " VALUES( ";
        $sql .= " :identificacion,:nombres,:apellidos,:celular,:correo,:contrasena,:rol)";
        $result = $con->db->prepare($sql);
        $params = array("identificacion" => $identificacion, "nombres" => $nombres, "apellidos" => $apellidos, "celular" => $celular, "correo" => $correo, "contrasena" => $contrasena, "rol" => $rol);
        $result->execute($params);
    }

    public function actualizarusuario($identificacion, $nombres, $apellidos, $celular, $correo, $contrasena, $rol, $id)
    {
        $con = Singleton::getInstance();
        $sql = "UPDATE usuario SET u_identificacion=:identificacion, u_nombres=:nombres, u_apellidos=:apellidos, u_celular=:celular, u_correo=:correo, u_contrasena=:contrasena, u_rol=:rol WHERE u_id=:id ";
        $result = $con->db->prepare($sql);
        $params = array("identificacion" => $identificacion, "nombres" => $nombres, "apellidos" => $apellidos, "celular" => $celular, "correo" => $correo, "contrasena" => $contrasena, "rol" => $rol, "id" => $id);
        $result->execute($params);
    }

    public function buscarusuario($id)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM usuario WHERE u_id=:id";
        $result = $con->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
        $affected_rows = $result->fetchAll();
        return ($affected_rows);
        //retorna numerico
    }

    /// PERSONAS
    public function buscarpersona($id)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM persona WHERE p_usuario=:id";
        $result = $con->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
        $affected_rows = $result->fetch(PDO::FETCH_ASSOC);
        return ($affected_rows);
        //retorna numerico
    }

    public function cantidadpersona($id)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT COUNT(*) FROM persona WHERE p_usuario=:id";
        $result = $con->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
        $affected_rows = $result->fetchColumn();
        return ($affected_rows);
        //retorna numerico
    }

    public function nuevapersona($usuario, $fechanacimiento, $ciudad, $direccion, $empresa, $cargo, $celularempresa, $ingreso, $egreso, $tiposeguro, $estadoseguro)
    {
        $con = Singleton::getInstance();
        $sql = "INSERT INTO persona(p_usuario, p_fechanacimiento , p_ciudad, p_direccion, p_empresa, p_cargo, p_celularempresa, p_ingreso, p_egreso, p_tiposeguro, p_estadoseguro) ";
        $sql .= " VALUES( ";
        $sql .= " :usuario, :fechanacimiento,  :ciudad, :direccion, :empresa, :cargo, :celularempresa, :ingreso, :egreso, :tiposeguro, :estadoseguro)";
        $result = $con->db->prepare($sql);
        $params = array("usuario" => $usuario, "fechanacimiento" => $fechanacimiento, "ciudad" => $ciudad, "direccion" => $direccion, "empresa" => $empresa, "cargo" => $cargo, "celularempresa" => $celularempresa, "ingreso" => $ingreso, "egreso" => $egreso, "tiposeguro" => $tiposeguro, "estadoseguro" => $estadoseguro);
        $result->execute($params);
    }

    public function actualizarpersona($usuario, $fechanacimiento, $ciudad, $direccion, $empresa, $cargo, $celularempresa, $ingreso, $egreso, $tiposeguro, $estadoseguro, $id)
    {
        $con = Singleton::getInstance();
        $sql = "UPDATE persona SET p_usuario=:usuario, p_fechanacimiento=:fechanacimiento,  p_ciudad=:ciudad, p_direccion=:direccion, p_empresa=:empresa, p_cargo=:cargo, p_celularempresa=:celularempresa, p_ingreso=:ingreso, p_egreso=:egreso, p_tiposeguro=:tiposeguro, p_estadoseguro=:estadoseguro WHERE p_id=:id";
        $result = $con->db->prepare($sql);
        $params = array("usuario" => $usuario, "fechanacimiento" => $fechanacimiento, "ciudad" => $ciudad, "direccion" => $direccion, "empresa" => $empresa, "cargo" => $cargo, "celularempresa" => $celularempresa, "ingreso" => $ingreso, "egreso" => $egreso, "tiposeguro" => $tiposeguro, "estadoseguro" => $estadoseguro, "id" => $id);
        $result->execute($params);
    }

    
    public function eliminarpersona($id)
    {
        $con = Singleton::getInstance();
        $sql = "DELETE FROM persona WHERE p_id=:id";
        $result = $con->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
    }

//  VEHICULO

public function mostrarvehiculidentificacion($identificacion)
{
    $con = Singleton::getInstance();
    $sql = "SELECT * FROM vehiculo, usuario WHERE u_id = v_usuario AND u_identificacion=:identificacion ORDER BY v_id DESC;";
    $result = $con->db->prepare($sql);
    $params = array("identificacion" => $identificacion);
    $result->execute($params);
    $affected_rows = $result->fetchAll();
    return ($affected_rows);
    //retorna numerico
}

public function mostrarvehiculo()
{
    $con = Singleton::getInstance();
    $sql = "SELECT * FROM vehiculo, usuario WHERE u_id = v_usuario ORDER BY v_id DESC;";
    $result = $con->db->prepare($sql);
    $result->execute(); // ejecutar result
    $affected_rows = $result->fetchAll();
    return ($affected_rows);
    //retorna numerico
}

    public function buscarvehiculo($id)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM vehiculo WHERE v_usuario=:id";
        $result = $con->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
        $affected_rows = $result->fetch(PDO::FETCH_ASSOC);
        return ($affected_rows);
        //retorna numerico
    }


    
    public function  validarvehiculo($placa)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT COUNT(*) FROM  vehiculo WHERE v_placa=:placa";
        $result = $con->db->prepare($sql);
        $params = array("placa" => $placa);
        $result->execute($params);
        $affected_rows = $result->fetchColumn();
        return ($affected_rows);
        //retorna numerico
    }


    public function nuevovehiculo($usuario, $uso , $placa, $matricula, $tipovehiculo, $marca, $modelo, $licencia, $tiposeguro, $estadoseguro)
    {
        $con = Singleton::getInstance();
        $sql = "INSERT INTO vehiculo(v_usuario, v_uso, v_placa, v_matricula, v_tipovehiculo, v_marca, v_modelo, v_licencia, v_tiposeguro, v_estadoseguro)   ";
        $sql .= " VALUES( ";
        $sql .= " :usuario, :uso, :placa, :matricula,:tipovehiculo, :marca, :modelo, :licencia, :tiposeguro, :estadoseguro)";
        $result = $con->db->prepare($sql);
        $params = array("usuario" => $usuario, "uso" => $uso, "placa" => $placa, "matricula" => $matricula, "tipovehiculo" => $tipovehiculo, "marca" => $marca, "modelo" => $modelo, "licencia" => $licencia,  "tiposeguro" => $tiposeguro, "estadoseguro" => $estadoseguro);
        $result->execute($params);
    }

    public function actualizarvehiculo($usuario,  $uso , $placa, $matricula, $tipovehiculo, $marca, $modelo, $licencia, $tiposeguro, $estadoseguro, $id)
    {
        $con = Singleton::getInstance();
        $sql = "UPDATE vehiculo SET v_usuario=:usuario, v_uso=:uso,v_placa=:placa,v_matricula=:matricula,v_tipovehiculo=:tipovehiculo,v_marca=:marca,v_modelo=:modelo,v_licencia=:licencia, v_tiposeguro=:tiposeguro, v_estadoseguro=:estadoseguro WHERE v_id=:id;";
        $result = $con->db->prepare($sql);
        $params = array("usuario" => $usuario, "uso" => $uso, "placa" => $placa,  "matricula" => $matricula, "tipovehiculo" => $tipovehiculo, "marca" => $marca, "modelo" => $modelo, "licencia" => $licencia,  "tiposeguro" => $tiposeguro, "estadoseguro" => $estadoseguro, "id" => $id);
        $result->execute($params);
    }

       
    public function eliminarvehiculo($id)
    {
        $con = Singleton::getInstance();
        $sql = "DELETE FROM vehiculo WHERE v_id=:id";
        $result = $con->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
    }



    /// VIVEIVNDA
    public function mostrarvivienda()
{
    $con = Singleton::getInstance();
    $sql = "SELECT * FROM vivienda, usuario WHERE u_id = vi_usuario ORDER BY vi_id DESC;";
    $result = $con->db->prepare($sql);
    $result->execute(); // ejecutar result
    $affected_rows = $result->fetchAll();
    return ($affected_rows);
    //retorna numerico
}

public function mostrarviviendaidentificacion($identificacion)
{
    $con = Singleton::getInstance();
    $sql = "SELECT * FROM vivienda, usuario WHERE u_id = vi_usuario AND u_identificacion=:identificacion ORDER BY vi_id DESC;";
    $result = $con->db->prepare($sql);
    $params = array("identificacion" => $identificacion);
    $result->execute($params);
    $affected_rows = $result->fetchAll();
    return ($affected_rows);
    //retorna numerico
}

    public function buscarvivienda($id)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT * FROM vivienda WHERE vi_usuario=:id";
        $result = $con->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
        $affected_rows = $result->fetch(PDO::FETCH_ASSOC);
        return ($affected_rows);
        //retorna numerico
    }

    public function validarvivienda($escritura)
    {
        $con = Singleton::getInstance();
        $sql = "SELECT COUNT(*) FROM  vivienda WHERE vi_escritura=:escritura";
        $result = $con->db->prepare($sql);
        $params = array("escritura" => $escritura);
        $result->execute($params);
        $affected_rows = $result->fetchColumn();
        return ($affected_rows);
        //retorna numerico
    }

    public function nuevavivienda($usuario, $tipovivienda, $escritura, $zona, $estrato, $departamento, $ciudad, $direccion, $tiposeguro, $estadoseguro)
    {
        $con = Singleton::getInstance();
        $sql = "INSERT INTO vivienda (vi_usuario, vi_tipovivienda, vi_escritura, vi_zona, vi_estrato, vi_departamento, vi_ciudad, vi_direccion, vi_tiposeguro, vi_estadoseguro)  ";
        $sql .= " VALUES( ";
        $sql .= " :usuario, :tipovivienda, :escritura, :zona, :estrato, :departamento, :ciudad, :direccion, :tiposeguro, :estadoseguro)";
        $result = $con->db->prepare($sql);
        $params = array("usuario" => $usuario, "tipovivienda" => $tipovivienda, "escritura" => $escritura, "zona" => $zona, "estrato" => $estrato, "departamento" => $departamento, "ciudad" => $ciudad, "direccion" => $direccion, "tiposeguro" => $tiposeguro, "estadoseguro" => $estadoseguro);
        $result->execute($params);
    }

    public function actualizarvivienda($usuario, $tipovivienda, $escritura, $zona, $estrato, $departamento, $ciudad, $direccion, $tiposeguro, $estadoseguro, $id)
    {
        $con = Singleton::getInstance();
        $sql = "UPDATE vivienda SET vi_usuario=:usuario, vi_tipovivienda=:tipovivienda, vi_escritura=:escritura, vi_zona=:zona, vi_estrato=:estrato, vi_departamento=:departamento, vi_ciudad=:ciudad, vi_direccion=:direccion, vi_tiposeguro=:tiposeguro , vi_estadoseguro=:estadoseguro WHERE vi_id=:id";
        $result = $con->db->prepare($sql);
        $params = array("usuario" => $usuario, "tipovivienda" => $tipovivienda, "escritura" => $escritura, "zona" => $zona, "estrato" => $estrato, "departamento" => $departamento, "ciudad" => $ciudad, "direccion" => $direccion, "tiposeguro" => $tiposeguro, "estadoseguro" => $estadoseguro, "id" => $id);
        $result->execute($params);
    }

       
    public function eliminarvivienda($id)
    {
        $con = Singleton::getInstance();
        $sql = "DELETE FROM vivienda WHERE vi_id=:id";
        $result = $con->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
    }
}
