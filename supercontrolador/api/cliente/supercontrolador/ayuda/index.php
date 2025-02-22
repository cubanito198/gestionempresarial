<!-- Botón de ayuda (Mismo estilo que tenías) -->
<button id="btnAyuda">❓ Ayuda</button>

<!-- Ventana de chat -->
<div id="chatContainer" class="chat-box">
    <div class="chat-header">
        <span>Asistente de Ayuda</span>
        <span class="close-chat">&times;</span>
    </div>
    <div class="chat-body" id="chatBody">
        <div class="bot-message">Hola 👋, soy tu asistente. Pregunta lo que necesites sobre el sistema.</div>
    </div>
    <div class="chat-footer">
        <input type="text" id="userInput" placeholder="Escribe tu pregunta..." autocomplete="off">
        <button id="sendBtn">Enviar</button>
    </div>
</div>

<!-- Estilos del chat -->
<style>
    /* Botón de ayuda (Mismo estilo que usabas) */
  /* 🔵 Botón de ayuda (ubicado en la parte inferior derecha) */
#btnAyuda {
    position: fixed;  /* Fijado en la pantalla */
    bottom: 10px;  /* Distancia desde la parte inferior */
    right: 20px;  /* Distancia desde la derecha */
    background-color: #007bff;  /* Color azul */
    color: white;  /* Texto en blanco */
    border: none;  /* Sin bordes */
    padding: 10px 20px;  /* Espaciado interno del botón */
    border-radius: 5px;  /* Bordes redondeados */
    cursor: pointer;  /* Cambia el cursor a una mano al pasar por encima */
    font-size: 16px;  /* Tamaño del texto */
    transform: scale(0.7);
}


/* 🔵 Cambio de color cuando el cursor está sobre el botón */
#btnAyuda:hover {
    background-color: #0056b3;  /* Azul más oscuro */
}

/* 🟡 Estilos de la ventana de chat */
.chat-box {
    display: none;
    position: fixed;
    top: 50%; /* Centra verticalmente */
    left: 50%; /* Centra horizontalmente */
    transform: translate(-50%, -50%); /* Ajusta el centrado */
    width: 300px; /* Ajusta el ancho */
    max-height: 500px; /* Ajusta la altura */
    background: white;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    transform: translate(-50%, -50%) scale(0.8); /* 🔹 Reducir tamaño sin afectar la posición */

}

/* Corrige el chat-body para que haga bien el scroll */
.chat-body {
    max-height: 300px; /* Altura fija del área de mensajes */
    overflow-y: auto; /* Activa el scroll solo en los mensajes */
    padding: 10px;
    font-size: 14px;
    scroll-behavior: smooth; /* Desplazamiento suave */
}


/* 🔵 Cabecera del chat */
.chat-header {
    background: #007bff;  /* Fondo azul */
    color: white;  /* Texto blanco */
    padding: 10px;  /* Espaciado interno */
    text-align: center;  /* Texto centrado */
    font-weight: bold;  /* Texto en negrita */
    position: relative;  /* Para posicionar el botón de cierre */
}

/* ❌ Botón para cerrar el chat */
.close-chat {
    position: absolute;  /* Posición absoluta dentro del .chat-header */
    right: 10px;  /* Alineado a la derecha */
    cursor: pointer;  /* Cursor de mano */
}

/* 📌 Sección donde se escribe el mensaje */
.chat-footer {
    display: flex;  /* Elementos en línea */
    padding: 10px;  /* Espaciado interno */
    border-top: 1px solid #ddd;  /* Línea separadora arriba */
}

/* 📝 Caja de texto donde el usuario escribe */
.chat-footer input {
    flex: 1;  /* Ocupa todo el espacio disponible */
    padding: 5px;  /* Espaciado interno */
    border: 1px solid #ddd;  /* Borde gris */
    border-radius: 5px;  /* Bordes redondeados */
}

/* 📤 Botón para enviar el mensaje */
.chat-footer button {
    background: #007bff;  /* Fondo azul */
    color: white;  /* Texto blanco */
    border: none;  /* Sin bordes */
    padding: 5px 10px;  /* Espaciado interno */
    cursor: pointer;  /* Cursor de mano */
    border-radius: 5px;  /* Bordes redondeados */
    margin-left: 5px;  /* Espaciado entre el input y el botón */
}

/* 💬 Estilos de los mensajes del chat */
.user-message, .bot-message {
    padding: 8px;  /* Espaciado interno */
    margin: 5px;  /* Margen entre mensajes */
    border-radius: 5px;  /* Bordes redondeados */
    width: fit-content;  /* Se ajusta al tamaño del texto */
}

/* 👤 Mensajes del usuario */
.user-message {
    background: #007bff;  /* Fondo azul */
    color: white;  /* Texto blanco */
    align-self: flex-end;  /* Alineado a la derecha */
}

/* 🤖 Mensajes del bot */
.bot-message {
    background: #f1f1f1;  /* Fondo gris claro */
    color: black;  /* Texto negro */
}

</style>

<!-- JavaScript para el chat -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const chatContainer = document.getElementById("chatContainer");
    const chatBody = document.getElementById("chatBody");
    const btnAyuda = document.getElementById("btnAyuda");
    const closeChat = document.querySelector(".close-chat");
    const userInput = document.getElementById("userInput");
    const sendBtn = document.getElementById("sendBtn");

    // Función para abrir el chat
    btnAyuda.onclick = () => {
        chatContainer.style.display = "block";
        scrollToBottom(); // Asegura que al abrir se vea el último mensaje
    };

    // Función para cerrar el chat
    closeChat.onclick = () => chatContainer.style.display = "none";

    // Función para hacer scroll al último mensaje
    function scrollToBottom() {
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    // Genera una respuesta del bot
    function getBotResponse(input) {
        input = input.toLowerCase();
        if (input.includes("ver archivos")) {
            return "Puedes ver archivos accediendo a la carpeta 'materiales'.";
        } else if (input.includes("gestionar archivos")) {
            return "Para gestionar archivos, puedes subir, modificar o eliminar archivos.";
        } else if (input.includes("panel de administración")) {
            return "El panel de administración permite gestionar usuarios y archivos.";
        } else if (input.includes("cerrar sesión")) {
            return "Puedes cerrar sesión desde la esquina superior derecha.";
        } else {
            return "No entendí tu pregunta. Prueba con 'ver archivos', 'gestionar archivos' o 'panel de administración'.";
        }
    }

    // Enviar mensaje
    function sendMessage() {
        let userText = userInput.value.trim();
        if (userText === "") return;

        // Crear mensaje del usuario
        let userMessage = document.createElement("div");
        userMessage.classList.add("user-message");
        userMessage.innerText = userText;
        chatBody.appendChild(userMessage);

        // Respuesta automática
        setTimeout(() => {
            let botMessage = document.createElement("div");
            botMessage.classList.add("bot-message");
            botMessage.innerText = getBotResponse(userText);
            chatBody.appendChild(botMessage);
            scrollToBottom(); // Hace scroll al nuevo mensaje
        }, 500);

        userInput.value = "";
        scrollToBottom(); // Hace scroll al enviar el mensaje
    }

    sendBtn.onclick = sendMessage;

    userInput.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            sendMessage();
        }
    });

    // Permitir el scroll con la rueda del mouse solo en los mensajes
    chatBody.addEventListener("wheel", (e) => {
        e.stopPropagation(); // Evita que el scroll afecte otros elementos
    });

    scrollToBottom(); // Ajusta el scroll al inicio
});


function sendMessage() {
    let userText = userInput.value.trim();
    if (userText === "") return;

    // Agregar mensaje del usuario
    let userMessage = document.createElement("div");
    userMessage.classList.add("user-message");
    userMessage.innerText = userText;
    chatBody.appendChild(userMessage);

    // Responder mensaje después de 500ms
    setTimeout(() => {
        let botMessage = document.createElement("div");
        botMessage.classList.add("bot-message");
        botMessage.innerText = getBotResponse(userText);
        chatBody.appendChild(botMessage);

        // 🔹 Auto-scroll al último mensaje
        chatBody.scrollTop = chatBody.scrollHeight;
    }, 500);

    userInput.value = "";  // Limpiar input
}




   

   

</script>
