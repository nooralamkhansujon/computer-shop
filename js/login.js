

function eventListener(){
      //login system
      let passwordInput = document.querySelector('.input_password_login');
      let hide1= document.querySelector('.hide1');
      let hide2= document.querySelector('.hide2');
      let password_icon = document.querySelector('.password_icon');
      password_icon.addEventListener('click',function(event){
              if(passwordInput.type == "password"){
                  passwordInput.type="text";
                  hide1.style.display="block";
                  hide2.style.display='none';
              }else{
                    passwordInput.type="password";
                    hide1.style.display="none";
                    hide2.style.display="block";
              } 
      });
}
eventListener();