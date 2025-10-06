<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Homepage Content Management</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            padding: 2.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }

        h1,
        h2,
        h3,
        h4 {
            color: #343a40;
            margin: 0;
        }

        h2 {
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #495057;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.2s;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .item-group {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
        }

        .item-group input {
            flex-grow: 1;
        }

        #plans-container .plan,
        #why-choose-us-container .item-group {
            border: 1px solid #e9ecef;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
        }

        .plan-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        /* Container */
        .form-group {
            margin-bottom: 1rem;
        }

        /* Label */
        .form-group label {
            display: inline-block;
            margin-bottom: .5rem;
            font-weight: 600;
            color: #212529;
            font-size: 0.95rem;
        }

        /* Generic form-control styling for input/select/textarea */
        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            box-sizing: border-box;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        /* Focus state (blue outline like bootstrap) */
        .form-control:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
        }

        /* Textarea sizing */
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            padding-top: .5rem;
            padding-bottom: .5rem;
        }

        /* Select: add custom arrow at right and provide padding so text doesn't overlap */
        .select-wrapper {
            position: relative;
        }

        .select-wrapper .form-control {
            padding-right: 2.5rem;
            /* space for arrow */
            background-image: none;
            /* remove system arrow if present */
        }

        /* Arrow using SVG data URI (neutral gray) */
        .select-wrapper::after {
            content: "";
            position: absolute;
            pointer-events: none;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1rem;
            height: 1rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4L2 0zM2 5L0 3h4l-2 2z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            opacity: .7;
        }

        /* Disabled state */
        .form-control[disabled],
        .form-control:disabled {
            background-color: #e9ecef;
            opacity: 1;
            cursor: not-allowed;
        }

        /* Small helper for a compact label/input group */
        .form-inline .form-group {
            display: inline-block;
            margin-right: .75rem;
            vertical-align: middle;
        }

        /* Error styling example (optional) */
        .form-control.is-invalid {
            border-color: #e3342f;
            box-shadow: 0 0 0 .2rem rgba(227, 52, 47, .15);
        }

        .form-text {
            display: block;
            margin-top: .25rem;
            color: #6c757d;
            font-size: .875rem;
        }

                .space-y-6 > * + * {
            margin-top: 1.5rem;
        }

        .text-3xl { font-size: 1.875rem; }
        .font-bold { font-weight: 700; }
        .text-gray-800 { color: #2d3748; }
        .text-center { text-align: center; }
        .mb-8 { margin-bottom: 2rem; }
        .text-gray-500 { color: #a0aec0; }
        .mt-2 { margin-top: 0.5rem; }
        .w-full { width: 100%; }
        .px-4 { padding-left: 1rem; padding-right: 1rem; }
        .py-3 { padding-top: 0.75rem; padding-bottom: 0.75rem; }
        .bg-gray-50 { background-color: #f9fafb; }
        .border-gray-300 { border-color: #d2d6dc; }
        .rounded-lg { border-radius: 0.5rem; }
        .focus\:ring-2:focus { box-shadow: 0 0 0 2px var(--tw-ring-color); }
        .focus\:ring-blue-500:focus { --tw-ring-color: #3b82f6; }
        .transition { transition-property: all; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
        .file\:bg-blue-50::file-selector-button { background-color: #eff6ff; }
        .file\:text-blue-700::file-selector-button { color: #1d4ed8; }
        .hover\:file\:bg-blue-100:hover::file-selector-button { background-color: #dbeafe; }
        .mt-8 { margin-top: 2rem; }
        .bg-blue-600 { background-color: #2563eb; }
        .hover\:bg-blue-700:hover { background-color: #1d4ed8; }
        .active\:scale-95:active { transform: scale(.95); }
        .flex { display: flex; }
        .items-center { align-items: center; }
        .justify-center { justify-content: center; }
        .hidden { display: none; }
        .animate-spin { animation: spin 1s linear infinite; }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    </style>
</head>

<body>
    <div class="container">
            @if(session('success'))
            <div style="padding: 10px; margin-bottom: 15px; border: 1px solid green; background: #e6ffed; color: green; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="padding: 10px; margin-bottom: 15px; border: 1px solid red; background: #ffe6e6; color: red; border-radius: 5px;">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="page-header">
            <h1>Manage Homepage Content</h1>
            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
        </div>

        <form id="crmForm" action="{{ route('admin.crm.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Main Section</h2>
            <div class="form-group">
                <label for="main_heading">Main Heading</label>
                <input type="text" name="main_heading" value="{{ old('main_heading', $content->main_heading ?? '') }}">
            </div>
            <div class="form-group">
                <label for="main_content">Main Content/Paragraph</label>
                <textarea name="main_content" rows="4">{{ old('main_content', $content->main_content ?? '') }}</textarea>
            </div>

            <h2>Plans Section</h2>
            <div class="form-group">
                <label for="plans_main_heading">Plans Section Heading</label>
                <input type="text" name="plans_main_heading" value="{{ old('plans_main_heading', $content->plans_main_heading ?? '') }}">
            </div>
            <div id="plans-container">
                @foreach(old('plans', $content->plans ?? []) as $index => $plan)
                <div class="plan">
                    <div class="plan-header">
                        <h4>Plan {{ $index + 1 }}</h4>
                        <button type="button" class="btn btn-danger" onclick="removePlan(this)">Remove Plan</button>
                    </div>
                    <div class="form-group"><label>Plan Image</label><input type="file" name="plans[{{$index}}][image]"></div>
                    <div class="form-group"><label>Plan Heading</label><input type="text" name="plans[{{$index}}][heading]" value="{{ $plan['heading'] ?? '' }}"></div>
                    <div class="form-group"><label>Plan Description</label><input type="text" name="plans[{{$index}}][description]" value="{{ $plan['description'] ?? '' }}"></div>
                    <div class="form-group">
                        <label>Plan Details (Bullets)</label>
                        <div class="plan-details-container">
                            @foreach($plan['details'] ?? [] as $detail)
                            <div class="item-group">
                                <input type="text" name="plans[{{$index}}][details][]" value="{{ $detail }}">
                                <button type="button" class="btn btn-danger" onclick="removeItem(this)">Remove</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-success" onclick="addPlanDetail(this, {{ $index }})">Add Detail</button>
                    </div>
                    <div class="form-group"><label>Plan Price</label><input type="text" name="plans[{{$index}}][price]" value="{{ $plan['price'] ?? '' }}"></div>
                    <div class="form-group">
                        <label>Stripe Price ID</label>
                        <input
                            type="text"
                            name="plans[{{ $index }}][stripe_price_id]"
                            id="plan_{{ $index }}_stripe_id"
                            value="{{ $plan['stripe_price_id'] ?? '' }}"
                            placeholder="price_...">
                    </div>
                </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-success" onclick="addPlan()">Add New Plan</button>

            <h2 style="margin-top: 2rem;">"Why Choose Us" Section</h2>
            <div class="form-group">
                <label for="why_choose_us_main_heading">"Why Choose Us" Heading</label>
                <input type="text" name="why_choose_us_main_heading" value="{{ old('why_choose_us_main_heading', $content->why_choose_us_main_heading ?? '') }}">
            </div>
            <div id="why-choose-us-container">
                @foreach(old('why_choose_us_items', $content->why_choose_us_items ?? []) as $item)
                <div class="item-group">
                    <input type="text" name="why_choose_us_items[]" value="{{ $item }}">
                    <button type="button" class="btn btn-danger" onclick="removeItem(this)">Remove</button>
                </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-success" onclick="addWhyChooseUsItem()">Add Item</button>

            <div style="margin-top: 3rem; display: flex; justify-content: flex-end;">
                <button type="submit" class="btn btn-primary">Save All Changes</button>
            </div>
        </form>
    </div>

    <div class="container " style="margin-top: 3rem;">
        <form id="crmForm" class="" action="{{ route('admin.propet.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label for="prompet_type">Prompet Type</label>
                <div class="select-wrapper">
                    <select id="prompet_type" name="prompet_type" class="form-control">
                        <option value="">-- Select Type --</option>
                        <option value="system" {{ old('prompet_type', $content->prompet_type ?? '') == 'system' ? 'selected' : '' }}>System</option>
                        <option value="lesson" {{ old('prompet_type', $content->prompet_type ?? '') == 'lesson' ? 'selected' : '' }}>Lesson</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="prompet_content">Prompet Content</label>
                <textarea id="prompet_content" name="prompet_content" rows="4" class="form-control">{{ old('prompet_content', $content->prompet_content ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <div style="margin-top: 3rem; display: flex; justify-content: flex-end;">
                    <button type="submit" class="btn btn-primary">Update Prompet</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Lesson Upload Form Section -->
    <div class="container" style="margin-top: 3rem;">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Upload New Lesson</h1>
            <p class="text-gray-500 mt-2">Provide a title and a PDF file for the new lesson.</p>
        </div>

        <form id="uploadForm" novalidate>
            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Lesson Title</label>
                    <input type="text" id="title" name="title" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" placeholder="e.g., OSHA Rules and Regulations">
                </div>
                <div>
                    <label for="lesson_type" class="block text-sm font-medium text-gray-700 mb-1">Lesson Type</label>
                    <div class="select-wrapper">
                        <select id="lesson_type" name="lesson_type" class="form-control">
                            <option value="CORE" >CORE</option>
                            <option value="LOS" >LOS</option>
                        </select>
                     </div>
                </div>
                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-1">Lesson File (PDF)</label>
                    <input type="file" id="file" name="file" required accept="application/pdf" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                </div>
            </div>
            <div class="form-group">
                <div style="margin-top: 3rem; display: flex; justify-content: flex-end;">
                    <button type="submit" id="submitButton" class="btn btn-primary">
                    <svg id="spinner"  style="height:15px; width:40px;" class="animate-spin mr-3  text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span id="buttonText">Upload Lesson</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    @include('includes.security-scripts')
    <script>
        document.getElementById('crmForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = 'Saving...';

            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: data.message,
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong. Please check the form for errors.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'An unexpected network error occurred.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                })
                .finally(() => {
                    submitButton.disabled = false;
                    submitButton.textContent = 'Save All Changes';
                });
        });

        // ✅ Correct Blade expression for planIndex
        let planIndex = "{{count(old('plans', $content->plans ?? []))}}";

        function addPlan() {
            const container = document.getElementById('plans-container');
            const newPlanIndex = planIndex++;
            const html = `
        <div class="plan">
            <div class="plan-header">
                <h4>New Plan</h4>
                <button type="button" class="btn btn-danger" onclick="removePlan(this)">Remove Plan</button>
            </div>
            <div class="form-group"><label>Plan Image</label><input type="file" name="plans[${newPlanIndex}][image]"></div>
            <div class="form-group"><label>Plan Heading</label><input type="text" name="plans[${newPlanIndex}][heading]"></div>
            <div class="form-group"><label>Plan Description</label><input type="text" name="plans[${newPlanIndex}][description]"></div>
            <div class="form-group">
                <label>Plan Details (Bullets)</label>
                <div class="plan-details-container"></div>
                <button type="button" class="btn btn-success" onclick="addPlanDetail(this, ${newPlanIndex})">Add Detail</button>
            </div>
            <div class="form-group"><label>Plan Price</label><input type="text" name="plans[${newPlanIndex}][price]"></div>
            <div class="form-group"><label>Stripe Price ID</label><input type="text" name="plans[${newPlanIndex}][stripe_price_id]" placeholder="price_..."></div>
        </div>`;
            container.insertAdjacentHTML('beforeend', html);
        }

        function addPlanDetail(button, index) {
            const container = button.previousElementSibling;
            const html = `
        <div class="item-group">
            <input type="text" name="plans[${index}][details][]" value="">
            <button type="button" class="btn btn-danger" onclick="removeItem(this)">Remove</button>
        </div>`;
            container.insertAdjacentHTML('beforeend', html);
        }

        function addWhyChooseUsItem() {
            const container = document.getElementById('why-choose-us-container');
            const html = `
        <div class="item-group">
            <input type="text" name="why_choose_us_items[]" value="">
            <button type="button" class="btn btn-danger" onclick="removeItem(this)">Remove</button>
        </div>`;
            container.insertAdjacentHTML('beforeend', html);
        }

        function removePlan(button) {
            button.closest('.plan').remove();
        }

        function removeItem(button) {
            button.closest('.item-group').remove();
        }
    </script>

    <script>
        document.getElementById('prompet_type').addEventListener('change', function() {
            let type = this.value;

            if (!type) return; // Skip if no value selected

            fetch("{{ route('admin.propet.type.update') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                    },
                    body: JSON.stringify({
                        prompet_type: type
                    }),
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        // Update textarea content
                        document.getElementById('prompet_content').value = data.content ?? '';
                    } else {
                        alert("Failed to load content. Please try again.");
                    }
                })
                .catch(err => {
                    console.error("Error fetching prompt:", err);
                    alert("Error fetching prompt!");
                });
        });
    </script>
        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const uploadForm = document.getElementById('uploadForm');
            
            if (uploadForm) {
                const submitButton = uploadForm.querySelector('#submitButton');
                const spinner = uploadForm.querySelector('#spinner');
                const buttonText = uploadForm.querySelector('#buttonText');
                const titleInput = uploadForm.querySelector('#title');
                const lesson_typeInput = uploadForm.querySelector('#lesson_type');
                const fileInput = uploadForm.querySelector('#file');
                
                const apiUrl = 'https://nha-tutor.onrender.com/lessons/upload';

                uploadForm.addEventListener('submit', async (event) => {
                    event.preventDefault();

                    const title = titleInput.value.trim();
                    const lesson_type = lesson_typeInput.value.trim();
                    const file = fileInput.files[0];

                    if (!title) {
                        Swal.fire('Validation Error', 'Please enter a lesson title.', 'error');
                        return;
                    }
                    if (!lesson_type) {
                        Swal.fire('Validation Error', 'Please enter a lesson type.', 'error');
                        return;
                    }
                    if (!file) {
                        Swal.fire('Validation Error', 'Please select a file to upload.', 'error');
                        return;
                    }
                    if (file.type !== 'application/pdf') {
                        Swal.fire('Validation Error', 'Please select a valid PDF file.', 'error');
                        return;
                    }

                    submitButton.disabled = true;
                    spinner.classList.remove('hidden');
                    buttonText.textContent = 'Uploading...';

                    const formData = new FormData();
                    formData.append('title', title);
                    formData.append('lesson_type', lesson_type);
                    formData.append('file', file);

                    try {
                        const response = await fetch(apiUrl, {
                            method: 'POST',
                            body: formData,
                        });

                        const result = await response.json();

                        if (!response.ok) {
                            throw new Error(result.detail || 'An unknown server error occurred.');
                        }
                        
                        // Based on your success criteria
                        const successData = { success: true, message: `Lesson "${result.title}" uploaded successfully!` };
                        if (successData.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: successData.message,
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                        
                        uploadForm.reset();

                    } catch (error) {
                        console.error('Upload failed:', error);
                        Swal.fire({
                            title: 'Upload Failed!',
                            text: error.message,
                            icon: 'error'
                        });
                    } finally {
                        submitButton.disabled = false;
                        spinner.classList.add('hidden');
                        buttonText.textContent = 'Upload Lesson';
                    }
                });
            }
        });
    </script>

</body>

</html>