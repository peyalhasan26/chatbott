<?php

 include('connection.php');
 session_start();

?>
<!DOCTYPE html>
<html>
<head>
<style>
.chatbot-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh; /* Adjust height as needed */
}

.container {
    max-width: 500px;
    width: 100%;
    background-color: #f8f9fa;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
</style>

    <title>home_page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="userStyle.css">
</head>
<body>
<nav class="navbar">
    <h1 class="logo">logo</h1>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="home.php">About</a></li>
        <li><a href="home.php">Services</a></li>
        <li><a href="home.php">Contact</a></li>
        <li><a href="home.php">Orders</a></li>
    </ul>
    <div class="profile-actions">
    <span>Profile: <?php echo $_SESSION['name']; ?></span>
    <a href="logout.php" class="btn btn-danger btn-sm logout_btn">Logout</a>
    </div>

</nav>

<div class="home_section">
    <h1 class="user">Welcome <?php echo $_SESSION['name'];?>, To  Our AI  Community</h1>
</div>

<!-- Chatbot Section 

<div class="chatbot-wrapper">
    <div class="container text-center">
        <h2>Chat with Bot</h2>
        <input type="text" id="input" class="form-control" placeholder="Say something..." />
        <button id="button" class="btn btn-primary mt-2">Send</button>
        <div id="answer" class="mt-3 text-success"></div>
    </div>
</div>


<script>
    var msg = document.querySelector("#input");
    var btn = document.querySelector("#button");
    var ans = document.querySelector("#answer");

    btn.addEventListener("click", function() {
        let c = msg.value.toLowerCase();
        let reply = "";

        if (c.includes("hello")) {
            reply = "hello there";
        } 
        else if (c.includes("how are you")) {
            reply = "i am fine, and you?";
        }
        else if (c.includes("where are you from?")) {
            reply = "i'm from Dhaka, and you?";
        }
        else if (c.includes("what's your religion?")) {
            reply = "my religion is Islam, I am a Muslim. And you?";
        }
        else {
            reply = "I don't understand.";
        }

        ans.innerHTML = reply;

        var tt = new SpeechSynthesisUtterance(reply);
        window.speechSynthesis.speak(tt);
    });
</script>

-->
<!-- Chatbot Section -->
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced AI Chatbot</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3f37c9;
      --accent-color: #4895ef;
      --danger-color: #f72585;
      --light-color: #f8f9fa;
      --dark-color: #212529;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f7fa;
    }
    
    .chatbot-wrapper {
      max-width: 800px;
      margin: 2rem auto;
      padding: 2rem;
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    #chat-box {
      height: 400px;
      overflow-y: auto;
      padding: 1rem;
      background: var(--light-color);
      border-radius: 10px;
      margin-bottom: 1.5rem;
      scroll-behavior: smooth;
    }
    
    .message {
      margin-bottom: 1rem;
      padding: 0.75rem 1rem;
      border-radius: 18px;
      max-width: 80%;
      word-wrap: break-word;
      position: relative;
      animation: fadeIn 0.3s ease;
    }
    
    .user-message {
      background: var(--primary-color);
      color: white;
      margin-left: auto;
      border-bottom-right-radius: 5px;
    }
    
    .bot-message {
      background: #e9ecef;
      color: var(--dark-color);
      margin-right: auto;
      border-bottom-left-radius: 5px;
    }
    
    .typing-indicator {
      display: inline-block;
      padding: 0.5rem 1rem;
      background: #e9ecef;
      border-radius: 18px;
      margin-bottom: 1rem;
    }
    
    .typing-dot {
      display: inline-block;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #6c757d;
      margin: 0 2px;
      animation: typingAnimation 1.4s infinite ease-in-out;
    }
    
    .typing-dot:nth-child(1) { animation-delay: 0s; }
    .typing-dot:nth-child(2) { animation-delay: 0.2s; }
    .typing-dot:nth-child(3) { animation-delay: 0.4s; }
    
    .media-container {
      margin-top: 0.5rem;
      border-radius: 10px;
      overflow: hidden;
    }
    
    .media-container img {
      max-width: 100%;
      border-radius: 10px;
    }
    
    .btn-mic {
      transition: all 0.3s ease;
    }
    
    .btn-mic.listening {
      background-color: var(--danger-color) !important;
      color: white !important;
    }
    
    .chat-header {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.5rem;
    }
    
    .chat-header h2 {
      margin: 0;
      color: var(--primary-color);
    }
    
    .chatbot-avatar {
      width: 40px;
      height: 40px;
      background-color: var(--accent-color);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
      font-size: 1.2rem;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes typingAnimation {
      0%, 60%, 100% { transform: translateY(0); }
      30% { transform: translateY(-5px); }
    }
    
    /* Dark mode toggle */
    .dark-mode-toggle {
      position: absolute;
      top: 20px;
      right: 20px;
    }
    
    body.dark-mode {
      background-color: #121212;
      color: #e0e0e0;
    }
    
    body.dark-mode .chatbot-wrapper {
      background-color: #1e1e1e;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }
    
    body.dark-mode #chat-box {
      background-color: #2d2d2d;
    }
    
    body.dark-mode .bot-message {
      background-color: #333;
      color: #e0e0e0;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .chatbot-wrapper {
        margin: 1rem;
        padding: 1.5rem;
      }
      
      #chat-box {
        height: 300px;
      }
    }
  </style>
</head>
<body>
<!-- Dark mode toggle -->
<div class="dark-mode-toggle form-check form-switch">
  <input class="form-check-input" type="checkbox" id="darkModeToggle">
  <label class="form-check-label" for="darkModeToggle">Dark Mode</label>
</div>

<!-- Chatbot Section -->
<div class="chatbot-wrapper">
  <div class="container text-center">
    <div class="chat-header">
      <div class="chatbot-avatar">
        <i class="fas fa-robot"></i>
      </div>
      <h2>AI Assistant</h2>
    </div>
    
    <!-- Chat display box -->
    <div id="chat-box" class="mb-3"></div>
    
    <!-- Input and buttons -->
    <div class="input-group mb-2">
      <input type="text" id="input" class="form-control" placeholder="Type your message..." autocomplete="off">
      <button id="mic" class="btn btn-outline-secondary btn-mic">
        <i class="fas fa-microphone"></i>
      </button>
    </div>
    
    <div class="d-flex justify-content-center gap-2">
      <button id="button" class="btn btn-primary">
        <i class="fas fa-paper-plane"></i> Send
      </button>
      <button id="clear-chat" class="btn btn-outline-danger">
        <i class="fas fa-trash-alt"></i> Clear
      </button>
    </div>
    
    <!-- Settings -->
    <div class="mt-3 d-flex justify-content-center gap-3">
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="voiceToggle" checked>
        <label class="form-check-label" for="voiceToggle">
          <i class="fas fa-volume-up"></i> Voice
        </label>
      </div>
      
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="aiToggle">
        <label class="form-check-label" for="aiToggle">
          <i class="fas fa-brain"></i> AI Mode
        </label>
      </div>
    </div>
  </div>
</div>

<script>
  // DOM Elements
  const msg = document.querySelector("#input");
  const btn = document.querySelector("#button");
  const micBtn = document.querySelector("#mic");
  const clearBtn = document.querySelector("#clear-chat");
  const chatBox = document.querySelector("#chat-box");
  const voiceToggle = document.querySelector("#voiceToggle");
  const aiToggle = document.querySelector("#aiToggle");
  const darkModeToggle = document.querySelector("#darkModeToggle");

  // Configuration
  const API_KEY = "sk-52b92c5ba442443d81db0d3dc7892050"; // 🔐 Add your OpenAI API key here for AI mode
  const DEFAULT_RESPONSES = [
    { 
      keywords: ["hello", "hi", "hey"], 
      reply: "Hello there!  How can I help you today?",
      options: ["What can you do?", "Tell me about yourself", "Show me an example"]
    },
    { 
      keywords: ["how are you", "how's it going"], 
      reply: "I'm doing great, thanks for asking!  How about you?" 
    },
    { 
      keywords: ["your name", "who are you"], 
      reply: "I'm your AI assistant! You can call me Nova. " 
    },
    { 
      keywords: ["time", "current time"], 
      reply: () => `The current time is ${new Date().toLocaleTimeString()}. ⏰`
    },
    { 
      keywords: ["date", "today's date"], 
      reply: () => `Today is ${new Date().toLocaleDateString()}. `
    },
    { 
      keywords: ["thank you", "thanks"], 
      reply: "You're welcome!  Is there anything else I can help with?" 
    },
    { 
      keywords: ["bye", "goodbye"], 
      reply: "Goodbye!  Have a wonderful day!" 
    },
    { 
      keywords: ["joke", "tell me a joke"], 
      reply: "Why don't scientists trust atoms? Because they make up everything! " 
    },
    { 
      keywords: ["cat", "show me a cat"], 
      reply: "here a cat! ",
      image: "https://placekitten.com/300/200"
    },
    { 
      keywords: ["give me programming site link"], 
      reply: "Here's a programming site for you https://www.geeksforgeeks.org/c-functions/",
      
    },
    { 
      keywords: ["music", "play song"], 
      reply: "Enjoy this relaxing tune! ",
      audio: "https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3"
    },
    { 
      keywords: ["help", "what can you do"], 
      reply: "I can answer questions, tell jokes, show images, play audio, and more! Try asking me about the time, date, or to show you a cat. 😊",
      options: ["Tell me a joke", "Show me a cat", "What's the time?"]
    }
  ];

  // Initialize the chatbot
  window.onload = () => {
    // Load chat history
    const savedChat = JSON.parse(localStorage.getItem("chatHistory")) || [];
    if (savedChat.length === 0) {
      // Show welcome message if no history exists
      addBotMessage("Hello! I'm your AI assistant. How can I help you today?");
    } else {
      savedChat.forEach(entry => {
        if (entry.sender === "user") {
          addUserMessage(entry.text);
        } else {
          addBotMessage(entry.text, entry.media);
        }
      });
    }
    
    // Check for AI API key
    if (!API_KEY) {
      console.warn("No OpenAI API key configured. Using default responses only.");
    }
    
    // Set up dark mode
    const darkMode = localStorage.getItem("darkMode") === "true";
    if (darkMode) {
      document.body.classList.add("dark-mode");
      darkModeToggle.checked = true;
    }
  };

  // Event Listeners
  btn.addEventListener("click", handleSend);
  
  msg.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      handleSend();
    }
  });

  micBtn.addEventListener("click", toggleSpeechRecognition);

  clearBtn.addEventListener("click", () => {
    localStorage.removeItem("chatHistory");
    chatBox.innerHTML = "";
    addBotMessage("Chat history cleared. How can I help you?");
  });

  voiceToggle.addEventListener("change", () => {
    localStorage.setItem("voiceEnabled", voiceToggle.checked);
  });

  aiToggle.addEventListener("change", () => {
    if (aiToggle.checked && !API_KEY) {
      addBotMessage("⚠️ AI mode requires an API key. Using default responses only.");
      aiToggle.checked = false;
    }
    localStorage.setItem("aiModeEnabled", aiToggle.checked);
  });

  darkModeToggle.addEventListener("change", () => {
    document.body.classList.toggle("dark-mode");
    localStorage.setItem("darkMode", darkModeToggle.checked);
  });

  // Core Functions
  async function handleSend() {
    const userMessage = msg.value.trim();
    if (!userMessage) return;

    addUserMessage(userMessage);
    saveChat("user", userMessage);

    // Show typing indicator
    showTypingIndicator();

    try {
      let reply;
      if (aiToggle.checked && API_KEY) {
        reply = await getAIResponse(userMessage);
      } else {
        reply = getDefaultResponse(userMessage.toLowerCase());
      }

      // Remove typing indicator
      removeTypingIndicator();

      if (reply) {
        addBotMessage(reply.reply, { image: reply.image, audio: reply.audio, options: reply.options });
        saveChat("bot", reply.reply, { image: reply.image, audio: reply.audio });
        
        // Speak the response if voice is enabled
        if (voiceToggle.checked && reply.reply && !reply.audio) {
          speak(reply.reply);
        }
      }
    } catch (error) {
      console.error("Error:", error);
      removeTypingIndicator();
      addBotMessage("Sorry, I encountered an error. Please try again.");
    }

    msg.value = "";
    msg.focus();
  }

  function toggleSpeechRecognition() {
    if (micBtn.classList.contains("listening")) {
      stopSpeechRecognition();
    } else {
      startSpeechRecognition();
    }
  }

  function startSpeechRecognition() {
    if (!('webkitSpeechRecognition' in window || 'SpeechRecognition' in window)) {
      addBotMessage("Your browser doesn't support speech recognition. Try Chrome or Edge.");
      return;
    }

    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    const recognition = new SpeechRecognition();

    recognition.lang = 'en-US';
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;

    micBtn.classList.add("listening");
    micBtn.innerHTML = '<i class="fas fa-microphone-slash"></i>';
    recognition.start();

    recognition.onresult = (event) => {
      const transcript = event.results[0][0].transcript;
      msg.value = transcript;
      handleSend();
    };

    recognition.onerror = (event) => {
      console.error("Speech recognition error:", event.error);
      addBotMessage("Sorry, I didn't catch that. Could you try again?");
      stopSpeechRecognition();
    };

    recognition.onend = () => {
      stopSpeechRecognition();
    };
  }

  function stopSpeechRecognition() {
    micBtn.classList.remove("listening");
    micBtn.innerHTML = '<i class="fas fa-microphone"></i>';
  }

  async function getAIResponse(message) {
    if (!API_KEY) {
      throw new Error("No API key configured");
    }

    // Get conversation history for context
    const chatHistory = JSON.parse(localStorage.getItem("chatHistory")) || [];
    const messages = [
      { 
        role: "system", 
        content: "You are a helpful AI assistant named Nova. Be friendly, concise, " +
                "and helpful. Keep responses under 3 sentences unless more detail is requested."
      }
    ];
    
    // Add previous messages (last 5 exchanges)
    const previousMessages = chatHistory.slice(-10); // Keep last 5 exchanges (10 messages)
    previousMessages.forEach(msg => {
      messages.push({
        role: msg.sender === "user" ? "user" : "assistant",
        content: msg.text
      });
    });
    
    // Add current message
    messages.push({ role: "user", content: message });

    const response = await fetch("https://api.openai.com/v1/chat/completions", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Authorization": `Bearer ${API_KEY}`
      },
      body: JSON.stringify({
        model: "gpt-3.5-turbo",
        messages: messages,
        temperature: 0.7,
        max_tokens: 150
      })
    });

    if (!response.ok) {
      const errorData = await response.json();
      throw new Error(errorData.error?.message || "Failed to get AI response");
    }

    const data = await response.json();
    return {
      reply: data.choices[0].message.content.trim()
    };
  }

  function getDefaultResponse(input) {
    for (let r of DEFAULT_RESPONSES) {
      if (r.keywords.some(keyword => input.includes(keyword))) {
        return {
          reply: typeof r.reply === "function" ? r.reply() : r.reply,
          image: r.image || null,
          audio: r.audio || null,
          options: r.options || null
        };
      }
    }
    return {
      reply: "I'm not sure how to respond to that. Try asking me something else!",
      options: ["What can you do?", "Tell me a joke", "Show me a cat"]
    };
  }

  function showTypingIndicator() {
    const typingDiv = document.createElement("div");
    typingDiv.className = "typing-indicator";
    typingDiv.id = "typing-indicator";
    typingDiv.innerHTML = `
      <span class="typing-dot"></span>
      <span class="typing-dot"></span>
      <span class="typing-dot"></span>
    `;
    chatBox.appendChild(typingDiv);
    chatBox.scrollTop = chatBox.scrollHeight;
  }

  function removeTypingIndicator() {
    const typingIndicator = document.getElementById("typing-indicator");
    if (typingIndicator) {
      typingIndicator.remove();
    }
  }

  function addUserMessage(text) {
    const messageDiv = document.createElement("div");
    messageDiv.className = "message user-message";
    messageDiv.textContent = text;
    chatBox.appendChild(messageDiv);
    chatBox.scrollTop = chatBox.scrollHeight;
  }

  function addBotMessage(text, media = {}) {
    const messageDiv = document.createElement("div");
    messageDiv.className = "message bot-message";
    messageDiv.textContent = text;
    chatBox.appendChild(messageDiv);
    
    // Add media if provided
    if (media.image) {
      const mediaContainer = document.createElement("div");
      mediaContainer.className = "media-container mt-2";
      
      const img = document.createElement("img");
      img.src = media.image;
      img.alt = "Image response";
      img.className = "img-fluid";
      img.loading = "lazy";
      
      mediaContainer.appendChild(img);
      chatBox.appendChild(mediaContainer);
    }
    
    if (media.audio) {
      const mediaContainer = document.createElement("div");
      mediaContainer.className = "media-container mt-2";
      
      const audio = document.createElement("audio");
      audio.controls = true;
      audio.src = media.audio;
      audio.className = "w-100";
      
      mediaContainer.appendChild(audio);
      chatBox.appendChild(mediaContainer);
    }
    
    // Add quick reply options if provided
    if (media.options && media.options.length > 0) {
      const optionsContainer = document.createElement("div");
      optionsContainer.className = "options-container mt-2 d-flex flex-wrap gap-2";
      
      media.options.forEach(option => {
        const optionBtn = document.createElement("button");
        optionBtn.className = "btn btn-sm btn-outline-primary";
        optionBtn.textContent = option;
        optionBtn.addEventListener("click", () => {
          msg.value = option;
          handleSend();
        });
        optionsContainer.appendChild(optionBtn);
      });
      
      chatBox.appendChild(optionsContainer);
    }
    
    chatBox.scrollTop = chatBox.scrollHeight;
  }

  function speak(text) {
    if ('speechSynthesis' in window) {
      const utterance = new SpeechSynthesisUtterance(text);
      utterance.rate = 1;
      utterance.pitch = 1;
      utterance.volume = 1;
      window.speechSynthesis.speak(utterance);
    }
  }

  function saveChat(sender, text, media = {}) {
    const chat = JSON.parse(localStorage.getItem("chatHistory")) || [];
    chat.push({ sender, text, media });
    localStorage.setItem("chatHistory", JSON.stringify(chat));
  }
</script>


</body>
</html>



