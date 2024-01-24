

$('#apoderadoId').on('click', () => {
    $.get('./get_all/get_all_apoderados.php',  // url
    function (data, textStatus, jqXHR) {  // success callback
        const users = data;
        let table = `

       <center>
    <h2>Mantenedor de Tutores</h2></center> <br>
    <a class="btn btn-info" href="./crud_apoderado/formulario_apoderado_ingresar.php" role="button">
    <i class="icon-primary ion-md-add-circle"></i>
    Ingresar Tutor
     </a> <br>
  <button class="btn btn-success" onclick="tableToExcel('tabla_apoderados', 'W3C Example Table')"> <img src="img/exporta_excel.png" width="30px" height="30px">Exportar a Excel</button>
  
        <br> <br>
        <table id="tabla_apoderados" class="table table-light  table-bordered" cellspacing="0" style="width:100%">
                <thead>
                <tr>
                    <th class="th-sm table-dark">Nombre</th>
                    <th class="th-sm table-dark">Rut</th>
                    <th class="th-sm table-dark">Dirección</th>
                    <th class="th-sm table-dark">Teléfono</th>
                    <th class="th-sm table-dark">Establecimiento</th>
                    <th class="th-sm table-dark">Tipo de Tutor</th>
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
                <td> ${user.direccion} </td>
                <td> ${user.telefono} </td>
                <td> ${user.nombre_establecimiento} </td>
                <td> ${user.tipo_apoderado} </td>
                <td> 
                  <a class="btn btn-dark"  href="./crud_apoderado/formulario_apoderado_modificar.php?idApoderado=${user.idApoderado}"  role="button">
                    <i class="icon-primary ion-md-hammer"></i>
        
                  </a> 

                  <a class="btn btn-danger"  href="./controladores/ctrl_apoderados_eliminar.php?idApoderado=${user.idApoderado}"  role="button">
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
        $('#tabla_apoderados').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
});

/*
function create_table(){
    $('#Tabla_Usuarios').DataTable();
    //$('.dataTables_length').addClass('bs-select');

}
*/