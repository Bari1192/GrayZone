<template>
    <!-- LG-nél két oszlop, bal üres, jobb a content -->
    <div class="w-full h-full">
        <div class="grid w-full h-full ">
            <div
                class="flex flex-col mx-auto justify-center items-start bg-white/80 dark:bg-gray-900/40 rounded-xl shadow-lg p-8 ring-1 ring-gray-200 dark:ring-gray-800">
                <h2 class="text-2xl font-bold mb-6 not-italic text-gray-900 dark:text-gray-100">Regisztrációs promóciók
                    új felhasználóknak</h2>
                <div class="flex items-start mb-5" v-for="(promo, i) in promotions" :key="i">
                    <span :class="['flex-shrink-0 text-2xl mr-4', promo.iconColor]" aria-hidden="true">{{ promo.icon
                        }}</span>
                    <router-link to="" class="hover:bg-slate-500/50 hover:will-change-transform transition-all duration-300 rounded-lg  ease-out w-fit py-1">
                        <div class="font-semibold text-base leading-snug px-1">{{ promo.title }}</div>
                        <div v-if="promo.description" class="italic text-sm mt-1 text-gray-600 dark:text-gray-400 px-1">{{
                            promo.description }}</div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const promotions = [
    {
        icon: "👤",
        iconColor: "text-pink-400",
        title: "Új felhasználóknak szóló regisztrációs kedvezmények",
        description: "100 USD értékű kuponcsomag – Az app letöltésével akár 100 USD értékű kupont kapsz, amit később felhasználhatsz.",
    },
    {
        icon: "🚚",
        iconColor: "text-indigo-400",
        title: "Ingyenes szállítás – Kinek, mikor és milyen összeghatártól.",
        description: null,
    },
    {
        icon: "🔄",
        iconColor: "text-lime-400",
        title: "Rendszeresen elérhető promóciók és kuponok",
        description: null,
    },
    {
        icon: "🌞",
        iconColor: "text-yellow-300",
        title: "Időszakos, mennyiségi és szezonális kedvezmények",
        description: null,
    },
    {
        icon: "⏰",
        iconColor: "text-sky-300",
        title: "Limitált idejű kedvezmények",
        description: null,
    },
    {
        icon: "🧑‍💼",
        iconColor: "text-gray-900 dark:text-gray-100",
        title: "Ügyfélszolgálattól szerezhető kuponok",
        description: null,
    },
];
</script>