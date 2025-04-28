<template>
  <nav class="bg-slate-950 text-slate-100" :class="[
    { 'md:fixed md:top-0 md:left-0 md:right-0 md:z-50 md:shadow-lg': isScrolled },
    { 'relative': !isScrolled }
  ]">
    <div class="lg:w-full lg:flex mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center p-3 border-b-2">
      <button class="block lg:hidden ml-auto" @click="toggleMenu">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
        </button>

        <!-- Navigation Menu -->
        <div class="w-full lg:flex" :class="{ 'hidden': !menuOpen }">
          
          <div class="lg:w-1/4">
            <RouterLink to="/" class="flex items-center">
              <div class="flex flex-col items-center gap-2">
                <div class="w-full flex justify-center">
                  <img src="../../assets/img/logos/GrayZone_logo.png" alt="GrayZone Logo"
                    class="logo w-40 h-20 object-contain" />
                </div>
                <div class="logo-text text-center">
                  <p class="text-slate-700 dark:text-rose-400">Life Hacks</p>
                </div>
              </div>
            </RouterLink>
          </div>

          <ul class="flex flex-col lg:flex-row lg:flex-wrap lg:justify-end w-full gap-4">
            <!-- Desktop/Tablet View -->
            <div class="hidden lg:flex lg:flex-wrap lg:justify-end lg:items-center lg:gap-4 w-full">
              <!-- First Row (1024px - 1280px) -->
              <div class="flex flex-wrap items-center gap-4 order-1 xl:order-2">
                <li class="nav-item">
                  <RouterLink to="/news1">
                    <div class="nav-link-subtle">
                      <i class="fas fa-info-circle mr-2"></i>
                      <p class="aboutus">About Us</p>
                    </div>
                  </RouterLink>
                </li>
                <li class="nav-item">
                  <RouterLink to="/news2" class="info-link">
                    <div class="nav-link-subtle">
                      <i class="fas fa-users mr-2"></i>
                      <p class="whoweare">Who We Are</p>
                    </div>
                  </RouterLink>
                </li>
                <li class="nav-item">
                  <RouterLink to="/news3" class="info-link">
                    <div class="nav-link-subtle">
                      <i class="fas fa-headset mr-2"></i>
                      <p class="support">Support</p>
                    </div>
                  </RouterLink>
                </li>
                <li class="nav-item">
                  <RouterLink to="/news3">
                    <div class="dashboard-icon">
                      <i class="fa-solid fa-chalkboard"></i>
                    </div>
                  </RouterLink>
                </li>
                <li class="nav-item">
                  <RouterLink to="/news">
                    <button class="action-button">
                      <i class="fa-solid fa-magnifying-glass mr-2"></i>
                      Show On News
                    </button>
                  </RouterLink>
                </li>
              </div>

              <!-- Second Row (1024px - 1280px) -->
              <div class="flex flex-wrap items-center gap-4 order-2 xl:order-1">
                <li class="nav-item">
                  <RouterLink to="/temu/temu-tricks">
                    <div class="nav-link primary-gradient">
                      <i class="fas fa-tags mr-2"></i>
                      <p class="temutricks">Temu Tricks</p>
                    </div>
                  </RouterLink>
                </li>
                <li class="nav-item">
                  <RouterLink to="/carsharings">
                    <div class="nav-link secondary-gradient">
                      <i class="fas fa-car mr-2"></i>
                      <p class="carsharingtips">Carsharing Tips</p>
                    </div>
                  </RouterLink>
                </li>
                <li class="nav-item">
                  <RouterLink to="/news">
                    <div class="nav-link tertiary-gradient">
                      <i class="fas fa-plane mr-2"></i>
                      <p class="errorfares">Error Fares</p>
                    </div>
                  </RouterLink>
                </li>

              </div>
            </div>

            <!-- Mobile Menu -->
            <div class="lg:hidden flex flex-col space-y-4">
              <!-- Mobile menu items -->

              <li class="nav-item max-w-fit">
                <RouterLink to="/news">
                  <div class="nav-link tertiary-gradient">
                    <i class="fas fa-plane mr-2"></i>
                    <p class="errorfares">Error Fares</p>
                  </div>
                </RouterLink>
              </li>

              <li class="nav-item max-w-fit">
                <RouterLink to="/news1">
                  <div class="nav-link-subtle">
                    <i class="fas fa-info-circle mr-2"></i>
                    <p class="aboutus">About Us</p>
                  </div>
                </RouterLink>
              </li>

              <li class="nav-item max-w-fit">

                <RouterLink to="/news2" class="info-link">
                  <div class="nav-link-subtle">
                    <i class="fas fa-users mr-2"></i>
                    <p class="whoweare">Who We Are</p>
                  </div>
                </RouterLink>
              </li>
              <li class="nav-item max-w-fit">
                <RouterLink to="/news3" class="info-link">
                  <div class="nav-link-subtle">
                    <i class="fas fa-headset mr-2"></i>
                    <p class="support">Support</p>
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

            </div>
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

<style scoped>
@media (min-width: 1280px) {
  ul>div {
    flex-direction: row;
    flex-wrap: nowrap;
  }
}

@media (min-width: 768px) and (max-width: 1279px) {
  ul>div {
    justify-content: flex-end;
    width: 100%;
  }

  .nav-item {
    margin: 0.25rem 0;
  }
}
</style>