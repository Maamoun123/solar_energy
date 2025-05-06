<div id="preloader" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: #fff; z-index: 9999; display: flex; justify-content: center; align-items: center; flex-direction: column;">
    <div style="text-align: center;">
        <div class="solar-icon" style="margin-bottom: 20px; position: relative;">
            <!-- Solar panel SVG with animation -->
            <svg width="100" height="100" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="30" fill="#f9cf6a" class="solar-rotate" />
                <path d="M20,50 L80,50" stroke="#198754" stroke-width="2" class="energy-flow" />
                <path d="M50,20 L50,80" stroke="#198754" stroke-width="2" class="energy-flow" />
                <path d="M30,30 L70,70" stroke="#198754" stroke-width="2" class="energy-flow" />
                <path d="M30,70 L70,30" stroke="#198754" stroke-width="2" class="energy-flow" />
            </svg>
        </div>
        <h3 style="font-family: 'Titillium Web', sans-serif; color: #198754; margin-bottom: 15px;">SolarEnergy Lebanon</h3>
        <div class="loading-bar" style="width: 200px; height: 4px; background-color: #eee; border-radius: 2px; overflow: hidden; margin: 0 auto;">
            <div class="loading-progress" style="width: 0%; height: 100%; background-color: #198754; animation: loading 2s ease-in-out forwards;"></div>
        </div>
    </div>

    <style>
        @keyframes loading {
            0% {
                width: 0%;
            }

            50% {
                width: 70%;
            }

            100% {
                width: 100%;
            }
        }

        .solar-rotate {
            transform-origin: center;
            animation: rotateAnimation 10s linear infinite;
        }

        @keyframes rotateAnimation {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .energy-flow {
            stroke-dasharray: 20;
            stroke-dashoffset: 80;
            animation: flow 2s linear infinite;
        }

        @keyframes flow {
            to {
                stroke-dashoffset: 0;
            }
        }
    </style>

    <script>
        // Preloader timing
        window.addEventListener('load', function() {
            setTimeout(function() {
                var preloader = document.getElementById('preloader');

                // Fade out preloader
                preloader.style.transition = 'opacity 0.5s ease';
                preloader.style.opacity = '0';

                // Remove from DOM after animation
                setTimeout(function() {
                    preloader.style.display = 'none';
                }, 500);
            }, 1500); // Adjust the delay as needed
        });
    </script>
</div>