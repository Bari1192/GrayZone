<template>
  <nav class="bg-slate-950 text-slate-100" :class="[
    { 'lg:fixed lg:top-0 lg:left-0 lg:right-0 lg:z-50 lg:shadow-lg': isScrolled },
    { 'relative': !isScrolled }
  ]">
    <div class="lg:w-full lg:flex mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center p-3 border-b-2">
      <!-- LOGO & HAMBURGER -->
      <div class="flex justify-center items-center w-full lg:w-auto">
        <RouterLink to="/" class="flex justify-start">
          <div class="flex flex-col items-center gap-2 ">
            <img src="../../assets/img/logos/GrayZone_logo.png" alt="GrayZone Logo"
              class="logo w-40 h-20 object-contain" />
            <div class="logo-text text-center">
              <p class="text-slate-700 dark:text-rose-400 sm:text-lg md:text-xl lg:mt-0 lg:text-xl 2xl:text-2xl">Life
                Hacks</p>
            </div>
          </div>
        </RouterLink>
        <!-- Hamburger lg ALATT! -->
        <button class="hambuger-menu lg:hidden ml-auto text-rose-500" @click="toggleMenu" aria-label="Menü megnyitása">
          <svg class="w-10 h-10 sm:w-11 sm:h-11 md:h-12 md:w-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
      </div>

      <!-- DESKTOP - LG-től!! -->
      <ul class="hidden lg:flex flex-1 flex-row flex-wrap justify-end items-center gap-4 w-full">

        <li class="nav-item">
          <RouterLink to="/temu/temu-tricks">
            <div class="nav-link temu_gradient">
              <i class="fas fa-tags mr-3"></i>
              <p class="temutricks">Temu Tricks</p>
            </div>
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink to="/temu/makeplans">
            <div class="nav-link secondary-gradient">
              <span class="material-symbols-outlined mr-3">
                add_notes
              </span>
              <p class="plantips">Make a plan</p>
            </div>
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink to="/news">
            <div class="nav-link tertiary-gradient">
              <span class="material-symbols-outlined mr-3">
                percent
              </span>
              <p class="errorfares">Coupons</p>
            </div>
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink to="/news1">
            <div class="nav-link-subtle">
              <span class="material-symbols-outlined mr-3">
                info
              </span>
              <p class="aboutus">About Us</p>
            </div>
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink to="/news2" class="info-link">
            <div class="nav-link-subtle">
              <i class="fas fa-users mr-3"></i>
              <p class="whoweare text-sm lg:text-lg 2xl:text-xl">Who We Are</p>
            </div>
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink to="/news3" class="info-link">
            <div class="nav-link-subtle">
              <span class="material-symbols-outlined mr-3">
                call
              </span>
              <p class="support text-sm lg:text-lg 2xl:text-xl">Support</p>
            </div>
          </RouterLink>
        </li>
        <!-- laptop -->
        <li class="nav-item">
          <RouterLink to="/news3">
            <div class="dashboard-icon">
              <span class="material-symbols-outlined">
                computer
              </span>
            </div>
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink to="/news">
            <button class="action-button">
              <i class="fa-solid fa-magnifying-glass mr-3 text-sm lg:text-lg 2xl:text-xl"></i>
              Show On News
            </button>
          </RouterLink>
        </li>
      </ul>

      <!-- MOBILE - csak lg alatt!!! -->
      <transition name="slide">
        <div v-if="menuOpen" class="fixed inset-0 z-50 flex justify-start">
          <div class="absolute inset-0 bg-slate-950/60" @click="toggleMenu"></div>
          <nav
            class="relative items-center w-64 max-w-full h-full p-4 flex flex-col gap-1 bg-slate-950 shadow-2xl mobile-nav z-50">
            <button class="ml-auto mb-4" @click="toggleMenu" aria-label="Bezárás">
              <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
            <ul class="nav-item-group">
              <li class="nav-item">
                <RouterLink to="/temu/temu-tricks" class="temutricks" @click="toggleMenu">
                  <div class="nav-link temu_gradient">
                    <i class="fas fa-tags mr-3"></i>
                    <p class="temutricks">Temu Tricks</p>
                  </div>
                </RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink to="/carsharings/carsharing" class="makeaplan" @click="toggleMenu">
                  <div class="nav-link secondary-gradient">
                    <span class="material-symbols-outlined mr-3">
                      add_notes
                    </span>
                    <p class="makeaplan">Make a plan</p>
                  </div>
                </RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink to="/news" class="errorfares" @click="toggleMenu">
                  <div class="nav-link tertiary-gradient">
                    <span class="material-symbols-outlined mr-3">
                      percent
                    </span>
                    <p class="errorfares">Coupons</p>
                  </div>
                </RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink to="/news1" class="aboutus" @click="toggleMenu">
                  <div class="nav-link-subtle">
                    <span class="material-symbols-outlined mr-3">
                      info
                    </span>
                    <p class="aboutus">About Us</p>
                  </div>
                </RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink to="/news2" class="whoweare" @click="toggleMenu">
                  <div class="nav-link-subtle">
                    <i class="fas fa-users mr-3"></i>
                    <p class="whoweare">Who We Are</p>
                  </div>
                </RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink to="/news3" class="support" @click="toggleMenu">
                  <div class="nav-link-subtle">
                    <i class="fas fa-headset mr-3"></i>
                    <p class="support">Support</p>
                  </div>
                </RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink to="/news" class="showonnews" @click="toggleMenu">
                  <button class="action-button">
                    <i class="fa-solid fa-magnifying-glass mr-3"></i>
                    Show On News
                  </button>
                </RouterLink>
              </li>
            </ul>
          </nav>
        </div>
      </transition>
    </div>
  </nav>
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue'
import { RouterLink } from 'vue-router'
import '@styles/HeaderStyle.css';

export default {
  components: { RouterLink },
  setup() {
    const menuOpen = ref(false)
    const isScrolled = ref(false)
    const toggleMenu = () => { menuOpen.value = !menuOpen.value }
    const handleScroll = () => { isScrolled.value = window.scrollY > 0 }
    onMounted(() => window.addEventListener('scroll', handleScroll))
    onUnmounted(() => window.removeEventListener('scroll', handleScroll))
    return { menuOpen, isScrolled, toggleMenu }
  }
}
</script>