@extends('layouts.auth')

@section('title', 'Crisis Hotline Directory - Immediate Help Available')

@section('breadcrumb', 'Crisis Hotlines')

@section('content')


<div class="crisis-page">
    <!-- Header -->
    <div class="crisis-header">
        <h1>📞 Crisis Hotline Directory</h1>
        <p>Immediate support and help available 24/7. You are not alone. Trained counselors ready to listen.</p>
    </div>

    <!-- Emergency Banner -->
    <section class="crisis-section">
        <div class="emergency-banner">
            <h3>If You Are in Immediate Danger</h3>
            <div class="number">911</div>
            <p><strong>Call or Text 911</strong></p>
            <p>For emergencies: overdose, medical crisis, self-harm, suicide attempt</p>
        </div>
    </section>

    <!-- Main Crisis Resources -->
    <section class="crisis-section">
        <h2>National Crisis Hotlines</h2>
        <p>Free, confidential support available right now. You can call, text, or chat online. No judgment. No penalties.</p>
        
        <div class="hotline-grid">
            <div class="hotline-card">
                <h4>🆘 Suicide & Crisis Lifeline</h4>
                <div class="hotline-number">988</div>
                <p><strong>Call or Text 988</strong></p>
                <p>Free, confidential, 24/7 support for suicidal thoughts, mental health crisis, or emotional distress. Available to anyone in the US.</p>
                <ul>
                    <li>Trained crisis counselors</li>
                    <li>Same-day appointment connections</li>
                    <li>Spanish language available</li>
                </ul>
            </div>

            <div class="hotline-card">
                <h4>💊 SAMHSA National Helpline</h4>
                <div class="hotline-number">1-800-662-4357</div>
                <p>Free, confidential, 24/7 treatment referral and information service</p>
                <p>Substance use and mental health disorders. English and Spanish available.</p>
                <ul>
                    <li>Treatment program referrals</li>
                    <li>Location-specific resources</li>
                    <li>Insurance & payment info</li>
                </ul>
            </div>

            <div class="hotline-card">
                <h4>💬 Crisis Text Line</h4>
                <div class="hotline-number">741741</div>
                <p><strong>Text HOME to 741741</strong></p>
                <p>Free crisis support via text message. Immediate connection to trained crisis counselor.</p>
                <ul>
                    <li>Text-based crisis support</li>
                    <li>24/7 availability</li>
                    <li>For any crisis type</li>
                </ul>
            </div>
        </div>

        <div class="info-box success">
            <strong>✓ Why Call a Hotline?</strong>
            <p>Crisis counselors are trained to listen without judgment. They understand what you're going through. Talking to someone can help you feel less alone and find ways to cope with overwhelming feelings.</p>
        </div>
    </section>

    <!-- Substance Use Specific Resources -->
    <section class="crisis-section">
        <h2>Substance Use & Addiction Crisis Support</h2>
        
        <div class="hotline-grid">
            <div class="hotline-card">
                <h4>🚨 Overdose Emergency</h4>
                <div class="hotline-number">911</div>
                <p><strong>Call 911 Immediately</strong></p>
                <p>If someone is unconscious, not breathing, or showing overdose signs, call 911 without delay.</p>
                <ul>
                    <li>Administer Narcan if available</li>
                    <li>Place person on side</li>
                    <li>Stay with person until help arrives</li>
                </ul>
            </div>

            <div class="hotline-card">
                <h4>🆘 Substance Use Crisis</h4>
                <div class="hotline-number">1-800-662-4357</div>
                <p><strong>SAMHSA National Helpline</strong></p>
                <p>Free, confidential support for substance use crisis, withdrawal, or addiction questions.</p>
                <ul>
                    <li>24/7 referral service</li>
                    <li>Treatment options</li>
                    <li>Emergency support</li>
                </ul>
            </div>

            <div class="hotline-card">
                <h4>💭 Mental Health in Recovery</h4>
                <div class="hotline-number">988</div>
                <p>Suicide & Crisis Lifeline for mental health support during recovery</p>
                <p>Depression, anxiety, cravings, relapse thoughts - call anytime.</p>
                <ul>
                    <li>Mental health crisis</li>
                    <li>Suicidal thoughts</li>
                    <li>Recovery support</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- When to Call -->
    <section class="crisis-section">
        <h2>When to Call a Crisis Hotline</h2>
        
        <div class="when-to-call">
            <h4>You might benefit from crisis support if you are:</h4>
            <ul>
                <li>Having thoughts of suicide or self-harm</li>
                <li>Experiencing severe anxiety, panic, or fear</li>
                <li>Feeling overwhelming sadness or depression</li>
                <li>In crisis due to substance use or withdrawal</li>
                <li>Struggling with cravings or thinking about relapse</li>
                <li>Experiencing domestic violence or abuse</li>
                <li>Dealing with grief or loss</li>
                <li>Feeling isolated or hopeless</li>
                <li>Struggling with identity or coming out</li>
                <li>Experiencing any emotional or mental health crisis</li>
            </ul>
        </div>

        <div class="info-box warning">
            <strong>⚠️ There's No "Right Reason" to Call</strong>
            <p>You don't need to be at rock bottom or in immediate danger. If you're struggling and need support, that's reason enough to call. Crisis counselors are there for any difficulty - don't minimize what you're experiencing.</p>
        </div>
    </section>

    <!-- How to Call -->
    <section class="crisis-section">
        <h2>Tips for Calling a Crisis Hotline</h2>
        
        <div class="how-to-call">
            <div class="call-tip">
                <h4>✓ Be Honest</h4>
                <p>Tell the counselor what you're really feeling and thinking. They've heard it all and won't judge you. The more you share, the better they can help.</p>
            </div>
            <div class="call-tip">
                <h4>✓ Take Your Time</h4>
                <p>There's no rush. Crisis counselors aren't on a timer. They're there to listen for as long as you need to talk. Take the time you need.</p>
            </div>
            <div class="call-tip">
                <h4>✓ It's Confidential</h4>
                <p>What you share is confidential (with rare exceptions like immediate danger). You can be completely honest without fear of consequences.</p>
            </div>
            <div class="call-tip">
                <h4>✓ Be Specific</h4>
                <p>Describe what's happening, how you feel, and what triggered the crisis. Specific details help counselors understand and provide better support.</p>
            </div>
            <div class="call-tip">
                <h4>✓ Ask for Referrals</h4>
                <p>Ask about local resources, treatment programs, support groups, or therapists. They have lists and connections to help you find ongoing support.</p>
            </div>
            <div class="call-tip">
                <h4>✓ It's OK to Call Again</h4>
                <p>If you're in crisis multiple times, keep calling. That's what the service is for. Regular callers are common and welcomed.</p>
            </div>
        </div>

        <div class="info-box success">
            <strong>✓ You Will Feel Better</strong>
            <p>Sometimes just talking to someone who understands and cares helps you feel less alone. Many people report that calling a crisis line helped them get through their darkest moments and find hope again.</p>
        </div>
    </section>

    <!-- Specific Populations -->
    <section class="crisis-section">
        <h2>Crisis Support for Specific Groups</h2>
        
        <h3>LGBTQ+ Youth & Adults:</h3>
        <ul>
            <li><strong>Trevor Project:</strong> 1-866-488-7386 - Crisis support for LGBTQ+ individuals (24/7)</li>
            <li><strong>Trans Lifeline:</strong> 877-565-8860 - Support for trans and non-binary people (24/7)</li>
        </ul>

        <h3>Veterans:</h3>
        <ul>
            <li><strong>Veterans Crisis Line:</strong> 988 then press 1 - Support for active duty & veterans (24/7)</li>
            <li><strong>Military Crisis Line:</strong> 1-800-273-8255 ext. 1 - For military members and families</li>
        </ul>

        <h3>Domestic Violence:</h3>
        <ul>
            <li><strong>National Domestic Violence Hotline:</strong> 1-800-799-7233 - Confidential support (24/7)</li>
            <li><strong>Text START to 88788:</strong> Anonymous text support for domestic violence</li>
        </ul>

        <h3>Sexual Assault:</h3>
        <ul>
            <li><strong>RAINN (Rape, Abuse & Incest National Network):</strong> 1-800-656-4673 (24/7)</li>
            <li><strong>Online Chat:</strong> Online.rainn.org for confidential chat support</li>
        </ul>

        <h3>Eating Disorders:</h3>
        <ul>
            <li><strong>National Eating Disorders Association:</strong> 1-800-931-2237 - Call or text (24/7)</li>
        </ul>
    </section>

    <!-- International Resources -->
    <section class="crisis-section">
        <h2>International Crisis Resources</h2>
        
        <div class="international-section">
            <h4>Crisis Lines by Country</h4>
            
            <div class="country-item">
                <strong>Canada</strong>
                <p>Crisis Text Line Canada: Text HOME to 741741<br/>1-833-456-4566 (Suicide Prevention Lifeline)</p>
            </div>
            
            <div class="country-item">
                <strong>United Kingdom</strong>
                <p>Samaritans: 116 123<br/>Crisis Text Line: Text SHOUT to 85258</p>
            </div>
            
            <div class="country-item">
                <strong>Australia</strong>
                <p>Lifeline: 13 11 14<br/>Text: 0477 13 11 14</p>
            </div>
            
            <div class="country-item">
                <strong>New Zealand</strong>
                <p>1 Nova: 1-737-669-6362<br/>Lifeline Aotearoa: 0800 543 354</p>
            </div>
            
            <div class="country-item">
                <strong>Ireland</strong>
                <p>Samaritans Ireland: 1800 247 247<br/>Text HELLO to 50808</p>
            </div>
            
            <div class="country-item">
                <strong>Other Countries</strong>
                <p>Befrienders International: www.befrienders.org (worldwide hotline directory)</p>
            </div>
        </div>
    </section>

    <!-- After You Call -->
    <section class="crisis-section">
        <h2>After You Call: Next Steps</h2>
        
        <h3>What Happens Next:</h3>
        <ul>
            <li><strong>You Make Choices:</strong> Crisis counselors won't force you to do anything. The plan is your choice</li>
            <li><strong>Safety First:</strong> If in danger, they may discuss safety planning or connecting you with emergency services</li>
            <li><strong>Resource Referral:</strong> They can provide local treatment, support groups, or therapists</li>
            <li><strong>Follow-Up:</strong> Some services will follow up; others help in the moment</li>
            <li><strong>Ongoing Support:</strong> One call doesn't solve everything - ongoing support is often needed</li>
        </ul>

        <h3>Building Long-Term Support:</h3>
        <ul>
            <li>Consider connecting with a therapist or counselor</li>
            <li>Join a support group for your specific struggle</li>
            <li>Tell trusted people in your life what you're going through</li>
            <li>Create a safety plan with coping strategies</li>
            <li>Keep crisis hotline numbers accessible for future use</li>
        </ul>

        <div class="info-box">
            <strong>💡 Crisis Calls Are Just the Beginning</strong>
            <p>Crisis hotlines provide immediate support, but long-term recovery often requires ongoing help. Use the resources they connect you to and don't hesitate to reach out again.</p>
        </div>
    </section>

    <!-- Disclaimer -->
    <section class="crisis-section disclaimer-section">
        <h2>⚠️ Important Information</h2>
        <p>Crisis hotlines provide immediate emotional support but are not a substitute for professional mental health or medical treatment. Information provided is for guidance only.</p>
        <ul>
            <li>In immediate life-threatening emergencies, always call 911</li>
            <li>Crisis lines complement but do not replace professional mental health care</li>
            <li>Always seek professional medical care for physical health emergencies</li>
            <li>Numbers and services may change - verify before calling</li>
            <li>You deserve professional help - don't rely only on crisis lines long-term</li>
        </ul>
        <p><strong>You matter. Your life has value. Help is available right now. Call 988 or 911.</strong></p>
    </section>
</div>
@endsection
