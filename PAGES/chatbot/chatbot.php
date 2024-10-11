<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Chatbot</title>
    <link rel="stylesheet" href="chatbot.css"> 
</head>
<body>

    <div class="chatbot-container">
        <div class="chatbot-header">FAQ Chatbot</div>

        <div class="chatbot-body" id="chatbotBody">
            <div class="chatbot-message bot">
                Hello! How can I help you today? Please select a question from below:
            </div>

            <div class="faq-options">
                <div class="faq-question" onclick="showAnswer(1)">
                    What services does your construction company provide?
                </div>
                <div class="faq-question" onclick="showAnswer(2)">
                    How long has your company been in business?
                </div>
                <div class="faq-question" onclick="showAnswer(3)">
                    Are you licensed and insured?
                </div>
                <div class="faq-question" onclick="showAnswer(4)">
                    What areas do you serve?
                </div>
                <div class="faq-question" onclick="showAnswer(5)">
                    How do I make an appointment?
                </div>
                <div class="faq-question" onclick="showAnswer(6)">
                    How do I get started with my project?
                </div>
                <div class="faq-question" onclick="showAnswer(7)">
                    What is the typical timeline for a project?
                </div>
                <div class="faq-question" onclick="showAnswer(8)">
                    How often will I receive updates on my project?
                </div>
                <div class="faq-question" onclick="showAnswer(9)">
                    What measures do you take to ensure safety on the construction site?
                </div>
            </div>
        </div>

        <div class="chatbot-footer">
            <input type="text" class="chatbot-input" id="chatInput" placeholder="Type your question..." disabled />
        </div>
    </div>

    <script src="chatbot.js"></script> 
</body>
</html>
