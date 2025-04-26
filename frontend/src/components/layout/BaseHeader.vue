<template>
  <nav class="bg-slate-950 text-slate-100" :class="[
      {'md:fixed md:top-0 md:left-0 md:right-0 md:z-50 md:shadow-lg': isScrolled},
      {'relative': !isScrolled}
    ]"
  >
    <div class="flex justify-between p-3 border-b-2 flex-wrap">
      <RouterLink to="/" class="flex flex-col items-center">
        <div class="flex flex-col items-center gap-2">
          <div class="w-full flex justify-center">
            <img src="../../assets/img/logos/GrayZone_logo.png" alt="GrayZone Logo" class="w-40 h-20 object-contain" />
          </div>
          <div class="logo-text text-center">
            <p class="text-slate-700 dark:text-rose-400 text-3xl">
              Life Hacks
            </p>
          </div>
        </div>
      </RouterLink>

      <button class="block md:hidden" @click="toggleMenu">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
      <div class="w-full md:flex md:my-auto md:w-auto" :class="{ hidden: !menuOpen }">
        <ul class="flex flex-col md:flex-row md:p-0 md:space-x-6 items-center">
          <li class="nav-item">
            <RouterLink to="/temu-hacks">
              <div class="nav-link primary-gradient">
                <i class="fas fa-tags mr-2"></i>
                Temu Tricks
              </div>
            </RouterLink>
          </li>

          <li class="nav-item">
            <RouterLink to="/carsharings">
              <div class="nav-link secondary-gradient">
                <i class="fas fa-car mr-2"></i>
                Carsharing Tips
              </div>
            </RouterLink>
          </li>

          <li class="nav-item">
            <RouterLink to="/news">
              <div class="nav-link tertiary-gradient">
                <i class="fas fa-plane mr-2"></i>
                Error Fares
              </div>
            </RouterLink>
          </li>

          <li class="nav-item">
            <RouterLink to="/news1">
              <div class="nav-link-subtle">
                <i class="fas fa-info-circle mr-2"></i>
                About Us
              </div>
            </RouterLink>
          </li>

          <li class="nav-item">

            <RouterLink to="/news2" class="info-link">
              <div class="nav-link-subtle">
                <i class="fas fa-users mr-2"></i>
                Who We Are
              </div>
            </RouterLink>
          </li>
          <li class="nav-item">

            <RouterLink to="/news3" class="info-link">
              <div class="nav-link-subtle">
                <i class="fas fa-headset mr-2"></i>
                Support
              </div>
            </RouterLink>
          </li>

          <li class="nav-item ml-auto">
            <RouterLink to="/news">
              <button class="action-button">
                <i class="fa-solid fa-magnifying-glass mr-2"></i>
                Show On News
              </button>
            </RouterLink>
          </li>

          <li class="nav-item">
            <RouterLink to="/news3">
              <div class="dashboard-icon">
                <i class="fa-solid fa-chalkboard"></i>
              </div>
            </RouterLink>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>

import { RouterLink } from 'vue-router'
import '@styles/HeaderStyle.css'

export default {
  data() {
    return {
      menuOpen: false
    }
  },
  methods: {
    toggleMenu() {
      this.menuOpen = !this.menuOpen
    }
  }
}
</script>
<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const isScrolled = ref(false);

const handleScroll = () => {
  isScrolled.value = window.scrollY > 0;
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>