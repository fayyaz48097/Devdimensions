<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>We received your consultation — DevDimensions</title>
    <style>
        /* ── Reset ── */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            outline: none;
            text-decoration: none;
        }

        /* ── Base ── */
        body {
            background-color: #050505;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #E8E8E8;
        }

        /* ── Wrapper ── */
        .email-wrapper {
            width: 100%;
            background-color: #050505;
            padding: 40px 16px;
        }

        /* ── Card ── */
        .email-card {
            max-width: 580px;
            margin: 0 auto;
            background: #0D0D0D;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.07);
            overflow: hidden;
        }

        /* ── Header ── */
        .email-header {
            background: linear-gradient(135deg, #0D0D0D 0%, #130303 100%);
            padding: 40px 44px 36px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            position: relative;
        }

        .header-accent {
            display: block;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #B51E17, #FC3F37);
            border-radius: 2px;
            margin: 0 auto 28px;
        }

        .email-logo {
            font-size: 22px;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.5px;
            text-decoration: none;
        }

        .email-logo span {
            color: #FC3F37;
        }

        /* ── Body ── */
        .email-body {
            padding: 40px 44px;
        }

        .greeting {
            font-size: 24px;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.5px;
            margin-bottom: 14px;
            line-height: 1.25;
        }

        .greeting-sub {
            font-size: 15px;
            color: #8A8A8A;
            line-height: 1.7;
            margin-bottom: 32px;
        }

        /* ── Status badge ── */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(252, 63, 55, 0.10);
            border: 1px solid rgba(252, 63, 55, 0.25);
            border-radius: 20px;
            padding: 5px 14px 5px 10px;
            font-size: 12px;
            font-weight: 600;
            color: #FC3F37;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            background: #FC3F37;
            border-radius: 50%;
            display: inline-block;
        }

        /* ── Detail card ── */
        .detail-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 30px;
        }

        .detail-card-title {
            font-size: 11px;
            font-weight: 600;
            color: #555;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .detail-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        }

        .detail-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .detail-row:first-of-type {
            padding-top: 0;
        }

        .detail-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(252, 63, 55, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .detail-content {}

        .detail-label {
            font-size: 11px;
            color: #555;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 3px;
        }

        .detail-value {
            font-size: 14px;
            color: #D0D0D0;
            line-height: 1.55;
        }

        /* ── Timeline ── */
        .timeline {
            margin-bottom: 32px;
        }

        .timeline-title {
            font-size: 11px;
            font-weight: 600;
            color: #555;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .timeline-step {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 20px;
        }

        .timeline-step:last-child {
            margin-bottom: 0;
        }

        .step-marker {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-shrink: 0;
        }

        .step-dot {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .step-dot.done {
            background: rgba(74, 222, 128, 0.12);
            color: #4ADE80;
            border: 1px solid rgba(74, 222, 128, 0.25);
        }

        .step-dot.next {
            background: rgba(252, 63, 55, 0.10);
            color: #FC3F37;
            border: 1px solid rgba(252, 63, 55, 0.25);
        }

        .step-dot.pending {
            background: rgba(255, 255, 255, 0.04);
            color: #555;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .step-line {
            width: 1px;
            flex: 1;
            min-height: 16px;
            background: rgba(255, 255, 255, 0.06);
            margin: 4px 0;
        }

        .step-content {
            padding-top: 4px;
        }

        .step-label {
            font-size: 13px;
            font-weight: 600;
            color: #C8C8C8;
            margin-bottom: 3px;
        }

        .step-label.done {
            color: #4ADE80;
        }

        .step-label.next {
            color: #FC3F37;
        }

        .step-desc {
            font-size: 12px;
            color: #555;
            line-height: 1.5;
        }

        /* ── CTA Button ── */
        .cta-wrap {
            text-align: center;
            margin-bottom: 36px;
        }

        .cta-btn {
            display: inline-block;
            padding: 13px 36px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #fff !important;
            text-decoration: none;
            background: linear-gradient(90deg, #B51E17 0%, #FC3F37 100%);
            letter-spacing: 0.2px;
        }

        /* ── Divider ── */
        .divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.05);
            margin: 0 0 28px;
        }

        /* ── Note box ── */
        .note-box {
            background: rgba(252, 63, 55, 0.05);
            border-left: 3px solid #B51E17;
            border-radius: 0 8px 8px 0;
            padding: 14px 18px;
            margin-bottom: 0;
        }

        .note-box p {
            font-size: 13px;
            color: #9A9A9A;
            line-height: 1.65;
        }

        .note-box strong {
            color: #D0D0D0;
        }

        /* ── Footer ── */
        .email-footer {
            background: #080808;
            border-top: 1px solid rgba(255, 255, 255, 0.04);
            padding: 28px 44px;
            text-align: center;
        }

        .footer-brand {
            font-size: 15px;
            font-weight: 700;
            color: #333;
            letter-spacing: -0.3px;
            margin-bottom: 8px;
        }

        .footer-brand span {
            color: #5A1010;
        }

        .footer-links {
            margin-bottom: 14px;
        }

        .footer-links a {
            font-size: 12px;
            color: #383838;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-copy {
            font-size: 11px;
            color: #2A2A2A;
            line-height: 1.6;
        }

        /* ── Responsive ── */
        @media (max-width: 600px) {
            .email-body {
                padding: 28px 24px;
            }

            .email-header {
                padding: 30px 24px 26px;
            }

            .email-footer {
                padding: 22px 24px;
            }

            .greeting {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="email-wrapper">
        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td>

                    <div class="email-card">

                        {{-- ── Header ── --}}
                        <div class="email-header">
                            <span class="header-accent"></span>
                            <div class="email-logo">Dev<span>Dimensions</span></div>
                        </div>

                        {{-- ── Body ── --}}
                        <div class="email-body">

                            {{-- Status badge --}}
                            <div>
                                <span class="status-badge">
                                    <span class="status-dot"></span>
                                    Request Received
                                </span>
                            </div>

                            {{-- Greeting --}}
                            <h1 class="greeting">
                                Thanks, {{ $consultation->name }}! 👋
                            </h1>
                            <p class="greeting-sub">
                                We've successfully received your consultation request. Our team reviews
                                every submission personally and will get back to you within <strong
                                    style="color:#D0D0D0;">24–48 business hours</strong>.
                            </p>

                            {{-- Detail card --}}
                            <div class="detail-card">
                                <div class="detail-card-title">Your Submission</div>

                                {{-- Name --}}
                                <div class="detail-row">
                                    <div class="detail-icon">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="#FC3F37" stroke-width="1.8" stroke-linecap="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                    </div>
                                    <div class="detail-content">
                                        <div class="detail-label">Name</div>
                                        <div class="detail-value">{{ $consultation->name }}</div>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="detail-row">
                                    <div class="detail-icon">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="#FC3F37" stroke-width="1.8" stroke-linecap="round">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                            <polyline points="22,6 12,13 2,6" />
                                        </svg>
                                    </div>
                                    <div class="detail-content">
                                        <div class="detail-label">Email</div>
                                        <div class="detail-value">{{ $consultation->email }}</div>
                                    </div>
                                </div>

                                {{-- Message --}}
                                <div class="detail-row">
                                    <div class="detail-icon">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="#FC3F37" stroke-width="1.8" stroke-linecap="round">
                                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                        </svg>
                                    </div>
                                    <div class="detail-content">
                                        <div class="detail-label">Message</div>
                                        <div class="detail-value">{{ $consultation->message }}</div>
                                    </div>
                                </div>

                            </div>

                            {{-- What happens next timeline --}}
                            <div class="timeline">
                                <div class="timeline-title">What Happens Next</div>

                                <div class="timeline-step">
                                    <div class="step-marker">
                                        <div class="step-dot done">✓</div>
                                        <div class="step-line"></div>
                                    </div>
                                    <div class="step-content">
                                        <div class="step-label done">Request Submitted</div>
                                        <div class="step-desc">Your consultation request has been logged in our system.
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-step">
                                    <div class="step-marker">
                                        <div class="step-dot next">2</div>
                                        <div class="step-line"></div>
                                    </div>
                                    <div class="step-content">
                                        <div class="step-label next">Team Review</div>
                                        <div class="step-desc">Our team will review your requirements within 24–48 hrs.
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-step">
                                    <div class="step-marker">
                                        <div class="step-dot pending">3</div>
                                    </div>
                                    <div class="step-content">
                                        <div class="step-label">Discovery Call</div>
                                        <div class="step-desc">We'll schedule a call to discuss your project in detail.
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- CTA --}}
                            <div class="cta-wrap">
                                <a href="{{ url('/') }}" class="cta-btn">Visit DevDimensions →</a>
                            </div>

                            <div class="divider"></div>

                            {{-- Note --}}
                            <div class="note-box">
                                <p>
                                    <strong>Have urgent questions?</strong> Reply directly to this email or reach us at
                                    <strong>contact@devdimensions.com</strong> — we're always happy to help.
                                </p>
                            </div>

                        </div>

                        {{-- ── Footer ── --}}
                        <div class="email-footer">
                            <div class="footer-brand">Dev<span>Dimensions</span></div>
                            <div class="footer-links">
                                <a href="{{ url('/') }}">Website</a>
                                <a href="{{ url('/about-us') }}">About</a>
                                <a href="{{ url('/case-studies') }}">Work</a>
                                <a href="{{ url('/contact-us') }}">Contact</a>
                            </div>
                            <div class="footer-copy">
                                © {{ date('Y') }} DevDimensions. All rights reserved.<br>
                                You're receiving this because you submitted a consultation request on our website.
                            </div>
                        </div>

                    </div>

                </td>
            </tr>
        </table>
    </div>

</body>

</html>
