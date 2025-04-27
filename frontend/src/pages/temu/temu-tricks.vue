<template>
    <BaseHeader />
    <!-- Fő szekció -->
    <div class="min-h-screen bg-gray-900 text-white">
        <div class="relative overflow-hidden bg-gradient-to-br from-purple-900 via-pink-900 to-orange-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center" data-animate="hero" ref="heroSection">
                    <h1
                        class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-orange-400 to-yellow-500 bg-clip-text text-transparent">
                        Temu Tricks
                    </h1>
                    <div class="SporoljOkosan">
                        <p class=" text-2xl md:text-3xl  text-gray-200">
                            Spórolj okosan akár
                            <span class="font-semibold mx-2 text-purple-800">{{ formattedSavings }} Forintot</span>
                            vásárlásonként!
                        </p>
                    </div>
                    <button
                        class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-4 px-8 rounded-full 
              transition-all duration-300 transform hover:scale-105 flex items-center mx-auto gap-2 tracking-wider italic hover:cursor-pointer">
                        Fedezd fel a kedvezményeket!
                    </button>
                </div>
            </div>

            <!-- Dekoratív háttérelemek -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
                <div class="absolute w-64 h-64 rounded-full bg-pink-600/20 blur-3xl -top-10 -left-10"></div>
                <div class="absolute w-64 h-64 rounded-full bg-purple-600/20 blur-3xl top-40 right-10"></div>
            </div>
        </div>

        <!-- Fő szekciók -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid md:grid-cols-3 gap-8">
                <div v-for="section in mainSections" :key="section.id" class="bg-gray-800/50 backdrop-blur-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105
              border border-gray-700 hover:border-pink-500 cursor-pointer"
                    :class="{ 'border-pink-500': activeTab === section.id }" @click="activeTab = section.id">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-orange-500/70 rounded-xl">
                                <i :class="section.icon"></i>
                            </div>
                            <h3 class="lg:text-xl font-bold">{{ section.title }}</h3>
                        </div>
                        <p class="text-gray-400 my-4 md:my-1 font-semibold md:min-h-[80px]">{{ section.description }}
                        </p>
                    </div>

                    <!-- Tovább gomb -->
                    <div class="flex items-center text-pink-500 tracking-wider italic group justify-end font-semibold">
                        Tovább<i class="fas fa-chevron-right pl-2 group-hover:translate-x-2 transition-transform"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gyors tippek szekció -->
        <div class="bg-gray-800/30 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold mb-8 text-center"><i class="fa-solid fa-fire text-orange-700"></i>
                    Legfrissebb spórolási tippek <i class="fa-solid fa-fire text-orange-700"></i></h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div v-for="(tip, index) in quickTips" :key="index"
                        class="bg-gray-800 rounded-lg p-6 flex items-start gap-4 transform transition-all duration-300 hover:scale-105">
                        <div class="py-3 px-4 bg-pink-600/50 rounded-xl text-lg ">
                            <i :class="tip.icon"></i>
                        </div>
                        <p class="text-gray-300">{{ tip.text }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
            <div
                class="bg-gradient-to-r from-pink-900/50 to-purple-900/50 rounded-2xl p-12 backdrop-blur-lg border border-gray-700">
                <h2 class="text-4xl font-bold mb-6">Eljött a Te időd!</h2>
                <p class="text-xl text-gray-300 mb-8">Kövesd tippjeinket és hozd ki a vásárlásodból a legtöbbet!</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-4 px-8 rounded-full 
              transition-all duration-300 transform hover:scale-105 flex items-center justify-center gap-2">
                        Kedvezmények felfedezése
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import BaseHeader from '@components/layout/BaseHeader.vue';
const savings = ref(0)
const activeTab = ref('discounts')
const heroSection = ref(null)

const formattedSavings = computed(() => {
    return savings.value.toLocaleString()
})
// Cardok szekció és a hozzájuk tartozó szövegrészek elemei
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

// Sprórolási tippek szekció és tartalma
const quickTips = [
    {
        icon: 'fa-solid fa-house',
        text: 'Lakásberendezés Temu-ból, ezekre figyelj!'
    },
    {
        icon: 'fas fa-credit-card',
        text: 'Melyik kedvezményt fogadjam el? Többet is lehet?'
    },
    {
        icon: 'fas fa-clock',
        text: 'Hol találom a kredit-visszatérítést? Ennyire el van rejtve?'
    }
]
const startSavingsCounter = () => {
    const interval = setInterval(() => {
        if (savings.value < 16000) {
            savings.value += 100
        } else {
            clearInterval(interval)
        }
    }, 15)
}

const setupIntersectionObserver = () => {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up')
                }
            })
        },
        { threshold: 0.1 }
    )

    document.querySelectorAll('[data-animate]').forEach((el) => {
        observer.observe(el)
    })
}

onMounted(() => {
    startSavingsCounter()
    setupIntersectionObserver()
})
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Monoton&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Permanent+Marker&family=Rasa:ital,wght@0,300..700;1,300..700&family=Tourney:wght@100..900&display=swap');

.fade-in-up {
    animation: fadeInUp 0.6s ease-out forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.transition-all {
    transition: all 0.3s ease;
}
.hover\:scale-105:hover {
    transform: scale(1.05);
}
.backdrop-blur-lg {
    backdrop-filter: blur(16px);
}
.SporoljOkosan {
    font-family: 'Orbitron', sans-serif;
    color: white;
    min-width: fit-content;
    width: 65%;
    text-align: center;
    margin: auto;
    margin-bottom: 2rem;
    padding: 1rem;
    background: rgba(243, 140, 22, 0.8) !important;
    border-radius: 15px;
    border: 2px solid orange;
}
</style>