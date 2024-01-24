

$('#retiroId').on('click', () => {
    $.get('./get_all/get_all_retiros.php',  // url
    function (data, textStatus, jqXHR) {  // success callback
        const users = data;
        let table = `

       <center>
    <h2>Retiros de Alumnos </h2></center> <br>
  <button class="btn btn-success" onclick="tableToExcel('tabla_retiro_legal', 'W3C Example Table')"> <img src="img/exporta_excel.png" width="30px" height="30px">Exportar a Excel</button>
  
        <br> <br>
        <table id="tabla_retiro_legal" class="table table-light  table-bordered" cellspacing="0" style="width:100%">
                <thead>
                <tr>
                <th class="th-sm table-dark">Fecha del Retiro</th>
                <th class="th-sm table-dark">Tipo de Retiro</th>
                <th class="th-sm table-dark">Tutor</th>
                <th class="th-sm table-dark">Alumno</th>
                <th class="th-sm table-dark">Opciones</th>
                    
                </tr>
                </thead>
                <tbody>
        `;
        users.forEach(user => {
            table = `${table}
            <tr>
                <td> ${user.fechaRetiro} </td>
                <td> ${user.tipoRetiro} </td>
                <td> ${user.tutor} </td>
                <td> ${user.nombre_alumno} </td>

                <td> 
                  <a class="btn btn-danger"  href="./controladores/ctrl_retiros_eliminar.php?idRegistroRetiro=${user.idRegistroRetiro}"  role="button">
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
        $('#tabla_retiro_legal').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
});

/*
function create_table(){
    $('#Tabla_Usuarios').DataTable();
    //$('.dataTables_length').addClass('bs-select');

}
*/