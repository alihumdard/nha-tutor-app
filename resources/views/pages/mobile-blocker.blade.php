@if(Auth::check() && Auth::user()->getPlanName() === 'Half In' && request()->isMobile())
    {{-- Show only this message and stop rendering the rest --}}
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mobile Access Restricted</title>
        <style>
            html,body{
                margin:0;
                padding:0;
                height:100%;
                background:#000;
                color:#00ffe0;
                display:flex;
                justify-content:center;
                align-items:center;
                font-family:"Segoe UI",sans-serif;
                text-align:center;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Mobile Access Restricted</h1>
            <p>Your current plan does not allow mobile access.<br>
               Please upgrade to continue.</p>
        </div>
    </body>
    </html>
    @php exit; @endphp
@endif
