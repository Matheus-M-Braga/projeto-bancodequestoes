function previewImagem(){
    var foda= document.getElementById('foto');
    var imagem = document.querySelector('input[name=imagem]').files[0];
    var preview = document.querySelector('img');
    
    for(c=0;c<=2;c++){
        var reader = new FileReader();
        var reader2= new FileReader();
    
        reader.onloadend = function () {
            preview.src = reader.result;
        }
        
        if(imagem){
            reader.readAsDataURL(imagem);
            reader.readAsDataURL(foda);
        }else{
            preview.src = "";
        }
    }
    
}