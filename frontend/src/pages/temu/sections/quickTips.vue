<template>
    <router-link to="/temu/temuHome/DIY-home">
        <div class="card-container">
        <div class="bg-gray-800 rounded-lg p-6 flex items-center gap-4 transition-all duration-300 isolate
                hover:shadow-lg hover:shadow-pink-500/30 hover:translate-y-[-4px]">
                <div class="py-3 px-4 bg-pink-600/50 rounded-xl">
                    <span class="material-symbols-outlined">
                        scene
                    </span>
                </div>
                <p class="text-gray-300 font-semibold">Lakásberendezés Temu-ból, ezekre figyelj!</p>
            </div>
        </div>
    </router-link>
    <router-link to="/temu/temu-coupons">
        <div class="card-container">
        <div class="bg-gray-800 rounded-lg p-6 flex items-center gap-4 transition-all duration-300 isolate
                hover:shadow-lg hover:shadow-pink-500/30 hover:translate-y-[-4px]">
                <div class="py-3 px-4 bg-pink-600/50 rounded-xl">
                    <span class="material-symbols-outlined">
                        view_comfy_alt
                    </span>
                </div>
                <p class="text-gray-300 font-semibold">Melyik kedvezményt fogadjam el? Többet is lehet?</p>
            </div>
        </div>
    </router-link>
    <router-link to="/temu/temu-credits">
        <div class="bg-gray-800 rounded-lg p-6 flex items-center gap-4 transition-all duration-300 isolate
                hover:shadow-lg hover:shadow-pink-500/30 hover:translate-y-[-4px]">
            <div class="py-3 px-4 bg-pink-600/50 rounded-xl">
                <span class="material-symbols-outlined">
                    add_shopping_cart
                </span>
            </div>
            <p class="text-gray-300 font-semibold">Hol találom a kredit-visszatérítést? Ennyire el van rejtve?</p>
        </div>
    </router-link>
</template>

<style scoped>
.material-symbols-outlined {
    font-size: 40px;
}
</style>