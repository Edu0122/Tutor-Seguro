

$('#alumnoId').on('click', () => {
    $.get('./get_all/get_all_alumnos.php',  // url
    function (data, textStatus, jqXHR) {  // success callback
        const users = data;
        let table = `

       <center>
    <h2>Mantenedor de Alumnos </h2></center> <br>
    <a class="btn btn-info" href="./crud_alumno/formulario_alumno_ingresar.php" role="button">
    <i class="icon-primary ion-md-add-circle"></i>
    Ingresar Alumno
    </a> <br>
  <button class="btn btn-success" onclick="tableToExcel('tabla_alumnos', 'W3C Example Table')"> <img src="img/exporta_excel.png" width="30px" height="30px">Exportar a Excel</button>
  
        <br> <br>
        <table id="tabla_alumnos" class="table table-light  table-bordered" cellspacing="0" style="width:100%">
                <thead>
                <tr>
                <th class="th-sm table-dark">Nombre</th>
                <th class="th-sm table-dark">Rut</th>
                <th class="th-sm table-dark">Establecimiento</th>
                <th class="th-sm table-dark">Curso</th>
		<th class="th-sm table-dark">Letra Curso</th>
                <th class="th-sm table-dark">Tutor</th>
                <th class="th-sm table-dark">Opciones</th>
                    
                </tr>
                </thead>
                <tbody>
        `;
        users.forEach(user => {
            table = `${table}
            <tr>
                <td> ${user.nombre} </td>
                <td> ${user.rut} </td>
                <td> ${user.nombre_establecimiento} </td>
		<td> ${user.nombre_curso} </td>
                <td>  ${user.letraCurso} </td>
                <td> ${user.tutor} </td>

                <td> 
                  <a class="btn btn-dark"  href="./crud_alumno/formulario_alumno_modificar.php?idAlumno=${user.idAlumno}"  role="button">
                    <i class="icon-primary ion-md-hammer"></i>
        
                  </a> 

                  <a class="btn btn-danger"  href="./controladores/ctrl_alumnos_eliminar.php?idAlumno=${user.idAlumno}"  role="button">
                     <i class="icon-primary ion-md-remove-circle"></i>
                
                  </a> 

                 </td>
            </tr>
            `;
        })
        table = `${table}   
        </tbody> 
        </table>`;
        table = `${table}
           
         
        `
        $('#inicio').empty();
        $('#table').html(table);
        $('#tabla_alumnos').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
});

/*
function create_table(){
    $('#Tabla_Usuarios').DataTable();
    //$('.dataTables_length').addClass('bs-select');

}
*/