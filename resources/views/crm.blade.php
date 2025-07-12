<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage Content Management</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background-color: #f8f9fa; padding: 2rem; }
        .container { max-width: 1200px; margin: auto; background: #fff; padding: 2.5rem; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .page-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #dee2e6; padding-bottom: 0.5rem; margin-bottom: 1.5rem;}
        h1, h2, h3, h4 { color: #343a40; margin: 0; }
        h2 { border-bottom: 2px solid #dee2e6; padding-bottom: 0.5rem; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; font-weight: 600; margin-bottom: 0.5rem; color: #495057; }
        input[type="text"], input[type="file"], textarea { width: 100%; padding: 0.75rem; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; transition: border-color 0.2s; }
        .btn { padding: 0.5rem 1rem; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block; font-size: 0.9rem; font-weight: 500; }
        .btn-primary { background-color: #007bff; color: white; padding: 0.75rem 1.5rem; font-size: 1rem;}
        .btn-secondary { background-color: #6c757d; color: white; }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .item-group { display: flex; align-items: center; gap: 1rem; margin-bottom: 0.75rem; }
        .item-group input { flex-grow: 1; }
        #plans-container .plan, #why-choose-us-container .item-group { border: 1px solid #e9ecef; padding: 1.5rem; margin-bottom: 1.5rem; border-radius: 5px; }
        .plan-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
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
                                placeholder="price_..."
                            >
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

            <div style="margin-top: 3rem;">
                <button type="submit" class="btn btn-primary">Save All Changes</button>
            </div>
        </form>
    </div>

    <script>
        @if(session('success'))
            alert("{{ session('success') }}");
        @endif

        let planIndex = {{ count(old('plans', $content->plans ?? [])) }};
        
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
</body>
</html>
