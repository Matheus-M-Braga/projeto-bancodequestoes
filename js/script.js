// Login modal
const login_btn = document.getElementById("login_btn");
const close_modal = document.getElementById("close_modal");
const login_modal = document.getElementById("modal");
if (login_btn && close_modal && login_modal) {
  login_btn.addEventListener("click", function () {
    login_modal.classList.add("visible");
  });
  close_modal.addEventListener("click", function () {
    login_modal.classList.remove("visible");
  });
}

// Slideshow
const slider = document.querySelectorAll(".slider");
const btnPrev = document.getElementById("prev-button");
const btnNext = document.getElementById("next-button");
if (slider && btnPrev && btnNext) {
  let currentSlide = 0;

  function hideSlider() {
    slider.forEach((item) => item.classList.remove("on"));
  }

  function showSlider() {
    slider[currentSlide].classList.add("on");
  }

  btnNext.addEventListener("click", function () {
    hideSlider();
    if (currentSlide === slider.length - 1) {
      currentSlide = 0;
    } else {
      currentSlide++;
    }
    showSlider();
  });
  btnPrev.addEventListener("click", function () {
    hideSlider();
    if (currentSlide === 0) {
      currentSlide = slider.length - 1;
    } else {
      currentSlide--;
    }
    showSlider();
  });
}

// Outros
const tests_link = document.getElementById("tests_link");
if (tests_link) {
  tests_link.addEventListener("click", function () {
    alert("Para conferir o catágolo de Questões, esteja logado!!!");
  });
}

// Tela de cadastro professor e aluno
const prof_btn = document.getElementById("prof_btn");
const alun_btn = document.getElementById("alun_btn");
if (prof_btn && alun_btn) {
  alun_btn.addEventListener("click", function () {
    document.location.href = "cadastroaluno.php";
  });
  prof_btn.addEventListener("click", function () {
    document.location.href = "cadastroprofessor.php";
  });
}
