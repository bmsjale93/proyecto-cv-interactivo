<?php
if (!isset($_COOKIE['userSession'])) {
    setcookie("userSession", uniqid(), time() + (86400 * 30), "/"); // Cookie válida por 30 días
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Curriculum vitae realizado con HTML, CSS y JAVASCRIPT">
    <meta name="author" content="Alejandro Delgado">
    <link rel="icon" href="/src/img/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/css/styles.css">
    <title>CV Alejandro Delgado</title>
</head>

<body>
    <div class="top-header">
        <div class="top-header-inner">
            <div class="top-header-col1">
                <p>Curriculum Vitae creado con HTML, CSS y JS</p>
            </div>
            <div class="top-header-col2">
                <button class="button-top-header">Contáctame</button>
                <button class="button-top-header">Llámame</button>
            </div>
        </div>
    </div>
    <header>
        <div class="header-inner">
            <nav>
                <ul class="menu">
                    <li><a href="#proyectos">Últimos Proyectos</a></li>
                    <li><a href="#curriculum">Curriculum</a></li>
                </ul>
            </nav>
            <div class="dark-mode-container">
                <button class="darkModeSwitch" id="switch">
                </button>
            </div>
        </div>
    </header>
    <main>
        <section class="introduccion">
            <div class="two-columns-container">
                <div class="column column-left">
                    <img src="src/img/curriculum-alex.png" alt="Imagen de un Informático">
                </div>
                <div class="column column-right">
                    <h1>Alejandro Delgado</h1>
                    <h2>Ingeniero Informático</h2>
                    <p>Soy estudiante de Ingeniería Informática y poseo excelentes habilidades de análisis,
                        planificación y trabajo en equipo que he adquirido durante mi etapa profesional y
                        en mis estudios universitarios.</p>
                    <div>
                        <button onclick="showHide()" class="download-cv-btn">
                            <span>Contacto</span>
                            <i id="arrow-icon" class="fas fa-chevron-down"></i>
                        </button>
                        <a href="src/pdf/CV Alejandro Delgado.pdf" target="_blank">
                            <button class="download-cv-btn"><span>Descargar</span></button>
                        </a>
                    </div>
                    <div id="form-c" class="contact-form container">
                        <form id="contactForm" method="post">
                            <div class="field">
                                <label for="nombre">Nombre</label>
                                <input class="i" type="text" name="nombre" id="nombre" placeholder="Tu Nombre" required>
                            </div>
                            <div class="field">
                                <label for="email">E-Mail</label>
                                <input class="i" type="email" name="email" id="email" placeholder="Tu Correo" required>
                            </div>
                            <div class="field">
                                <label for="mensaje">Mensaje</label>
                                <textarea class="i" name="mensaje" id="mensaje" required></textarea>
                            </div>
                            <button class="button-enviar" type="submit" id="enviar">
                                <span>Enviar</span>
                            </button>
                        </form>
                    </div>
                    <div id="notificationBanner" style="display: none; position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1000; background-color: green; color: white; padding: 10px; border-radius: 5px;">
                        <p>¡Gracias por rellenar el formulario!</p>
                    </div>
                    <div class="social-links">
                        <a href="https://github.com/bmsjale93" target="_blank">
                            <i class="fa-brands fa-github-alt"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/alejandrodm93/" target="_blank">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a href="mailto:bmsjale@gmail.com" target="_blank">
                            <i class="fa-regular fa-envelope"></i>
                        </a>
                        <a href="tel:+34678689514" target="_blank">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                        <a href="https://wa.link/g87gad" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <div class="proyectos" id="proyectos">
            <div class="columna-proyectos">
                <legend class="legend-proyectos">Últimos Proyectos</legend>
                <div class="subcolumna-proy">
                    <div class="proyecto">
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://www.damnclothing.es">damnclothing.es</a>
                        </div>
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://www.palaciodeluja.com">palaciodeluja.com</a>
                        </div>
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://oralis.es">oralis.es</a>
                        </div>
                    </div>
                    <div class="proyecto">
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://www.vodell.es">vodell.es</a>
                        </div>
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://www.taokids.es">taokids.es</a>
                        </div>
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://www.doblevalentia.com">doblevalentia.com</a>
                        </div>
                    </div>
                    <div class="proyecto">
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://www.mrbbe.com">mrbbe.com</a>
                        </div>
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://www.confinesi.es">confinesi.es</a>
                        </div>
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://www.tdsportswear.org">tdsportswear.org</a>
                        </div>
                    </div>
                    <div class="proyecto">
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://fdmpromociones.com">fdmpromociones.es</a>
                        </div>
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="https://www.salvopromociones.com">aparca2gadir.com</a>
                        </div>
                        <div class="proyecto-item">
                            <i class="fa fa-globe"></i><a href="http://www.sitioweb3.com">purakasta.es</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="curriculum" id="curriculum">
            <div class="fila-cv">
                <div class="columna-cv experiencia">
                    <legend>Experiencia</legend>
                    <div class="bloque-experiencia">
                        <h3>Freelancer - Desarrollador Web</h3>
                        <h4>2012 - 2019</h4>
                        <p>Durante mi etapa como freelancer comencé a desarrollar sitios web para empresas,
                            utilizando diferentes plataformas y tipos de desarrollo para que el proyecto
                            fuera viable para el cliente.</p>
                    </div>
                    <div class="bloque-experiencia">
                        <h3>Informático | Vodell SL</h3>
                        <h4>2019 - 2022</h4>
                        <p>Mi experiencia consistió en la gestión del apartado informático, así como la
                            gestión de los dispositivos de la empresa, su mantenimiento y la supervisión.
                            Diseñador y encargado del sitio web de la empresa (www.vodell.es). </p>
                    </div>
                    <div class="bloque-experiencia">
                        <h3>Freelancer - Desarrollador Web</h3>
                        <h4>2022 - Agosto 2023</h4>
                        <p>En esta segunda etapa como desarrollador web, además de trabajar en diferentes
                            proyectos, asisto a las diferentes empresas que solicitan mi servicio a mejorar
                            el rendimiento de sus webs, posicionarlos y ejecutar la publicidad para que
                            mejoren sus resultados a lo largo de su trayecto conmigo. </p>
                    </div>
                    <div class="bloque-experiencia">
                        <h3>Programador Backend - Fullstack | Bluecell</h3>
                        <h4>Agosto 2023 - Diciembre 2023</h4>
                        <p>Tras mi experiencia como desarrollador web freelance, me dieron la oportunidad de
                            comenzar una nueva etapa en la empresa Bluecell, en la que trabajé en diferentes proyectos
                            y solucionando diferentes problemas de implementación, con una atención constante al cliente.
                            En esta etapa, desarrolle mi stack en PHP, CSS, JS, control de base de datos MySQL y trabajando
                            de forma constante con GIT para una buena implementación de los diferentes proyectos.
                        </p>
                    </div>
                    <div class="bloque-experiencia">
                        <h3>Programador Fullstack | FDM2020</h3>
                        <h4>Diciembre 2023 - Actual</h4>
                        <p>Finalmente, tras finalizar mi etapa en Bluecell comencé a trabajar en la empresa FDM2020
                            donde me dieron mayor libertad para poder conciliar trabajo y estudio.
                        </p>
                    </div>
                </div>
                <div class="columna-cv contenido">
                    <div class="columna-formacion">
                        <legend>Formación</legend>
                        <div class="bloque-formacion">
                            <h3>Grado de Ingeniería Informática</h3>
                            <h4>Universidad Europea / 2021 - </h4>
                        </div>
                        <div class="bloque-formacion">
                            <h3>Full Stack Cibersecurity</h3>
                            <h4>Keepcoding / 2023 -</h4>
                        </div>
                        <div class="bloque-formacion">
                            <h3>Certificado en PHP y Wordpress</h3>
                            <h4>Keepcoding / 2023</h4>
                        </div>
                        <div class="bloque-formacion">
                            <h3>Certificado en Blue Team</h3>
                            <h4>Keepcoding / 2023</h4>
                        </div>
                        <div class="bloque-formacion">
                            <h3>Certificado en Recopilación de Información</h3>
                            <h4>Keepcoding / 2023</h4>
                        </div>
                    </div>
                    <div class="columna-habilidades">
                        <div class="subcolumna-skills">
                            <legend>Skills</legend>
                            <ul class="skills-list">
                                <li>
                                    Java
                                    <div class="progress-bar">
                                        <div class="progress" style="width: 80%;"></div>
                                    </div>
                                </li>
                                <li>
                                    Python
                                    <div class="progress-bar">
                                        <div class="progress" style="width: 70%;"></div>
                                    </div>
                                </li>
                                <li>
                                    HTML / CSS / JS / PHP
                                    <div class="progress-bar">
                                        <div class="progress" style="width: 80%;"></div>
                                    </div>
                                </li>
                                <li>
                                    GIT / GITHUB
                                    <div class="progress-bar">
                                        <div class="progress" style="width: 70%;"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="subcolumna-tecnologias">
                            <legend>Tecnologías</legend>
                            <ul class="tecno-list">
                                <li>Paquete Office Completo</li>
                                <li>CMS (Wordpress, Shopify...)</li>
                                <li>CPanel y Bases de Datos</li>
                                <li>Photoshop e Illustrator</li>
                                <li>Tecnologías de Ciberseguridad</li>
                            </ul>
                        </div>
                    </div>
                    <div class="columna-habilidades">
                        <div class="subcolumna-interes">
                            <legend>Datos</legend>
                            <ul class="interes-list">
                                <li>Vehículo propio.</li>
                                <li>Carnet de conducir tipo B.</li>
                                <li>Disponibilidad horaria completa.</li>
                            </ul>
                        </div>
                        <div class="subcolumna-idiomas">
                            <legend>Idiomas</legend>
                            <ul class="idiomas-list">
                                <li>
                                    <img src="src/img/bandera-espana.png" alt="Bandera de España" class="bandera">
                                    Español
                                    <div class="progress-bar">
                                        <div class="progress" style="width: 100%;"></div>
                                    </div>
                                </li>
                                <li>
                                    <img src="src/img/bandera-reino-unido.png" alt="Bandera del Reino Unido" class="bandera">
                                    Inglés
                                    <div class="progress-bar">
                                        <div class="progress" style="width: 60%;"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Botón para iniciar el ChatBot -->
    <button id="start-chatbot-btn" onclick="toggleChatbot()">Iniciar ChatBot</button>

    <!-- Chatbot container -->
    <div id="chatbot" class="chatbot" style="display: none;">
        <div class="chatbot-header">
            <span>Chatbot</span>
            <button onclick="toggleChatbot()">X</button>
        </div>
        <div class="chatbot-content">
            <div class="chatbot-messages" id="chatbot-messages"></div>
            <!-- Botones para preguntas frecuentes -->
            <div id="faq-options" class="faq-options" style="display: none;">
                <button onclick="sendFaq('¿qué tecnologías usas?')">¿Qué tecnologías usas?</button>
                <button onclick="sendFaq('¿cuál es tu experiencia?')">¿Cuál es tu experiencia?</button>
                <button onclick="sendFaq('¿dónde has estudiado?')">¿Dónde has estudiado?</button>
            </div>
            <input type="text" id="chatbot-input" placeholder="Haz una pregunta...">
            <button class="button-chatbot" onclick="sendChat()">Enviar</button>
        </div>
    </div>
    <footer id="footer">
        <p>Creado por: <a href="#">Alejandro Delgado</a> / <a href="https://www.linkedin.com/in/alejandrodm93/" target="_blank">LinkedIn</a> / 2023 </p>
    </footer>
    <script src="src/js/index.js"></script>
    <div id="cookieConsentContainer" style="display: none; position: fixed; bottom: 0; width: 100%; background: #000; color: #fff; text-align: center; padding: 10px;">
        <p>Este sitio utiliza cookies para mejorar la experiencia del usuario. <a href="#" style="color: #fff;">Más información</a>.</p>
        <button id="acceptCookies" style="background: #f60; color: #fff; border: none; padding: 5px 10px; margin: 5px;">Aceptar</button>
    </div>
</body>

</html>