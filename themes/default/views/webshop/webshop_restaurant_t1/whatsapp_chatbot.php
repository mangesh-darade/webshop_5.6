<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Interactive WhatsApp-Like Widget</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    /* Floating Button */
    #whatsapp-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #25d366;
      color: white;
      border: none;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      font-size: 28px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      cursor: pointer;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Chatbox */
    #whatsapp-chatbox {
      display: none;
      position: fixed;
      bottom: 90px;
      right: 20px;
      width: 300px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      z-index: 1000;
      font-family: sans-serif;
      animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    #whatsapp-header {
      background-color: #25d366;
      color: white;
      padding: 15px;
      font-weight: bold;
    }

    #whatsapp-body {
      padding: 15px;
      font-size: 14px;
      color: #333;
      height: 200px;
      overflow-y: auto;
    }

    .message {
      margin-bottom: 10px;
    }

    .message.user {
      text-align: right;
      color: #25d366;
    }

    .message.bot {
      text-align: left;
      color: #333;
    }

    #whatsapp-send {
      display: flex;
      border-top: 1px solid #ddd;
    }

    #whatsapp-send input {
      flex: 1;
      padding: 10px;
      border: none;
      outline: none;
    }

    #whatsapp-send button {
      background-color: #25d366;
      border: none;
      color: white;
      padding: 0 15px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<!-- WhatsApp Button -->
<button id="whatsapp-button">
  <i class="fab fa-whatsapp"></i>
</button>

<!-- WhatsApp Chatbox -->
<div id="whatsapp-chatbox">
  <div id="whatsapp-header">Chat with us</div>
  <div id="whatsapp-body">
    <div class="message bot">Hi there 👋<br>How can we help you?</div>
  </div>
  <div id="whatsapp-send">
    <input type="text" id="whatsapp-message" placeholder="Type a message..." />
    <button onclick="sendMessage()">➤</button>
  </div>
</div>

<script>
  const whatsappBtn = document.getElementById('whatsapp-button');
  const chatbox = document.getElementById('whatsapp-chatbox');
  const chatBody = document.getElementById('whatsapp-body');

  whatsappBtn.onclick = () => {
    chatbox.style.display = chatbox.style.display === 'none' || chatbox.style.display === '' ? 'block' : 'none';
  };

  function sendMessage() {
    const messageInput = document.getElementById('whatsapp-message');
    const message = messageInput.value.trim();
    if (message === '') return;

    // Display user message in the chatbox
    const userMessage = document.createElement('div');
    userMessage.className = 'message user';
    userMessage.textContent = message;
    chatBody.appendChild(userMessage);

    // Scroll to the bottom of the chatbox
    chatBody.scrollTop = chatBody.scrollHeight;

    // Simulate bot response
    setTimeout(() => {
      const botMessage = document.createElement('div');
      botMessage.className = 'message bot';
      botMessage.textContent = "Thanks for reaching out! We'll get back to you soon.";
      chatBody.appendChild(botMessage);
      chatBody.scrollTop = chatBody.scrollHeight;
    }, 1000);

    // Send the message to WhatsApp in the background
    const phoneNumber = '+971542526698'; // Your WhatsApp number
    const encodedMessage = encodeURIComponent(message);
    const url = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
    window.open(url, '_blank');

    // Clear the input field
    messageInput.value = '';
  }
</script>

</body>
</html>