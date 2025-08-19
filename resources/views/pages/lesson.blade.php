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

    /* Header */
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

    /* Progress Bar */
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
      /* justify-content: center; */
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

    /* Main Layout */
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

    /* Lesson Content */
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

    /* Content Blocks */
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

    /* Sidebar Tools */
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

    /* Navigation Container */
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

    /* Hover colors */
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

    /* Icon default colors */
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

    /* Responsive Gaps */
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
  </style>
</head>

<body>
  @include('pages.preloader')
  <div class="container">
    <!-- Header -->
    <header class="header-bar">
      <h1>NHA Tutor Pro</h1>
      <h3>Module 2 – Resident Rights</h3>
      <a href="/">Log Out</a>
    </header>

    <!-- Progress -->
    <section class="progress-bar-container">
      <div class="progress-bar-flex">
        <div style="display: flex">
          <div class="progress-label">Your Progress:</div>
          <div class="progress-value" style="padding-left: 10px">
            12% Complete
          </div>
        </div>
        <span class="divider">|</span>
        <nav class="nav-buttons">
          <button>Previous</button>
          <span class="divider">|</span>
          <button>Next</button>
        </nav>
      </div>
    </section>

    <!-- Content -->
    <main class="main-content" style="margin: 20px 0px">
      <!-- Lesson -->
      <article class="lesson-content">
        <section class="content-block-green">
          <p>
            <?= $data['lesson_content'] ?? ' Data is not found' ?>
          </p>
        </section>
        </section>
      </article>

      <!-- Tools -->
      <aside class="lesson-tools">
        <h3>Lesson Tools</h3>
        <div class="tools-grid">
          <a style="text-decoration: none;" href="{{ route('quiz', ['less_name' => $topic_name]) }}" class="tool-btn">
            📑 Take Quiz
          </a>
          <!-- Toggle button for exam difficulties -->
          <button class="tool-btn" id="toggle-exam-btn" style=" font-weight: bold;">
            📝 Take an Exam
          </button>
          <!-- The content to be toggled -->
          <div id="exam-difficulties" class="tools-grid" style="max-width: 600px; margin: 10px auto; grid-template-columns: repeat(2, 1fr); display: none;">
            <a href="{{ route('exam.start', ['difficulty' => 'easy']) }}" class="tool-btn" style="text-decoration: none;">
              <span style="font-size: 2em;">😀</span>
              Easy
            </a>
            <a href="{{ route('exam.start', ['difficulty' => 'medium']) }}" class="tool-btn" style="text-decoration: none;">
              <span style="font-size: 2em;">😌</span>
              Medium
            </a>
            <a href="{{ route('exam.start', ['difficulty' => 'hard']) }}" class="tool-btn" style="text-decoration: none;">
              <span style="font-size: 2em;">💪</span>
              Hard
            </a>
            <a href="{{ route('exam.start', ['difficulty' => 'expert']) }}" class="tool-btn" style="text-decoration: none;">
              <span style="font-size: 2em;">🤯</span>
              Expert
            </a>
          </div>

        </div>
      </aside>
    </main>
  </div>

  <!-- Bottom Navigation -->
  @include('includes.bottom-navigation')
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
</body>

</html>