const container = document.querySelector('.container'),
qrinput = container.querySelector('.form input'),
generateBtn = container.querySelector('.form button'),
qrimg = container.querySelector('.qr-code .img');

generateBtn.addEventListener('click',()=>{
    let qrValue = qrinput.value;
    if(!qrValue){
        alert('Insira uma URL')
        return;
    };
    /*generateBtn.innerText="Gerando Qr code...";*/
    /*qrimg.src='https://api.qrserver.com/v1/create-qr-code/?size=170x170&data=${qrValue}';*/
    
    /*qrimg.addEventListener('load',()=>{
        
            generateBtn.innerText = "Gerar";
            container.classList.add('active');
        
    });*/
});/*
qrinput.addEventListener('keyup', ()=>{
    if(!qrinput.value){
        container.classList.remove('active');

    };
});*/
function GerarQRCode(){
    var inputUsuario = document.querySelector('input').value;
    var GoogleChartAPI = 'https://chart.googleapis.com/chart?cht=qr&chs=500x500&chld=H&chl=';
    var conteudoQRCode = GoogleChartAPI + encodeURIComponent(inputUsuario);
    document.querySelector('#QRCodeImage').src = conteudoQRCode;
}