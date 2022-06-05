// image function
$('#imageInput').on('change', function() {
    $input = $(this);
    if($input.val().length > 0) {
        fileReader = new FileReader();
        fileReader.onload = function (data) {
        $('.image-preview').attr('src', data.target.result);
        }
        fileReader.readAsDataURL($input.prop('files')[0]);
        //console.log($input.prop('files')[0])
        $('.image-button').css('display', 'none');
        $('.image-preview').css('display', 'block');
        $('.change-image').css('display', 'block');
    }
});
                        
$('.change-image').on('click', function() {
    $control = $(this);			
    $('#imageInput').val('');	
    $preview = $('.image-preview');
    $preview.attr('src', '');
    $preview.css('display', 'none');
    $control.css('display', 'none');
    $('.image-button').css('display', 'block');
});


function finish(){
    var url = "/tona-father/participating/"; 
    window.location = url; 
}


$("#picture").hide();  
 function next(){
    $("#register").hide();  // hide
    $("#picture").show();  // show
}



function send(){

    var name        = document.getElementById('nombre').value;
    var secondName  = document.getElementById('apellido').value;
    var cui         = document.getElementById('cui').value;
    var email       = document.getElementById('email').value;
    var phone       = document.getElementById('telefono').value;
    let _check = true;
    var comment      = document.getElementById('comentario').value;
    var photo      = document.getElementById('imageInput');
    let file =       photo.files[0];
    let formData = new FormData();
    formData.append('nombre',name);
    formData.append('apellido',secondName);
    formData.append('cui',cui);
    formData.append('email',email);
    formData.append('telefono',phone);
    formData.append('check',_check);
    formData.append('fileToUpload',file);

    // Display the values
for (var value of formData.values()) {
    console.log(value);
 }

    if(comment != "" && photo != ""){
        

        $.ajax({
            url: '../uploadFiles.php',
            type: 'POST',
            data: formData,
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            datatype: 'json',
            success: function(response){   // A function to be called if request succeeds
                console.log(response);
                                
            }
        });
    

    }else{

        if( comment == ""){document.getElementById('error').innerHTML="Debes subir una foto";}
        else{document.getElementById('error').innerHTML="";} 

        if( photo == ""){document.getElementById('comentario').style.border = "3px solid red";}
        else{document.getElementById('comentario').style.border = "1px solid #ced4da";} 
    }  
    
}






    function validate(){

    var name        = document.getElementById('nombre').value;
    var secondName  = document.getElementById('apellido').value;
    var cui         = document.getElementById('cui').value;
    var email       = document.getElementById('email').value;
    var phone       = document.getElementById('telefono').value;
    let check       = document.getElementById('check');


    var regular_ex= /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var mail = email.match(regular_ex);

    if(name !="" && secondName!="" && cui!="" && mail!=null && phone!=""){

        if(check.checked == true){
            next();
        }else{
            Swal.fire("Debes aceptar nuestros terminos y condiciones");
        }  


    }else{
        if( name == ""){document.getElementById('nombre').style.border = "3px solid red";}
        else{document.getElementById('nombre').style.border = "1px solid #ced4da";} 

        if( secondName == ""){document.getElementById('apellido').style.border = "3px solid red";}
        else{document.getElementById('apellido').style.border = "1px solid #ced4da";} 

        if( cui == ""){document.getElementById('cui').style.border = "3px solid red";}
        else{document.getElementById('cui').style.border = "1px solid #ced4da";} 

        if(mail != null){document.getElementById('email').style.border = "1px solid #ced4da";}
        else{document.getElementById('email').style.border = "3px solid red";} 

        if( phone == ""){document.getElementById('telefono').style.border = "3px solid red";} 
        else{document.getElementById('telefono').style.border = "1px solid #ced4da";} 
    }
}