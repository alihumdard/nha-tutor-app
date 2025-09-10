<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Segoe UI", sans-serif;
    }

    /* Fullscreen Loader */
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #0d0d0d, #1a1a1a);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index: 9999;
        color: #00ffe0;
    }

    /* Robot Head */
    .robot-head {
        width: 120px;
        height: 120px;
        background: #111;
        border: 3px solid #00ffe0;
        border-radius: 20px;
        position: relative;
        box-shadow: 0 0 20px rgba(0, 255, 224, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Robot Eyes */
    .eye {
        width: 20px;
        height: 20px;
        background: #00ffe0;
        border-radius: 50%;
        margin: 0 15px;
        animation: blink 2s infinite;
    }

    .eyes {
        display: flex;
    }

    @keyframes blink {

        0%,
        90%,
        100% {
            transform: scaleY(1);
        }

        95% {
            transform: scaleY(0.1);
        }
    }

    /* Antenna */
    .antenna {
        width: 6px;
        height: 30px;
        background: #00ffe0;
        position: absolute;
        top: -30px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 3px;
        animation: glow 1.5s infinite;
    }

    @keyframes glow {

        0%,
        100% {
            opacity: 0.3;
        }

        50% {
            opacity: 1;
        }
    }

    /* Text */
    .loading-text {
        margin-top: 25px;
        font-size: 20px;
        letter-spacing: 2px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Dots */
    .dot {
        width: 10px;
        height: 10px;
        background: #00ffe0;
        border-radius: 50%;
        animation: bounce 1.5s infinite;
    }

    .dot:nth-child(2) {
        animation-delay: 0.3s;
    }

    .dot:nth-child(3) {
        animation-delay: 0.6s;
    }

    @keyframes bounce {

        0%,
        80%,
        100% {
            transform: scale(0.6);
        }

        40% {
            transform: scale(1);
        }
    }
</style>

<div id="preloader">
    <div class="robot-head">
        <div class="antenna"></div>
        <div class="eyes">
            <div class="eye"></div>
            <div class="eye"></div>
        </div>
    </div>
    <div class="loading-text">
        Wait,Generating content
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>
<script>
    function showPreloader() {
        document.getElementById("preloader").style.display = "flex";
    }

    function hidePreloader() {
        document.getElementById("preloader").style.display = "none";
    }

    // ** THIS IS THE FIX **
    // This uses a more reliable way to detect a page refresh and prevent the preloader from showing.
    (function() {
        const navigationEntries = performance.getEntriesByType("navigation");
        if (navigationEntries.length > 0 && navigationEntries[0].type === 'reload') {
            hidePreloader();
        }
    })();

    // ✅ Hide preloader as soon as page fully loads
    window.addEventListener("load", function() {
        hidePreloader();
    });

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll("a:not(.nav-link):not(.not-preloader)").forEach(function(link) {
            link.addEventListener("click", function(e) {
                // Skip external, new tab, anchors, JS hrefs
                if (
                    link.tagName.toLowerCase() === "button" || // skip buttons
                    link.classList.contains("not-preloader") || // skip links with .not-preloader
                    link.target === "_blank" ||
                    link.href.includes("#") ||
                    link.href.startsWith("javascript:")
                ) return;

                showPreloader();
            });
        });
    });



    // ✅ Intercept fetch
    // const originalFetch = window.fetch;
    // window.fetch = function() {
    //     showPreloader();
    //     return originalFetch.apply(this, arguments)
    //         .finally(() => hidePreloader());
    // };

    // ✅ Intercept vanilla XHR
    // (function(open) {
    //     XMLHttpRequest.prototype.open = function() {
    //         this.addEventListener("loadstart", showPreloader);
    //         this.addEventListener("loadend", hidePreloader);
    //         open.apply(this, arguments);
    //     };
    // })(XMLHttpRequest.prototype.open);
</script>