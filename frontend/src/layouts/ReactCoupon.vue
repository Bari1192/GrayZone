<script setup>
import { ref } from "vue";

// Props a kártyához és a szekció tartalmához
const props = defineProps({
  frontTitle: { type: String, required: true },
  backText: { type: String, required: true },
  icon: { type: String, default: "🎁" },
  details: { type: String, required: true },
  listItems: { type: Array, required: true },
});

const flipped = ref(false);
const isExpanded = ref(false);

// Handlers
const toggleFlip = () => {
  flipped.value = !flipped.value;
  if (flipped.value) {
    isExpanded.value = true;
  }
};

const toggleExpand = () => {
  isExpanded.value = !isExpanded.value;
  if (!isExpanded.value) {
    flipped.value = false;
  }
};
</script>

<template>
  <section class="bg-slate-900 py-14 px-4 rounded-xl shadow-lg">
    <!-- Main Grid -->
    <div
      class="flex flex-col lg:flex-row gap-8 items-center justify-between max-w-[1500px] mx-auto"
    >
      <!-- Left: Flipping Card -->
      <div
        class="flex-1 flex justify-center"
        @click="toggleFlip"
      >
        <div
          tabindex="0"
          role="button"
          :aria-pressed="flipped"
          class="kupon-perspective w-[180px] h-[260px] md:w-[220px] md:h-[300px] mx-auto cursor-pointer outline-none"
          :style="{
            transform: flipped
              ? 'rotateY(0deg) rotateZ(-6deg) scale(1.04)'
              : 'rotateY(-12deg) rotateZ(6deg) scale(1.03)',
            transition: 'transform 0.5s cubic-bezier(.46, .96, .72, 1.14)',
          }"
        >
          <div
            class="kupon-flip-container"
            :class="{ flipped }"
          >
            <!-- Front -->
            <div
              class="kupon-face kupon-front bg-orange-100"
            >
              <div class="flex flex-col items-center gap-3">
                <div
                  class="mt-1 px-2 py-1 border-orange-200 transition text-sm lg:text-xl text-orange-500 font-extrabold text-center"
                  style="font-family: Nunito;"
                >
                  90%-os kedvezmény
                </div>
                <div class="text-5xl mb-1">{{ icon }}</div>
                <div
                  class="font-bold text-lg text-center mb-1 uppercase tracking-wider"
                >
                  {{ frontTitle }}
                </div>
                <div
                  class="mt-1 px-2 py-1 bg-orange-300 border border-orange-200 transition text-sm text-slate-700 font-bold text-center rounded hover:bg-orange-400 hover:text-white hover:rounded-md"
                >
                  Kattints a részletekért!
                </div>
              </div>
            </div>
            <!-- Back -->
            <div class="kupon-face kupon-back">
              <div
                class="flex flex-col items-center gap-2 px-3 py-4"
              >
                <div
                  class="text-orange-500 font-bold text-lg mb-2 animate-pulse"
                >
                  {{ backText }}
                </div>
                <div
                  class="mt-2 text-base text-gray-800/90 font-medium text-center"
                >
                  🎉 Kódod használható!
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Text Content -->
      <div class="flex-1">
        <h2 class="text-2xl font-bold mb-4 text-orange-300">
          Szöveges CTA Tartalom
        </h2>
        <ul
          class="list-disc text-slate-300 pl-4 space-y-2 text-lg"
        >
          <li
            v-for="(item, index) in listItems"
            :key="index"
          >
            {{ item }}
          </li>
        </ul>
        <button
          @click="toggleExpand"
          class="mt-4 px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600"
        >
          Bővebben ▼
        </button>
      </div>
    </div>

    <!-- Expandable Section -->
    <div
      v-if="isExpanded"
      class="grid grid-cols-1 place-items-start transition-all duration-500 overflow-hidden max-w-[1400px] mx-auto mt-6 bg-slate-800/70 p-8 rounded-md"
    >
      <h3 class="text-xl font-semibold mb-4 text-orange-200">
        Részletes Tartalom
      </h3>
      <p class="text-slate-200 leading-6">
        {{ details }}
      </p>
    </div>
  </section>
</template>

<style scoped>
.kupon-perspective {
  perspective: 1000px;
  will-change: transform;
  user-select: none;
}

.kupon-flip-container {
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 1.2rem;
  border: 4px solid #fb923c;
  background: #fef3c7;
  transform-style: preserve-3d;
  box-shadow: 0 16px 42px rgba(245, 158, 11, 0.12), 0 2px 18px rgba(0, 0, 0, 0.04);
  transition: transform 0.5s cubic-bezier(.46, .96, .72, 1.14);
}

.kupon-flip-container.flipped {
  transform: rotateY(180deg);
}

.kupon-face {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  border-radius: 1.1rem;
  box-shadow: 0 8px 28px rgba(251, 146, 60, 0.04);
  display: flex;
  align-items: center;
  justify-content: center;
  backface-visibility: hidden;
  background: #fff;
}

.kupon-back {
  transform: rotateY(180deg);
}
</style>
