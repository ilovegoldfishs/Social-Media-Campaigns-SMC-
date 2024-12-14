<?php
include('DBConnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How Parents Can Help: Supporting Healthy Teen Social Media Use</title>
    <link rel="stylesheet" href="UserStyles.css?i=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
     <!---Nav Bar---->
   <?php include('MemberNav.php') ?>
    <main class="help-container main-content">
        <aside class="help-aside">
        <h2>Table of Contents</h2>
            <nav class="toc">
                <ul>
                    <li><a href="#understanding">Understanding the Impact</a></li>
                    <li><a href="#tips">Top Tips for Parents</a></li>
                    <li><a href="#warning-signs">Recognizing Warning Signs</a></li>
                    <li><a href="#positive-use">Promoting Positive Use</a></li>
                    <li><a href="#communication">Effective Communication</a></li>
                    <li><a href="#resources">Additional Resources</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </nav>
        </aside>

        <div id="understanding" class="content">
            <section class="content-section">
                <h2>Understanding the Impact of Social Media on Teens</h2>
                <div class="help-image-container">
                    <img src="../image/mobile.jpg" alt="Teens using social media">
                </div>
                <p>Social media plays a significant role in the lives of today's teenagers. While it offers many benefits, such as connecting with friends and accessing information, it also presents challenges. As parents, understanding and guiding your teen's social media use is crucial for their well-being and development.</p>
            </section>

            <section id="tips">
                <h2>Top Tips for Parents</h2>
                <div class="grid">
                    <div class="card">
                        <h3>Educate Yourself</h3>
                        <p>Stay informed about the latest social media platforms and trends.</p>
                    </div>
                    <div class="card">
                        <h3>Set Clear Guidelines</h3>
                        <p>Establish rules about screen time, appropriate content, and online behavior.</p>
                    </div>
                    <div class="card">
                        <h3>Foster Open Communication</h3>
                        <p>Create a safe space for your teen to discuss their online experiences.</p>
                    </div>
                    <div class="card">
                        <h3>Lead by Example</h3>
                        <p>Model healthy social media habits and be mindful of your own screen time.</p>
                    </div>
                </div>
            </section>


            <div id="warning-signs" class="card">
                <h2>Recognizing Warning Signs</h2>
                <p>Be alert to potential issues related to social media use, such as:</p>
                <ul>
                    <li>Significant changes in mood or behavior</li>
                    <li>Decreased interest in face-to-face interactions</li>
                    <li>Neglecting schoolwork or other responsibilities</li>
                    <li>Signs of cyberbullying or online harassment</li>
                    <li>Excessive secrecy about online activities</li>
                </ul>
                <p>If you notice these signs, it's important to address them promptly and seek professional help if needed.</p>
            </div>


            <section id="positive-use" class="card">
                <h2>Promoting Positive Social Media Use</h2>
                <div class="help-image-container">
                    <img src="../Image/social-media-positive.png" alt="Positive social media use">
                </div>
                <p>Encourage your teen to use social media in positive ways:</p>
                <ul>
                    <li>Connecting with friends and family</li>
                    <li>Exploring educational content and learning opportunities</li>
                    <li>Engaging in social causes and community service</li>
                    <li>Expressing creativity through art, music, or writing</li>
                    <li>Building skills for future careers (e.g., digital marketing, content creation)</li>
                </ul>
            </section>

            <section id="communication">
                <h2>Effective Communication Strategies</h2>
                <div class="grid">
                    <div class="card">
                        <h3>Active Listening</h3>
                        <p>Practice active listening when your teen talks about their online experiences. Show genuine interest and avoid interrupting or judging.</p>
                    </div>
                    <div class="card">
                        <h3>Open-Ended Questions</h3>
                        <p>Ask open-ended questions to encourage deeper conversations about social media use and its impact on their life.</p>
                    </div>
                    <div class="card">
                        <h3>Share Your Own Experiences</h3>
                        <p>Share your own experiences with social media, including challenges you've faced, to create a relatable dialogue.</p>
                    </div>
                    <div class="card">
                        <h3>Regular Check-Ins</h3>
                        <p>Schedule regular check-ins to discuss social media use and any concerns that may arise. Make it a normal part of your routine.</p>
                    </div>
                </div>
            </section>

            <section id="resources">
                <h2>Additional Resources</h2>
                <div class="card">
                    <h3>Helpful Links for Parents</h3>
                    <ul>
                        <li><a href="#">Common Sense Media: Social Media Resources</a></li>
                        <li><a href="#">National Cyber Security Alliance: Raising Digital Citizens</a></li>
                        <li><a href="#">American Academy of Pediatrics: Social Media and Children</a></li>
                    </ul>
                </div>
            </section>

            <section id="faq">
                <h2>Frequently Asked Questions</h2>
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">What age should I allow my child to use social media?</div>
                        <div class="accordion-content">
                            <p>Most social media platforms require users to be at least 13 years old. However, the right age can vary depending on your child's maturity level. It's important to consider your child's ability to understand online risks and handle social interactions responsibly.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">How much screen time is too much for teenagers?</div>
                        <div class="accordion-content">
                            <p>The American Academy of Pediatrics suggests that parents set consistent limits on screen time. For teens, it's important to ensure that screen time doesn't interfere with other important activities like sleep, physical activity, and face-to-face interactions. A good rule of thumb is to aim for a balance between online and offline activities.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">How can I protect my teen from cyberbullying?</div>
                        <div class="accordion-content">
                            <p>Educate your teen about cyberbullying and encourage them to talk to you if they experience or witness it. Teach them how to use privacy settings, block or report abusive users, and not to engage with bullies. Maintain open communication and monitor their online activities while respecting their privacy.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cta">
                <h2>Stay Involved in Your Teen's Digital Life</h2>
                <p>Your guidance and support are crucial in helping your teen navigate the digital world safely and responsibly.</p>
                <a href="#" class="parent-button">Download Our Parent's Guide to Social Media</a>
            </section>
        </div>
    </main>

    <!---Footer Bar---->
    <?php include('MemberFooter.php') ?>

    <script>
        // Simple accordion functionality
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                header.parentElement.classList.toggle('active');
            });
        });
    </script>
</body>

</html>