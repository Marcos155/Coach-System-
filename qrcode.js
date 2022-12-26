const container = document.querySelector('.container'),
qrinput = container.querySelector('.form input'),
generateBtn = container.querySelector('.form button'),
qrimg = container.querySelector('.qr-code .img');

generateBtn.addEventListener('click',()=>{
    let qrValue = qrinput.value;
    if(!qrValue){
        alert('Insira uma URL')
        return;
    }
    generateBtn.innerText="Gerando um Qr code...";
    qrimg.src='https://api.qrserver.com/v1/create-qr-code/?size=170x170&data=%24';
    
    qrimg.addEventListener('load',()=>{
        
            generateBtn.innerText = "Gerar";
            container.classList.add('active');
        
    })
})
qrinput.addEventListener('keyup', ()=>{
    if(!qrinput.value){
        container.classList.remove('active');
    }
})