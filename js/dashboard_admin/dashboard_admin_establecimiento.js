

$('#establecimientoId').on('click', () => {
    $.get('./get_all/get_all_establecimientos.php',  // url
    function (data, textStatus, jqXHR) {  // success callback
        const users = data;
        let table = `

       <center>
    <h2>Mantenedor de Establecimientos </h2></center> 
    <br>
    <a class="btn btn-info" href="./crud_establecimiento/formulario_establecimiento_ingresar.php" role="button">
    <i class="icon-primary ion-md-add-circle"></i>
    Ingresar Establecimiento
    </a>  <br>
  <button class="btn btn-success" onclick="tableToExcel('tabla_establecimientos', 'W3C Example Table')"> <img src="img/exporta_excel.png" width="30px" height="30px">Exportar a Excel</button>  
 
        <br> <br>
        <table id="tabla_establecimientos" class="table table-light  table-bordered" cellspacing="0" style="width:100%">
                <thead>
                <tr>
                    <th class="th-sm table-dark">Nombre</th>
                    <th class="th-sm table-dark">Dirección</th>
                    <th class="th-sm table-dark">RBD</th>
                    <th class="th-sm table-dark">Telefono</th>
                    <th class="th-sm table-dark">Director</th>
                    <th class="th-sm table-dark">Estado</th>
                    <th class="th-sm table-dark">Opciones</th>
                    
                </tr>
                </thead>
                <tbody>
        `;
        users.forEach(user => {
            table = `${table}
            <tr>
                <td> ${user.nombre} </td>
                <td> ${user.direccion} </td>
                <td> ${user.rbd} </td>
                <td> ${user.telefono} </td>
                <td> ${user.director} </td>
                <td> ${user.estado} </td>
                <td> 
                  <a class="btn btn-dark"  href="./crud_establecimiento/formulario_establecimiento_modificar.php?idEstablecimiento=${user.idEstablecimiento}"  role="button">
                    <i class="icon-primary ion-md-hammer"></i>
        
                  </a> 

                  <a class="btn btn-danger"  href="./controladores/ctrl_establecimientos_eliminar.php?idEstablecimiento=${user.idEstablecimiento}"  role="button">
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
        $('#tabla_establecimientos').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
});

/*
function create_table(){
    $('#Tabla_Usuarios').DataTable();
    //$('.dataTables_length').addClass('bs-select');

}
*/