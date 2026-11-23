@extends('member.layouts.main')
@section('title', 'Executive Member Dashboard')
@section('container')

    <!-- ==========================================================================
         EXACT REFERENCE-BASED FINTECH DASHBOARD DESIGN
         Matching Image 1 & Image 2 (Today's Earnings Command Center & Lifetime Overview)
         ========================================================================== -->
    <style>
        :root {
            --ft-canvas-bg: #F4F6FC;
            --ft-card-bg: #FFFFFF;
            --ft-border-subtle: #E2E8F0;
            --ft-border-light: rgba(226, 232, 240, 0.8);
            --ft-shadow-card: 0 4px 20px -2px rgba(15, 23, 42, 0.06);
            --ft-shadow-hover: 0 12px 30px -4px rgba(15, 23, 42, 0.12);
            --ft-radius-lg: 22px;
            --ft-radius-md: 18px;
            --ft-radius-sm: 12px;
            --ft-text-dark: #0F172A;
            --ft-text-muted: #64748B;
        }

        /* --------------------------------------------------------------------------
           BASE DASHBOARD CANVAS & AMBIENT SILK WAVES
           -------------------------------------------------------------------------- */
        .ft-dashboard-canvas {
            background-color: var(--ft-canvas-bg);
            background-image: 
                radial-gradient(circle at 15% 10%, rgba(224, 231, 255, 0.7) 0%, transparent 40%),
                radial-gradient(circle at 85% 15%, rgba(237, 233, 254, 0.7) 0%, transparent 40%),
                radial-gradient(circle at 50% 90%, rgba(224, 242, 254, 0.6) 0%, transparent 50%);
            background-attachment: fixed;
            min-height: calc(100vh - 70px);
            padding: 22px 26px 45px;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: var(--ft-text-dark);
            position: relative;
        }

        /* Ambient subtle wave mesh banner */
        .ft-ambient-waves {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 380px;
            background: radial-gradient(ellipse 90% 60% at 50% -10%, rgba(199, 210, 254, 0.35), transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* --------------------------------------------------------------------------
           GPU-ACCELERATED KEYFRAME ANIMATIONS
           -------------------------------------------------------------------------- */
        @keyframes floatSubtle {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }

        @keyframes pulseDot {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        /* --------------------------------------------------------------------------
           ROW 1: HERO MEMBERSHIP CARD (LEFT) & MEMBER PROFILE CARD (RIGHT)
           -------------------------------------------------------------------------- */
        .ft-membership-card {
            background: linear-gradient(115deg, #0d1252 0%, #151e86 32%, #1e3bb5 68%, #2554db 100%);
            border-radius: var(--ft-radius-lg);
            position: relative;
            overflow: hidden;
            padding: 26px 30px;
            color: #FFFFFF;
            min-height: 205px;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            border: 1px solid rgba(147, 197, 253, 0.45);
            box-shadow: 0 12px 34px -4px rgba(19, 23, 101, 0.3);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .ft-membership-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 42px -4px rgba(19, 23, 101, 0.4);
        }

        .ft-membership-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 10% 20%, rgba(139, 92, 246, 0.35) 0%, transparent 45%),
                        radial-gradient(circle at 80% 50%, rgba(6, 182, 212, 0.35) 0%, transparent 55%);
            pointer-events: none;
        }

        .ft-badge-premium {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 215, 0, 0.4);
            color: #FFD700;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
            border-radius: 20px;
            padding: 4px 12px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .ft-member-id-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 4px 0 6px;
        }

        .ft-member-id-val {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 0.5px;
            color: #FFFFFF;
            line-height: 1.15;
        }

        .ft-verified-check-pill {
            background: #10B981;
            color: #FFFFFF;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.5);
        }

        .ft-btn-invest {
            background: linear-gradient(135deg, #8B5CF6 0%, #6D28D9 100%);
            color: #FFFFFF !important;
            font-size: 13px;
            font-weight: 700;
            padding: 8px 22px;
            border-radius: 22px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            box-shadow: 0 4px 16px rgba(124, 58, 237, 0.45);
            transition: all 0.2s ease;
        }

        .ft-btn-invest:hover {
            background: linear-gradient(135deg, #7C3AED 0%, #5B21B6 100%);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.6);
        }

        .ft-hero-art-img {
            position: absolute;
            right: 0;
            bottom: 0;
            top: 0;
            height: 100%;
            width: 50%;
            max-width: 440px;
            object-fit: contain;
            object-position: right center;
            pointer-events: none;
            z-index: 1;
            filter: drop-shadow(0 8px 24px rgba(0, 0, 0, 0.3));
            animation: floatSubtle 5s ease-in-out infinite;
        }

        /* Profile Card (Right) */
        .ft-profile-card {
            background: var(--ft-card-bg);
            border-radius: var(--ft-radius-lg);
            padding: 22px 24px;
            border: 1px solid var(--ft-border-subtle);
            box-shadow: var(--ft-shadow-card);
            min-height: 205px;
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .ft-profile-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--ft-shadow-hover);
        }

        .ft-btn-view-profile {
            color: #7C3AED !important;
            background: #F5F3FF;
            border: 1px solid #EDE9FE;
            border-radius: 12px;
            padding: 4px 12px;
            font-size: 11.5px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: all 0.2s ease;
        }

        .ft-btn-view-profile:hover {
            background: #EDE9FE;
            color: #6D28D9 !important;
        }

        .ft-avatar-gradient-ring {
            width: 84px;
            height: 84px;
            border-radius: 50%;
            padding: 3px;
            background: linear-gradient(135deg, #7C3AED 0%, #06B6D4 100%);
            box-shadow: 0 4px 16px rgba(124, 58, 237, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .ft-avatar-inner {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            overflow: hidden;
            background: #F8FAFC;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ft-profile-info-pod {
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            height: 100%;
            min-height: 60px;
            cursor: pointer;
            user-select: none;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .ft-profile-info-pod:hover {
            background: #FFFFFF;
            border-color: #818CF8;
            box-shadow: 0 6px 18px rgba(99, 102, 241, 0.12);
            transform: translateY(-2px);
        }

        .ft-profile-info-pod:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(99, 102, 241, 0.08);
        }

        .ft-pod-icon-box {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 16px;
        }

        .ft-active-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #10B981;
            display: inline-block;
            animation: pulseDot 2s infinite;
        }

        /* --------------------------------------------------------------------------
           ROW 2: FULL-WIDTH REFER & EARN REWARDS BANNER — MODERN LUXURY REDESIGN
           -------------------------------------------------------------------------- */
        .ft-referral-banner {
            background: linear-gradient(135deg, #FFFFFF 0%, #FAF8FF 35%, #F5F3FF 70%, #FFFFFF 100%);
            border-radius: var(--ft-radius-lg);
            padding: 18px 24px;
            border: 1px solid #E0E7FF;
            box-shadow: 0 4px 20px rgba(124, 58, 237, 0.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .ft-referral-banner::before {
            content: "";
            position: absolute;
            top: -60px; right: 180px;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(167, 139, 250, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .ft-referral-banner:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(124, 58, 237, 0.12);
            border-color: #C7D2FE;
        }

        .ft-ref-brand-col {
            display: flex;
            align-items: center;
            gap: 16px;
            flex: 1 1 300px;
            min-width: 240px;
        }

        .ft-ref-gift-art {
            height: 68px;
            width: auto;
            max-width: 78px;
            object-fit: contain;
            flex-shrink: 0;
            filter: drop-shadow(0 8px 18px rgba(124, 58, 237, 0.22));
            animation: idle3DFloat 4s ease-in-out infinite alternate;
        }

        .ft-ref-actions-col {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1 1 auto;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .ft-ref-input-shell {
            background: #FFFFFF;
            border: 1.5px solid #E2E8F0;
            border-radius: 12px;
            padding: 7px 12px 7px 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 270px;
            max-width: 380px;
            flex: 1;
            box-shadow: 0 2px 6px rgba(15, 23, 42, 0.04);
            transition: all 0.2s ease;
            height: 44px;
        }

        .ft-ref-input-shell:focus-within {
            border-color: #7C3AED;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.12);
        }

        .ft-ref-input-text {
            border: none;
            outline: none;
            background: transparent;
            font-size: 13px;
            font-weight: 600;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            color: #1E293B;
            width: 100%;
        }

        .ft-ref-copy-icon-btn {
            background: #F1F5F9;
            border: none;
            color: #64748B;
            width: 28px;
            height: 28px;
            cursor: pointer;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }

        .ft-ref-copy-icon-btn:hover {
            background: #EDE9FE;
            color: #7C3AED;
        }

        .ft-btn-copy-purple {
            background: linear-gradient(135deg, #7C3AED 0%, #6366F1 100%);
            color: #FFFFFF;
            border: none;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
            padding: 9px 18px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(124, 58, 237, 0.35);
            white-space: nowrap;
            cursor: pointer;
            height: 44px;
        }

        .ft-btn-copy-purple:hover {
            background: linear-gradient(135deg, #6D28D9 0%, #4F46E5 100%);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(124, 58, 237, 0.45);
        }

        .ft-btn-whatsapp-green {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: #FFFFFF !important;
            border: none;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
            padding: 9px 18px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
            white-space: nowrap;
            height: 44px;
        }

        .ft-btn-whatsapp-green:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(16, 185, 129, 0.45);
        }

        .ft-earn-up-to-capsule {
            background: linear-gradient(135deg, #1e0b4b 0%, #3b0764 50%, #581c87 100%);
            border: 1px solid rgba(216, 180, 254, 0.35);
            border-radius: 16px;
            padding: 8px 18px;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 8px 24px rgba(59, 7, 100, 0.3);
            flex-shrink: 0;
            height: 56px;
        }

        .ft-earn-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 700;
            display: block;
            line-height: 1.1;
        }

        .ft-earn-amount {
            font-size: 22px;
            font-weight: 900;
            color: #FDE047;
            line-height: 1.15;
            text-shadow: 0 2px 10px rgba(253, 224, 71, 0.4);
        }

        .ft-earn-coins-img {
            height: 46px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.35));
            animation: idle3DFloat 3.8s ease-in-out infinite alternate;
        }

        /* --------------------------------------------------------------------------
           ROW 3: FOUR VIBRANT 3D STATISTIC CARDS (PREMIUM ANIMATED 3D PARALLAX)
           Cyan, Purple, Emerald, Amber gradients with dot pattern & floating 3D objects
           -------------------------------------------------------------------------- */
        .ft-stat-card-vibrant {
            border-radius: var(--ft-radius-md);
            padding: 20px 22px;
            position: relative;
            height: 100% !important;
            min-height: 195px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #FFFFFF;
            box-shadow: 0 10px 30px -4px rgba(0, 0, 0, 0.16);
            transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.25s ease;
            overflow: hidden;
            background-size: 260% 260%;
            cursor: pointer;
        }

        .ft-stat-card-vibrant:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 42px -6px rgba(0, 0, 0, 0.28);
        }

        /* Continuous animated background mesh gradient shift */
        @keyframes vibrantMeshShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Continuous floating ambient orbs */
        @keyframes floatOrb1 {
            0% { transform: translate(0px, 0px) scale(1); }
            50% { transform: translate(35px, -20px) scale(1.3); }
            100% { transform: translate(0px, 0px) scale(1); }
        }

        @keyframes floatOrb2 {
            0% { transform: translate(0px, 0px) scale(1.2); }
            50% { transform: translate(-30px, 25px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1.2); }
        }

        /* Continuous high-contrast shimmer wave sweep across cards */
        @keyframes shimmerSweep {
            0% { transform: translateX(-150%) skewX(-25deg); }
            25%, 100% { transform: translateX(250%) skewX(-25deg); }
        }

        /* Continuous subtle 3D hovering animation for illustrations (stationary baseline) */
        @keyframes idle3DFloat {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.04) rotate(1deg); }
        }

        /* Card Shimmer Element (High Contrast) */
        .ft-card-shimmer {
            position: absolute;
            top: 0; left: 0;
            width: 75%;
            height: 100%;
            background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.4) 50%, transparent 100%);
            animation: shimmerSweep 4.5s infinite ease-in-out;
            pointer-events: none;
            z-index: 2;
        }

        /* Rotating Cyber Rings */
        .ft-cyber-ring-wrap {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 165px;
            height: 165px;
            pointer-events: none;
            z-index: 1;
        }

        .ft-cyber-ring {
            position: absolute;
            border-radius: 50%;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
        }

        .ft-cyber-ring-1 {
            width: 155px;
            height: 155px;
            border: 2px dashed rgba(255, 255, 255, 0.4);
            animation: rotateRingClockwise 14s linear infinite;
        }

        .ft-cyber-ring-2 {
            width: 118px;
            height: 118px;
            border: 1.5px solid rgba(255, 255, 255, 0.35);
            border-top-color: #FFFFFF;
            border-bottom-color: rgba(255, 255, 255, 0.7);
            animation: rotateRingCounter 9s linear infinite;
        }

        @keyframes rotateRingClockwise {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        @keyframes rotateRingCounter {
            0% { transform: translate(-50%, -50%) rotate(360deg); }
            100% { transform: translate(-50%, -50%) rotate(0deg); }
        }

        /* Floating Neon Particle Sparks */
        .ft-card-particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 2;
            overflow: hidden;
        }

        .ft-particle {
            position: absolute;
            border-radius: 50%;
            background: #FFFFFF;
            box-shadow: 0 0 10px #FFFFFF, 0 0 16px rgba(255, 255, 255, 0.8);
            animation: floatSparkle 4s ease-in-out infinite;
        }

        .ft-particle.p1 { left: 15%; bottom: 15%; width: 5px; height: 5px; animation-duration: 3.5s; animation-delay: 0s; }
        .ft-particle.p2 { left: 45%; bottom: 20%; width: 7px; height: 7px; animation-duration: 4.2s; animation-delay: 1.1s; }
        .ft-particle.p3 { left: 65%; bottom: 10%; width: 6px; height: 6px; animation-duration: 3.8s; animation-delay: 2.3s; }
        .ft-particle.p4 { left: 85%; bottom: 25%; width: 4px; height: 4px; animation-duration: 4.8s; animation-delay: 0.6s; }

        @keyframes floatSparkle {
            0% { transform: translateY(0) scale(0.6); opacity: 0.2; }
            50% { opacity: 1; transform: translateY(-35px) scale(1.3); }
            100% { transform: translateY(-75px) scale(0.4); opacity: 0; }
        }

        /* Card Specular Shine on Mouse Move */
        .ft-card-shine {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            pointer-events: none;
            z-index: 2;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        /* Ambient Glowing Orbs */
        .ft-card-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }

        .ft-card-orb-top {
            width: 170px;
            height: 170px;
            top: -35px;
            right: 10px;
            filter: blur(28px);
            opacity: 0.85;
            animation: floatOrb1 5s ease-in-out infinite;
        }

        .ft-card-orb-bottom {
            width: 150px;
            height: 150px;
            bottom: -25px;
            left: 15px;
            filter: blur(25px);
            opacity: 0.8;
            animation: floatOrb2 4.5s ease-in-out infinite;
        }

        /* Subtle dot grid pattern overlay */
        .ft-stat-card-vibrant::after {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.25) 1.2px, transparent 1.2px);
            background-size: 15px 15px;
            pointer-events: none;
            opacity: 0.7;
            z-index: 1;
        }

        .ft-stat-content-col {
            flex: 1;
            min-width: 0;
            position: relative;
            z-index: 3;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .ft-stat-sq-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.24);
            backdrop-filter: blur(6px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #FFFFFF;
            margin-bottom: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 3;
        }

        .ft-stat-title-label {
            font-size: 12px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.92);
            display: block;
            position: relative;
            z-index: 3;
        }

        .ft-stat-bold-val {
            font-size: 23px;
            font-weight: 800;
            color: #FFFFFF;
            line-height: 1.15;
            margin: 5px 0 10px;
            letter-spacing: -0.4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            position: relative;
            z-index: 3;
            display: flex;
            align-items: baseline;
            gap: 3px;
        }

        .ft-stat-currency {
            font-size: 18px;
            font-weight: 700;
            opacity: 0.92;
        }

        .ft-stat-art-wrapper {
            position: relative;
            z-index: 3;
            flex-shrink: 0;
            margin-left: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 120px;
            height: 120px;
        }

        .ft-stat-art-graphic {
            max-height: 120px;
            max-width: 120px;
            width: auto;
            height: auto;
            object-fit: contain;
            pointer-events: none;
            filter: drop-shadow(0 12px 24px rgba(0, 0, 0, 0.35));
            animation: idle3DFloat 4.2s ease-in-out infinite alternate;
            transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            transform-origin: center center;
        }

        /* 1. Account Status (Cyan to Electric Blue) */
        .ft-stat-cyan-glow {
            background: linear-gradient(135deg, #0284C7 0%, #00B4D8 35%, #0077B6 70%, #1D4ED8 100%);
            border: 1px solid rgba(186, 230, 253, 0.55);
            animation: vibrantMeshShift 8s ease infinite alternate;
        }
        .ft-stat-cyan-glow .ft-card-orb-top { background: #38BDF8; }
        .ft-stat-cyan-glow .ft-card-orb-bottom { background: #60A5FA; }

        /* 2. Total Referrals (Purple to Violet) */
        .ft-stat-purple-glow {
            background: linear-gradient(135deg, #9333EA 0%, #C084FC 35%, #7C3AED 70%, #4F46E5 100%);
            border: 1px solid rgba(221, 214, 254, 0.55);
            animation: vibrantMeshShift 8s ease infinite alternate;
        }
        .ft-stat-purple-glow .ft-card-orb-top { background: #E879F9; }
        .ft-stat-purple-glow .ft-card-orb-bottom { background: #818CF8; }

        /* 3. Fund Wallet (Emerald to Deep Green) */
        .ft-stat-green-glow {
            background: linear-gradient(135deg, #059669 0%, #34D399 35%, #059669 70%, #047857 100%);
            border: 1px solid rgba(167, 243, 208, 0.55);
            animation: vibrantMeshShift 8s ease infinite alternate;
        }
        .ft-stat-green-glow .ft-card-orb-top { background: #6EE7B7; }
        .ft-stat-green-glow .ft-card-orb-bottom { background: #2DD4BF; }

        /* 4. Income Wallet (Amber to Orange) */
        .ft-stat-orange-glow {
            background: linear-gradient(135deg, #EA580C 0%, #FBBF24 35%, #D97706 70%, #B45309 100%);
            border: 1px solid rgba(253, 230, 138, 0.55);
            animation: vibrantMeshShift 8s ease infinite alternate;
        }
        .ft-stat-orange-glow .ft-card-orb-top { background: #FDE047; }
        .ft-stat-orange-glow .ft-card-orb-bottom { background: #FB923C; }

        .ft-stat-action-capsule {
            font-size: 11px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(6px);
            color: #FFFFFF !important;
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.2s ease;
            position: relative;
            z-index: 3;
        }

        .ft-stat-action-capsule:hover {
            background: rgba(255, 255, 255, 0.38);
            transform: translateY(-1px);
        }

        /* --------------------------------------------------------------------------
           ROW 4: TODAY'S EARNINGS COMMAND CENTER & LIFETIME EARNINGS OVERVIEW
           -------------------------------------------------------------------------- */
        .ft-overview-card {
            background: var(--ft-card-bg);
            border-radius: var(--ft-radius-lg);
            padding: 22px 24px;
            border: 1px solid var(--ft-border-subtle);
            box-shadow: var(--ft-shadow-card);
            height: 100%;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .ft-overview-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--ft-shadow-hover);
        }

        /* Today's 2x2 Pods matching Image 2 */
        .ft-income-pod-v2 {
            background: #FFFFFF;
            border-radius: 14px;
            padding: 12px 14px;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
            height: 100%;
        }

        .ft-income-pod-v2:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.08);
        }

        .ft-pod-icon-box {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        /* Pod 1: Level (Blue) */
        .ft-pod-blue { border: 1.5px solid #BFDBFE; }
        .ft-pod-blue .ft-pod-icon-box { background: #EFF6FF; color: #2563EB; }

        /* Pod 2: Direct (Purple) */
        .ft-pod-purple { border: 1.5px solid #DDD6FE; }
        .ft-pod-purple .ft-pod-icon-box { background: #F5F3FF; color: #7C3AED; }

        /* Pod 3: Global Autopool (Green) */
        .ft-pod-green { border: 1.5px solid #A7F3D0; }
        .ft-pod-green .ft-pod-icon-box { background: #ECFDF5; color: #059669; }

        /* Pod 4: Withdrawal (Amber) */
        .ft-pod-amber { border: 1.5px solid #FDE68A; }
        .ft-pod-amber .ft-pod-icon-box { background: #FFFBEB; color: #D97706; }

        /* --------------------------------------------------------------------------
           LIFETIME & TODAY'S TOTAL EARNINGS OVERVIEW — LUXURY FINTECH REDESIGN
           -------------------------------------------------------------------------- */
        .ft-lifetime-card-shell {
            background: #FFFFFF;
            border-radius: var(--ft-radius-lg);
            padding: 22px 24px;
            border: 1px solid var(--ft-border-subtle);
            box-shadow: var(--ft-shadow-card);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 16px;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .ft-lifetime-card-shell:hover {
            transform: translateY(-2px);
            box-shadow: var(--ft-shadow-hover);
        }

        /* Top Hero Cumulative Spotlight Banner - Right Card (Lifetime Purple) */
        .ft-lifetime-hero-banner {
            background: linear-gradient(135deg, #18093d 0%, #2e0854 45%, #4a0e78 80%, #6d28d9 100%);
            border-radius: 18px;
            padding: 18px 22px;
            color: #FFFFFF;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(192, 132, 252, 0.35);
            box-shadow: 0 10px 28px -4px rgba(46, 8, 84, 0.35);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .ft-lifetime-hero-banner::before {
            content: "";
            position: absolute;
            top: -50px; right: -50px;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(251, 191, 36, 0.35) 0%, transparent 70%);
            filter: blur(30px);
            pointer-events: none;
        }

        /* Top Hero Cumulative Spotlight Banner - Left Card (Today Blue/Indigo) */
        .ft-today-hero-banner {
            background: linear-gradient(135deg, #091a4a 0%, #0d2875 45%, #1d4ed8 80%, #3b82f6 100%);
            border-radius: 18px;
            padding: 18px 22px;
            color: #FFFFFF;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(147, 197, 253, 0.35);
            box-shadow: 0 10px 28px -4px rgba(13, 40, 117, 0.35);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .ft-today-hero-banner::before {
            content: "";
            position: absolute;
            top: -50px; right: -50px;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.35) 0%, transparent 70%);
            filter: blur(30px);
            pointer-events: none;
        }

        .ft-today-growth-art {
            height: 90px;
            width: auto;
            max-width: 130px;
            object-fit: contain;
            filter: drop-shadow(0 8px 20px rgba(0, 0, 0, 0.4));
            animation: idle3DFloat 4s ease-in-out infinite alternate;
            position: relative;
            z-index: 2;
        }

        .ft-lifetime-trophy-art {
            height: 90px;
            width: auto;
            max-width: 105px;
            object-fit: contain;
            filter: drop-shadow(0 8px 20px rgba(0, 0, 0, 0.4));
            animation: idle3DFloat 4s ease-in-out infinite alternate;
            position: relative;
            z-index: 2;
        }

        .ft-lifetime-chart-art {
            height: 80px;
            width: auto;
            max-width: 95px;
            object-fit: contain;
            filter: drop-shadow(0 6px 16px rgba(0, 0, 0, 0.3));
            animation: floatOrb1 6s ease-in-out infinite alternate;
            position: relative;
            z-index: 2;
        }

        /* Stream Pod Tiles - Spacious & Khule Khule Luxury Design */
        .ft-stream-tile {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 18px 20px;
            border: 1px solid #E2E8F0;
            box-shadow: 0 3px 12px rgba(15, 23, 42, 0.04);
            transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
            height: 100%;
            min-height: 92px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .ft-stream-tile:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.09);
        }

        .ft-stream-tile-blue { border-left: 5px solid #2563EB; }
        .ft-stream-tile-purple { border-left: 5px solid #7C3AED; }
        .ft-stream-tile-green { border-left: 5px solid #059669; }
        .ft-stream-tile-amber { border-left: 5px solid #D97706; }

        .ft-stream-icon-box {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            flex-shrink: 0;
            transition: transform 0.2s ease;
        }

        .ft-stream-tile:hover .ft-stream-icon-box {
            transform: scale(1.08);
        }

        .ft-stream-icon-blue { background: #EFF6FF; color: #2563EB; }
        .ft-stream-icon-purple { background: #F5F3FF; color: #7C3AED; }
        .ft-stream-icon-green { background: #ECFDF5; color: #059669; }
        .ft-stream-icon-amber { background: #FFFBEB; color: #D97706; }

        .ft-stream-label {
            font-size: 13px;
            font-weight: 700;
            color: #475569;
            white-space: nowrap;
        }

        .ft-stream-amount {
            font-size: 19px;
            font-weight: 800;
            color: #0F172A;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            white-space: nowrap;
            letter-spacing: -0.3px;
        }

        .ft-stream-progress-track {
            height: 6px;
            background: #F1F5F9;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 12px;
        }

        .ft-stream-progress-bar {
            height: 100%;
            border-radius: 10px;
            transition: width 0.6s ease;
        }

        /* --------------------------------------------------------------------------
           ROW 5: GLOBAL AUTOPOOL MATRIX SLOTS
           -------------------------------------------------------------------------- */
        .ft-matrix-section {
            background: #FFFFFF;
            border-radius: var(--ft-radius-md);
            border: 1px solid var(--ft-border-subtle);
            box-shadow: var(--ft-shadow-card);
            padding: 22px 24px;
            margin-top: 20px;
        }

        .ft-btn-new-slot {
            background: linear-gradient(135deg, #7C3AED 0%, #6366F1 100%);
            color: #FFFFFF !important;
            font-size: 12.5px;
            font-weight: 700;
            padding: 7px 20px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.35);
            transition: all 0.2s ease;
        }

        .ft-btn-new-slot:hover {
            background: linear-gradient(135deg, #6D28D9 0%, #4F46E5 100%);
            transform: translateY(-1px);
        }

        .ft-matrix-slot-item {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-top: 3px solid #F59E0B;
            border-radius: 14px;
            padding: 16px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
            transition: all 0.2s ease;
        }

        .ft-matrix-slot-item:hover {
            transform: translateY(-3px);
            box-shadow: var(--ft-shadow-hover);
        }

        .ft-progress-track {
            height: 6px;
            background: #F1F5F9;
            border-radius: 10px;
            overflow: hidden;
            margin: 8px 0;
        }

        .ft-progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #F59E0B 0%, #10B981 100%);
            border-radius: 10px;
            transition: width 0.6s ease;
        }

        /* Modal Customization */
        .ft-modal-shell {
            border-radius: var(--ft-radius-md);
            overflow: hidden;
            border: 1px solid #E2E8F0;
            box-shadow: 0 20px 45px -8px rgba(15, 23, 42, 0.2);
        }

        .ft-modal-header {
            background: linear-gradient(135deg, #0d1252 0%, #1e3bb5 100%);
            color: #FFFFFF;
            padding: 18px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .ft-modal-row {
            background: #FFFFFF;
            border: 1px solid #F1F5F9;
            border-radius: 10px;
            padding: 11px 15px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.25s ease;
        }

        .ft-modal-row-highlighted {
            animation: highlightPulse 1.4s ease-in-out 2;
            border-color: #6366F1 !important;
            background: #EEF2FF !important;
        }

        @keyframes highlightPulse {
            0% { background: #EEF2FF; border-color: #6366F1; box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25); }
            50% { background: #E0E7FF; border-color: #4F46E5; box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.35); }
            100% { background: #EEF2FF; border-color: #6366F1; box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2); }
        }

        .ft-copy-inline {
            width: 26px;
            height: 26px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            transition: all 0.15s ease;
            cursor: pointer;
            border: none;
            background: #F1F5F9;
            color: #64748B;
        }

        .ft-copy-inline:hover {
            background: #EDE9FE !important;
            color: #7C3AED !important;
        }

        @media (prefers-reduced-motion: reduce) {
            *, ::before, ::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>

    <!-- MAIN DASHBOARD CONTENT AREA -->
    <div class="main-content app-content ft-dashboard-canvas">
        <div class="ft-ambient-waves"></div>

        <div class="container-fluid px-1 px-md-2" style="position: relative; z-index: 1;">

            <!-- FLASH ALERTS -->
            @if (session()->has('successMsg'))
                <div class="alert alert-dismissible fade show mb-3" style="background: #ECFDF5; border: 1px solid #A7F3D0; color: #065F46; border-radius: 12px;">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-circle-check fs-20 me-2 text-success"></i>
                        <div><strong>Success!</strong> {{ session('successMsg') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('failedMsg'))
                <div class="alert alert-dismissible fade show mb-3" style="background: #FEF2F2; border: 1px solid #FECACA; color: #991B1B; border-radius: 12px;">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-alert-triangle fs-20 me-2 text-danger"></i>
                        <div><strong>Error!</strong> {{ session('failedMsg') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- --------------------------------------------------------------------------
                 ROW 1: HERO MEMBERSHIP CARD (LEFT) + MEMBER PROFILE CARD (RIGHT)
                 -------------------------------------------------------------------------- -->
            <div class="row g-3 mb-3 align-items-stretch">
                <!-- Left: Royal Membership Card with 3D Crown on Pedestal & Growth Bars -->
                <div class="col-xxl-8 col-xl-7 col-lg-12 col-12 d-flex">
                    <div class="ft-membership-card w-100 h-100">
                        <div style="position: relative; z-index: 2; max-width: 52%;">
                            <div class="ft-badge-premium mb-2">
                                <i class="ti ti-crown fs-13"></i> PREMIUM MEMBER
                            </div>

                            <div class="d-flex align-items-center text-white-50 fs-12 mb-1">
                                <span>Member Account</span>
                            </div>

                            <div class="ft-member-id-row">
                                <span class="ft-member-id-val" id="memberIdVal">{{ $data['memberid'] }}</span>
                                <span class="ft-verified-check-pill" title="Verified Member">
                                    <i class="ti ti-check"></i>
                                </span>
                                <i class="ti ti-copy cursor-pointer text-white-50 fs-16 hover-white" id="inlineCopyId" title="Copy Member ID"></i>
                            </div>

                            <div class="fs-12 text-white-50 mb-3" style="color: rgba(255, 255, 255, 0.88) !important;">
                                Ready for Stable Earning & Matrix Rewards.
                            </div>

                            <a href="{{ url('/member/invest-slot') }}" class="ft-btn-invest">
                                Invest Now <i class="ti ti-arrow-right"></i>
                            </a>
                        </div>

                        <!-- 3D Crown & Pedestal Artwork with ascending chart -->
                        <img src="{{ asset('user_assets/images/dashboard_3d/new_hero_artwork_hd.png') }}" alt="3D Crown & Pedestal" class="ft-hero-art-img">
                    </div>
                </div>

                <!-- Right: Member Profile Card (Exact Match Reference 1) -->
                <div class="col-xxl-4 col-xl-5 col-lg-12 col-12 d-flex">
                    <div class="ft-profile-card w-100 h-100">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="avatar avatar-xs avatar-rounded" style="background: #F5F3FF; color: #7C3AED;">
                                    <i class="ti ti-user-circle fs-16"></i>
                                </span>
                                <h6 class="fw-bold text-dark mb-0 fs-15">Member Profile</h6>
                            </div>
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#profileDetailModal" class="ft-btn-view-profile">
                                View Profile <i class="ti ti-arrow-right"></i>
                            </a>
                        </div>

                        <div class="d-flex align-items-center gap-3 flex-grow-1 mt-1">
                            <div class="d-flex flex-column align-items-center justify-content-center flex-shrink-0" role="button" tabindex="0" data-bs-toggle="modal" data-bs-target="#profileDetailModal" title="Click to view profile" style="cursor: pointer;">
                                <div class="ft-avatar-gradient-ring">
                                    <div class="ft-avatar-inner">
                                        @if(!empty($data['profile_image']))
                                            <img src="{{ asset('uploads') }}/{{ $data['profile_image'] }}" class="w-100 h-100" alt="profile" style="object-fit: cover;">
                                        @else
                                            <div style="font-size: 26px; font-weight: 800; color: #7C3AED;">
                                                {{ strtoupper(substr($data['name'] ?? 'M', 0, 1)) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <span class="badge rounded-pill px-2.5 py-1 mt-2 fs-10 fw-semibold text-uppercase d-inline-flex align-items-center gap-1"
                                    style="background: rgba(16, 185, 129, 0.12); color: #047857; border: 1px solid rgba(16, 185, 129, 0.25);">
                                    <i class="ti ti-circle-check-filled fs-11"></i> Active
                                </span>
                            </div>

                            <div class="flex-grow-1 h-100 d-flex flex-column justify-content-between" style="min-width: 0;">
                                <div class="row g-2 h-100 align-items-stretch">
                                    <div class="col-6 d-flex">
                                        <div class="ft-profile-info-pod w-100" role="button" tabindex="0" data-bs-toggle="modal" data-bs-target="#profileDetailModal" data-focus-row="fullname" title="Click to view full details in popup">
                                            <div class="ft-pod-icon-box" style="background: rgba(99, 102, 241, 0.12); color: #6366f1;">
                                                <i class="ti ti-user"></i>
                                            </div>
                                            <div class="overflow-hidden" style="min-width: 0;">
                                                <span class="d-block text-muted text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.3px; line-height: 1.1;">Full Name</span>
                                                <strong class="d-block text-dark text-truncate mt-0.5" style="font-size: 13px;">{{ $data['name'] }}</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 d-flex">
                                        <div class="ft-profile-info-pod w-100" role="button" tabindex="0" data-bs-toggle="modal" data-bs-target="#profileDetailModal" data-focus-row="mobile" title="Click to view full details in popup">
                                            <div class="ft-pod-icon-box" style="background: rgba(16, 185, 129, 0.12); color: #10b981;">
                                                <i class="ti ti-phone"></i>
                                            </div>
                                            <div class="overflow-hidden" style="min-width: 0;">
                                                <span class="d-block text-muted text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.3px; line-height: 1.1;">Mobile Number</span>
                                                <strong class="d-block text-dark text-truncate mt-0.5" style="font-size: 13px;">{{ $data['mobile'] ?? 'N/A' }}</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 d-flex">
                                        <div class="ft-profile-info-pod w-100" role="button" tabindex="0" data-bs-toggle="modal" data-bs-target="#profileDetailModal" data-focus-row="email" title="Click to view full details in popup">
                                            <div class="ft-pod-icon-box" style="background: rgba(14, 165, 233, 0.12); color: #0ea5e9;">
                                                <i class="ti ti-mail"></i>
                                            </div>
                                            <div class="overflow-hidden" style="min-width: 0;">
                                                <span class="d-block text-muted text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.3px; line-height: 1.1;">Email Address</span>
                                                <strong class="d-block text-dark text-truncate mt-0.5" style="font-size: 13px;" title="{{ $data['email'] }}">{{ $data['email'] }}</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 d-flex">
                                        <div class="ft-profile-info-pod w-100" role="button" tabindex="0" data-bs-toggle="modal" data-bs-target="#profileDetailModal" data-focus-row="sponsor" title="Click to view full details in popup">
                                            <div class="ft-pod-icon-box" style="background: rgba(139, 92, 246, 0.12); color: #8b5cf6;">
                                                <i class="ti ti-users"></i>
                                            </div>
                                            <div class="overflow-hidden" style="min-width: 0;">
                                                <span class="d-block text-muted text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.3px; line-height: 1.1;">Sponsor ID</span>
                                                <strong class="d-block text-dark text-truncate mt-0.5" style="font-size: 13px;">{{ $data['sponsor'] ?? 'System Direct' }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- --------------------------------------------------------------------------
                 ROW 2: FULL-WIDTH REFER & EARN REWARDS BANNER (MODERN LUXURY REDESIGN)
                 -------------------------------------------------------------------------- -->
            <div class="row g-3 mb-3">
                <div class="col-12">
                    <div class="ft-referral-banner">
                        <!-- Left: 3D Art & Info -->
                        <div class="ft-ref-brand-col">
                            <img src="{{ asset('user_assets/images/dashboard_3d/new_purple_gift_ring_clean.png') }}" alt="3D Gift Box" class="ft-ref-gift-art">
                            <div>
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <h6 class="fw-bold text-dark mb-0 fs-16">Refer & Earn Rewards</h6>
                                    <span class="badge rounded-pill fs-10 px-2 py-0.5 fw-semibold" style="background: rgba(124, 58, 237, 0.1); color: #7C3AED; border: 1px solid rgba(124, 58, 237, 0.25);">
                                        <i class="ti ti-sparkles me-0.5"></i> Bonus Program
                                    </span>
                                </div>
                                <span class="text-muted fs-12">Share your exclusive invite link with friends & earn unlimited rewards!</span>
                            </div>
                        </div>

                        <!-- Center: Referral Link Input & Action Buttons -->
                        <div class="ft-ref-actions-col">
                            <!-- Link input box with inline copy icon -->
                            <div class="ft-ref-input-shell">
                                <i class="ti ti-link text-primary fs-14"></i>
                                <input type="text" readonly value="{{ config('detailsApp.url') }}?ref={{ $data['memberid'] }}" id="refInputDisplay" class="ft-ref-input-text">
                                <button type="button" class="ft-ref-copy-icon-btn" id="btnCopyIcon" title="Copy Link">
                                    <i class="ti ti-copy fs-14"></i>
                                </button>
                            </div>

                            <button type="button" class="ft-btn-copy-purple" id="btnCopyRef">
                                <i class="ti ti-copy fs-14"></i> <span id="btnCopyLabel">Copy Link</span>
                            </button>

                            <a href="https://api.whatsapp.com/send?text=Join%20our%20stable%20earning%20platform%20now:%20{{ urlencode(config('detailsApp.url') . '?ref=' . $data['memberid']) }}" target="_blank" class="ft-btn-whatsapp-green" title="Share on WhatsApp">
                                <i class="ti ti-brand-whatsapp fs-15"></i> Share on WhatsApp
                            </a>
                        </div>

                        <!-- Right: Highlight Reward Capsule -->
                        <div class="ft-earn-up-to-capsule">
                            <div>
                                <span class="ft-earn-label">EARN UP TO</span>
                                <div class="ft-earn-amount">₹1000+</div>
                            </div>
                            <img src="{{ asset('user_assets/images/dashboard_3d/coins_hd.png') }}" alt="Gold Coins" class="ft-earn-coins-img">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hidden Container for Referral URL Copy -->
            <input type="hidden" id="refLinkText" value="{{ config('detailsApp.url') }}?ref={{ $data['memberid'] }}">

            <!-- --------------------------------------------------------------------------
                 ROW 3: FOUR VIBRANT 3D STATISTIC CARDS (PREMIUM 2x2 GRID LAYOUT)
                 Cyan, Purple, Emerald, Amber gradients with rotating cyber rings & floating particles
                 -------------------------------------------------------------------------- -->
            <div class="row g-3 mb-3 align-items-stretch">
                <!-- Card 1: Account Status (Cyan to Electric Blue) -->
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 d-flex">
                    <div class="ft-stat-card-vibrant ft-stat-cyan-glow ft-stat-interactive w-100">
                        <div class="ft-card-orb ft-card-orb-top"></div>
                        <div class="ft-card-orb ft-card-orb-bottom"></div>
                        <div class="ft-cyber-ring-wrap">
                            <div class="ft-cyber-ring ft-cyber-ring-1"></div>
                            <div class="ft-cyber-ring ft-cyber-ring-2"></div>
                        </div>
                        <div class="ft-card-particles">
                            <span class="ft-particle p1"></span>
                            <span class="ft-particle p2"></span>
                            <span class="ft-particle p3"></span>
                            <span class="ft-particle p4"></span>
                        </div>
                        <div class="ft-card-shimmer"></div>
                        <div class="ft-card-shine"></div>

                        <div class="ft-stat-content-col">
                            <div>
                                <div class="ft-stat-sq-icon">
                                    <i class="ti ti-shield-check"></i>
                                </div>
                                <span class="ft-stat-title-label">Account Status</span>
                                <div class="ft-stat-bold-val">{{ $data['status'] }}</div>
                            </div>
                            <div>
                                <span class="ft-stat-action-capsule" style="background: #10B981; border: none;">
                                    <i class="ti ti-circle-check-filled fs-12"></i> Active Member
                                </span>
                            </div>
                        </div>
                        <div class="ft-stat-art-wrapper">
                            <img src="{{ asset('user_assets/images/dashboard_3d/stat_shield_clean.png') }}" alt="3D Cyber Shield" class="ft-stat-art-graphic">
                        </div>
                    </div>
                </div>

                <!-- Card 2: Total Referrals (Purple to Violet) -->
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 d-flex">
                    <div class="ft-stat-card-vibrant ft-stat-purple-glow ft-stat-interactive w-100">
                        <div class="ft-card-orb ft-card-orb-top"></div>
                        <div class="ft-card-orb ft-card-orb-bottom"></div>
                        <div class="ft-cyber-ring-wrap">
                            <div class="ft-cyber-ring ft-cyber-ring-1"></div>
                            <div class="ft-cyber-ring ft-cyber-ring-2"></div>
                        </div>
                        <div class="ft-card-particles">
                            <span class="ft-particle p1"></span>
                            <span class="ft-particle p2"></span>
                            <span class="ft-particle p3"></span>
                            <span class="ft-particle p4"></span>
                        </div>
                        <div class="ft-card-shimmer"></div>
                        <div class="ft-card-shine"></div>

                        <div class="ft-stat-content-col">
                            <div>
                                <div class="ft-stat-sq-icon">
                                    <i class="ti ti-users"></i>
                                </div>
                                <span class="ft-stat-title-label">Total Referrals</span>
                                <div class="ft-stat-bold-val">
                                    <span class="exact-counter" data-target="{{ (int)$data['downline'] }}">{{ $data['downline'] }}</span>
                                </div>
                            </div>
                            <div>
                                <a href="{{ url('/member/levels/direct-members') }}" class="ft-stat-action-capsule">
                                    View Details <i class="ti ti-arrow-right fs-10"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ft-stat-art-wrapper">
                            <img src="{{ asset('user_assets/images/dashboard_3d/stat_team_clean.png') }}" alt="3D Referral Community" class="ft-stat-art-graphic">
                        </div>
                    </div>
                </div>

                <!-- Card 3: Fund Wallet (Emerald to Deep Green) -->
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 d-flex">
                    <div class="ft-stat-card-vibrant ft-stat-green-glow ft-stat-interactive w-100">
                        <div class="ft-card-orb ft-card-orb-top"></div>
                        <div class="ft-card-orb ft-card-orb-bottom"></div>
                        <div class="ft-cyber-ring-wrap">
                            <div class="ft-cyber-ring ft-cyber-ring-1"></div>
                            <div class="ft-cyber-ring ft-cyber-ring-2"></div>
                        </div>
                        <div class="ft-card-particles">
                            <span class="ft-particle p1"></span>
                            <span class="ft-particle p2"></span>
                            <span class="ft-particle p3"></span>
                            <span class="ft-particle p4"></span>
                        </div>
                        <div class="ft-card-shimmer"></div>
                        <div class="ft-card-shine"></div>

                        <div class="ft-stat-content-col">
                            <div>
                                <div class="ft-stat-sq-icon">
                                    <i class="ti ti-wallet"></i>
                                </div>
                                <span class="ft-stat-title-label">Fund Wallet</span>
                                <div class="ft-stat-bold-val">
                                    <span class="ft-stat-currency">$</span><span class="exact-counter" data-target="{{ (float)$data['p2p_wallet'] }}" data-decimal="2">{{ number_format($data['p2p_wallet'], 2) }}</span>
                                </div>
                            </div>
                            <div>
                                <a href="{{ url('/member/p2pWallet/activation-wallet') }}" class="ft-stat-action-capsule">
                                    Add Money <i class="ti ti-arrow-right fs-10"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ft-stat-art-wrapper">
                            <img src="{{ asset('user_assets/images/dashboard_3d/stat_wallet_clean.png') }}" alt="3D Overflowing Wallet" class="ft-stat-art-graphic">
                        </div>
                    </div>
                </div>

                <!-- Card 4: Income Wallet (Amber to Orange) -->
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 d-flex">
                    <div class="ft-stat-card-vibrant ft-stat-orange-glow ft-stat-interactive w-100">
                        <div class="ft-card-orb ft-card-orb-top"></div>
                        <div class="ft-card-orb ft-card-orb-bottom"></div>
                        <div class="ft-cyber-ring-wrap">
                            <div class="ft-cyber-ring ft-cyber-ring-1"></div>
                            <div class="ft-cyber-ring ft-cyber-ring-2"></div>
                        </div>
                        <div class="ft-card-particles">
                            <span class="ft-particle p1"></span>
                            <span class="ft-particle p2"></span>
                            <span class="ft-particle p3"></span>
                            <span class="ft-particle p4"></span>
                        </div>
                        <div class="ft-card-shimmer"></div>
                        <div class="ft-card-shine"></div>

                        <div class="ft-stat-content-col">
                            <div>
                                <div class="ft-stat-sq-icon">
                                    <i class="ti ti-cash"></i>
                                </div>
                                <span class="ft-stat-title-label">Income Wallet</span>
                                <div class="ft-stat-bold-val">
                                    <span class="ft-stat-currency">$</span><span class="exact-counter" data-target="{{ (float)$data['wallet'] }}" data-decimal="2">{{ number_format($data['wallet'], 2) }}</span>
                                </div>
                            </div>
                            <div>
                                <a href="{{ url('/member/wallet/main-wallet') }}" class="ft-stat-action-capsule">
                                    Withdraw <i class="ti ti-arrow-right fs-10"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ft-stat-art-wrapper">
                            <img src="{{ asset('user_assets/images/dashboard_3d/stat_money_bag_clean.png') }}" alt="3D Golden Money Bag" class="ft-stat-art-graphic">
                        </div>
                    </div>
                </div>
            </div>

            <!-- --------------------------------------------------------------------------
                 ROW 4: TODAY'S EARNINGS COMMAND CENTER (LEFT) & LIFETIME OVERVIEW (RIGHT)
                 (BALANCED LUXURY FINTECH LAYOUT WITH MATCHING HERO BANNERS & SPATIOUS TILES)
                 -------------------------------------------------------------------------- -->
            <div class="row g-3 mb-3 align-items-stretch">
                <!-- Left: Today's Earnings Command Center (Matching Lifetime Overview Layout) -->
                <div class="col-xxl-6 col-xl-6 col-lg-12 col-12 d-flex">
                    <div class="ft-lifetime-card-shell w-100">
                        <div class="d-flex align-items-center justify-content-between pb-2" style="border-bottom: 1px solid #F1F5F9;">
                            <div class="d-flex align-items-center gap-2">
                                <span class="avatar avatar-xs avatar-rounded" style="background: #EFF6FF; color: #2563EB;">
                                    <i class="ti ti-calendar-stats fs-15"></i>
                                </span>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0 fs-15">Today's Earnings Command Center</h6>
                                    <span class="text-muted" style="font-size: 11px;">Track your today's performance</span>
                                </div>
                            </div>
                            <a href="{{ url('/member/income/direct-income') }}" class="text-primary fs-12 fw-semibold text-decoration-none">
                                View Report <i class="ti ti-arrow-right ms-1"></i>
                            </a>
                        </div>

                        @php
                            $tLvl = (float)todayLevelIncome($data['memberid']);
                            $tDir = (float)todayDirectIncome($data['memberid']);
                            $tPool = (float)todayGlobalAutopoolIncome($data['memberid']);
                            $tWith = (float)todayWithdrawalIncome($data['memberid']);
                            $todayTotalEarnings = $tLvl + $tDir + $tPool + $tWith;
                            $tMax = max(1, $todayTotalEarnings);
                            $tLvlPct = min(100, max(8, round(($tLvl / $tMax) * 100)));
                            $tDirPct = min(100, max(8, round(($tDir / $tMax) * 100)));
                            $tPoolPct = min(100, max(8, round(($tPool / $tMax) * 100)));
                            $tWithPct = min(100, max(8, round(($tWith / $tMax) * 100)));
                        @endphp

                        <!-- Top Spotlight Banner (Matching Right Card) -->
                        <div class="ft-today-hero-banner">
                            <div style="position: relative; z-index: 2; max-width: 62%;">
                                <span class="badge" style="background: rgba(56, 189, 248, 0.22); color: #7DD3FC; font-size: 11px; font-weight: 700; border-radius: 20px; padding: 4px 12px; border: 1px solid rgba(56, 189, 248, 0.45);">
                                    <i class="ti ti-calendar-event me-1"></i> TODAY'S TOTAL EARNINGS
                                </span>
                                <div class="fw-900 mt-2 mb-1" style="font-size: 32px; letter-spacing: -0.5px; color: #FFFFFF; line-height: 1.15;">
                                    $ <span class="exact-counter" data-target="{{ (float)$todayTotalEarnings }}" data-decimal="2">{{ number_format($todayTotalEarnings, 2) }}</span>
                                </div>
                                <div class="fs-12 text-white-50 d-flex align-items-center gap-1" style="color: rgba(255, 255, 255, 0.9) !important;">
                                    <i class="ti ti-circle-check-filled text-success"></i> Real-time multi-stream daily earnings
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center" style="position: relative; z-index: 2;">
                                <img src="{{ asset('user_assets/images/dashboard_3d/today_growth_perfect.png') }}" alt="Today Growth" class="ft-today-growth-art">
                            </div>
                        </div>

                        <!-- Bottom 4 Modern Stream Pods (2x2 Grid) - Spacious & Khule Khule -->
                        <div class="row g-3">
                            <!-- Stream 1: Today's Level Income -->
                            <div class="col-sm-6 col-12">
                                <div class="ft-stream-tile ft-stream-tile-blue">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="ft-stream-icon-box ft-stream-icon-blue">
                                                <i class="ti ti-chart-bar"></i>
                                            </div>
                                            <span class="ft-stream-label">Today's Level</span>
                                        </div>
                                        <strong class="ft-stream-amount">$ {{ number_format($tLvl, 2) }}</strong>
                                    </div>
                                    <div class="ft-stream-progress-track">
                                        <div class="ft-stream-progress-bar" style="width: {{ $tLvlPct }}%; background: #2563EB;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stream 2: Today's Direct Income -->
                            <div class="col-sm-6 col-12">
                                <div class="ft-stream-tile ft-stream-tile-purple">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="ft-stream-icon-box ft-stream-icon-purple">
                                                <i class="ti ti-users"></i>
                                            </div>
                                            <span class="ft-stream-label">Today's Direct</span>
                                        </div>
                                        <strong class="ft-stream-amount">$ {{ number_format($tDir, 2) }}</strong>
                                    </div>
                                    <div class="ft-stream-progress-track">
                                        <div class="ft-stream-progress-bar" style="width: {{ $tDirPct }}%; background: #7C3AED;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stream 3: Today's Global Autopool -->
                            <div class="col-sm-6 col-12">
                                <div class="ft-stream-tile ft-stream-tile-green">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="ft-stream-icon-box ft-stream-icon-green">
                                                <i class="ti ti-world"></i>
                                            </div>
                                            <span class="ft-stream-label">Today's Autopool</span>
                                        </div>
                                        <strong class="ft-stream-amount">$ {{ number_format($tPool, 2) }}</strong>
                                    </div>
                                    <div class="ft-stream-progress-track">
                                        <div class="ft-stream-progress-bar" style="width: {{ $tPoolPct }}%; background: #059669;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stream 4: Today's Withdrawal Income -->
                            <div class="col-sm-6 col-12">
                                <div class="ft-stream-tile ft-stream-tile-amber">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="ft-stream-icon-box ft-stream-icon-amber">
                                                <i class="ti ti-wallet"></i>
                                            </div>
                                            <span class="ft-stream-label">Today's Withdrawn</span>
                                        </div>
                                        <strong class="ft-stream-amount">$ {{ number_format($tWith, 2) }}</strong>
                                    </div>
                                    <div class="ft-stream-progress-track">
                                        <div class="ft-stream-progress-bar" style="width: {{ $tWithPct }}%; background: #D97706;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Lifetime Total Earnings Overview (Luxury Modern Fintech Redesign) -->
                <div class="col-xxl-6 col-xl-6 col-lg-12 col-12 d-flex">
                    <div class="ft-lifetime-card-shell w-100">
                        <div class="d-flex align-items-center justify-content-between pb-2" style="border-bottom: 1px solid #F1F5F9;">
                            <div class="d-flex align-items-center gap-2">
                                <span class="avatar avatar-xs avatar-rounded" style="background: #EDE9FE; color: #7C3AED;">
                                    <i class="ti ti-chart-dots-3 fs-15"></i>
                                </span>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0 fs-15">Lifetime Total Earnings Overview</h6>
                                    <span class="text-muted" style="font-size: 11px;">Consolidated multi-stream performance & lifetime yields</span>
                                </div>
                            </div>
                            <a href="{{ url('/member/wallet/main-wallet') }}" class="text-primary fs-12 fw-semibold text-decoration-none">
                                View All <i class="ti ti-arrow-right ms-1"></i>
                            </a>
                        </div>

                        <!-- Top Spotlight Banner -->
                        <div class="ft-lifetime-hero-banner">
                            <div style="position: relative; z-index: 2; max-width: 62%;">
                                <span class="badge" style="background: rgba(251, 191, 36, 0.22); color: #FDE047; font-size: 11px; font-weight: 700; border-radius: 20px; padding: 4px 12px; border: 1px solid rgba(251, 191, 36, 0.45);">
                                    <i class="ti ti-sparkles me-1"></i> VERIFIED TOTAL EARNINGS
                                </span>
                                <div class="fw-900 mt-2 mb-1" style="font-size: 32px; letter-spacing: -0.5px; color: #FFFFFF; line-height: 1.15;">
                                    $ <span class="exact-counter" data-target="{{ (float)totalIncome($data['memberid']) }}" data-decimal="2">{{ number_format(totalIncome($data['memberid']), 2) }}</span>
                                </div>
                                <div class="fs-12 text-white-50 d-flex align-items-center gap-1" style="color: rgba(255, 255, 255, 0.9) !important;">
                                    <i class="ti ti-circle-check-filled text-success"></i> 100% Verified Community & Matrix Distributions
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2" style="position: relative; z-index: 2;">
                                <img src="{{ asset('user_assets/images/dashboard_3d/lifetime_chart_clean.png') }}" alt="Revenue Growth Chart" class="ft-lifetime-chart-art d-none d-sm-block">
                                <img src="{{ asset('user_assets/images/dashboard_3d/lifetime_trophy_clean.png') }}" alt="Golden VIP Trophy" class="ft-lifetime-trophy-art">
                            </div>
                        </div>

                        @php
                            $lvlVal = (float)totalLevelIncome($data['memberid']);
                            $dirVal = (float)totalDirectIncome($data['memberid']);
                            $poolVal = (float)totalGlobalAutopoolIncome($data['memberid']);
                            $withVal = (float)totalWithdrawalIncome($data['memberid']);
                            $totInc = max(1, (float)totalIncome($data['memberid']));
                            $lvlPct = min(100, max(8, round(($lvlVal / $totInc) * 100)));
                            $dirPct = min(100, max(8, round(($dirVal / $totInc) * 100)));
                            $poolPct = min(100, max(8, round(($poolVal / $totInc) * 100)));
                            $withPct = min(100, max(8, round(($withVal / $totInc) * 100)));
                        @endphp

                        <!-- Bottom 4 Modern Stream Pods (2x2 Grid) - Spacious & Khule Khule -->
                        <div class="row g-3">
                            <!-- Stream 1: Level Income -->
                            <div class="col-sm-6 col-12">
                                <div class="ft-stream-tile ft-stream-tile-blue">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="ft-stream-icon-box ft-stream-icon-blue">
                                                <i class="ti ti-chart-bar"></i>
                                            </div>
                                            <span class="ft-stream-label">Level Income</span>
                                        </div>
                                        <strong class="ft-stream-amount">$ {{ number_format($lvlVal, 2) }}</strong>
                                    </div>
                                    <div class="ft-stream-progress-track">
                                        <div class="ft-stream-progress-bar" style="width: {{ $lvlPct }}%; background: #2563EB;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stream 2: Direct Income -->
                            <div class="col-sm-6 col-12">
                                <div class="ft-stream-tile ft-stream-tile-purple">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="ft-stream-icon-box ft-stream-icon-purple">
                                                <i class="ti ti-users"></i>
                                            </div>
                                            <span class="ft-stream-label">Direct Income</span>
                                        </div>
                                        <strong class="ft-stream-amount">$ {{ number_format($dirVal, 2) }}</strong>
                                    </div>
                                    <div class="ft-stream-progress-track">
                                        <div class="ft-stream-progress-bar" style="width: {{ $dirPct }}%; background: #7C3AED;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stream 3: Global Autopool -->
                            <div class="col-sm-6 col-12">
                                <div class="ft-stream-tile ft-stream-tile-green">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="ft-stream-icon-box ft-stream-icon-green">
                                                <i class="ti ti-world"></i>
                                            </div>
                                            <span class="ft-stream-label">Global Autopool</span>
                                        </div>
                                        <strong class="ft-stream-amount">$ {{ number_format($poolVal, 2) }}</strong>
                                    </div>
                                    <div class="ft-stream-progress-track">
                                        <div class="ft-stream-progress-bar" style="width: {{ $poolPct }}%; background: #059669;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stream 4: Withdrawal Income -->
                            <div class="col-sm-6 col-12">
                                <div class="ft-stream-tile ft-stream-tile-amber">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="ft-stream-icon-box ft-stream-icon-amber">
                                                <i class="ti ti-wallet"></i>
                                            </div>
                                            <span class="ft-stream-label">Total Withdrawn</span>
                                        </div>
                                        <strong class="ft-stream-amount">$ {{ number_format($withVal, 2) }}</strong>
                                    </div>
                                    <div class="ft-stream-progress-track">
                                        <div class="ft-stream-progress-bar" style="width: {{ $withPct }}%; background: #D97706;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- --------------------------------------------------------------------------
                 ROW 5: GLOBAL AUTOPOOL MATRIX SLOTS (MATCHING REFERENCE 1)
                 -------------------------------------------------------------------------- -->
            <div class="ft-matrix-section">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ asset('user_assets/images/dashboard_3d/matrix_cube_icon.png') }}" alt="Matrix Cube" style="width: 28px; height: 28px; object-fit: contain;">
                        <div>
                            <h6 class="fw-bold text-dark mb-0 fs-15">Global Autopool Matrix Slots</h6>
                            <span class="text-muted fs-11">Activate your matrix slots for unlimited earning potential</span>
                        </div>
                    </div>
                    <a href="{{ url('/member/invest-slot') }}" class="ft-btn-new-slot">
                        <i class="ti ti-plus"></i> New Slot
                    </a>
                </div>

                <div class="row g-3">
                    @forelse ($matrix as $value)
                        @php
                            $poolCount = getPoolCount($value['id']);
                            $progressPct = min(100, round(($poolCount / 32) * 100));
                        @endphp
                        <div class="col-xxl-4 col-xl-4 col-md-6 col-12">
                            <div class="ft-matrix-slot-item">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge" style="background: #EFF6FF; color: #2563EB; font-size: 11.5px; font-weight: 700; border-radius: 6px; padding: 3px 9px;">
                                        Slot #{{ $value['id'] }}
                                    </span>
                                    <span class="badge" style="background: {{ $value['status'] == 'Open' ? '#ECFDF5' : '#F1F5F9' }}; color: {{ $value['status'] == 'Open' ? '#047857' : '#64748B' }}; border: 1px solid {{ $value['status'] == 'Open' ? '#A7F3D0' : '#E2E8F0' }}; font-size: 11px; padding: 2px 8px; border-radius: 20px;">
                                        ● {{ $value['status'] }}
                                    </span>
                                </div>

                                <div class="my-2">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <span class="text-muted fs-11">Pool Progress</span>
                                        <span class="fw-bold fs-11 text-dark">{{ $poolCount }} / 32 Members ({{ $progressPct }}%)</span>
                                    </div>
                                    <div class="ft-progress-track">
                                        <div class="ft-progress-bar-fill" style="width: {{ $progressPct }}%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between text-muted fs-11 mt-1">
                                    <span><i class="ti ti-calendar me-1"></i> {{ date('d-m-Y', strtotime($value['created_at'])) }}</span>
                                    <span><i class="ti ti-clock me-1"></i> {{ date('H:i:s', strtotime($value['created_at'])) }}</span>
                                </div>

                                <div class="mt-3 pt-2" style="border-top: 1px solid #F1F5F9;">
                                    @if ($poolCount >= 32 && $value['status'] == 'Open')
                                        <a href="{{ url('/member/profit-withdrawal') }}/{{ $value['id'] }}" class="btn btn-sm btn-success w-100 fw-bold" style="border-radius: 8px;">
                                            <i class="ti ti-sparkles me-1"></i> Claim & Sell Profit ($100)
                                        </a>
                                    @elseif ($poolCount >= 32 && $value['status'] == 'Closed')
                                        <button class="btn btn-sm btn-light border w-100 text-muted fw-bold" style="border-radius: 8px;" disabled>
                                            <i class="ti ti-lock me-1"></i> Slot Completed
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-light border w-100 text-muted fw-semibold" style="border-radius: 8px;" disabled>
                                            <i class="ti ti-hourglass-low me-1 text-warning"></i> In Progress ({{ $poolCount }}/32 Nodes)
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center py-5 px-3 rounded-4 bg-white border" style="border-style: dashed !important;">
                                <img src="{{ asset('user_assets/images/dashboard_3d/matrix_cube_icon.png') }}" alt="Matrix Cubes" style="width: 44px; height: 44px; object-fit: contain;" class="mb-3">
                                <h6 class="fw-bold text-dark mb-1 fs-15">No Active Matrix Slots Yet</h6>
                                <p class="text-muted fs-12 mb-3" style="max-width: 420px; margin: 0 auto;">
                                    Activate your first Global Autopool slot to participate in 32-member cycle profit sharing.
                                </p>
                                <a href="{{ url('/member/invest-slot') }}" class="ft-btn-new-slot px-4">
                                    <i class="ti ti-rocket me-1"></i> Activate Matrix Slot Now
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <!-- MEMBER PROFILE DETAIL MODAL -->
    <div class="modal fade" id="profileDetailModal" tabindex="-1" aria-labelledby="profileDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ft-modal-shell">
                <div class="modal-header ft-modal-header">
                    <div class="d-flex align-items-center gap-2">
                        <span class="avatar avatar-xs avatar-rounded" style="background: rgba(255, 255, 255, 0.18); color: #FDE047;">
                            <i class="ti ti-user-circle fs-16"></i>
                        </span>
                        <div>
                            <h6 class="modal-title fw-bold fs-15 mb-0 text-white" id="profileDetailModalLabel">Member Account Details</h6>
                            <span class="text-white-50" style="font-size: 11px;">Complete verified account profile</span>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" style="background: #F8FAFC;">
                    <div class="d-flex align-items-center p-3 mb-3 bg-white rounded-3 border">
                        <div class="me-3">
                            @if(!empty($data['profile_image']))
                                <img src="{{ asset('uploads') }}/{{ $data['profile_image'] }}" class="rounded-circle" width="50" height="50" alt="profile" style="object-fit: cover; border: 2px solid #7C3AED;">
                            @else
                                <div class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #7C3AED 0%, #2563EB 100%); color: #FFFFFF; font-size: 18px; font-weight: 700;">
                                    {{ strtoupper(substr($data['name'] ?? 'M', 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-1">
                                <h6 class="fw-bold text-dark mb-1 text-truncate">{{ $data['name'] }}</h6>
                                <span class="badge" style="background: #ECFDF5; color: #047857; border: 1px solid #A7F3D0; font-size: 11px; padding: 3px 8px; border-radius: 20px;">
                                    {{ $data['status'] }}
                                </span>
                            </div>
                            <p class="text-muted fs-12 mb-0">Member ID: <strong class="text-primary font-monospace">{{ $data['memberid'] }}</strong></p>
                        </div>
                    </div>

                    <!-- Row 1: Full Name -->
                    <div class="ft-modal-row" data-modal-row="fullname">
                        <div class="d-flex align-items-center text-muted fs-13">
                            <i class="ti ti-user fs-16 text-primary me-2"></i> Full Name
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-dark fs-13 text-break text-end">{{ $data['name'] }}</span>
                            <button type="button" class="ft-copy-inline" data-copy-val="{{ $data['name'] }}" title="Copy Name">
                                <i class="ti ti-copy fs-13"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Row 2: Mobile Number -->
                    <div class="ft-modal-row" data-modal-row="mobile">
                        <div class="d-flex align-items-center text-muted fs-13">
                            <i class="ti ti-phone fs-16 text-warning me-2"></i> Mobile Number
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-dark fs-13 text-break text-end user-select-all font-monospace">{{ $data['mobile'] ?? 'N/A' }}</span>
                            @if(!empty($data['mobile']))
                            <button type="button" class="ft-copy-inline" data-copy-val="{{ $data['mobile'] }}" title="Copy Mobile">
                                <i class="ti ti-copy fs-13"></i>
                            </button>
                            @endif
                        </div>
                    </div>

                    <!-- Row 3: Email Address -->
                    <div class="ft-modal-row" data-modal-row="email">
                        <div class="d-flex align-items-center text-muted fs-13">
                            <i class="ti ti-mail fs-16 text-info me-2"></i> Email Address
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-dark fs-13 text-break text-end user-select-all">{{ $data['email'] }}</span>
                            @if(!empty($data['email']))
                            <button type="button" class="ft-copy-inline" data-copy-val="{{ $data['email'] }}" title="Copy Email">
                                <i class="ti ti-copy fs-13"></i>
                            </button>
                            @endif
                        </div>
                    </div>

                    <!-- Row 4: Member ID -->
                    <div class="ft-modal-row" data-modal-row="memberid">
                        <div class="d-flex align-items-center text-muted fs-13">
                            <i class="ti ti-id fs-16 text-secondary me-2"></i> Member ID
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-dark fs-13 text-break text-end user-select-all font-monospace">{{ $data['memberid'] }}</span>
                            <button type="button" class="ft-copy-inline" data-copy-val="{{ $data['memberid'] }}" title="Copy Member ID">
                                <i class="ti ti-copy fs-13"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Row 5: Sponsor ID -->
                    @if(!empty($data['sponsor']))
                    <div class="ft-modal-row" data-modal-row="sponsor">
                        <div class="d-flex align-items-center text-muted fs-13">
                            <i class="ti ti-users fs-16 text-purple me-2"></i> Sponsor ID
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-dark fs-13 text-break text-end font-monospace">{{ $data['sponsor'] }}</span>
                            <button type="button" class="ft-copy-inline" data-copy-val="{{ $data['sponsor'] }}" title="Copy Sponsor ID">
                                <i class="ti ti-copy fs-13"></i>
                            </button>
                        </div>
                    </div>
                    @endif

                    <!-- Row 6: Joined On -->
                    @if(!empty($data['created_at']))
                    <div class="ft-modal-row" data-modal-row="joined">
                        <div class="d-flex align-items-center text-muted fs-13">
                            <i class="ti ti-calendar fs-16 text-success me-2"></i> Joined On
                        </div>
                        <span class="fw-bold text-dark fs-13 text-break text-end">{{ date('d M Y, h:i A', strtotime($data['created_at'])) }}</span>
                    </div>
                    @endif
                </div>

                <div class="modal-footer py-2 px-3 bg-white d-flex justify-content-between border-top">
                    <button type="button" class="btn btn-sm btn-light border px-3" data-bs-dismiss="modal">Close</button>
                    <a href="{{ url('member/profile/user-summary') }}" class="btn btn-sm btn-primary px-3">
                        <i class="ti ti-edit me-1"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ==========================================================================
         INTERACTIVE SCRIPTS: CLIPBOARD COPY & NUMBER COUNTERS
         ========================================================================== -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Referral Link Copy Function
            const btnCopy = document.getElementById('btnCopyRef');
            const btnCopyIcon = document.getElementById('btnCopyIcon');
            const refLinkInput = document.getElementById('refLinkText');
            const btnCopyLabel = document.getElementById('btnCopyLabel');

            function copyText(val, onDone) {
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(val).then(onDone).catch(fallback);
                } else {
                    fallback();
                }

                function fallback() {
                    const temp = document.createElement('input');
                    temp.value = val;
                    document.body.appendChild(temp);
                    temp.select();
                    try {
                        document.execCommand('copy');
                        onDone();
                    } catch (e) {
                        console.error('Copy failed', e);
                    }
                    document.body.removeChild(temp);
                }
            }

            function handleCopySuccess() {
                if (btnCopyLabel) {
                    btnCopyLabel.innerText = 'Copied! ✓';
                    setTimeout(() => { btnCopyLabel.innerText = 'Copy Link'; }, 2500);
                }
                if (btnCopyIcon) {
                    btnCopyIcon.innerHTML = '<i class="ti ti-check text-success fs-14"></i>';
                    setTimeout(() => {
                        btnCopyIcon.innerHTML = '<i class="ti ti-copy fs-14"></i>';
                    }, 2500);
                }
            }

            if (btnCopy && refLinkInput) {
                btnCopy.addEventListener('click', function () {
                    copyText(refLinkInput.value.trim(), handleCopySuccess);
                });
            }

            if (btnCopyIcon && refLinkInput) {
                btnCopyIcon.addEventListener('click', function () {
                    copyText(refLinkInput.value.trim(), handleCopySuccess);
                });
            }

            // 2. Member ID Quick Copy
            const inlineCopyId = document.getElementById('inlineCopyId');
            const memberIdVal = document.getElementById('memberIdVal');
            if (inlineCopyId && memberIdVal) {
                inlineCopyId.addEventListener('click', function () {
                    copyText(memberIdVal.innerText.trim(), function () {
                        inlineCopyId.classList.remove('ti-copy');
                        inlineCopyId.classList.add('ti-check', 'text-success');
                        setTimeout(() => {
                            inlineCopyId.classList.remove('ti-check', 'text-success');
                            inlineCopyId.classList.add('ti-copy');
                        }, 2500);
                    });
                });
            }

            // 3. Smooth Number Counter Animation
            const counters = document.querySelectorAll('.exact-counter');
            counters.forEach(counter => {
                const target = parseFloat(counter.getAttribute('data-target')) || 0;
                const decimals = parseInt(counter.getAttribute('data-decimal')) || 0;
                const duration = 1000;
                const startTime = performance.now();

                function updateCount(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const easeProgress = 1 - Math.pow(1 - progress, 3);
                    const currentVal = (target * easeProgress).toFixed(decimals);

                    const parts = currentVal.toString().split('.');
                    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    counter.innerText = parts.join('.');

                    if (progress < 1) {
                        requestAnimationFrame(updateCount);
                    } else {
                        const finalParts = target.toFixed(decimals).toString().split('.');
                        finalParts[0] = finalParts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        counter.innerText = finalParts.join('.');
                    }
                }

                requestAnimationFrame(updateCount);
            });

            // 4. Interactive 3D Card Parallax & Smooth Lighting (Zero Vertical Jitter)
            const interactiveCards = document.querySelectorAll('.ft-stat-interactive');
            interactiveCards.forEach(card => {
                const img = card.querySelector('.ft-stat-art-graphic');
                const shine = card.querySelector('.ft-card-shine');

                card.addEventListener('mousemove', function (e) {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    // Smooth subtle horizontal parallax for 3D graphic (-6px to +6px)
                    const moveX = ((x - centerX) / centerX) * 6;
                    const moveY = ((y - centerY) / centerY) * 4;

                    if (img) {
                        img.style.animationPlayState = 'paused';
                        img.style.transform = `translate(${moveX.toFixed(1)}px, ${moveY.toFixed(1)}px) scale(1.05)`;
                    }
                    if (shine) {
                        shine.style.background = `radial-gradient(circle 220px at ${x}px ${y}px, rgba(255, 255, 255, 0.35) 0%, transparent 70%)`;
                        shine.style.opacity = '1';
                    }
                });

                card.addEventListener('mouseleave', function () {
                    if (img) {
                        img.style.animationPlayState = 'running';
                        img.style.transform = 'translate(0px, 0px) scale(1)';
                    }
                    if (shine) {
                        shine.style.opacity = '0';
                    }
                });
            });

            // 5. Member Profile Pod Focus & Modal Highlight Interaction
            let activeFocusRow = null;
            document.querySelectorAll('.ft-profile-info-pod[data-focus-row]').forEach(pod => {
                pod.addEventListener('click', function () {
                    activeFocusRow = this.getAttribute('data-focus-row');
                });
            });

            const profileModalEl = document.getElementById('profileDetailModal');
            if (profileModalEl) {
                profileModalEl.addEventListener('shown.bs.modal', function () {
                    document.querySelectorAll('.ft-modal-row').forEach(row => row.classList.remove('ft-modal-row-highlighted'));
                    if (activeFocusRow) {
                        const targetRow = profileModalEl.querySelector(`[data-modal-row="${activeFocusRow}"]`);
                        if (targetRow) {
                            targetRow.classList.add('ft-modal-row-highlighted');
                            targetRow.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }
                        activeFocusRow = null;
                    }
                });
            }

            // 6. Modal Inline Copy Buttons
            document.querySelectorAll('.ft-copy-inline').forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const val = this.getAttribute('data-copy-val');
                    const icon = this.querySelector('i');
                    if (val) {
                        copyText(val, function () {
                            if (icon) {
                                icon.className = 'ti ti-check text-success fs-13';
                                setTimeout(() => {
                                    icon.className = 'ti ti-copy fs-13';
                                }, 2000);
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection
