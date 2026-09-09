@extends('layouts.auth')

<link rel="stylesheet" href="{{ asset('css/erebus/views/auth/harm-reduction-standalone.css') }}">
@section('title', 'Harm Reduction - Erebus Marketplace Script')

@section('breadcrumb', 'Harm Reduction')

@section('content')
<div class="harm-reduction-page">
    <div class="harm-reduction-header">
        <h1>Harm Reduction Resources</h1>
        <p>Educational information to promote safe and responsible practices</p>
    </div>

    <div class="harm-reduction-content">
        <!-- Drug Testing Kits Section -->
        <div class="harm-reduction-section">
            <h2>Drug Testing Kits</h2>
            <p>Test kits can help identify substances and reduce risks associated with unknown compounds.</p>
            <div class="resource-list">
                <div class="resource-item">
                    <h3>Fentanyl Test Strips</h3>
                    <p>Quick detection for fentanyl and analogues in substances. Easy to use and reliable.</p>
                    <a href="{{ route('fentanyl-test-strips') }}" class="resource-link">Learn More →</a>
                </div>
                <div class="resource-item">
                    <h3>Marquis Reagent Test</h3>
                    <p>General substance identification test. Color-changing reaction indicates substance type.</p>
                    <a href="{{ route('marquis-reagent-test') }}" class="resource-link">Information →</a>
                </div>
                <div class="resource-item">
                    <h3>Mecke Reagent Test</h3>
                    <p>Complements other tests for multi-spectrum substance identification.</p>
                    <a href="{{ route('mecke-reagent-test') }}" class="resource-link">Information →</a>
                </div>
            </div>
        </div>

        <!-- Overdose Prevention Section -->
        <div class="harm-reduction-section">
            <h2>Overdose Prevention</h2>
            <p>Overdose is preventable with proper knowledge and tools.</p>
            <div class="resource-list">
                <div class="resource-item">
                    <h3>Naloxone (Narcan)</h3>
                    <p>Emergency medication that rapidly reverses opioid overdose. Available as nasal spray or injection.</p>
                    <a href= "{{ route('narcan-guide') }}" class="resource-link">Find Resources →</a>
                </div>
                <div class="resource-item">
                    <h3>Safe Consumption Practices</h3>
                    <p>Never use alone, start with small amounts, have naloxone available, and know warning signs.</p>
                    <a href="{{ route('safe-consumption-practices') }}" class="resource-link">Guidelines →</a>
                </div>
                <div class="resource-item">
                    <h3>Recovery Support</h3>
                    <p>Professional support, peer groups, and telehealth services for addiction recovery.</p>
                    <a href="{{ route('recovery-support') }}" class="resource-link">Get Help →</a>
                </div>
            </div>
        </div>

        <!-- Mental Health Section -->
        <div class="harm-reduction-section">
            <h3>Mental Health Support</h3>
            <p>Mental health is just as important as physical health in harm reduction.</p>
            <div class="resource-list">
                <div class="resource-item">
                    <h3>Crisis Hotlines</h3>
                    <p>24/7 support available. Talk to someone trained in crisis intervention.</p>
                    <a href="{{ route('crisis-hotline') }}" class="resource-link">988 Suicide & Crisis Lifeline →</a>
                </div>
                <div class="resource-item">
                    <h3>Therapy & Counseling</h3>
                    <p>Professional mental health services including CBT, DBT, and peer support groups.</p>
                    <a href="{{ route('therapy-counseling') }}" class="resource-link">Find Services →</a>
                </div>
            </div>
        </div>

        <!-- Legal Information Section -->
        <div class="harm-reduction-section">
            <h2>Legal Information</h2>
            <p>Know your rights and the legal landscape regarding harm reduction.</p>
            <div class="resource-list">
                <div class="resource-item">
                    <h3>Good Samaritan Laws</h3>
                    <p>Many jurisdictions offer protections when calling for emergency help during overdose situations.</p>
                    <a href="{{ route('good-samaritan-laws') }}" class="resource-link">Check Your State →</a>
                </div>
                <div class="resource-item">
                    <h3>Legal Awareness</h3>
                    <p>Understand local drug possession laws and penalties to make informed decisions.</p>
                    <a href="{{ route('legal-awareness') }}" class="resource-link">Learn Your Rights →</a>
                </div>
            </div>
        </div>

        <!-- Safety Tips Section -->
        <div class="harm-reduction-section">
            <h2>General Safety Tips</h2>
            <ul class="safety-tips">
                <li>Never use alone - always have someone present</li>
                <li>Start with a small test dose with any new substance</li>
                <li>Keep naloxone nearby and accessible</li>
                <li>Use sterile equipment and proper hygiene practices</li>
                <li>Stay hydrated and monitor your environment</li>
                <li>Know the signs of overdose and how to respond</li>
                <li>Build support networks and seek help when needed</li>
                <li>Regular health checkups and screening</li>
            </ul>
        </div>

        <!-- Resources Section -->
        <div class="harm-reduction-section">
            <h2>Trusted Organizations</h2>
            <div class="organizations-list">
                <a href="https://www.samhsa.gov/" target="_blank" rel="noopener noreferrer" class="org-link">
                    <strong>SAMHSA</strong> - Substance Abuse & Mental Health Services Administration
                </a>
                <a href="https://harmreduction.org/" target="_blank" rel="noopener noreferrer" class="org-link">
                    <strong>Harm Reduction Coalition</strong> - Frontline organization advancing harm reduction
                </a>
                <a href="https://www.deathbydefault.com/" target="_blank" rel="noopener noreferrer" class="org-link">
                    <strong>Death by Default</strong> - Project supporting communities affected by substance use
                </a>
            </div>
        </div>

        <div class="disclaimer-box">
            <strong>⚠️ Important Disclaimer:</strong>
            <p>This information is for harm reduction and educational purposes only. It does not constitute medical, legal, or professional advice. Always consult with healthcare providers for personalized medical guidance.</p>
        </div>
    </div>
</div>


@endsection
