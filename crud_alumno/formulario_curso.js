$(() => {
    $.get("../get_all/get_all_cursos.php", (data) =>{
       const cursos = data;
       let select = `
       <select id="cursos" name="cursos">
       `;
       cursos.forEach(element => {
        select=`${select}
        <option value=${element.idCurso}>${element.nombre} </option>
        `;
       });
       select=`${select}</select>`;
       $('#cursos').html(select);
    })
})

