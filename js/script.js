// Login modal
const login_btn = document.getElementById("login_btn");
const login_link = document.getElementById("login_link");
const close_modal = document.getElementById("close_modal");
const login_modal = document.getElementById("modal");
const cadast_btn = document.getElementById("cadast_btn");
const cadast_choice_close = document.getElementById("close_cadast_choice");
const cadast_choice = document.getElementById("cadast_choice");
if (login_btn && close_modal && login_modal) {
  login_btn.addEventListener("click", function () {
    login_modal.classList.add("visible");
  });
  close_modal.addEventListener("click", function () {
    login_modal.classList.remove("visible");
  });
  if (login_link) {
    login_link.addEventListener("click", function () {
      login_modal.classList.add("visible");
    });
  }
  if (cadast_btn && cadast_choice) {
    cadast_btn.addEventListener("click", function () {
      cadast_choice.classList.add("visible");
    });
    cadast_choice_close.addEventListener("click", function () {
      cadast_choice.classList.remove("visible");
    });
    cadast_choice.addEventListener("click", function () {
      cadast_choice.classList.remove("visible");
    });
  }
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
