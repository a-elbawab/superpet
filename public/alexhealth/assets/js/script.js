const deadlineDate = new Date("November 24, 2024 00:00:00").getTime();
let registrationType = document.getElementById("registrationType");
let days = document.getElementById("daysType");
let currency = document.getElementById("currency");
let radioButtons = document.querySelectorAll('input[name="flexRadioDefault"]');
let vodafoneText = document.getElementById("vodafone");
let instapayText = document.getElementById("instapay");

const countdown = setInterval(() => {
  const now = new Date().getTime();
  const timeLeft = deadlineDate - now;

  const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
  const hours = Math.floor(
    (timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
  );
  const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

  document.getElementById("days").innerText = days;
  document.getElementById("hours").innerText = hours;
  document.getElementById("minutes").innerText = minutes;
  document.getElementById("seconds").innerText = seconds;

  if (timeLeft < 0) {
    clearInterval(countdown);
    document.getElementById("countdown").innerHTML = "Deadline Reached";
  }
}, 1000);

registrationType.addEventListener("change", function () {
  if (registrationType.value == "7") {
    days.value = "2";
    days.setAttribute("disabled", "true");
  } else {
    days.removeAttribute("disabled");
    days.value = "1";
  }
});

registrationType.addEventListener("change", function () {
  if (registrationType.value == "4" || registrationType.value == "2") {
    currency.innerHTML = "USD";
    currency.setAttribute("disabled", "true");
  } else {
    currency.removeAttribute("disabled");
    currency.innerHTML = "EGY";
  }
});

radioButtons.forEach(radio => {
  radio.addEventListener('change', function() {
    if (this.id === 'flexRadioDefault3') {
      vodafoneText.style.display = 'block';
      instapayText.style.display = 'none';
    } else if (this.id === 'flexRadioDefault4') {
      instapayText.style.display = 'block';
      vodafoneText.style.display = 'none';
    } else {
      vodafoneText.style.display = 'none';
      instapayText.style.display = 'none';
    }
  });
});
