$(() => {
    $.get("../get_all/get_all_establecimientos_activos.php", (data) =>{
       const establecimientos = data;
       let select = `
       <select id="establecimientos" name="establecimientos">
       `;
       establecimientos.forEach(element => {
        select=`${select}
        <option value=${element.idEstablecimiento}>${element.nombre} </option>
        `;
       });
       select=`${select}</select>`;
       $('#establecimientos').html(select);
    })
})

