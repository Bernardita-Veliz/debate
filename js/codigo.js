$('#formLogin').submit(function(e){
    e.preventDefault();
    var usuario = $.trim($("#usuario").val());    
    var password =$.trim($("#password").val());    
     
    if(usuario.length == "" || password == ""){
        Swal.fire({
            icon:'warning',
            title:'Debe ingresar un usuario y/o password',
        });
        return false; 
    }else{
        $.ajax({
            url:"BD/login.php",
            icon:"POST",
            datatype: "json",
            data: {usuario:usuario, password:password}, 
            success:function(data){               
                if(data == "null"){
                    Swal.fire({
                        icon:'error',
                        title:'Usuario y/o password incorrecta',
                    });
                }else{
                    Swal.fire({
                        icon:'success',
                        title:'¡Conexión exitosa!',
                        confirmButtonColor:'#3085d6',
                        confirmButtonText:'Ingresar'
                    }).then((result) => {
                        if(result.value){
                            window.location.href = "inicio_login.php";
                        }
                    })
                    
                }
            }    
        });
    }     
});