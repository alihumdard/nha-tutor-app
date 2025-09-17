<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Homepage Content Management</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
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
    </style>
</head>

<body>
    <div class="container">
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
                        <!-- Terms Sections -->
            <h2 style="margin-top: 2rem;">Terms and Conditions Section</h2>
            <div class="content-card">
                    <textarea name="terms_and_conditions" id="terms_and_conditions" rows="20" style="width: 100%; padding: 1rem; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; font-size: 1rem; line-height: 1.5; color: #495057; background-color: #fff; background-clip: padding-box; transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;">
                    {{ $content->terms_and_conditions ?? '' }}   
                    <!-- Header Section -->
                        <div class="header-section">
                            <h1 class="main-heading">Terms and Conditions</h1>
                        </div>

                        <!-- Introduction -->
                        <div class="intro-section">
                            <p class="intro-text">
                                Welcome to NHA Tutor Pro! These terms and conditions outline the
                                rules and regulations for the use of our educational platform.
                            </p>
                            <p class="intro-text">
                                By accessing this platform, we assume you accept these terms and
                                conditions in full. Do not continue to use NHA Tutor Pro if you
                                do not accept all of the terms and conditions stated on this
                                page.
                            </p>
                        </div>

                        <!-- Terms Sections -->
                        <div class="terms-sections">
                            <!-- Section 1 -->
                            <div class="">
                                <h2 class="term-heading">1. License to Use</h2>
                                <div class="term-content">
                                    <p>
                                        Unless otherwise stated, NHA Tutor Pro and/or its licensors
                                        own the intellectual property rights for all material on
                                        this platform. All intellectual property rights are
                                        reserved.
                                    </p>
                                    <p>
                                        You may view and/or print pages from https://nhatutorpro.com
                                        for your own personal use subject to restrictions set in
                                        these terms and conditions.
                                    </p>
                                    <div class="notice-box blue-notice">
                                        <strong>You must not:</strong>
                                        <ul class="notice-list">
                                            <li>Republish material from this platform</li>
                                            <li>
                                                Sell, rent or sub-license material from this platform
                                            </li>
                                            <li>
                                                Reproduce, duplicate or copy material from this platform
                                            </li>
                                            <li>Redistribute content from NHA Tutor Pro</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 2 -->
                            <div class="green-border">
                                <h2 class="term-heading">2. User Responsibilities</h2>
                                <div class="term-content">
                                    <p>
                                        As a user of our platform, you agree to use NHA Tutor Pro
                                        only for lawful purposes and in a way that does not infringe
                                        the rights of, restrict or inhibit anyone else's use and
                                        enjoyment of the platform.
                                    </p>
                                    <div class="notice-box green-notice">
                                        <strong>Prohibited activities include:</strong>
                                        <ul class="notice-list">
                                            <li>Harassing or causing distress to other users</li>
                                            <li>
                                                Uploading offensive, obscene or inappropriate content
                                            </li>
                                            <li>
                                                Disrupting the normal flow of dialogue within our
                                                platform
                                            </li>
                                            <li>
                                                Attempting to gain unauthorized access to our systems
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 3 -->
                            <div class="">
                                <h2 class="term-heading">3. Account Security</h2>
                                <div class="term-content">
                                    <p>
                                        You are responsible for maintaining the confidentiality of
                                        your account and password and for restricting access to your
                                        computer or device. You agree to accept responsibility for
                                        all activities that occur under your account or password.
                                    </p>
                                    <p>
                                        We reserve the right to refuse service, terminate accounts,
                                        remove or edit content, or cancel orders at our sole
                                        discretion.
                                    </p>
                                </div>
                            </div>

                            <!-- Section 4 -->
                            <div class="">
                                <h2 class="term-heading">4. Content Liability</h2>
                                <div class="term-content">
                                    <p>
                                        We shall not be held responsible for any content that
                                        appears on your learning dashboard. You agree to protect and
                                        defend us against all claims that may arise from your use of
                                        our platform.
                                    </p>
                                    <p>
                                        No link(s) should appear on any website that may be
                                        interpreted as libelous, obscene or criminal, or which
                                        infringes, otherwise violates, or advocates the infringement
                                        or other violation of, any third party rights.
                                    </p>
                                </div>
                            </div>

                            <!-- Section 5 -->
                            <div class="">
                                <h2 class="term-heading">5. Privacy Policy</h2>
                                <div class="term-content">
                                    <p>
                                        Your privacy is important to us. Our Privacy Policy explains
                                        how we collect, use, disclose, and safeguard your
                                        information when you visit our platform.
                                    </p>
                                    <p>
                                        Please review our Privacy Policy, which is incorporated into
                                        these Terms and Conditions. If you do not agree with our
                                        Privacy Policy, you must not use our platform.
                                    </p>
                                </div>
                            </div>

                            <!-- Section 6 -->
                            <div class="">
                                <h2 class="term-heading">6. Changes to Terms</h2>
                                <div class="term-content">
                                    <p>
                                        We reserve the right, at our sole discretion, to modify or
                                        replace these Terms at any time. We will provide at least 30
                                        days' notice prior to any new terms taking effect.
                                    </p>
                                    <p>
                                        By continuing to access or use our platform after those
                                        revisions become effective, you agree to be bound by the
                                        revised terms. If you do not agree to the new terms, you
                                        must stop using the platform.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Acceptance Section -->
                        <div class="acceptance-section">
                            <h3 class="acceptance-heading">Acceptance of Terms</h3>
                            <p class="acceptance-text">
                                By using NHA Tutor Pro, you signify your acceptance of these
                                terms and conditions. If you do not agree to these terms, please
                                do not use our platform. Your continued use of the platform
                                following the posting of changes to these terms will be deemed
                                your acceptance of those changes.
                            </p>
                        </div>
                    </textarea>
                </div>

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
    ClassicEditor
        .create(document.querySelector('#terms_and_conditions'))
        .catch(error => {
            console.error(error);
        });
    </script>
</body>

</html>
