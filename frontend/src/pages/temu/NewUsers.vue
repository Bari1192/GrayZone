<script setup>
import BaseHeader from '@components/layout/BaseHeader.vue';
import BaseFooter from '@components/layout/BaseFooter.vue';
import DownloadApp from '@sections/NewUserPageSections/DownloadApp.vue';
import ApplyCoupons from '@sections/NewUserPageSections/ApplyCoupons.vue';
import PurchaseAndBuy from '@sections/NewUserPageSections/PurchaseAndBuy.vue';
import ExtraGift from '@sections/NewUserPageSections/ExtraGift.vue';
import FAQ from '@sections/NewUserPageSections/FAQ.vue';
</script>

<template>
    <BaseHeader />
    <div class="bg-slate-900 text-white py-12 md:py-20 lg:py-24 w-full min-h-screen mb-4 lg:mb-40 ">
        <div class="max-w-7xl lg:max-w-[1440px] mx-auto px-4 md:px-8 lg:px-12">

            <h1 class="text-3xl mb-14 leading-loose md:text-4xl lg:text-5xl font-extrabold text-orange-400 text-center tracking-wide"
                style="font-family: 'Nunito';">
                Temu Kedvezmények Így Spórolhatsz Az Első Vásárlásodon!
            </h1>

            <div class="w-11/12 mx-auto text-lg md:text-xl text-slate-300 mb-12 leading-relaxed space-y-4 text-justify">
                <p>Üdvözlünk a Temu online vásárlás világában, ahol az első lépések hatalmas megtakarításokat hozhatnak!
                </p>
                <p>Ez az útmutató lépésről lépésre végigvezet azon, hogyan érdemes kihasználni a Temu új felhasználók
                    számára kínált, akár <b>30-90%-os kedvezményeit</b>, <b>ingyenes szállítását</b>, és extra
                    <b>ajándékait</b>.
                </p>
                <p>
                    Célunk, hogy a lehető
                    legegyszerűbben juss hozzá a legnagyobb kuponcsomagokhoz és az alkalmazás letöltési bónuszhoz.
                </p>
            </div>

            <!-- Miért érdemes Temu kuponkódot használni az első vásárlásnál? Szekció -->
            <div class="bg-slate-800/70 p-6 md:p-8 lg:p-10 rounded-xl shadow-lg mb-12 border border-sky-300/40">
                <h2 class="text-2xl md:text-3xl font-bold text-orange-400 mb-6 border-b-4 border-orange-50/75 pb-3 w-fit"
                    style="font-family: 'Nunito';">
                    Miért érdemes Temu kuponkódot használni az első vásárlásnál?
                </h2>
                <p class="text-slate-200 mb-4 text-base md:text-lg lg:text-xl leading-loose tracking-wide">
                    A Temu rendkívül vonzó kedvezményekkel várja az új vásárlókat, de a maximális előnyök eléréséhez
                    kulcsfontosságú a megfelelő <b>kuponkód</b>, vagy <b>teljesen legális <i
                            class="text-amber-500">trükkök</i></b> használata. Egy jól megválasztott kód, mint például
                    az általunk
                    ajánlott, akár 110.000 Ft értékű kuponcsomagot is biztosíthat számodra, ami jelentősen csökkentheti
                    az első
                    rendelésed összegét.
                </p>
                <p class="text-slate-200 mb-4 text-base md:text-lg lg:text-xl leading-loose tracking-wide">
                    Az átlagos első vásárlás értéke jellemzően 14.500 Ft körül mozog, így könnyen belátható, hogy
                    mekkora
                    spórolási lehetőséget rejt ez a lépés. Ráadásul a mi kuponunk többször is felhasználható, így
                    nemcsak minket
                    támogatsz, hanem folyamatosan élvezheted az extra kedvezményeket.
                </p>
            </div>
            <div class="w-full bg-white/15 rounded-md px-2 py-4 mx-auto border-x-4 border-lime-400/75 mb-8">
                <div class="mx-auto h-full w-full m-auto text-2xl md:text-3xl lg:text-4xl font-bold text-lime-400 text-center"
                    style="font-family: 'Nunito';">
                    Lépésről lépésre – A Temu kedvezmények igénylése
                </div>
            </div>

            <DownloadApp />

            <ApplyCoupons />

            <PurchaseAndBuy/>

           <ExtraGift/>

            <FAQ/>

            <!-- Záró Üzenet -->
            <p class="w-11/12 mx-auto italic leading-relaxed text-lg md:text-xl text-slate-300 text-justify">
                Reméljük, hogy ez a részletes útmutató segítségedre lesz a Temu kedvezmények maximális kihasználásában!
                Jó
                vásárlást és spórolást kívánunk! Ne feledd, <a href="https://github.com/Bari1192/GrayZone" class="font-bold tracking-wider text-xl text-pink-400 underline underline-offset-4">GrayZone</a> célja,
                hogy <span class="tracking-wide text-white font-semibold">legális és
                etikus módon</span> segítsen neked kihozni a legtöbbet az online szolgáltatásokból.
            </p>

        </div>
    </div>
    <BaseFooter />
</template>

<style scoped>
body {
    font-family: 'Nunito', sans-serif;
}
</style>