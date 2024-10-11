
function toggleChatbot() {
    const chatbot = document.getElementById('chat-bot');
    chatbot.classList.toggle('active');
}

function sendQuestion(question) {
    const messages = document.getElementById('messages');

    const userMessage = document.createElement('div');
    userMessage.classList.add('chat-message', 'user');
    userMessage.textContent = question;
    messages.appendChild(userMessage);

    const botMessage = document.createElement('div');
    botMessage.classList.add('chat-message', 'bot');
    botMessage.textContent = getBotResponse(question); 
    messages.appendChild(botMessage);

    messages.scrollTop = messages.scrollHeight;
}

function sendChat() {
    const chatInput = document.getElementById('chat');
    const userInput = chatInput.value.trim();
    if (userInput) {
        sendQuestion(userInput);
        chatInput.value = ''; 
    }
}

function checkEnter(event) {
    if (event.key === 'Enter') {
        sendChat();
    }
}

function getBotResponse(question) {
    const responses = {
        "What services does your construction company provide?": "We offer a variety of construction services including residential and commercial building.",
        "How long has your company been in business?": "We have been in business for over 10 years.",
        "Are you licensed and insured?": "Yes, we are fully licensed and insured.",
        "What areas do you serve?": "We serve various locations, including City A, City B, and surrounding areas.",
        "What payment methods do you accept?": "We accept cash, credit card, and bank transfer.",
        "How do I make an appointment?": "You can make an appointment by calling us or visiting our website."
    };
    return responses[question] || "I'm sorry, I don't have an answer for that.";
}
