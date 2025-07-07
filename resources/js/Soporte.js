 // Funcionalidad del chatbot
        const chatbotToggle = document.getElementById('chatbotToggle');
        const chatbotPopup = document.getElementById('chatbotPopup');
        const chatbotInput = document.getElementById('chatbotInput');
        const chatbotMessages = document.getElementById('chatbotMessages');

        chatbotToggle.addEventListener('click', () => {
            chatbotPopup.classList.toggle('active');
        });

        // Cerrar chatbot al hacer clic fuera
        document.addEventListener('click', (e) => {
            if (!chatbotToggle.contains(e.target) && !chatbotPopup.contains(e.target)) {
                chatbotPopup.classList.remove('active');
            }
        });

        // Funcionalidad de búsqueda
        const searchInput = document.querySelector('.search-input');
        const supportCards = document.querySelectorAll('.support-card');

        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            
            supportCards.forEach(card => {
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                const topics = Array.from(card.querySelectorAll('.card-topics li'))
                    .map(li => li.textContent.toLowerCase()).join(' ');
                
                if (title.includes(searchTerm) || topics.includes(searchTerm)) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeInUp 0.5s ease-out both';
                } else {
                    card.style.display = searchTerm === '' ? 'block' : 'none';
                }
            });
        });

        // Interacción con las cards
        supportCards.forEach(card => {
            card.addEventListener('click', () => {
                const category = card.dataset.category;
                alert(`Abriendo soporte para ${category.toUpperCase()}`);
                // Aquí puedes agregar la lógica para navegar a la página específica
            });
        });

        // Simular respuestas del chatbot
        chatbotInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && e.target.value.trim()) {
                const userMessage = e.target.value.trim();
                addMessage(userMessage, 'user');
                e.target.value = '';
                
                setTimeout(() => {
                    const botResponse = generateBotResponse(userMessage);
                    addMessage(botResponse, 'bot');
                }, 1000);
            }
        });

        function addMessage(message, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.style.cssText = `
                margin-bottom: 1rem;
                padding: 0.8rem;
                border-radius: 10px;
                ${sender === 'user' ? 
                    'background: rgba(255, 107, 53, 0.2); margin-left: 2rem; text-align: right;' : 
                    'background: rgba(255, 255, 255, 0.05); margin-right: 2rem;'
                }
            `;
            messageDiv.textContent = message;
            chatbotMessages.appendChild(messageDiv);
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        }

        function generateBotResponse(userMessage) {
            const responses = {
                'teclado': 'Para problemas con teclados, verifica primero la conexión y luego revisa la configuración RGB en el software.',
                'mouse': 'Los problemas de mouse suelen solucionarse ajustando el DPI o verificando la conectividad.',
                'auricular': 'Para auriculares, revisa los drivers y la configuración de audio en tu sistema.',
                'monitor': 'Los problemas de monitor pueden resolverse calibrando la pantalla o verificando los cables.',
                'camara': 'Para cámaras web, asegúrate de tener los drivers actualizados y la configuración correcta.',
                'default': 'Puedo ayudarte con teclados, mouses, auriculares, monitores y cámaras web. ¿Cuál es tu problema específico?'
            };

            const lowerMessage = userMessage.toLowerCase();
            for (let key in responses) {
                if (lowerMessage.includes(key)) {
                    return responses[key];
                }
            }
            return responses.default;
        }

        // Efectos de partículas en el fondo
        function createParticle() {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: fixed;
                width: 4px;
                height: 4px;
                background: rgba(255, 107, 53, 0.6);
                border-radius: 50%;
                pointer-events: none;
                z-index: -1;
                left: ${Math.random() * 100}vw;
                top: 100vh;
                animation: float ${4 + Math.random() * 10}s linear infinite;
            `;
            
            document.body.appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 7000);
        }


        // Crear partículas periódicamente
        setInterval(createParticle, 2000);

        // Agregar animación CSS para las partículas
        const style = document.createElement('Style');
        style.textContent = `
            @keyframes float {
                to {
                    transform: translateY(-100vh) rotate(360deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);