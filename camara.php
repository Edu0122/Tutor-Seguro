<?php
session_start();

if(isset($_SESSION['user']))
{
    include('../funciones/setup.php');


    if(isset($_GET['idusu']))
    {
        $sqlusu="select * from usuario where id_usuario=".$_GET['idusu'];
        $resultusu=mysqli_query(conectar(),$sqlusu);
        $datosusu=mysqli_fetch_array($resultusu);
    }
?>
<html>

<head>
<link rel="icon" href="img/favicon_tutorseguro.ico" type="image/x-icon" />
    <title>Reconocimiento Facial</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	
    <style type="text/css">

    .modalB {
        width: 120px;
        padding: 10px;
        display: block;
        margin: 20px auto;
        border: 2px solid #111111;
        cursor: pointer;
        background-color: white;
        text-align:center;
    }

    #start-camera {
        margin-top: 50px;
    }

    #video {
        display: none;
        margin: 50px auto 0 auto;
    }

    #click-photo {
        display: none;
		
    }

    #dataurl-container {
        display: none;
    }

    #canvas {
        display: block;
        margin: 0 auto 20px auto;
    }

    #dataurl-header {
        text-align: center;
        font-size: 15px;
    }

    #dataurl {
        display: block;
        height: 100px;
        width: 320px;
        margin: 10px auto;
        resize: none;
        outline: none;
        border: 1px solid #111111;
        padding: 5px;
        font-size: 13px;
        box-sizing: border-box;
    }
	
	 /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    .modal2 {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }
    .modal3 {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }


    /* Modal Content/Box */
    .modal-content {
        background-color: #00701a;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    .modal-content2 {
        background-color: #b61827;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    .modal-content3 {
        background-color: #00701a;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }


    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .close2 {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close2:hover,
    .close2:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .close3 {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close3:hover,
    .close3:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    </style>


<link rel="stylesheet" type="text/css" href="css/camara.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<body>
<div class="contenedor-camara">
<h1 >Reconocimiento Facial</h1>
<center><img src="img/Logo_TutorSeguro.PNG" width="150px" height="120px"></center>
<video id="video" width="900" height="500" autoplay=""></video>
    <button class="modalB"  id="start-camera">Activar Camara</button>
    <button class="modalB" id="click-photo">Reconocer Rostro</button>
    <div id="dataurl-container">
        <canvas id="canvas" width="900" height="500"></canvas>
        <div id="dataurl-header">Image Data URL</div>
        <textarea id="dataurl" readonly=""></textarea>
    </div>


	<!-- Trigger/Open The Modal -->

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <center><h1>Autorizado </h1></center>
            <p> Nombre Apoderado: <span id="nombreAp"> </span></p>
            <p>Nombre alumno: <span id="nombreAl"> </span></p>
            <button onclick=registrarRetiro() class="modalB">Registrar retiro </button>
        </div>

    </div>

    <!-- Trigger/Open The Modal -->

    <!-- The Modal -->
    <div id="myModal2" class="modal2">

        <!-- Modal content -->
        <div class="modal-content2">
            <span class="close2">&times;</span>
            <center><h1>No Autorizado </h1></center>
        </div>

    </div>

     
    <div id="myModal3" class="modal3">
        <!-- Modal content -->
        <div class="modal-content3">
            <span class="close3">&times;</span>
            <center><h1>Autorizado</h1></center>
        </div>
        </div>

    </div>

    <script>
    // Get the modal
    var modal = document.getElementById("myModal");
    var modal2 = document.getElementById("myModal2");
    var modal3 = document.getElementById("myModal3");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    var btn2 = document.getElementById("myBtn2");
    var btn3 = document.getElementById("myBtn3");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    var span2 = document.getElementsByClassName("close2")[0];
    var span3 = document.getElementsByClassName("close3")[0];


    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    span2.onclick = function() {
        modal2.style.display = "none";
    }
    span3.onclick = function() {
        modal3.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    window.onclick = function(event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
    window.onclick = function(event) {
        if (event.target == modal3) {
            modal3.style.display = "none";
        }
    }



    let camera_button = document.querySelector("#start-camera");
    let video = document.querySelector("#video");
    let click_button = document.querySelector("#click-photo");
    let canvas = document.querySelector("#canvas");
    let dataurl = document.querySelector("#dataurl");
    let dataurl_container = document.querySelector("#dataurl-container");

    camera_button.addEventListener('click', async function() {
        let stream = null;

        try {
            stream = await navigator.mediaDevices.getUserMedia({
                video: true,
                audio: false
            });
        } catch (error) {
            alert(error.message);
            return;
        }

        video.srcObject = stream;

        video.style.display = 'block';
        camera_button.style.display = 'none';
        click_button.style.display = 'block';
    });

    function dataURItoBlob(dataURI) {
        // convert base64/URLEncoded data component to raw binary data held in a string
        var byteString;
        if (dataURI.split(',')[0].indexOf('base64') >= 0)
            byteString = atob(dataURI.split(',')[1]);
        else
            byteString = unescape(dataURI.split(',')[1]);

        // separate out the mime component
        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

        // write the bytes of the string to a typed array
        var ia = new Uint8Array(byteString.length);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }

        return new Blob([ia], {
            type: mimeString
        });
    }

    function sacarImagen() {
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        let image_data_url = canvas.toDataURL('image/jpeg');
        var imagen = dataURItoBlob(image_data_url);

        var form = new FormData();
        form.append("file", imagen);


        var settings = {
            "url": "http://52.55.92.41:5000",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form
        };

        $.ajax(settings).done(function(response) {
            setTimeout(sacarImagen, 4000);
            var resultado = JSON.parse(response)
            if (resultado.length == 0) {
                return;
            }
            for (var i = 0; i < resultado.length; i++) {
                if (resultado[i].distancia < 0.6) {
                    modal.style.display = "block";
                    setTimeout(function(){
                        modal.style.display = "none";
                        }, 2000);

                    obtenerAlumno(resultado[i].nombre);
                    
                    registrarRetiro();
                    return;
                }
            }
            modal2.style.display = "block";
                    setTimeout(function(){
                        modal2.style.display = "none";
                        }, 2000);
        });

       
    }

    setTimeout(sacarImagen, 4100);

    click_button.addEventListener('click', function() {
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        let image_data_url = canvas.toDataURL('image/jpeg');
        var imagen = dataURItoBlob(image_data_url);

        var form = new FormData();
        form.append("file", imagen);


        var settings = {
            "url": "http://52.55.92.41:5000",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form
        };

        $.ajax(settings).done(function(response) {
            var resultado = JSON.parse(response)
            if (resultado.length == 0) {
                return;
            }
            for (var i = 0; i < resultado.length; i++) {
                if (resultado[i].distancia < 0.55) {
                    modal.style.display = "block";
                    // $("p").append(" " + resultado[i].nombre);
                    obtenerAlumno(resultado[i].nombre);
                    return;
                }
            }
            modal2.style.display = "block";
            console.log(response);
        });
    });

    function obtenerAlumno(foto) {
        var settings = {
            "url": "get_all/get_all_alumnos by photo.php",
            "type": "POST",
            "timeout": 0,
            "data": {
                foto: foto
            }
        };

        $.ajax(settings).done(function(response) {
            response2 = response;
            if (response.length > 0) {
                $("#nombreAl").html(" " + response[0].nombre);
                $("#nombreAp").html(" " + response[0].tutor_legal);

            }
            console.log(response);
            console.log(response2);
        });
    }

    var response2 = null;

    function registrarRetiro() {
        
        if (response2 != null && response2.length > 0 ) {
            var settings = {
                "url": "controladores/ctrl_retiros_ingresar.php",
                "type": "POST",
                "timeout": 0,
                "data": {
                    tiporetiro: 1,
                    idAlumno: response2[0].idAlumno,
                    idApoderado: response2[0].id_apoderado
                }
            };

            $.ajax(settings).done(function(response) {
                // var resultado = JSON.parse(response);
            });
        }
    }
    </script>


<container class="caja">
<h2 class="titulo"> Envío de Sms </h2>
<div role="form" class="form-horizontal" >
  <div class="form-group">
    <label class="control-label col-sm-2">Apoderado</label>
    <div class="col-sm-4">
      <select class="form-control apoderados">
       <option value="">--Select--</option>
     </select>
   </div>
 </div>
 <div class="form-group">
  <label class="control-label col-sm-2">Alumno</label>
  <div class="col-sm-4">
   <select class="form-control alumnos">
     <option value="">--Select--</option>
   </select>
 </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2">Telefono</label>
  <div class="col-sm-4">
   <select class="form-control telefono">
     <option value="">--Select--</option>
   </select>
 </div>
 <h3 class="titulo">Enviar Sms</h3>
<button class="smsButton">Enviar sms</button>
</div>
<h2 class="titulo">Enviar Código para el retiro</h2>
<input type="text" class="clave">
<div class="espacio"></div>
<button class="valButton"> Validar </button>
<div class="espacio"></div>
<p class="inner">Resultado: </p>



</container>


</body>

<script type="text/javascript">
	
$(document).ready(function(){
    /*Get the country list */
      $.ajax({
        type: "GET",
        url: "get_all/get_apoderados.php",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $('.apoderados').find("option:eq(0)").html("Please wait..");
        },                         
        success: function (data) {
          /*get response as json */
           $('.apoderados').find("option:eq(0)").html("Selecciona Apoderado");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.apoderados').append(option);
         });  
          /*ends */
          
        }
      });
    /*Get the state list */
    $('.apoderados').change(function(){
      $.ajax({
        type: "POST",
        url: "get_all/get_alumnos.php",
        data:{idApoderado:$(this).val()}, 
        beforeSend :function(){
      $(".alumnos option:gt(0)").remove(); 
      $(".telefono option:gt(0)").remove(); 
      $('.alumnos').find("option:eq(0)").html("Please wait..");
        },                         
        success: function (data) {
          /*get response as json */
           $('.alumnos').find("option:eq(0)").html("Select Alumno");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.alumnos').append(option);
         });  
          /*ends */
          
        }
      });
    });
    /*Get the state list */
    $('.apoderados').change(function(){
      $.ajax({
        type: "POST",
        url: "get_all/get_telefono.php",
        data:{idApoderado:$(this).val()}, 
          beforeSend :function(){
   
      $(".telefono option:gt(0)").remove(); 
      $('.telefono').find("option:eq(0)").html("Please wait..");
        },  
        success: function (data) {
          /*get response as json */
            $('.telefono').find("option:eq(0)").html("Telefono");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.label).text(this.label);
           $('.telefono').append(option);
         });  
          
          /*ends */
          
        }
      });
    });

    $('.smsButton').click(function(){
      
      console.log($('.apoderados').val() );
      console.log($('.telefono').val());

      var settings = {
                "url": "controladores/ctrl_sms_ingresar.php",
                "type": "POST",
                "timeout": 0,
                "data": {
                    idApoderado: $('.apoderados').val() ,
                    telefono: $('.telefono').val()
                }
            };

            $.ajax(settings).done(function(response) {
                // var resultado = JSON.parse(response);
                enviarSms($('.telefono').val(),response)
            });
    
    });



  $('.valButton').click(function(){
      
      var settings = {
                "url": "controladores/ctrl_codigo_ingresar.php",
                "type": "POST",
                "timeout": 0,
                "data": {
                    clave: $('.clave').val() ,
                    idApoderado: $('.apoderados').val() ,
                    idAlumno: $('.alumnos').val()

                }
            };

            $.ajax(settings).done(function(response) {
                modal3.style.display = "block";
                return;

            }).fail(function(response) 
            {
                modal2.style.display = "block";
            });
 
    });
  });
  


function enviarSms(telefono,codigo){

  var settings = {
  "url": "controladores/enviarSms.php",
  "type": "POST",
                "timeout": 0,
                "data": {
                    telefono: telefono ,
                    codigo: codigo
                }
            };

$.ajax(settings).done(function (response) {
  console.log(response);
});

}

</script>


</html>
<?php
}else{
    header('Location:acceso_denegado.php');
}
?>