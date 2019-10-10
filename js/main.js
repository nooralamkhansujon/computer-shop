


class UI{

    //show modal
    showModal(event){
        event.preventDefault();
        let eventItem =event.target.parentElement.parentElement;
        let id = eventItem.dataset.id;
        
        let modal =document.querySelector('.modal-custom');
        let modalContent = document.querySelector('.modal-custom-content');
        if(eventItem.classList.contains('gallary-item_icon')){
            modalContent.style.backgroundImage=`url('images/work-${id}.jpeg')`;
            console.log(id);
            modal.classList.add('modal-custom_show');
        }
    }
    //close modal
    closeModal(event){
      event.preventDefault();
      let parentEle = event.target.parentElement.parentElement;
      parentEle;
      if(parentEle.classList.contains('modal-custom_show')){
        // .remove('.modal-custom_show');
        parentEle.classList.remove('modal-custom_show');
      }
    }
 


}

eventListener();
function eventListener(){
    ui =new UI();

   let links =document.querySelectorAll('.gallary-item');
   links.forEach(function(item){
       item.addEventListener('click',function(event){
           ui.showModal(event);
           
       })
   });
  
   let closeModal = document.querySelector('.modal_close');
   closeModal.addEventListener('click',function(event){
          ui.closeModal(event);
   });
}

showTime()
setInterval(showTime,1000);

function showTime(){
    let date =new Date();
    let hours = date.getHours();//0-23
    let minutes = date.getMinutes();//0-59
    let seconds = date.getSeconds();//0-59
  
    let format = convertFormat(hours);
  
    hours   = checkTime(hours);
    hours   = addZero(hours);
    minutes = addZero(minutes);
    seconds = addZero(seconds);
  
    document.querySelector('.hours').innerHTML=hours;
    document.querySelector('.minutes').innerHTML=minutes;
    document.querySelector('.second').innerHTML=seconds;
    document.querySelector('.format').innerHTML=format;
    // document.getElementById('clock').innerHTML = `${hours}:${minutes}:${seconds} ${formatHours}`;
}
function convertFormat(time){
    let format = 'AM';
  
    if(time >=12){
      format = "PM";
    }
    return format;
}

function checkTime(time){
    if(time >12 ){
    time = time -12;
    }
    if(time === 0 ){
    time = 12
    }
    return time;
}
function addZero(time){
    if(time <10){
    time ="0"+time;
    }
    return time;
}


/// login form password form 

  
  
  
 