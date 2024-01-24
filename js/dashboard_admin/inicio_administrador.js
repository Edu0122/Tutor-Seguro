$(() =>{
  cargar_inicio();
})

$('#nada').on('click', () => {
cargar_inicio();
})


function cargar_inicio(){
    const text=`
    <center>
    
    <h1>Bienvenido a Tutor Seguro</h1>
        
    <img src="img/administrador.jpg" width="800px" height="500px">
    <center>
    
    
    `;
    $('#table').empty();
    $('#inicio').html(text);    
}
