<?php

$pageTitle = "Home | Meeting Calendar";
$cssFile = './assets/css/style.css';
require_once COMPONENTS_PATH . '/templates/head.component.php';

?>
<main>
  <!-- Hero Section -->
  <section id="heroSection" class="hero-section">
    <div class="hero-content">
      <!-- Hero Image -->
      <div class="hero-image">
        <h1>Meeting Calendar</h1>
      </div>
      <!-- Hero Text -->
      <div class="hero-text">
        <h2>
          Set schedules and collaborate.
        </h2>
        <a id="getStartedBtn" href="" title="Click Here to Get Started">Get Started</a>
      </div>
    </div>
  </section>
  <!-- Explore Section -->

</main>

<?php
$jsFile = './assets/js/script.js';
require_once COMPONENTS_PATH . '/templates/footer.component.php';
require_once COMPONENTS_PATH . '/templates/foot.component.php';
?>