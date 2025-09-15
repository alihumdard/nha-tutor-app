<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>NHA Tutor Pro - Module 2</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: system-ui, -apple-system, "Segoe UI", Helvetica, Arial,
        sans-serif;
      background: #f9fafb;
      color: #1f2937;
      line-height: 1.5;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    .container {
      width: 100%;
      max-width: 1600px;
      margin: 0 auto;
    }

    .header-bar {
      background: #0a4d68;
      padding: 1rem;
      color: white;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .header-bar h1 {
      font-size: 1.25rem;
      font-weight: 700;
      margin: 0;
    }

    .header-bar h3 {
      font-size: 1.125rem;
      font-weight: 600;
      color: white;
      margin: 0;
    }

    .header-bar a {
      font-size: 1.125rem;
      color: white;
      text-decoration: none;
    }

    @media (min-width: 768px) {
      .header-bar {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
      }

      .header-bar h1 {
        font-size: 1.75rem;
      }

      .header-bar h2 {
        font-size: 1.5rem;
      }

      .header-bar a {
        font-size: 1.25rem;
      }
    }

    .progress-bar-container {
      background: #f3f4f6;
      border-bottom: 1px solid #e5e7eb;
      padding: 1rem;
      text-align: center;
    }

    .progress-bar-flex {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;

    }

    .progress-label {
      font-weight: 500;
      font-size: 0.875rem;
      color: #4b5563;
    }

    .progress-value {
      font-size: 0.875rem;
      color: #6b7280;
    }

    .divider {
      display: none;
      color: #d1d5db;
    }

    @media (min-width: 640px) {
      .progress-bar-flex {
        flex-direction: row;
        justify-content: center;
        gap: 1rem;
      }

      .divider {
        display: inline;
      }

      .progress-bar-container {
        text-align: left;
      }
    }

    .nav-buttons {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
    }

    .nav-buttons button,
    .nav-buttons a {
      background: none;
      border: none;
      color: #2563eb;
      font-weight: 500;
      cursor: pointer;
      font-size: 0.875rem;
      padding: 0.25rem 0.5rem;
      transition: color 0.2s ease;
      text-decoration: none;
    }

    .nav-buttons button:hover,
    .nav-buttons a:hover {
      color: #1e40af;
    }

    .main-content {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      padding: 1.5rem 0;
    }

    @media (min-width: 768px) {
      .main-content {
        flex-direction: row;
        align-items: flex-start;
      }
    }

    .lesson-content {
      flex: 1 1 60%;
      background: white;
      border-radius: 1.5rem;
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      font-size: 0.95rem;
      word-wrap: break-word;
    }

    .content-block-green {
      background: #ecfdf5;
      padding: .2rem 1rem;
      border-radius: 0.5rem;
      font-weight: 500;
    }

    .content-block-green strong {
      font-weight: 700;
    }

    .content-block-gray {
      padding: .2rem 1rem;
      border-radius: 0.5rem;
      color: #374151;
    }

    .lesson-tools {
      flex: 1 1 35%;
      background: #f9fafb;
      border: 1px solid #e5e7eb;
      border-radius: 1.5rem;
      padding: 1.5rem;
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
    }

    .lesson-tools h3 {
      margin-top: 0;
      font-size: 1.125rem;
      font-weight: 600;
    }

    .tools-grid {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      gap: 1rem;
    }

    @media (min-width: 1024px) {
      .tools-grid {
        grid-template-columns: 1fr;
      }
    }

    .tool-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      background: #0a4d68;
      color: white;
      border: 1px solid #e5e7eb;
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      font-size: 0.75rem;
      font-weight: 500;
      gap: 0.5rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .tool-btn svg {
      width: 1.25rem;
      height: 1.25rem;
      stroke: currentColor;
      stroke-width: 2;
      fill: none;
    }

    @media (max-width: 500px) {
      .lesson-tools {
        display: flex;
        flex-direction: column;
      }

      .progress-bar-flex {
        align-items: start;
      }
    }


    @media (max-width: 400px) {
      .tool-btn {
        font-size: 0.65rem;
        padding: 0.5rem;
        gap: 0.3rem;
      }

      .header-bar h1,
      .header-bar h2,
      .header-bar a {
        font-size: 1rem;
      }
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to right, #eff6ff, #eef2ff);
      border-top: 1px solid #e5e7eb;
      padding: 12px 16px;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
      z-index: 1000;
    }

    .nav-items {
      display: flex;
      justify-content: center;
      gap: 0.75rem;
      flex-wrap: nowrap;
    }

    .nav-link {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-decoration: none;
      color: #374151;
      font-size: 0.75rem;
      font-weight: 500;
      width: 60px;
      transition: color 0.3s ease;
    }

    .icon-wrapper {
      margin-bottom: 4px;
    }

    .icon {
      width: 20px;
      height: 20px;
      stroke-width: 2;
    }

    .label {
      display: block;
    }

    .nav-link:hover .blue {
      color: #1e3a8a;
    }

    .nav-link:hover .indigo {
      color: #3730a3;
    }

    .nav-link:hover .purple {
      color: #6b21a8;
    }

    .nav-link:hover .green {
      color: #166534;
    }

    .nav-link:hover .orange {
      color: #c2410c;
    }

    .blue {
      color: #2563eb;
    }

    .indigo {
      color: #4f46e5;
    }

    .purple {
      color: #7c3aed;
    }

    .green {
      color: #16a34a;
    }

    .orange {
      color: #f97316;
    }

    @media (min-width: 340px) {
      .nav-items {
        gap: 1.4rem;
      }
    }

    @media (min-width: 640px) {
      .nav-items {
        gap: 4rem;
      }
    }

    @media (min-width: 768px) {
      .nav-items {
        gap: 5rem;
      }
    }

    @media (min-width: 1024px) {
      .nav-items {
        gap: 8rem;
      }
    }

    @media (min-width: 1280px) {
      .nav-items {
        gap: 10rem;
      }
    }

    @media (min-width: 870px) {
      body {
        padding: 0px 80px;
      }
    }

    @media (min-width: 1270px) {
      .bottom-nav {
        margin-top: 80px;
      }
    }

    @media (max-width: 1200px) {
      .container {
        padding-bottom: 50px;
      }
    }

    /* Define a custom color palette for a modern look */
    :root {
      --primary-color: #0a4d68;
      --secondary-color: #e2e8f0;
      --text-color: #1a202c;
      --bg-color: #f7fafc;
    }

    .chatbot-container {
      margin-top: 20px;
      width: 100%;
      max-width: 600px;
      height: 80vh;
      display: flex;
      flex-direction: column;
      background-color: white;
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .chat-header {
      background-color: var(--primary-color);
      color: white;
      padding: 1.25rem;
      text-align: center;
      font-weight: 700;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
    }

    .chat-messages {
      flex-grow: 1;
      padding: 1rem;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      scroll-behavior: smooth;
    }

    /* Custom scrollbar styles */
    .chat-messages::-webkit-scrollbar {
      width: 8px;
    }

    .chat-messages::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }

    .chat-messages::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 10px;
    }

    .chat-messages::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    .message {
      max-width: 80%;
      padding: 0.75rem 1rem;
      border-radius: 1rem;
      line-height: 1.4;
      word-wrap: break-word;
    }

    .user-message {
      background-color: var(--primary-color);
      color: white;
      align-self: flex-end;
      border-bottom-right-radius: 0.25rem;
    }

    .chatbot-message {
      background-color: var(--secondary-color);
      color: var(--text-color);
      align-self: flex-start;
      border-bottom-left-radius: 0.25rem;
    }

    .chat-input-container {
      display: flex;
      padding: 1rem;
      border-top: 1px solid #e2e8f0;
      background-color: white;
    }

    #user-input {
      flex-grow: 1;
      padding: 0.75rem;
      border: 1px solid #cbd5e0;
      border-radius: 9999px;
      font-size: 1rem;
      outline: none;
      transition: all 0.2s ease-in-out;
    }

    #user-input:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 2px rgba(93, 93, 255, 0.2);
    }

    #send-button {
      margin-left: 0.5rem;
      padding: 0.75rem 1rem;
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 9999px;
      cursor: pointer;
      transition: transform 0.2s ease-in-out, background-color 0.2s ease-in-out;
    }

    #send-button:hover {
      transform: translateY(-2px);
      background-color: #4b4bbd;
    }

    /* Responsive adjustments */
    @media (max-width: 600px) {
      .chatbot-container {
        height: 90vh;
        width: 95%;
        border-radius: 0.75rem;
      }
    }
  </style>
</head>

<body>
  @include('pages.preloader')
  <div class="container">
    <header class="header-bar">
      <h1>NHA Tutor Pro</h1>
      <h3>{{ $module->title }}</h3>
      <a href="/">Log Out</a>
    </header>

    <section class="progress-bar-container">
      <div class="progress-bar-flex">
        <div style="display: flex">
          <div class="progress-label">Your Progress:</div>
          <div class="progress-value" style="padding-left: 10px">
            {{ $progressPercentage }}% Complete
          </div>
        </div>
        <span class="divider">|</span>
        <nav class="nav-buttons">
          @if($previousModule)
          <a href="{{ route('send.topic', ['slug' => $previousModule->slug]) }}">Previous</a>
          @else
          <button disabled style="color: #9ca3af; cursor: not-allowed;">Previous</button>
          @endif
          <span class="divider">|</span>
          @if($nextModule)
          <a href="{{ route('send.topic', ['slug' => $nextModule->slug]) }}">Next</a>
          @else
          <button disabled style="color: #9ca3af; cursor: not-allowed;">Next</button>
          @endif
        </nav>
      </div>
    </section>

    <main class="main-content" style="margin: 20px 0px">
      <article class="lesson-content">
        <section class="content-block-green">
          <p>
            <?= $data['lesson_content'] ?? ' Data is not found' ?>
          </p>
        </section>
        </section>
      </article>

      <aside class="lesson-tools">
        <h3>Lesson Tools</h3>
        <div class="tools-grid">
          <a style="text-decoration: none;" href="{{ route('quiz', ['module' => $module->id]) }}" class="tool-btn">
            &#128221; Take Quiz
          </a>
          @php
          $planName = Auth::user()->getPlanName();
          @endphp
          @if($planName === 'All In' || $planName === 'All or Nothing' || $planName === 'Admin')
          <a href="{{ route('exam.start')}}" class="tool-btn" style=" font-weight: bold; text-decoration: none;">
            &#128170; Take Exam
          </a>
          <div id="exam-difficulties" class="tools-grid d-none" style="max-width: 600px; margin: 10px auto; grid-template-columns: repeat(2, 1fr); display: none;">
            <a class="tool-btn" style="text-decoration: none;">
              <span style="font-size: 2em;">&#128512;</span> Easy
            </a>
            <a href="{{ route('exam.start', ['difficulty' => 'medium']) }}" class="tool-btn" style="text-decoration: none;">
              <span style="font-size: 2em;">&#128524;</span> Medium
            </a>
            <a href="{{ route('exam.start', ['difficulty' => 'hard']) }}" class="tool-btn" style="text-decoration: none;">
              <span style="font-size: 2em;">&#128170;</span> Hard
            </a>
            <a href="{{ route('exam.start', ['difficulty' => 'expert']) }}" class="tool-btn" style="text-decoration: none;">
              <span style="font-size: 2em;">&#129299;</span> Expert
            </a>
          </div>
          @endif
          <p>Intention of this Federal Guideline</p>
        </div>

        <div class="chatbot-container">
          <div class="chat-header">
  💬 Ask NHA Tutor Pro
</div>

          <div class="chat-messages" id="chat-messages">
            <div class="message chatbot-message">
              👋 Hello! how can i help you.
            </div>
          </div>

          <div class="chat-input-container">
            <input type="text" id="user-input" placeholder="Type your message..." autofocus>
            <button id="send-button">Send</button>
          </div>
        </div>

      </aside>
    </main>
  </div>

  @include('includes.bottom-navigation')
  @include('includes.security-scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toggleExamBtn = document.getElementById('toggle-exam-btn');
      const examDifficulties = document.getElementById('exam-difficulties');

      if (toggleExamBtn) {
        toggleExamBtn.addEventListener('click', () => {
          if (examDifficulties.style.display === 'none') {
            examDifficulties.style.display = 'grid';
          } else {
            examDifficulties.style.display = 'none';
          }
        });
      }
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const chatMessages = document.getElementById('chat-messages');
      const userInput = document.getElementById('user-input');
      const sendButton = document.getElementById('send-button');

      // Runtime chat context (all user questions in this session)
      let context = "";
      // Lesson content from backend
      const lessonContent = (() => {
        const raw = `<?= $data['lesson_content'] ?? '' ?>`;
        const tempDiv = document.createElement("div");
        tempDiv.innerHTML = raw;

        // ✅ Convert to string, remove newlines/tabs, collapse spaces
        return String(tempDiv.textContent || tempDiv.innerText || "")
          .replace(/[\n\r\t]+/g, " ") // remove newlines and tabs
          .replace(/\s+/g, " ") // collapse multiple spaces
          .trim();
      })();


      // Function to add a message to the chat display
      function addMessage(text, sender) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message');
        if (sender === 'user') {
          messageElement.classList.add('user-message');
        } else {
          messageElement.classList.add('chatbot-message');
        }
        messageElement.textContent = text;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll
      }

      // Send message to API
      async function sendToAPI(message) {
        try {
          const response = await fetch("https://nha-tutor.onrender.com/chatbot", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "Accept": "application/json",
            },
            body: JSON.stringify({
              lesson_content: lessonContent,
              question: message,
              context: context
            }),
          });

          if (!response.ok) {
            throw new Error("API error");
          }

          const data = await response.json();
          return data.answer || "Sorry, I couldn’t find an answer.";
        } catch (error) {
          console.error("Chatbot API error:", error);
          return "⚠️ Unable to connect to chatbot right now. Please try again later.";
        }
      }

      // Handle sending message
      async function sendMessage() {
        const message = userInput.value.trim();
        if (message === "") return;

        // Add user message
        addMessage(message, 'user');
        userInput.value = "";

        // Update context (append this question)
        context += (context ? " | " : "") + message;

        // Show "typing..." placeholder
        const loadingMessage = document.createElement('div');
        loadingMessage.classList.add('message', 'chatbot-message');
        loadingMessage.textContent = "💭 Thinking...";
        chatMessages.appendChild(loadingMessage);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Get API response
        const botResponse = await sendToAPI(message);

        // Replace "typing..." with real answer
        loadingMessage.textContent = botResponse;
      }

      // Events
      sendButton.addEventListener('click', sendMessage);
      userInput.addEventListener('keypress', (event) => {
        if (event.key === 'Enter') {
          sendMessage();
        }
      });
    });
  </script>

</body>

</html>