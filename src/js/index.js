///////////// Funciones y Eventos de Interacción /////////////////////////

// Mostrar/Ocultar formulario de contacto
function showHide() {
  let form = document.getElementById("form-c");
  let arrowIcon = document.getElementById("arrow-icon");

  if (form.classList.contains("show-form")) {
    form.classList.remove("show-form");
    arrowIcon.classList.replace("fa-chevron-up", "fa-chevron-down");
  } else {
    form.classList.add("show-form");
    arrowIcon.classList.replace("fa-chevron-down", "fa-chevron-up");
  }
}

// Implementación de Dark-mode
const switchButton = document.getElementById("switch");
switchButton.addEventListener("click", toggleDarkMode);

function toggleDarkMode() {
  document.getElementById("form-c").classList.toggle("contact-form-dark");
  document.getElementById("nombre").classList.toggle("input-f-dark");
  document.getElementById("email").classList.toggle("input-f-dark");
  document.getElementById("mensaje").classList.toggle("textarea-f-dark");
  document.getElementById("enviar").classList.toggle("enviar-f-dark");
  document.body.classList.toggle("dark-mode");
  switchButton.classList.toggle("active");
}

///////////// Implementación del Chatbot /////////////////////////////////

// Manejo del envío de mensajes del chatbot
function sendChat() {
  var input = document.getElementById("chatbot-input");
  var message = input.value.trim();

  if (message) {
    displayMessage(message, "user");
    getBotResponse(message);
    input.value = "";
  }
}

function displayMessage(message, sender) {
  var messagesContainer = document.getElementById("chatbot-messages");
  var msgDiv = document.createElement("div");
  msgDiv.classList.add("message", `${sender}-message`);
  msgDiv.textContent = message;
  messagesContainer.appendChild(msgDiv);
  messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function getBotResponse(message) {
  var faqResponses = {
    "¿qué tecnologías usas?": "Uso HTML, CSS, JavaScript, etc.",
    "¿cuál es tu experiencia?":
      "Tengo varios años de experiencia en desarrollo web.",
    "¿dónde has estudiado?": "En la Universidad Europea",
  };

  if (message === "hola") {
    displayMessage("¡Hola! ¿En qué puedo ayudarte?", "bot");
    showFaqOptions();
  } else if (faqResponses[message.toLowerCase()]) {
    displayMessage(faqResponses[message.toLowerCase()], "bot");
  } else {
    displayMessage(
      "No tengo una respuesta para eso. Por favor, contacta directamente al número +34 678 689 514 para más información.",
      "bot"
    );
  }
}

function sendFaq(faqQuestion) {
  displayMessage(faqQuestion, "user");
  getBotResponse(faqQuestion);
}

function showFaqOptions() {
  document.getElementById("faq-options").style.display = "block";
}

// Alternar visibilidad del chatbot
function toggleChatbot() {
  var chatbot = document.getElementById("chatbot");
  var chatbotBtn = document.getElementById("start-chatbot-btn");
  chatbot.style.display = chatbot.style.display === "none" ? "block" : "none";
  chatbotBtn.style.display =
    chatbotBtn.style.display === "none" ? "block" : "none";
  if (chatbot.style.display === "block") showFaqOptions();
}

///////////// Manejo de Formularios y Cookies ////////////////////////////

// Manejo del envío del formulario de contacto
document
  .getElementById("contactForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    sendFormData(formData);
  });

function sendFormData(formData) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "submit_form.php", true);
  xhr.onload = handleFormResponse.bind(xhr);
  xhr.send(formData);
}

function handleFormResponse() {
  var notificationBanner = document.getElementById("notificationBanner");
  notificationBanner.innerHTML =
    this.status === 200
      ? this.responseText
      : "Error en el envío del formulario.";
  notificationBanner.style.display = "block";
  if (this.status === 200) showHide();
  setTimeout(() => (notificationBanner.style.display = "none"), 3000);
}

// Manejo de Cookies
window.onload = initializePage;

function initializePage() {
  if (!getCookie("cookiesAccepted")) {
    document.getElementById("cookieConsentContainer").style.display = "block";
  }

  document.getElementById("acceptCookies").onclick = function () {
    setCookie("cookiesAccepted", "true", 30);
    document.getElementById("cookieConsentContainer").style.display = "none";
    sendData();
  };

  getBotResponse("hola");
}

function setCookie(name, value, days) {
  var expires = "";
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length === 2) return parts.pop().split(";").shift();
}

function collectData() {
  var sessionId = getCookie("userSession");
  var consent = getCookie("cookiesAccepted");
  return {
    session_id: sessionId,
    consent: consent === "true",
  };
}

function sendData() {
  var data = collectData();
  fetch("saveUserData.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `session_id=${data.session_id}&consent=${data.consent}`,
  })
    .then((response) => response.text())
    .then((data) => console.log(data))
    .catch((error) => console.error("Error:", error));
}
