jQuery(function ($) {
  var swiper = new Swiper(".slider_eventos", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

$('#abrirModal').click(()=>{$('.modal').fadeIn(200)});

$('#cerrarModal').click(()=>{$('.modal').fadeOut(200)});

$('#abrirModal_slider').click(()=>{$('.modal').fadeIn(200)});

})

function getRemainingTime(deadline) {
  let now = new Date(), remainTime = (new Date(deadline) - now + 1000) / 1000, remainSeconds = ("0" + Math.floor(remainTime % 60)).slice(-2), remainMinutes = ("0" + Math.floor((remainTime / 60) % 60)).slice(-2), remainHours = ("0" + Math.floor((remainTime / 3600) % 24)).slice(-2), remainDays = Math.floor(remainTime / (3600 * 24));

  return {
    remainSeconds,
    remainMinutes,
    remainHours,
    remainDays,
    remainTime
  };
}

const countdown = (deadline, elem, finalMessage) => {
  const el = document.getElementById(elem);

  const timerUpdate = setInterval(() => {
    let t = getRemainingTime(deadline);
    el.innerHTML = `${t.remainDays}d:${t.remainHours}h:${t.remainMinutes}m:${t.remainSeconds}s`;

    if (t.remainTime <= 1) {
      clearInterval(timerUpdate);
      el.innerHTML = finalMessage;
    }
  }, 1000);
};

// countdown(fechaEvento + " " + horaEvento, "clock", "¡Ya empezó el evento!");

// let abrirModal = document.getElementById("abrirModal");

// abrirModal.addEventListener ("onclick", abrirModal());



