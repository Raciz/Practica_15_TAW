<?php

class mvcSession
{
    //Control para poder mostrar la informacion de una carrera a editar
    public function mostrarSessionController($id)
    {
        //se obtiene el id de la carrera a mostrar su informacion
        $data = $id;

        //se manda el id de la carrera y el nombre de la tabla donde esta almacenada
       // $resp = CRUDCarrera::editarCarreraModel($data,"carrera");

        //se imprime la informacion de la carrera en inputs de un formulario
        echo "
                <p>
                    <b>ID:</b>
                    <br>
                    1530326
                  </p>
                  <p>
                    <b>Name:</b>
                    <br>
                    Angy Carreón Peréz
                  </p>
                  <p>
                    <b>Group:</b>
                    <br>
                    ENG-9A
                  </p>
                  <p>
                    <b>Career:</b>
                    <br>
                    Ingeniería en Tecnologías de la Información
                  </p>";
    }
}
?>
