@extends('layouts.auth')

<link rel="stylesheet" href="{{ asset('css/erebus/views/auth/fentanyl-test-strips-show.css') }}">
@section('title', 'Fentanyl Test Strips Guide - Harm Reduction')

@section('breadcrumb', 'Fentanyl Test Strips')

@section('content')


<div class="fentanyl-test-strips-page">
    <!-- Header -->
    <div class="fentanyl-header">
        <h1>🧪 Fentanyl Test Strips Guide</h1>
        <p>Quick detection for fentanyl and analogues in substances. Easy to use and reliable.</p>
    </div>

    <!-- What Are Fentanyl Test Strips? -->
    <section class="fentanyl-section">
        <h2>What Are Fentanyl Test Strips?</h2>
        <p>Fentanyl test strips are rapid immunoassay strips that detect the presence of fentanyl and many of its analogues in substances. They work similarly to drug test strips used in medical settings and provide results in minutes.</p>
        
        <div class="info-box success">
            <strong>✓ Why They Matter</strong>
            <p>Fentanyl is 50-100 times more potent than morphine. Even tiny amounts (as small as a grain of salt) can be fatal. Test strips help identify contaminated substances before use.</p>
        </div>

        <h3>Key Features</h3>
        <ul>
            <li><strong>Rapid Results:</strong> Get results in 1-2 minutes</li>
            <li><strong>Portable:</strong> Small enough to fit in a pocket or bag</li>
            <li><strong>Simple:</strong> No special equipment or training required</li>
            <li><strong>Sensitive:</strong> Can detect fentanyl down to 5-10 ng/mL</li>
            <li><strong>Cost-Effective:</strong> Inexpensive harm reduction tool</li>
            <li><strong>Non-Invasive:</strong> Test without consuming the substance</li>
        </ul>
    </section>

    <!-- How to Use -->
    <section class="fentanyl-section">
        <h2>How to Use Fentanyl Test Strips</h2>
        
        <div class="steps-container">
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h4>Prepare Your Sample</h4>
                    <p>Dissolve a small amount (about the size of a crumb) of your substance in a small amount of water (about 1-2mL) in a spoon, glass, or small container. This works best with powdered substances.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h4>Dip the Strip</h4>
                    <p>Place the test strip into the solution, holding it by the end with text. Submerge the strip for 10-15 seconds. Make sure the entire test area is covered with the solution.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h4>Wait for Results</h4>
                    <p>Remove the strip and place it on a clean, dry surface. Wait 1-2 minutes for the result to appear. Do not read before 1 minute or after 5 minutes.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h4>Interpret Results</h4>
                    <p><strong>One line (at C):</strong> Fentanyl is present. <strong>Two lines (at C and T):</strong> Fentanyl is NOT present. <strong>No lines:</strong> Invalid test, try again.</p>
                </div>
            </div>
        </div>

        <div class="info-box warning">
            <strong>⚠️ Important Notes</strong>
            <p>Test strips have limitations. A negative result does not guarantee safety. Other dangerous synthetic opioids (carfentanil, isotonitazene) may not be detected. Always practice additional harm reduction measures.</p>
        </div>
    </section>

    <!-- Interpreting Results -->
    <section class="fentanyl-section">
        <h2>Understanding Your Results</h2>
        
        <table class="comparison-table">
            <thead>
                <tr>
                    <th>Result</th>
                    <th>Lines Visible</th>
                    <th>Interpretation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>POSITIVE</strong></td>
                    <td>One line (C only)</td>
                    <td>Fentanyl detected</td>
                    <td>Exercise extreme caution. Consider not using or using significantly less.</td>
                </tr>
                <tr>
                    <td><strong>NEGATIVE</strong></td>
                    <td>Two lines (C and T)</td>
                    <td>Fentanyl NOT detected</td>
                    <td>Lower risk but not risk-free. Other opioids may still be present.</td>
                </tr>
                <tr>
                    <td><strong>INVALID</strong></td>
                    <td>No lines or unusual pattern</td>
                    <td>Test failed</td>
                    <td>Repeat with fresh strip. May be expired or defective.</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Limitations -->
    <section class="fentanyl-section">
        <h2>Important Limitations</h2>
        
        <div class="info-box danger">
            <strong>🚨 Critical Information</strong>
            <p>Test strips are ONE tool among many harm reduction strategies. They have significant limitations and should not be relied upon as the sole safety measure.</p>
        </div>

        <h3>What Test Strips DO Detect:</h3>
        <ul>
            <li>Fentanyl</li>
            <li>Most fentanyl analogues (acetyl fentanyl, butyryl fentanyl, etc.)</li>
            <li>Some novel synthetic opioids</li>
        </ul>

        <h3>What Test Strips DO NOT Detect:</h3>
        <ul>
            <li>Carfentanil (ultra-potent synthetic opioid)</li>
            <li>Isotonitazene and similar nitazenes</li>
            <li>Heroin or traditional opioids</li>
            <li>Other adulterants (levamisole, xylazine, etc.)</li>
            <li>Precise quantities or concentration levels</li>
        </ul>

        <h3>Factors Affecting Accuracy:</h3>
        <ul>
            <li><strong>Uneven Distribution:</strong> Fentanyl may not be evenly mixed in substance</li>
            <li><strong>Expired Strips:</strong> Always check expiration date</li>
            <li><strong>Poor Sample Preparation:</strong> Must properly dissolve in water</li>
            <li><strong>Cross-Contamination:</strong> Different batch may have different composition</li>
            <li><strong>Storage Conditions:</strong> Keep strips in cool, dry place</li>
        </ul>
    </section>

    <!-- Harm Reduction Tips -->
    <section class="fentanyl-section">
        <h2>Comprehensive Harm Reduction Strategy</h2>
        <p>Test strips are most effective when combined with other harm reduction practices:</p>
        
        <h3>Before Use:</h3>
        <ul>
            <li>Test your substance with strips</li>
            <li>Start with a very small amount (test dose)</li>
            <li>Never use alone - have a friend nearby</li>
            <li>Have naloxone (Narcan) available and know how to use it</li>
            <li>Avoid mixing substances</li>
        </ul>

        <h3>During Use:</h3>
        <ul>
            <li>Stay in a safe environment with adequate ventilation</li>
            <li>Use sterile equipment</li>
            <li>Practice good hygiene</li>
            <li>Monitor for signs of overdose in yourself and others</li>
            <li>Keep communication open with companions</li>
        </ul>

        <h3>After Use:</h3>
        <ul>
            <li>Check in with your companion</li>
            <li>Properly dispose of equipment</li>
            <li>Seek medical help if experiencing adverse effects</li>
            <li>Document batch information if testing different batches</li>
        </ul>
    </section>

    <!-- Naloxone Information -->
    <section class="fentanyl-section">
        <h2>Naloxone (Narcan) - Emergency Response</h2>
        
        <div class="info-box success">
            <strong>✓ Life-Saving Medication</strong>
            <p>Naloxone rapidly reverses opioid overdose and is an essential complement to test strips. It's available for free or low cost in many areas.</p>
        </div>

        <h3>Signs of Opioid Overdose:</h3>
        <ul>
            <li>Unconsciousness or unresponsiveness</li>
            <li>Blue lips or fingernails</li>
            <li>Slow or stopped breathing</li>
            <li>Choking or gurgling sounds</li>
            <li>Pinpoint pupils</li>
            <li>Limp body</li>
        </ul>

        <h3>What to Do:</h3>
        <ol>
            <li>Call 911 immediately</li>
            <li>Administer naloxone (nasal spray or injection)</li>
            <li>Perform rescue breathing if trained</li>
            <li>Stay with the person until help arrives</li>
            <li>Be prepared to administer a second dose after 2-3 minutes if needed</li>
        </ol>

        <div class="info-box warning">
            <strong>⚠️ Good Samaritan Laws</strong>
            <p>Many jurisdictions offer legal protections when calling 911 for overdose emergencies. Check your local laws to understand your protections.</p>
        </div>
    </section>

    <!-- Where to Get -->
    <section class="fentanyl-section">
        <h2>Where to Get Fentanyl Test Strips</h2>
        
        <h3>Free or Low-Cost Options:</h3>
        <ul>
            <li><strong>Harm Reduction Organizations:</strong> Many local harm reduction programs distribute free strips</li>
            <li><strong>Community Health Centers:</strong> Public health departments often have them</li>
            <li><strong>Needle Exchanges:</strong> Usually available at syringe services programs</li>
            <li><strong>Substance Use Treatment Programs:</strong> Often distribute as part of prevention efforts</li>
        </ul>

        <h3>Online Resources:</h3>
        <ul>
            <li>Harm Reduction Coalition - harmreduction.org</li>
            <li>SAMHSA National Helpline - 1-800-662-4357 (free, confidential, 24/7)</li>
            <li>Local health departments (search online for your area)</li>
            <li>University drug policy clinics</li>
        </ul>
    </section>

    <!-- Resources -->
    <section class="fentanyl-section">
        <h2>Additional Resources</h2>
        
        <h3>Emergency Numbers:</h3>
        <ul>
            <li><strong>911:</strong> Emergency services (overdose, medical emergency)</li>
            <li><strong>988:</strong> Suicide & Crisis Lifeline</li>
            <li><strong>1-800-662-4357:</strong> SAMHSA National Helpline</li>
        </ul>

        <h3>Recommended Reading:</h3>
        <ul>
            <li>Harm Reduction Coalition publications on fentanyl</li>
            <li>Local public health fentanyl overdose alerts</li>
            <li>Clinical guidelines on opioid safety</li>
        </ul>

        <div class="info-box">
            <strong>💡 Remember</strong>
            <p>Seeking help is a sign of strength, not weakness. Treatment, harm reduction services, and peer support are available. You deserve care and support.</p>
        </div>
    </section>

    <!-- Disclaimer -->
    <section class="fentanyl-section disclaimer-section">
        <h2>⚠️ Important Disclaimer</h2>
        <p>This information is provided for harm reduction and educational purposes only. It does not constitute medical, legal, or professional advice. This guide is not a substitute for professional medical care.</p>
        <ul>
            <li>Test strips are tools to reduce harm, not to enable substance use</li>
            <li>Substance use carries inherent risks that cannot be eliminated</li>
            <li>Always consult healthcare providers for medical advice</li>
            <li>Substance possession may be illegal in your jurisdiction</li>
            <li>If you or someone you know is struggling with substance use, please seek professional help</li>
        </ul>
        <p><strong>Recovery is possible. Help is available. You are not alone.</strong></p>
    </section>
</div>
@endsection
