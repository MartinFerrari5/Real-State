document.addEventListener("DOMContentLoaded",e=>{
    
    evenlisteners();
    obscuro();
    deleteProp();
    
   
})

function evenlisteners(){
    let body=document.querySelector("body")
    let alterno=document.querySelector(".alterno")
    let menu=document.querySelector(".burguer");
    let links=document.querySelector(".links")
    menu.addEventListener("click", e=>{
        links.classList.toggle("mostrar") /*Si no tiene esa clase, la agrega, sino la quita */
        alterno.classList.toggle('height')
    });
    let contacto=document.querySelectorAll("input[name='contacto[contacto]']");
    contacto.forEach(input=>input.addEventListener("click", contactForm))
   
}
function obscuro(){
    let obscuro=document.querySelector(".obscuro")
    let body=document.querySelector("body")
    obscuro.addEventListener("click", e=>{
        body.classList.toggle("obscuro-mode")
        
    })
}
function deleteProp(){
    let choice=document.querySelectorAll(".msg input");
    for(let i=0; i<choice.length;i++){
        choice[i].addEventListener("click",e=>{
            let article=document.querySelector(".delete-article")
            let body=document.querySelector("body")
            body.classList.toggle("body-delete")
            article.style.display="flex";
            let height=screen.height
            article.style.height=`${height}`
            let keep=document.querySelector(".keep").
            addEventListener("click",e=>{
                article.style.display="none";
            })
        })
    }
    let body=document.querySelector("body")
    let height=screen.height
    body.style.height=`${height}`
}
function contactForm(e){
    
    let valor=e.target.value
    console.log(e)
    let h5=document.querySelector('.decision')
    let choice=document.querySelector('.choosen')
    
    switch(valor){ 
        case "telefono":
            h5.textContent="Si elegiste telefono: "
            choice.innerHTML=`<div class="campos ">
            <label for="">Phone:</label>
            <input data-cy="phone-number" name="contacto[phone]" type="tel" placeholder="Tu celular"></input>
        </div>
        <label for="">Fecha:</label>
        <input data-cy="date" type="date" name="contacto[fecha]"></input>

        <label for="hora">Hora:</label>
        <input data-cy="hour" type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]" id="">
    </div>
    <div class="campos">
        <label for="">Mensaje:</label>
        <textarea name="contacto[msg]" id="" cols="20" rows="5"></textarea>`
          
            break;
        case "email":
            h5.textContent="Si elegiste email: "
            choice.innerHTML=`<div class="campos choosen-email">
            <label for="">Email:</label>
            <input name="contacto[mail]" type="email" placeholder="Tu email"></input>
        </div>`
            
            break;
        default: console.log("error")
        break;
    }
       
      
    
    
}