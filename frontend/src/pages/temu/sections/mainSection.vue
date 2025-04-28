<template>
    <div v-for="section in mainSections" :key="section.id" 
      class="bg-gray-800/50 backdrop-blur-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105
            border border-gray-700 hover:border-pink-500 cursor-pointer"
      :class="{ 'border-pink-500': activeTab === section.id }"
      @click="activeTab = section.id"
    >
      <div>
        <div class="flex items-center gap-4 mb-4">
          <div class="p-3 bg-orange-500/70 rounded-xl">
            <i :class="section.icon"></i>
          </div>
          <h3 class="lg:text-xl font-bold">{{ section.title }}</h3>
        </div>
        
        <p class="text-gray-400 my-4 md:my-1 font-semibold md:min-h-[80px]">
          {{ section.description }}
        </p>
      </div>

      <!-- Tovább gomb -->
      <div class="flex items-center text-pink-500 tracking-wider italic group justify-end font-semibold">
        Tovább<i class="fas fa-chevron-right pl-2 group-hover:translate-x-2 transition-transform"></i>
      </div>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';
const activeTab = ref('discounts');
const mainSections = [
  {
    id: 'discounts',
    title: 'Kedvezmények felfedezése',
    icon: 'fas fa-gift fa-2x',
    description: 'Ismerd meg az összes elérhető kedvezményt és akciót'
  },
  {
    id: 'credits',
    title: 'Kredit-visszatérítés',
    icon: 'fas fa-credit-card fa-2x',
    description: '16.000 Ft kredit visszatérítés minden héten a vásárlásod után. Hogyan?'
  },
  {
    id: 'cart',
    title: 'Okos kosár összeállítás',
    icon: 'fas fa-shopping-cart fa-2x text-orange-100',
    description: 'Garantált visszatérítés titkai, amiket nem tudtál eddig!'
  }
]

// Emitting the active tab change for parent components if needed
const emit = defineEmits(['update:activeTab'])

// Watch for activeTab changes and emit the new value
watch(activeTab, (newValue) => {
  emit('update:activeTab', newValue)
})
</script>

<style scoped>
/* Add any component-specific styles here if needed */
</style>