function entrar()
{
	 
    var loginCadastrado = "ADMIN";
    var senhaCadastrada = "123";

    
         loginInformado = document.getElementById("cxlogin").value;
         senhaInformada = document.getElementById("cxsenha").value;


         if( loginCadastrado == loginInformado && senhaCadastrada == senhaInformada ) 
		 {

                
               alert("valido");  
              } 
    else{
      alert("Login inválido");
    }

	
           
}