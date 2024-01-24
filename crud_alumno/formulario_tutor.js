$(() => {
    $.get("../get_all/get_all_apoderados.php", (data) =>{
       const tutor_legal = data;
       let select = `
       <select id="tutor" name="tutor">
       `;
       tutor_legal.forEach(element => {
        select=`${select}
        <option value=${element.idApoderado}>${element.nombre} </option>
        `;
       });
       select=`${select}</select>`;
       $('#tutor').html(select);
    })
})

