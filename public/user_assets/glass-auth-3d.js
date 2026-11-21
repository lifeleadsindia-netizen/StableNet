/**
 * StableNet 3D Interactive Tilt & Sheen Script
 */
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        const card = document.querySelector('.auth-3d-card');
        const wrapper = document.querySelector('.auth-3d-card-wrapper');

        if (!card || !wrapper) return;

        // Skip heavy tilt on touch devices
        const isTouch = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);
        if (isTouch) return;

        let mouseX = 0;
        let mouseY = 0;
        let cardX = 0;
        let cardY = 0;
        let isHovered = false;

        const maxTilt = 8; // degrees

        function onMouseMove(e) {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            // Normalize between -1 and 1
            const normX = (x / rect.width) * 2 - 1;
            const normY = (y / rect.height) * 2 - 1;

            mouseX = normX;
            mouseY = normY;

            // Set specular sheen coordinates in px
            card.style.setProperty('--mouse-x', x + 'px');
            card.style.setProperty('--mouse-y', y + 'px');
        }

        function onMouseEnter() {
            isHovered = true;
            card.style.transition = 'transform 0.1s ease-out, box-shadow 0.3s ease';
        }

        function onMouseLeave() {
            isHovered = false;
            mouseX = 0;
            mouseY = 0;
            card.style.transition = 'transform 0.5s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.5s ease';
            card.style.transform = 'perspective(1200px) rotateX(0deg) rotateY(0deg) translateY(0px)';
        }

        function updateTilt() {
            if (isHovered) {
                // Smooth interpolation
                cardX += (mouseX - cardX) * 0.15;
                cardY += (mouseY - cardY) * 0.15;

                const rotateY = cardX * maxTilt;
                const rotateX = -cardY * maxTilt;

                card.style.transform = `perspective(1200px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) translateY(-4px)`;
            }
            requestAnimationFrame(updateTilt);
        }

        wrapper.addEventListener('mousemove', onMouseMove);
        wrapper.addEventListener('mouseenter', onMouseEnter);
        wrapper.addEventListener('mouseleave', onMouseLeave);

        requestAnimationFrame(updateTilt);
    });

    // Global password visibility toggle
    window.togglePasswordVisibility = function(inputId, button) {
        const input = document.getElementById(inputId);
        if (!input) return;

        const icon = button.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            if (icon) {
                icon.className = 'ri-eye-line align-middle';
            }
        } else {
            input.type = 'password';
            if (icon) {
                icon.className = 'ri-eye-off-line align-middle';
            }
        }
    };
})();
