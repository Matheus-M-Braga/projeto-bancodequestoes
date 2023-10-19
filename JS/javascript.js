/* Script Modal */ 
function abrirModal(carregarModal){
  var modal=document.getElementById(carregarModal)
  modal.style.display = "block"
    
}

function fecharModal(fecharModal){
  var modal=document.getElementById(fecharModal)
  modal.style.display = "none"
}

/* Script Slide */
const slider = document.querySelectorAll('.slider');
const btnPrev = document.getElementById('prev-button');
const btnNext = document.getElementById('next-button');

let currentSlide = 0;

function hideSlider() {
  slider.forEach(item => item.classList.remove('on'))
}

function showSlider() {
  slider[currentSlide].classList.add('on')
}

function nextSlider() {
  hideSlider()
  if(currentSlide === slider.length -1) {
    currentSlide = 0
  } else {
    currentSlide++
  }
  showSlider()
}

function prevSlider() {
  hideSlider()
  if(currentSlide === 0) {
    currentSlide = slider.length -1
  } else {
    currentSlide--
  }
  showSlider()
}

btnNext.addEventListener('click', nextSlider)
btnPrev.addEventListener('click', prevSlider)


//Tela de cadastro professor e aluno :

function abrirAluno(){
  document.location.href="cadastroaluno.php";
}

function abrirProf(){
  document.location.href="cadastroprofesso.php";
}


function aviso(){
  window.alert("Para conferir o catágolo de Questões, esteja logado!!!!!")
}

// Menu hamburguer
function clickMenu(){
    if(linha.style.display == 'block'){
      linha.style.display = 'none'
      burguer.style.display = 'block'
      burguer_open.style.display = 'none'
    }
    else{
      linha.style.display = 'block'
      burguer.style.display = 'none'
      burguer_open.style.display = 'block'
    }
}
// Teste tamanho
function mudaTamanho(){
  if(window.innerWidth > 1040){
    burguer.style.display = 'none'
    linha.style.display = 'block'
    burguer_open.style.display = 'none'
  }
  else if(window.innerWidth < 1040 && linha.style.display == 'block'){
    burguer.style.display = 'block'
    linha.style.display = 'none'
    burguer_open.style.display = 'none'
  }
}