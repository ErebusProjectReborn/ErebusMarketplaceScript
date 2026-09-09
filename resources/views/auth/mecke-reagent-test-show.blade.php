@extends('layouts.auth')

@section('title', 'Mecke Reagent Test Guide - Harm Reduction')

@section('breadcrumb', 'Mecke Reagent Test')

@section('content')


<div class="mecke-test-page">
    <!-- Header -->
    <div class="mecke-header">
        <h1>🧪 Mecke Reagent Test Guide</h1>
        <p>Secondary confirmation test. Produces distinct color reactions to distinguish between similar substances.</p>
    </div>

    <!-- What Is Mecke Reagent? -->
    <section class="mecke-section">
        <h2>What Is the Mecke Reagent Test?</h2>
        <p>The Mecke Reagent Test is a chemical reagent test that produces color reactions different from the Marquis reagent. It's primarily used as a confirmatory test alongside Marquis to distinguish between similar compounds. Mecke is particularly valuable for differentiating opioids and confirming amphetamine-type substances.</p>
        
        <div class="info-box success">
            <strong>✓ Best Used For</strong>
            <p>Mecke excels at confirming MDMA versus other amphetamines, differentiating between opioids, and identifying novel psychoactive substances. Its distinct color patterns complement Marquis results.</p>
        </div>

        <h3>Key Features</h3>
        <ul>
            <li><strong>Complementary Test:</strong> Different reactions than Marquis help confirm substance identity</li>
            <li><strong>Fast Results:</strong> Color reaction appears within 1-2 minutes</li>
            <li><strong>Distinctive Patterns:</strong> Clear differentiation between opioids and stimulants</li>
            <li><strong>Affordable:</strong> Inexpensive and widely available</li>
            <li><strong>Portable:</strong> Small bottle for easy transport</li>
            <li><strong>Sensitive:</strong> Detects substances at low concentrations</li>
        </ul>
    </section>

    <!-- How to Use -->
    <section class="mecke-section">
        <h2>How to Perform a Mecke Test</h2>
        
        <div class="steps-container">
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h4>Prepare Your Sample</h4>
                    <p>Place a small amount of substance (size of a grain of rice) on a white ceramic plate or porcelain tile. Use a separate sample from your Marquis test if possible.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h4>Apply Mecke Reagent</h4>
                    <p>Add 1-2 drops of Mecke reagent directly to the sample. Observe immediately as the reaction begins upon contact. Do not stir or mix the reagent.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h4>Watch the Reaction</h4>
                    <p>Observe color changes over 1-2 minutes. Note the initial color and progression. Some reactions are rapid; others develop more slowly. Compare timing with reference chart.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h4>Cross-Reference with Marquis</h4>
                    <p>Compare Mecke results with your Marquis results. Combining both tests significantly increases confidence in substance identification. Use both color reactions to narrow down possibilities.</p>
                </div>
            </div>
        </div>

        <div class="info-box warning">
            <strong>⚠️ Test Timing</strong>
            <p>Mecke reactions can be slower than Marquis. Watch for 2-3 minutes before concluding. Some substances show color changes that progress over time. Read results carefully at key intervals: 10 seconds, 30 seconds, 1 minute, and 2 minutes.</p>
        </div>
    </section>

    <!-- Mecke Color Reactions -->
    <section class="mecke-section">
        <h2>Mecke Color Reaction Chart</h2>
        <p>Mecke produces distinct reactions that differ from Marquis, making it excellent for confirmation and differentiation.</p>
        
        <table class="reaction-table">
            <thead>
                <tr>
                    <th>Substance</th>
                    <th>Mecke Reaction</th>
                    <th>Timing</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>MDMA / Ecstasy</strong></td>
                    <td><span class="color-swatch inline-447214812e"></span> Green → Emerald Green → Dark Green</td>
                    <td>Immediate to 30 seconds</td>
                </tr>
                <tr>
                    <td><strong>MDA</strong></td>
                    <td><span class="color-swatch inline-c552a9c471"></span> Greenish-Brown → Dark Green</td>
                    <td>Immediate, slower than MDMA</td>
                </tr>
                <tr>
                    <td><strong>Amphetamine</strong></td>
                    <td><span class="color-swatch inline-44554e02b5"></span> Yellow → Brown/No Color</td>
                    <td>2-5 seconds</td>
                </tr>
                <tr>
                    <td><strong>Heroin / Diacetylmorphine</strong></td>
                    <td><span class="color-swatch inline-9a89dce24a"></span> Blue → Purple</td>
                    <td>3-10 seconds</td>
                </tr>
                <tr>
                    <td><strong>Morphine</strong></td>
                    <td><span class="color-swatch inline-24b74278d5"></span> Pale Blue → Light Blue</td>
                    <td>Slow, develops over 10-20 seconds</td>
                </tr>
                <tr>
                    <td><strong>Codeine</strong></td>
                    <td><span class="color-swatch inline-f10dbfd2b3"></span> Light Blue → Gray</td>
                    <td>5-15 seconds</td>
                </tr>
                <tr>
                    <td><strong>Methamphetamine</strong></td>
                    <td><span class="color-swatch inline-f10b6fb1a6"></span> Orange → Brown/Yellow</td>
                    <td>2-10 seconds</td>
                </tr>
                <tr>
                    <td><strong>LSD</strong></td>
                    <td><span class="color-swatch inline-01ad74366b"></span> Colorless or faint brown</td>
                    <td>Slow or no reaction</td>
                </tr>
                <tr>
                    <td><strong>No Reaction</strong></td>
                    <td>No color change or very faint</td>
                    <td>Substance not detected</td>
                </tr>
            </tbody>
        </table>

        <div class="info-box">
            <strong>💡 Interpretation Tips</strong>
            <p>Mecke's green reactions for MDMA are highly distinctive. Heroin's blue-purple reaction is also very characteristic. These combinations make Mecke particularly useful for confirmatory testing. Always compare with Marquis results.</p>
        </div>
    </section>

    <!-- Advantages & Limitations -->
    <section class="mecke-section">
        <h2>Advantages and Limitations</h2>
        
        <div class="comparison-grid">
            <div class="comparison-card">
                <h4>✓ Advantages</h4>
                <ul class="inline-9498057cb6">
                    <li>Excellent confirmatory test</li>
                    <li>Different colors from Marquis</li>
                    <li>Very good for opioid ID</li>
                    <li>Clear MDMA reactions</li>
                    <li>Quick results</li>
                    <li>Inexpensive</li>
                </ul>
            </div>
            <div class="comparison-card">
                <h4>✗ Limitations</h4>
                <ul class="inline-9498057cb6">
                    <li>Slower reactions than Marquis</li>
                    <li>Requires careful observation</li>
                    <li>Cannot determine purity</li>
                    <li>Should not be used alone</li>
                    <li>Affected by lighting</li>
                    <li>Requires timing reference</li>
                </ul>
            </div>
        </div>

        <div class="info-box danger">
            <strong>🚨 Critical Information</strong>
            <p>Mecke should be used as a CONFIRMATORY test, not as a standalone test. Always use with Marquis and ideally with other tests (Mandelin, Simon's) for highest accuracy.</p>
        </div>
    </section>

    <!-- Mecke vs Marquis -->
    <section class="mecke-section">
        <h2>Comparing Mecke and Marquis Results</h2>
        <p>Different substances show distinctive patterns when tested with both reagents:</p>
        
        <table class="reaction-table">
            <thead>
                <tr>
                    <th>Substance</th>
                    <th>Marquis Result</th>
                    <th>Mecke Result</th>
                    <th>Combined Confidence</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>MDMA</strong></td>
                    <td>Black → Purple/Brown</td>
                    <td>Emerald Green</td>
                    <td>Very High</td>
                </tr>
                <tr>
                    <td><strong>Heroin</strong></td>
                    <td>Brown → Purple/Blue</td>
                    <td>Blue → Purple</td>
                    <td>Very High</td>
                </tr>
                <tr>
                    <td><strong>Morphine</strong></td>
                    <td>White → Brown</td>
                    <td>Pale Blue</td>
                    <td>High</td>
                </tr>
                <tr>
                    <td><strong>Amphetamine</strong></td>
                    <td>Orange → Brown/Black</td>
                    <td>Yellow → Brown</td>
                    <td>Moderate-High</td>
                </tr>
            </tbody>
        </table>

        <div class="info-box success">
            <strong>✓ Best Practice</strong>
            <p>When Marquis and Mecke results align with expected patterns for a specific substance, confidence in identification is significantly higher than with either test alone.</p>
        </div>
    </section>

    <!-- Safety & Storage -->
    <section class="mecke-section">
        <h2>Safe Handling and Storage</h2>
        
        <h3>Safety Precautions:</h3>
        <ul>
            <li>Handle in well-ventilated area</li>
            <li>Avoid skin and eye contact</li>
            <li>Wash thoroughly if contact occurs</li>
            <li>Keep away from children and pets</li>
            <li>Do not inhale fumes</li>
            <li>Use on glass or ceramic surfaces only</li>
            <li>Dispose of properly according to local regulations</li>
        </ul>

        <h3>Storage Requirements:</h3>
        <ul>
            <li>Store in cool, dark location (15-25°C)</li>
            <li>Keep in original dark glass bottle with tight cap</li>
            <li>Protect from light exposure</li>
            <li>Keep away from moisture and humidity</li>
            <li>Check expiration date (typically 1-2 years)</li>
            <li>Store separately from other chemicals</li>
        </ul>
    </section>

    <!-- Resources -->
    <section class="mecke-section">
        <h2>Additional Resources</h2>
        
        <h3>Emergency Numbers:</h3>
        <ul>
            <li><strong>911:</strong> Emergency services (overdose, medical emergency)</li>
            <li><strong>988:</strong> Suicide & Crisis Lifeline</li>
            <li><strong>1-800-662-4357:</strong> SAMHSA National Helpline</li>
        </ul>

        <h3>Information Sources:</h3>
        <ul>
            <li>DrugsData.org - Substance testing database</li>
            <li>Harm Reduction Coalition - harmreduction.org</li>
            <li>Dance Safe - dancesafe.org (reagent test information)</li>
            <li>Local harm reduction organizations</li>
        </ul>

        <div class="info-box">
            <strong>💡 Remember</strong>
            <p>Testing is harm reduction. If you or someone you know is struggling with substance use, help is available and recovery is possible.</p>
        </div>
    </section>

    <!-- Disclaimer -->
    <section class="mecke-section disclaimer-section">
        <h2>⚠️ Important Disclaimer</h2>
        <p>This information is provided for harm reduction and educational purposes only. It does not constitute medical, legal, or professional advice.</p>
        <ul>
            <li>Test kits are harm reduction tools, not endorsements of substance use</li>
            <li>Results are presumptive and require confirmation</li>
            <li>Substance use carries inherent risks</li>
            <li>Always consult healthcare providers for medical advice</li>
            <li>Substance possession may be illegal in your jurisdiction</li>
            <li>If struggling with substance use, please seek professional help</li>
        </ul>
        <p><strong>Recovery is possible. Help is available. You are not alone.</strong></p>
    </section>
</div>
@endsection
