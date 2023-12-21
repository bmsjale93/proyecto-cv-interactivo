///////////////// interacción mostrar/ocultar formulario de contacto //////
function showHide() {
  let form = document.getElementById("form-c");
  let arrowIcon = document.getElementById("arrow-icon");

  if (form.classList.contains("show-form")) {
    form.classList.remove("show-form");
    arrowIcon.classList.remove("fa-chevron-up");
    arrowIcon.classList.add("fa-chevron-down");
  } else {
    form.classList.add("show-form");
    arrowIcon.classList.remove("fa-chevron-down");
    arrowIcon.classList.add("fa-chevron-up");
  }
}


///////////// implementación de Dark-mode ///////////////////////////////

// Selecciona el botón de cambio de tema por su ID 'switch'.
const switchButton = document.getElementById("switch");

// Añade un 'click' listener al botón de cambio.
switchButton.addEventListener("click", function () {
  // Alterna la clase 'contact-form-dark' para cambiar el estilo del formulario.
  document.getElementById("form-c").classList.toggle("contact-form-dark");

  // Alterna la clase 'input-f-dark' en los campos de entrada del formulario.
  document.getElementById("nombre").classList.toggle("input-f-dark");
  document.getElementById("email").classList.toggle("input-f-dark");
  document.getElementById("mensaje").classList.toggle("textarea-f-dark");

  // Alterna la clase 'enviar-f-dark' en el botón de envío.
  document.getElementById("enviar").classList.toggle("enviar-f-dark");

  // Alterna la clase 'dark-mode' en el cuerpo del documento para aplicar el modo oscuro.
  document.body.classList.toggle("dark-mode");

  // Alterna la clase 'active' en el botón de cambio para indicar su estado activo/inactivo.
  switchButton.classList.toggle("active");
});


///////////// implementación del chatbot ///////////////////////////////

// Función para manejar el envío de mensajes por el usuario.
function sendChat() {
  var input = document.getElementById("chatbot-input"); //Obtener mensaje
  var message = input.value.trim();                     //Limpiar espacios

  if (message !== "") {
    displayMessage(message, "user"); // Mostrar mensaje del usuario.
    getBotResponse(message);         // Obtener y mostrar respuesta del bot.
    input.value = "";                // Limpiar el campo de entrada.
  }
}

// Función para mostrar mensajes en el chat.
function displayMessage(message, sender) {
  var messagesContainer = document.getElementById("chatbot-messages");
  var msgDiv = document.createElement("div");                   // Crea un div para el mensaje
  msgDiv.classList.add("message", sender + "-message");         // Añadir clases para estilos.
  msgDiv.textContent = message;                                 // Establecer texto del mensaje.
  messagesContainer.appendChild(msgDiv);                        // Añadir mensaje al contenedor.
  messagesContainer.scrollTop = messagesContainer.scrollHeight; // Auto-scroll.
}

// Función para obtener la respuesta del bot.
function getBotResponse(message) {
  var faqResponses = {
    "¿qué tecnologías usas?": "Uso HTML, CSS, JavaScript, etc.",
    "¿cuál es tu experiencia?": "Tengo varios años de experiencia en desarrollo web.",
    "¿dónde has estudiado?": "En la Universidad Europea"
  };

  // Procesar el mensaje y responder o mostrar opciones FAQ.
  if (message === "Hola") {
    displayMessage("¡Hola! ¿En qué puedo ayudarte?", "bot");
    showFaqOptions();                                           // Mostrar opciones de preguntas frecuentes.
  } else if (faqResponses[message.toLowerCase()]) {
    displayMessage(faqResponses[message.toLowerCase()], "bot");
  } else {
    // Respuesta por defecto para preguntas no reconocidas.
    displayMessage("No tengo una respuesta para eso. Por favor, contacta directamente al número +34 678 689 514 para más información.", "bot");
  }
}

// Función para enviar una pregunta frecuente.
function sendFaq(faqQuestion) {
  displayMessage(faqQuestion, "user"); // Mostrar la pregunta como mensaje del usuario.
  getBotResponse(faqQuestion);         // Obtener la respuesta del bot.
}

// Función para mostrar las opciones de preguntas frecuentes.
function showFaqOptions() {
  document.getElementById("faq-options").style.display = "block";
}

// Inicializar el chatbot con un mensaje de bienvenida al cargar la página.
window.onload = function () {
  getBotResponse("hola");
};

// Función para alternar la visibilidad del chatbot.
function toggleChatbot() {
  var chatbot = document.getElementById("chatbot");
  var chatbotBtn = document.getElementById("start-chatbot-btn");

  // Mostrar/ocultar el chatbot y el botón de inicio.
  if (chatbot.style.display === "none") {
    chatbot.style.display = "block";
    chatbotBtn.style.display = "none";
  } else {
    chatbot.style.display = "none";
    chatbotBtn.style.display = "block";
  }
}
