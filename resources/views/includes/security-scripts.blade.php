<style>
    /* Add this style to prevent text selection */
    body {
        -webkit-user-select: none; /* Safari */
        -ms-user-select: none; /* IE 10+ */
        user-select: none; /* Standard syntax */
    }

    /* Styles for the "Action Blocked" Modal */
    #security-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000000;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease, visibility 0.3s;
    }

    #security-modal.visible {
        visibility: visible;
        opacity: 1;
    }
    
    /* New styles for the screenshot-blocking overlay */
    #screenshot-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: #000; /* Black overlay */
        z-index: 999999;
        display: none; /* Hidden by default */
    }

    .modal-content {
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.75rem;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        width: 90%;
    }

    .modal-icon {
        font-size: 3rem;
        color: #ef4444; /* Red color */
    }

    .modal-message {
        font-size: 1.25rem;
        font-weight: 600;
        color: #b91c1c; /* Darker red */
        margin-top: 1rem;
    }
</style>

<div id="screenshot-overlay"></div>

<div id="security-modal">
    <div class="modal-content">
        <div class="modal-icon">
            <i class="fas fa-shield-alt"></i>
        </div>
        <p id="security-message" class="modal-message">
            This action is not allowed.
        </p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('security-modal');
        const modalMessage = document.getElementById('security-message');
        const screenshotOverlay = document.getElementById('screenshot-overlay');
        let snipping = false;

        function showWarning(message) {
            if (modal && modalMessage) {
                modalMessage.textContent = message;
                modal.classList.add('visible');
                setTimeout(() => {
                    modal.classList.remove('visible');
                }, 3000);
            }
        }

        // --- Prevent Browser-Based Screen Recording ---
        if (navigator.mediaDevices && 'getDisplayMedia' in navigator.mediaDevices) {
            const originalGetDisplayMedia = navigator.mediaDevices.getDisplayMedia.bind(navigator.mediaDevices);
            navigator.mediaDevices.getDisplayMedia = async function () {
                showWarning('Screen recording is not permitted.');
                throw new Error('Screen recording has been disabled on this page.');
            };
        }

        // --- Screenshot Attempt Detection ---
        document.addEventListener('keyup', (e) => {
            if (e.key === 'PrintScreen') {
                screenshotOverlay.style.display = 'block';
                showWarning('Screenshots are not allowed.');
                setTimeout(() => {
                    screenshotOverlay.style.display = 'none';
                }, 3000);
            }
        });

        // --- Other Security Measures ---
        document.addEventListener('contextmenu', e => e.preventDefault());
        
        document.addEventListener('keydown', e => {
            // Check for Win+Shift+S (Windows Snipping Tool) and Cmd+Shift+S
            if ((e.metaKey || e.ctrlKey) && e.shiftKey && e.key.toLowerCase() === 's') {
                snipping = true;
                screenshotOverlay.style.display = 'block';
                showWarning('Taking screenshots is not allowed.');
            }

            // Developer Tools shortcuts
            if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && (e.key.toLowerCase() === 'i' || e.key.toLowerCase() === 'j' || e.key.toLowerCase() === 'c')) || (e.ctrlKey && e.key.toLowerCase() === 'u')) {
                e.preventDefault();
                showWarning('Developer tools are disabled.');
            }

            // Prevent Copying (Ctrl+C)
            if (e.ctrlKey && e.key.toLowerCase() === 'c') {
                e.preventDefault();
                showWarning('Copying content is not allowed.');
            }
        });

        // --- Use Blur Event to Detect Snipping Tool ---
        window.addEventListener('blur', () => {
            if (snipping) {
                setTimeout(() => {
                    screenshotOverlay.style.display = 'none';
                    snipping = false;
                }, 1000);
            }
        });
    });
</script>