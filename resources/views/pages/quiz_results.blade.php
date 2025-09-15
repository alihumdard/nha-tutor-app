<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>NHA Tutor Pro - Exam Results</title>
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

    .nav-buttons button {
      background: none;
      border: none;
      color: #2563eb;
      font-weight: 500;
      cursor: pointer;
      font-size: 0.875rem;
      padding: 0.25rem 0.5rem;
      transition: color 0.2s ease;
    }

    .nav-buttons button:hover {
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
      margin-bottom: 40px;
    }

    .accordion {
      background-color: #ecfdf5;
      color: black;
      cursor: pointer;
      padding: 12px;
      border-radius: 5px;
      user-select: none;
    }

    .accordion p {
      margin: 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .arrow {
      transition: transform 0.3s;
    }

    .accordion.active .arrow {
      transform: rotate(90deg);
    }

    .panel {
      padding: 10px 15px;
      display: none;
      background-color: #f1f1f1;
      border-radius: 0 0 5px 5px;
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
      text-decoration: none;
    }

    .tool-btn:disabled {
      background-color: #d1d5db;
      cursor: not-allowed;
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

    [type="radio"]:checked,
    [type="radio"]:not(:checked) {
      position: absolute;
      left: -9999px;
    }

    [type="radio"]:checked+label,
    [type="radio"]:not(:checked)+label {
      position: relative;
      padding-left: 28px;
      cursor: pointer;
      line-height: 20px;
      display: inline-block;
      color: #666;
    }

    [type="radio"]:checked+label:before,
    [type="radio"]:not(:checked)+label:before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      width: 18px;
      height: 18px;
      border: 1px solid #ddd;
      border-radius: 100%;
      background: #fff;
    }

    [type="radio"]:checked+label:after,
    [type="radio"]:not(:checked)+label:after {
      content: '';
      width: 12px;
      height: 12px;
      background: #0a4d68;
      position: absolute;
      top: 4px;
      left: 4px;
      border-radius: 100%;
      -webkit-transition: all 0.2s ease;
      transition: all 0.2s ease;
    }

    [type="radio"]:not(:checked)+label:after {
      opacity: 0;
      -webkit-transform: scale(0);
      transform: scale(0);
    }

    [type="radio"]:checked+label:after {
      opacity: 1;
      -webkit-transform: scale(1);
      transform: scale(1);
    }
  </style>
</head>

<body>
  <div class="container">
    <header class="header-bar">
      <h1>NHA Tutor Pro</h1>
      <h3>Exam Results</h3>
      <a href="/">Log Out</a>
    </header>

    <main class="main-content" style="margin: 20px 0px">
      <article class="lesson-content">
        <div style="text-align: center;">
          <h2 style="margin-bottom: 5px;">Exam Results</h2>
          <p style="margin-top: 0; margin-bottom: 5px;">Your Score: <strong>{{ $submission->score }} / {{ $submission->total_questions }}</strong></p>
        </div>
        @if(!empty($submission->wrong_questions['questions']))
        <div class="content-block-gray" style="margin-bottom: 20px;">
          <h2>Questions You Missed:</h2>
          <ul>
            @foreach($submission->wrong_questions['questions'] as $wrongQuestion)
            <li>{{ $wrongQuestion['question'] }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @foreach($submission->answers as $key => $answer)
        <section class="content-block-green">
          <p>
            <strong>Q. {{ ++$key }}:</strong> {{ $answer['question'] }}
          </p>
          <p>
            Your Answer:
            @if ($answer['is_correct'])
            <span style="color: green; font-weight: bold;">{{ $answer['user_answer'] }}</span>
            @else
            <span style="color: red; font-weight: bold;">{{ $answer['user_answer'] }}</span>
            @endif
          </p>
          <p>
            Correct Answer:
            <span style="color: green; font-weight: bold;">{{ $answer['correct_answer'] }}</span>
          </p>
        </section>
        @endforeach
      </article>

      <aside class="lesson-tools">
        <h3>Untimed Exam</h3>
        @php
        $planName = Auth::user()->getPlanName();
        @endphp
        <div class="tools-grid">
          @if($planName === 'All or Nothing' || $planName === 'Admin')
          <button class="tool-btn not-preloader" id="generate-flashcards-btn">
            &#128196; Key Takeaways
          </button>
          <button class="tool-btn" id="download-flashcards-btn" disabled>
            &#128229; Download Flash Cards
          </button>
          @else
          <button class="tool-btn" disabled>
            &#128196; Key Takeaways
          </button>
          <button class="tool-btn" disabled>
            &#128229; Download Flash Cards
          </button>
          @endif
        </div>
        <div id="flashcard-status" style="margin-top: 10px; text-align: center;"></div>

        @if($planName === 'Half In')
        <div style="margin-top: 20px; text-align: center; background-color: #f3f4f6; padding: 15px; border-radius: 8px;">
          <p class="font-semibold text-gray-700">Upgrade to unlock more tools!</p>
          <a href="{{ route('home') }}" class="tool-btn" style="margin-top: 10px; background-color: #22c55e; border-color: #16a34a;">
            Upgrade Plan
          </a>
        </div>
        @endif

        @if($planName === 'All In' || $planName === 'All or Nothing' || $planName === 'Admin')
        <a href="{{ route('exam.start')}}" class="tool-btn" style=" font-weight: bold; text-decoration: none;">
          &#128170; Take Exam
        </a>
        <div id="exam-difficulties" class="tools-grid d-none" style="max-width: 600px; margin: 10px auto; grid-template-columns: repeat(2, 1fr); display: none;">
          <a href="{{ route('exam.start', ['difficulty' => 'easy']) }}" class="tool-btn" style="text-decoration: none;">
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
      </aside>
    </main>
  </div>

  @include('includes.bottom-navigation')
  @include('includes.security-scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const generateBtn = document.getElementById('generate-flashcards-btn');
      const downloadBtn = document.getElementById('download-flashcards-btn');
      const statusDiv = document.getElementById('flashcard-status');
      let downloadUrl = null;

      if (generateBtn) {
        generateBtn.addEventListener('click', async () => {
          generateBtn.disabled = true;
          downloadBtn.disabled = true;
          statusDiv.textContent = 'Generating flashcards...';

          const topicName = "{{ $submission->topic_name }}";

          // *** THIS IS THE FIX ***
          const wrongQuestions = @json($submission->wrong_questions);
          const contextForApi = wrongQuestions;

          try {
            const response = await fetch('https://nha-tutor.onrender.com/flashcards', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              body: JSON.stringify({
                topics: topicName,
                context: contextForApi
              })
            });

            const data = await response.json();

            if (response.ok) {
              downloadUrl = data.download_content;
              downloadBtn.disabled = false;
              statusDiv.textContent = 'Flashcards are ready to download!';
            } else {
              statusDiv.textContent = `Error: ${data.message || 'Failed to generate flashcards.'}`;
            }
          } catch (error) {
            statusDiv.textContent = 'An error occurred. Please try again.';
            console.error('Error generating flashcards:', error);
          } finally {
            generateBtn.disabled = false;
          }
        });
      }

      if (downloadBtn) {
        downloadBtn.addEventListener('click', () => {
          if (downloadUrl) {
            window.open(downloadUrl, '_blank');
          } else {
            statusDiv.textContent = 'Please generate the flashcards first.';
          }
        });
      }
    });
  </script>

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


  <!-- Preloader -->
  <div id="preloader" style="
    display:none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(255,255,255,0.8);
    z-index: 9999;
    text-align: center;
    padding-top: 20%;
">
    <div class="spinner" style="
        border: 6px solid #f3f3f3;
        border-top: 6px solid #3498db;
        border-radius: 50%;
        width: 60px; height: 60px;
        animation: spin 1s linear infinite;
        margin: auto;
    "></div>
    <p style="margin-top: 15px; font-weight: bold; color: #333;">
      Generating flashcards, please wait...
    </p>
  </div>

  <style>
    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>

  <script>
    const preloader = document.getElementById('preloader');
    const generateBtn = document.getElementById('generateBtn');
    const downloadBtn = document.getElementById('downloadBtn');
    const statusDiv = document.getElementById('statusDiv');

    if (generateBtn) {
      generateBtn.addEventListener('click', async () => {
        generateBtn.disabled = true;
        downloadBtn.disabled = true;
        statusDiv.textContent = 'Generating flashcards...';

        // Show preloader
        preloader.style.display = 'block';

        try {
          // Your API call or logic goes here
          await new Promise(resolve => setTimeout(resolve, 2000)); // demo delay

          statusDiv.textContent = 'Flashcards generated successfully!';
          downloadBtn.disabled = false;
        } catch (error) {
          statusDiv.textContent = 'Error generating flashcards!';
        } finally {
          // Hide preloader
          preloader.style.display = 'none';
          generateBtn.disabled = false;
        }
      });
    }
  </script>

</body>

</html>