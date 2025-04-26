<template>
  <BaseHeader />
  <div class="main bg-slate-950 min-h-svh">
    <div class="min-h-[screen] w-full mx-auto dark:text-white">
      <div id="welcome" class="h-[125svh] w-full flex mx-auto justify-center dark:text-white">

        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Russo+One&display=swap"
          rel="stylesheet">
        <div class="welcome-text-first mt-10 w-full mx-auto flex flex-col items-center relative">
          <!-- Első sor -->
          <div class="text-container relative">
            <p class="hero-text-top">
              Outsmart the Market
            </p>
            <div class="glow-line"></div>
          </div>

          <!-- Második sor -->
          <div class="welcome-text-second mt-4">
            <p class="hero-text-bottom">
              Not Your Budget
            </p>
          </div>

          <!-- Elválasztó vonal -->
          <div class="separator my-12"></div>

          <!-- CTA Gomb szekció az animált nyíllal -->
          <div class="cta-container relative">
            <div class="animated-arrow">
              <i class="fa-solid fa-arrow-right"></i>
            </div>
            <button class="cta-button font-semibold">
              <i class="fa-solid fa-magnifying-glass mr-2"></i>
              Check GrayZone Tips
            </button>
            <div class="animated-arrow-right">
              <i class="fa-solid fa-arrow-left"></i>
            </div>
          </div>
        </div>
        <!-- <section class="hero-section bg-slate-900">
          <div class="container mx-auto px-4">
            <div class="flex flex-col items-center">
              <h1 class="text-4xl md:text-6xl font-bold text-white">
                TEMU TIPPEK ÉS TRÜKKÖK
              </h1>
              <p class="text-slate-500 mt-4">
                Spórolj okosan a Temu-n
              </p>
              <button class="bg-[#ff4f00] hover:bg-[#ff6b2b] text-white px-8 py-3 mt-8 rounded-lg">
                Fedezd fel a lehetőségeket
              </button>
            </div>
          </div>
        </section> -->

      </div>
    </div>
  </div>
</template>

<script setup>
import BaseHeader from '@components/layout/BaseHeader.vue';
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Monoton&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Permanent+Marker&family=Rasa:ital,wght@0,300..700;1,300..700&family=Tourney:wght@100..900&display=swap');

#welcome {
  background-image: url('../assets/img/main/gray-zone-MainPageBanner.webp');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  /* height: 2000px; */
}
.text-container {
  perspective: 1000px;
}

.hero-text-top {
  font-family: 'Russo One', sans-serif;
  font-size: 4.5rem;
  color: white;
  text-shadow: 0 0 10px rgba(255,255,255,0.3);
  padding: 1rem 2rem;
  background: rgba(255,255,255,0.05);
  border-radius: 15px;
  backdrop-filter: blur(5px);
  transform: rotateX(5deg);
  transition: transform 0.3s ease;
}

.hero-text-top:hover {
  transform: rotateX(0deg);
}

.hero-text-bottom {
  font-family: 'Orbitron', sans-serif;
  font-size: 3rem;
  margin-top: 2rem;
  font-weight: 700;
  background: linear-gradient(45deg, #f63636, #f47676, #f63636);
  color: gainsboro;
border-radius: 2rem;
 padding: 0 2rem; 
  text-shadow: 2px 2px 4px rgba(255,79,79,0.3);
}

.glow-line {
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #fff, transparent);
  animation: glow 2s infinite;
}

.separator {
  width: 20%;
  height: 4px;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
  border-radius: 2px;
}

.cta-button {
  padding: .7rem 1.5rem;
  font-size: 1.2rem;
  background: linear-gradient(180deg, #720b0b, #d05757,#720b0b);
  border: 2px solid #e26d24aa;
  color: white;
  border-radius: 30px;
  transition: transform 0.5s ease, box-shadow 0.5s ease;
  box-shadow: 0 4px 15px rgba(255,79,79,0.3);
}

.cta-button:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(255,79,79,0.4);
}

.animated-arrow {
  position: absolute;
  right: 107%;
  top: 50%;
  transform: translateY(-50%);
  color: white;
  font-size: 1.9rem;
  animation: bounceArrowLeft 1.5s infinite;
}

.animated-arrow-right {
  position: absolute;
  left: 107%; 
  top: 50%;
  transform: translateY(-50%);
  color: white;
  font-size: 1.9rem;
  animation: bounceArrowRight 1.5s infinite;
}

@keyframes glow {
  0%, 100% { opacity: 0.3; }
  50% { opacity: 1; }
}

@keyframes bounceArrowLeft {
  0%, 100% { transform: translateX(0) translateY(-50%); }
  50% { transform: translateX(10px) translateY(-50%); }
}

@keyframes bounceArrowRight {
  0%, 100% { transform: translateX(0) translateY(-50%); }
  50% { transform: translateX(-10px) translateY(-50%); }  
}


/* Reszponzív beállítások */
@media (max-width: 768px) {
  .hero-text-top { font-size: 3rem; }
  .hero-text-bottom { font-size: 3.5rem; }
  .separator { width: 40%; }
}
</style>