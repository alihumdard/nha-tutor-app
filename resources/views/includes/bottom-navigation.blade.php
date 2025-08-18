   <div class="bottom-nav">
       <div class="nav-items">
           <a href="{{ route('home') }}" class="nav-link group">
               <div class="icon-wrapper">
                   <svg
                       class="icon blue"
                       fill="none"
                       stroke="currentColor"
                       viewBox="0 0 24 24">
                       <path
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                   </svg>
               </div>
               <span class="label">Home</span>
           </a>

           <a href="{{ route('dashboard') }}" class="nav-link group">
               <div class="icon-wrapper">
                   <svg
                       class="icon green"
                       fill="none"
                       stroke="currentColor"
                       viewBox="0 0 24 24">
                       <path
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                   </svg>
               </div>
               <span class="label">Dashboard</span>
           </a>


           <a href="{{ route('modules') }}" class="nav-link group">
               <div class="icon-wrapper">
                   <svg
                       class="icon indigo"
                       fill="none"
                       stroke="currentColor"
                       viewBox="0 0 24 24">
                       <path
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                   </svg>
               </div>
               <span class="label">Modules</span>
           </a>

           <a href="{{ route('quizzes') }}" class="nav-link group">
               <div class="icon-wrapper">
                   <svg
                       class="icon purple"
                       fill="none"
                       stroke="currentColor"
                       viewBox="0 0 24 24">
                       <path
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                   </svg>
               </div>
               <span class="label">Quizzes</span>
           </a>


           @if(auth()->user()->role === 'admin')
           <a href="{{ route('admin.crm.edit') }}" class="nav-link group">
               <div class="icon-wrapper">
                   <svg class="icon blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v4H4V4zm0 6h16v2H4v-2zm0 4h10v2H4v-2zm0 4h10v2H4v-2z" />
                   </svg>
               </div>
               <span class="label">CMS</span>
           </a>
           @endif


           <a href="{{ route('terms') }}" class="nav-link group">
               <div class="icon-wrapper">
                   <svg
                       class="icon orange"
                       fill="none"
                       stroke="currentColor"
                       viewBox="0 0 24 24">
                       <path
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                   </svg>
               </div>
               <span class="label">Help</span>
           </a>
       </div>
   </div>