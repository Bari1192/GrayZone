<script setup>
import BaseHeader from '@components/layout/BaseHeader.vue';
import BaseFooter from '@components/layout/BaseFooter.vue';
import BrighterSection from '@layouts/BrighterSection.vue';
import DarkerSection from '@layouts/DarkerSection.vue';
import ModelViewer from '@assets/HouseModels/ModelViewer.vue'
import SupportViewer from '@pages/temu/sections/temu-coupons/SupportViewer.vue';

import { RouterLink } from 'vue-router';
import { ref } from 'vue';
const summaryItems = ref([
    {
        id: 1,
        title: 'Új felhasználóknak',
        desc: "30-90%-os kedvezmények az első vásárlásra? Ajándék termék a vásárlásod mellé?",
        icon: 'person_add',
        linktopage: '/temu/sections/new-users'
    },
    {
        id: 2,
        title: 'Ingyenes Szállítás',
        desc: "Extra ingyenes szállítási kupon? Új és már regisztrált felhasználóknak is, egyaránt?",
        icon: "delivery_truck_speed",
        linktopage: '/temu/sections/delivery-coupons'
    },
    {
        id: 3,
        title: 'Promóciós Kuponok',
        desc: 'Érdekel, hogy milyen kuponokat rejt a Temu? A folyamatosan frissülő kuponokat gyűjtjük össze, hogy neked már ne kelljen. ',
        icon: "shoppingmode",
        linktopage: '/temu/sections/promo-coupons'
    },
    {
        id: 4,
        title: 'Villám Akciók',
        desc: "Limitált idejű, korlátozott ajánlatok? Nem ér meglepetésként ha megmutatjuk, mire számíthatsz!",
        icon: "electric_bolt",
        linktopage: '/temu/sections/flash-deal-coupons'
    },
    {
        id: 5,
        title: 'Szezonális Promóciók',
        desc: "Black Friday, karácsony, vagy nyári akciók? Mutatjuk, mennyire csábít a felhozatal, már most!",
        icon: "beach_access",
        linktopage: '/temu/sections/seasonal-coupons'
    },
    {
        id: 6,
        title: 'Ügyfélszolgálat-Trükkök',
        desc: 'Már a Temu is AI-támogatással dolgozik, de tudtad, hogy akár kuponokat is kiállíthatsz magadnak vele? Mutatjuk!',
        icon: "headphones",
        linktopage: '/temu/sections/support-coupons'
    }
])

const slider = ref(null)
const scroll = dir => {
    slider.value.scrollBy({ left: dir * slider.value.clientWidth * 0.8, behavior: 'smooth' })
}
</script>

<template>
    <BaseHeader />
    <SupportViewer src="/support.glb" />

    <div class="welcome-text-first mt-10 w-full mx-auto flex flex-col items-center relative"
        style="font-family: 'Nunito','Arial';">

        <div class="text-container relative Outsmart text-white">
            <p>
                Temu Kuponok &amp; Visszatérítések
            </p>
            <div class="glow-line"></div>
        </div>
        <p class="text-slate-200 mt-4 text-lg font-semibold italic">
            Spórolj Professzionálisan!
        </p>
    </div>

    <div class="flex w-full md:min-h-[70svh] m-auto align-middle">
        <div class="w-10/12 m-auto bg-gradient-to-r from-transparent via-slate-800 to-transparent slate-800">
            <section class="mx-auto w-full">
                <h2 class="text-3xl font-extrabold text-white mb-12 pt-4 tracking-wide text-center">
                    Felkapott Témakörök
                </h2>
                <div class="relative px-2">

                    <button @click="scroll(-1)" class="absolute -left-10 top-1/2 -translate-y-1/2">
                        <span
                            class="material-symbols-outlined p-1.5 bg-orange-400 text-slate-900 rounded-full shadow hover:bg-orange-500
                        transition-colors duration-150 ease-linear hover:text-slate-100 hover:shadow-inner hover:shadow-orange-400"
                            style="font-size: 40px; font-weight:900;">
                            keyboard_double_arrow_left
                        </span>
                    </button>
                    <div ref="slider" class="mx-8 pb-6 flex overflow-x-hidden space-x-6 px-4">
                        <RouterLink v-for="item in summaryItems" :key="item.id" :to="item.link"
                            class="flex-none w-64 sm:w-72 md:w-80 h-60 bg-gray-50 rounded-lg border border-gray-200 snap-start hover:bg-gray-100 transition p-4 flex flex-col">
                            <!-- 1. sor: ikon + cím -->
                            <div class="flex items-center space-x-4 px-4 py-2 rounded-md bg-orange-400/20">
                                <span class="material-symbols-outlined material-symbols--fixed text-orange-500">
                                    {{ item.icon }}
                                </span>
                                <h3 class="text-lg font-semibold text-slate-900">{{ item.title }}</h3>
                            </div>
                            <!-- 2. sor: leírás -->
                            <p class="text-gray-600 text-md mt-2 p-2 font-semibold flex-1">
                                {{ item.desc }}
                            </p>
                            <!-- 3. sor: CTA gomb -->
                            <div class="flex justify-end w-full">
                                <button
                                    class="mt-4 bg-orange-500 text-slate-100 px-2 py-1 rounded-lg text-lg font-medium hover:bg-orange-600 transition">
                                    Megnézem
                                </button>
                            </div>
                        </RouterLink>
                    </div>
                    <button @click="scroll(1)" class="absolute -right-10 top-1/2 -translate-y-1/2">
                        <span
                            class="material-symbols-outlined p-1.5 bg-orange-400 text-slate-900 rounded-full shadow hover:bg-orange-500
                        transition-colors duration-150 ease-linear hover:text-slate-100 hover:shadow-inner hover:shadow-orange-400"
                            style="font-size: 40px; font-weight:900;">
                            keyboard_double_arrow_right
                        </span>
                    </button>
                </div>
            </section>
        </div>
    </div>



    <BrighterSection :listItems="['Új Felhasználói Kedvezmények', 'Minimum 30-90%-os kedvezmények az első vásárlásra.', 'Választott termék ajándék a vásárlásod mellé.',
        'Ingyenes szállítás első rendeléshez', 'Alkalmazás letöltési bónusz, akár további $20 kedvezményér',]"
        :frontTitle="'Új felhasználóknak'" :TitleDiscountPercent="'90%-os kedvezmény'"
        :backText="'Ezek a kedvezmények csak új felhasználók számára érhetők el, ezért érdemes rögtön kihasználni!'"
        :title_CTA="'Új felhasználóknak szóló regisztrációs kedvezmények'" :linktopage="'NewUsers'">
        <div class="mx-auto lg:space-y-2 text-lg">
            <p class="flex items-center">
                <span class="text-lime-500 mr-2 lg:mr-4">
                    <i class="fa-solid fa-gem"></i>
                </span>
                <span>Ha először vásárolsz a Temun, <span class="font-bold text-pink-500">30%-tól 90%-ig</span> kaphatsz
                    kedvezményt az első rendelésedre! Az átlagos első vásárlás értéke jellemzően <span
                        class="font-semibold text-orange-500">~39 dollár</span> (kb. 14.500 Ft) körül mozog.</span>
            </p>
            <p class="flex items-center">
                <span class="text-pink-400 mr-2 lg:mr-4">
                    <i class="fa-solid fa-ticket"></i>
                </span>
                <span>Egyes promóciós kódokkal – például az <span
                        class="font-mono bg-yellow-100 px-2 py-0.5 rounded border border-dotted border-yellow-300 text-orange-600">'[SAJÁTOM]'</span>
                    kóddal – akár <b class="text-rose-600 font-bold">110.000 Forint értékű kupon csomaghoz</b> is
                    hozzáférhetsz.</span>
            </p>
            <p class="flex items-center">
                <span class="text-orange-400 mr-2 lg:mr-4">
                    <i class="fa-solid fa-hands-helping"></i>
                </span>
                <span>Sőt, <b>ha a mi kuponunkat használod</b>, azzal nemcsak minket támogatsz – <b
                        class="text-lime-600 font-bold">Te is jól jársz!</b></span>
            </p>
            <p class="flex items-center">
                <span class="text-indigo-400 mr-2 lg:mr-4">
                    <i class="fa-solid fa-redo-alt"></i>
                </span>
                <span>Többször is felhasználhatod a kuponkódot, így támogatod a munkánkat
                    <span class="font-semibold text-orange-600">és folyamatosan élvezheted az extra
                        kedvezményeket!</span></span>
            </p>
            <div
                class="mx-8 my-2 px-3 py-2 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-900 font-semibold rounded">
                <i class="fa-solid fa-gift mr-2 text-yellow-600"></i>
                <b>Instant kupon trükk:</b> Első rendelésednél mindig érdemes kuponkódot használni, így garantált
                kuponokhoz juthatsz – próbáld ki most!
            </div>
        </div>
    </BrighterSection>

    <DarkerSection :listItems="[
        'Új és Meglévő Felhasználóknak egyaránt elérhető',
        'Minimum vásárlási összeg elérése szükséges.',
        'Extra szállítási kupon esetén a min. összeg alatt is elérhető.']" :frontTitle="'Mindenkinek!'"
        :TitleDiscountPercent="'Ingyenes szállítás'" :backText="'Új és Meglévő felhasználók számára egyaránt!'"
        :title_CTA="'Ingyenes szállítás – Kinek, mikor és milyen összeghatártól?'" :icon="'📦'"
        :linktopage="'DeliveryCoupons'">
        <div class="mx-auto lg:space-y-2 text-lg">
            <p class="flex items-center">
                <span class="text-lime-500 mr-2 lg:mr-4">
                    <i class="fa-solid fa-truck"></i>
                </span>
                <span>
                    A házhozszállítás <span class="font-semibold text-lime-600">legtöbbször <b>0 Ft</b></span>, ha
                    eléred
                    a minimális vásárlási összeget – <span class="font-bold text-pink-500">szállítási költség
                        trükk</span>.
                </span>
            </p>
            <p class="flex items-center">
                <span class="text-indigo-400 mr-2 lg:mr-4">
                    <i class="fa-solid fa-coins"></i>
                </span>
                <span>
                    Ez az összeg jellemzően <span class="font-semibold text-orange-500">7.000 - 8.000 Forint</span>
                    minimális rendelési értéktől érvényes, így okosan tervezve szinte mindig <span
                        class="font-bold">ingyenes szállításhoz</span> juthatsz hozzá!
                </span>
            </p>
            <div
                class="mx-8 my-2 px-3 py-2 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-900 font-semibold rounded">
                <i class="fa-solid fa-triangle-exclamation mr-2 text-yellow-600"></i>
                <b>Fontos:</b> A legtöbb kereskedő a <b>Temu-n</b> minimum rendelési összeget ír elő az ingyenes
                szállítás igénybe vételéhez. Ugyanakkor ha a kosarad értéke eléri a korábban említett össz értéket, úgy
                <u class="underline-offset-2 font-bold italic">ingyenessé válik a teljes házhozszállítás</u>.
            </div>
        </div>
    </DarkerSection>

    <BrighterSection :listItems="['Aktuális ajánlatok folyamatos keresése? Bízd ránk inkább!',
        'Vásárlás és megtakarítás egyben kombinálva?',
        'Egyszerűen beváltható kuponok a vásárlási folyamatban?',
        'Mutatjuk is, hogyan lehetséges mindez!'
    ]" :title_CTA="'Rendszeresen elérhető promóciók és kuponok'" :TitleDiscountPercent="'Promóciós Kuponok'"
        :frontTitle="'Mindenkinek'" :backText="'Új és Meglévő felhasználók számára egyaránt!'" :icon="'📢'"
        :linktopage="'PromoCoupons'">
        <div class="mx-auto lg:space-y-2 text-lg">
            <p class="flex items-center">
                <span class="text-yellow-400 mr-2 lg:mr-4">
                    <i class="fa-solid fa-rotate fa-sync-alt"></i>
                </span>
                <span>Folyamatosan frissítjük oldalunkat, hogy a Temu ajánlataival mindig naprakész maradj, és elérd a
                    legjobb
                    <span class="font-semibold text-rose-500">kuponokat</span> és akciókat!
                    A a kedvezmények gyakran változnak, ezért <span class="font-bold text-orange-500">érdemes
                        rendszeresen ellátogatnod</span> a Temu Főoldalára, ahol az aktuális promóciókat megtalálod.
                </span>
            </p>
            <p class="flex items-center">
                <span class="text-pink-400mr-2 lg:mr-4">
                    <i class="fa-solid fa-tag text-red-500"></i>
                </span>
                Ne feledd: minden egyes kupon új lehetőség, hogy <span class="font-bold text-lime-600">extra
                    megtakarítást</span> érj el, miközben élvezed a vásárlás örömét!
            </p>
            <p class="flex items-center">
                <span class="text-orange-400 mr-2 lg:mr-4">
                    <i class="fa-solid fa-clock"></i>
                </span>
                A Temu rendszeresen kínál <span class="font-semibold">időszakos promóciókat</span>, amelyek általában a
                főoldalon kapnak kiemelést.
            </p>

            <div
                class="mx-8 my-2 px-3 py-2 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-900 font-semibold rounded">
                <i class="fa-solid fa-triangle-exclamation mr-2 text-yellow-600"></i>
                <b>Fontos:</b> Az aktuális kuponokat, instant megtakarítás és szállítási akciókat mindig ellenőrizd a
                főoldalon, hiszen az ajánlatok gyorsan cserélődnek!
            </div>
        </div>

    </BrighterSection>

    <DarkerSection :listItems="[
        'Egyedi szezonális akciók és ünnepi ajánlatok',
        'Több azonos termék együttes vásárlásánál elérhető kedvezmények',
        'Korlátozott idejű, mégis állandó promóciók?',
    ]" :frontTitle="'Idő vagy a mennyiség?'" :TitleDiscountPercent="'Szezonálisan, Limitált Ideig'"
        :backText="'Black-Friday, Tavaszi akciók, vagy rendszeres vásárlóknak extra kedvezmények!'"
        :title_CTA="'Időszakos, Mennyiségi és Szezonális kedvezmények'" :icon="'⏰'" :linktopage="'SeasonalCoupons'">
        <div class="mx-auto lg:space-y-2 text-lg">
            <div class="flex items-center">
                <span class="text-yellow-400 mr-2 lg:mr-4"><i class="fa-solid fa-fire"></i></span>
                <span>Érdemes kihasználni a <b>Black Friday</b>, Tavaszi Akció vagy Rush-Hour villámkuponokat!</span>
            </div>
            <div>
                <span class="text-pink-400 mr-2 lg:mr-4"><i class="fa-solid fa-gift"></i></span>
                <span>Ünnepi időszakokban, vagy nagyobb mennyiségű vásárlás esetén külön "kedvezmény-kártya" akciókra is
                    lecsaphatsz.</span>
            </div>
            <div class="flex items-center">
                <span class="text-lime-500 mr-2 lg:mr-4"><i class="fa-solid fa-percent"></i></span>
                <span>Ezek az ajánlatok változóak, de akár <i class="font-semibold text-pink-500">20-30-50%-os
                        kedvezményt</i> is találhatunk.
                    <span class="font-semibold">Érdemes előre berakni a kosárba a kiszemelt cikkeket</span> a
                    maximális spórolásért!
                </span>
            </div>
            <div class="flex items-center">
                <span class="text-indigo-400 mr-2 lg:mr-4"><i class="fa-solid fa-layer-group"></i></span>
                <span>
                    Ha több terméket vásárolnál egyszerre, érdemes frissíteni rendszeresen az oldalt, így <span
                        class="font-bold text-orange-400">a kupon trükkökkel</span>
                    még többet megspórolhatsz!
                </span>
            </div>
            <p class="flex items-center">
                <span class="text-pink-300 mr-2 lg:mr-4"><i class="fa-solid fa-medal"></i></span>
                <span>
                    Csatlakozz a
                    <i class="text-pink-300 font-semibold cursor-pointer transition-colors hover:underline">Temu
                        Hűségprogramhoz</i>
                    , és fedezd fel az
                    <span class="text-rose-400 border-b-2 border-dotted border-pink-300/60 font-semibold">extra
                        kedvezményeket</span>!
                </span>
            </p>
            <div
                class="mx-8 my-2 px-3 py-2 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-900 font-semibold rounded">
                <i class="fa-solid fa-triangle-exclamation mr-2 text-yellow-600"></i>
                <b>Fontos: </b> Az időszakos promóciók gyorsan <i class="text-sm">(általában 4-8-12 óra alatt, kivéve a
                    szezonális akciókat)</i> lejárnak,
                ezért érdemes a kinézett dolgainkat előre berakni a kosárba. Főleg, ha kifejezetten azokra szeretnénk
                kupont, kedvezményt kapni.
                Erről <u><b>bővebben</b></u> olvashatsz: <a href=""
                    class="underline underline-offset-2 italic text-slate-500 font-bold">itt</a>
            </div>
        </div>
    </DarkerSection>
    <!-- Section váltás -->
    <BrighterSection :listItems="[
        'Limitált idejű kedvezmények - gyakran 3-4 óráig elérhetőek.',
        'Villámeladások visszaszámlálóval - általában 30-60 percig elérhetőek.',
        'Azonnali kedvezmények a gyors cselekvésért - kosárban lévő termékek akciója.',
        'Vásárlás után szerezhető kuponok, kreditek akciója.',
    ]" :title_CTA="'Rendszeresen elérhető promóciók és kuponok'" :TitleDiscountPercent="'Promóciós Kuponok'"
        :frontTitle="'Mindenkinek!'" :backText="'Új és Meglévő felhasználók számára egyaránt!'" :icon="'🛒'"
        :linktopage="'PromoCoupons'">
        <div class="mx-auto lg:space-y-2 text-lg">
            <p>Az olyan akciók, mint a "villámeladások" <i>(Flash Sales)</i>, csak rövid ideig érhetők el, ezért
                azonnali
                döntésre és gyors cselekvésre ösztönöz az alkalmazás. </p>
            <p>Ezeknél az ajánlatoknál egy visszaszámláló jelzi, mennyi időd van még a vásárlásra, így biztosítva a
                gyors cselekvést. </p>
            <div
                class="mx-12 p-2 grid justify-center items-center bg-sky-100/25 rounded-lg lg:space-y-2 lg:text-justify border-2 border-amber-200/25">
                <p
                    class="font-bold bg-rose-500 py-1 px-2 rounded-lg border border-white/50 shadow-lg text-orange-50 w-fit">
                    Személyes tapasztalataim:
                </p>
                <div>
                    Alapvetően az alkalmazás - és a webshop - célja, hogy <span
                        class="text-white font-extrabold">eladjon nekünk, bármi áron</span>. A <span
                        class="bg-orange-400 text-white px-1 rounded-md">Temu</span>-nál ez hatványozotton érezhető
                    jelenség.
                </div>
                <p><b class="text-white flex justify-center mx-auto font-bolt border-b-2 border-white">Ugyanakkor...Miért
                        ne használnád ki
                        ezt?</b></p>
                <p><b>Fontos</b>, hogy ne hozzunk elhamarkodott döntést! Mivel az ilyen jellegű kuponokat a rendszer
                    <b>automatikusan állítja ki</b> a felhasználói fiókodra <i>- ha nem is
                        használod fel, de aktívan látogatod az applikációt és előre berakod a kosaradba a kinézett
                        termékeket -,</i><b> újra fel fogja ajánlani</b> az adott kupont, vagy akár jobb/nagyobb akciós
                    lehetőséget is.
                </p>

                <p>Összességében a véleményem az, hogy érdemes a kiszemelt <i>zsákmányokat</i> mindig előre berakni a
                    kosarunkba. A rendszer ezt látja, így hasonló termékeket - akár olcsóbban -, vagy célzott akciókkal,
                    kuponokkal fog <i>lecsapni ránk</i> <b>immáron felkészülten.</b>
                </p>
            </div>
        </div>

    </BrighterSection>

    <DarkerSection :listItems="[
        'Közvetlen támogatás az ügyfélszolgálattól, de hol találod?',
        'Probléma esetén milyen lehetőség van a visszatérítésen felül?',
        'Hogyan használd ki, hogy automata / mestersgéses intelligenciával épített ügyfél-támogatás van?',
    ]" :frontTitle="'Ne kérd vissza egyből!'" :TitleDiscountPercent="'Ügyfélszolgálattól szerezhető kuponok'"
        :backText="'Black-Friday, Tavaszi akciók, vagy rendszeres vásárlóknak extra kedvezmények!'"
        :title_CTA="'Temu ügyfélszolgálata - Kuponozásra?'" :icon="'⏰'"
                :linktopage="'SupportCoupons'">
        <div class="mx-auto sm:space-y-2 text-lg">
            <div class="mx-auto sm:space-y-2 text-lg">
                <p>
                    <span class="font-semibold text-lime-400 inline-block mr-2"><i
                            class="fa-solid fa-lightbulb"></i></span>
                    Amennyiben bármilyen kérdésed vagy problémád akad egy webshopon, első lépésként mindenképp keresd
                    fel az
                    <a class="italic underline underline-offset-2 font-semibold text-orange-400 hover:bg-orange-50 hover:text-orange-600 transition-colors"
                        href="https://www.temu.com/hu/support-center.html?refer_page_name=home&amp;refer_page_id=10005_1746213123690_xkb4yis38u&amp;refer_page_sn=10005&amp;_x_sessn_id=b625bp4hxz"
                        target="_blank" rel="noopener">ügyfélszolgálatot</a>!
                    Ez szinte mindig gyors, hatékony és felhasználó-barát módon kezeli az ügyes-bajos dolgokat – ilyen
                    például a visszatérítés, szállítási kérdés vagy reklamáció is.
                </p>
                <p>
                    <b class="font-semibold bg-orange-400 px-2 py-0.5 rounded-md text-white mr-2">Instant tipp:</b>
                <ul class="coupon-list list-none pl-0 mt-1">
                    <li class="flex items-center gap-2">
                        <span class="coupon-icon text-pink-400"><i class="fa-solid fa-bolt"></i></span>
                        <span>
                            Jelentkezz be, és azonnal válaszd ki azt a rendelést, melyhez <b>kérdezni</b> vagy
                            <b>panaszt írni</b> szeretnél – <span class="tip text-lime-500 font-bold">kupon trükk</span>
                            a gyors kompenzációért!
                        </span>
                    </li>
                </ul>
                </p>
                <div
                    class="mx-12 p-2 grid justify-center items-center bg-sky-100/25 rounded-lg lg:space-y-2 lg:text-justify border-2 border-indigo-600/50">
                    <div class="flex justify-center flex-col items-center">
                        <p
                            class="font-bold bg-rose-500 py-1 px-2  my-2 rounded-lg border border-white/50 shadow-lg text-orange-50 w-fit">
                            🔥 HACK: Így szerezhetsz 20%-os kupont vagy instant jóváírást 3 perc alatt!
                        </p>
                    </div>
                    <div>
                        <p>
                            Egyre több ügyfélszolgálati feladatot vesz át a mesterséges intelligencia
                            <i>(röviden: AI)</i>. Ezalól a
                            <a class="bg-orange-400 text-white px-1 rounded-md" href="https://www.temu.com/hu"
                                target="_blank" rel="noopener">Temu</a> sem kivétel. Az AI asszisztenseket rendszeresen
                            tesztelem, hogyan reagálnak egyéni problémákra vagy kulcsszavakra.
                        </p>

                        <div class="flex flex-col justify-center mx-auto my-2">
                            <p
                                class="lg:text-2xl bg-pink-500 w-fit mx-auto px-2 py-1 rounded-lg font-semibold italic underline underline-offset-4 text-center">
                                Miért előnyös, ha nem érti az ügyfélszolgálati robot, amit szeretnél?
                            </p>
                        </div>
                        <div class="my-4">
                            <p><b class="text-white font-bold">A válasz egyszerű:</b> <span
                                    class="text-yellow-300 font-semibold italic">hibázik</span>.</p>
                        </div>
                        <b><u>Így működik a kupon trükk, lépésről lépésre:</u></b>
                        <ul class="coupon-list list-none pl-0 mt-2">
                            <li class="flex items-center gap-2 pl-1">
                                <span class="coupon-icon"><i class="fa-solid fa-1 text-rose-400"></i></span>
                                <span>Kiválasztod a meglévő rendelésed. <span class="text-pink-300">*</span></span>
                            </li>
                            <li class="flex items-center gap-2 pl-1">
                                <span class="coupon-icon"><i class="fa-solid fa-2 text-rose-400"></i></span>
                                <span>Leírsz néhány kulcsszót vagy panaszt <span
                                        class="font-semibold text-orange-300 italic"> (például:
                                        késés, utálom, soha, elegem van</span>).
                                </span>
                            </li>
                            <li class="flex items-center gap-2 pl-1">
                                <span class="coupon-icon"><i class="fa-solid fa-3 text-rose-400"></i></span>
                                <span>
                                    Elfogadod a felajánlott <span class="text-yellow-300 font-semibold">20%-os
                                        kuponkedvezményt</span>.
                                </span>
                            </li>
                            <li class="flex items-center gap-2 pl-1">
                                <span class="coupon-icon"><i class="fa-solid fa-4 text-rose-400"></i></span>
                                <span>
                                    Ha azt nem választod, <span class="text-yellow-300 font-semibold">azonnali
                                        jóváírást</span> kapsz extra kredit formájában.
                                </span>
                            </li>
                        </ul>
                        <p class="text-center italic mt-2">
                            (Néhány erős kulcsszó is elég lehet a sikerhez!)
                        </p>
                        <div class="mt-4">
                            <p class="font-extrabold text-xl border-b-2 border-rose-300 w-fit mb-2">Összefoglalva:</p>
                            <ul class="coupon-list list-none pl-0">
                                <li class="flex items-center gap-2">
                                    <span class="coupon-icon"><i class="fa-solid fa-check text-lime-500"></i></span>
                                    <span>3 perc alatt <b class="text-lime-500">instant spórolás</b> lehetősége szinte
                                        minden tételre.</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="coupon-icon"><i class="fa-solid fa-coins"></i></span>
                                    <span>A rendszer <b class="text-lime-500">kuponnal</b> vagy <b
                                            class="text-lime-500">kredittel</b> kárpótol, hogy elégedett
                                        maradj.</span>
                                </li>
                            </ul>
                        </div>
                        <div
                            class="w-11/12 mx-auto bg-yellow-50 border-l-4 border-yellow-400 text-yellow-900 px-4 py-2 mb-3 lg:mt-8 font-semibold rounded">
                            <i class="fa-solid fa-triangle-exclamation mr-2 text-yellow-600"></i>
                            <b><span class="text-pink-500">*</span>Fontos:</b>
                            Bár a legtöbb témakör magyarul is elérhető, a pontos kérdéseket nehezen érti a rendszer.
                            <span class="font-bold text-orange-500">Emiatt előnyben vagy, ha kézzel begépeled a
                                <i>"problémát"</i>.
                            </span>
                            <p><b>Nem szükséges a tényleges visszatérítés igénylése</b> <i>(pl: a <a href=""
                                        class="underline underline-offset-2">kredit visszatérítési promóció</a>
                                    megtartásáért)</i>, már a panasz esetén fel szokta ajánlani a rendszer a kupont.</p>
                        </div>
                        <div class="flex justify-center opacity-65">
                            <p
                                class="italic text-sm bg-indigo-500/60 py-1 px-2 rounded-lg border border-white/50 shadow-lg text-orange-50 w-fit">
                                Saját tapasztalataim alapján
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </DarkerSection>
    <div class="flex items-center justify-center my-auto w-full" style="font-family: 'Nunito','Arial';">
        <div class="lg:my-20 w-full mb-20 flex items-center py-16 justify-center bg-slate-900 rounded-2xl">
            <div
                class="w-full md:w-full lg:w-4/5 xl:w-7/12 bg-gradient-to-r from-pink-900/50 to-purple-900/50 rounded-2xl p-12 backdrop-blur-lg border border-indigo-600">
                <div class="flex flex-col md:flex-row justify-center font-bold text-white text-center w-full">
                    <span class="hidden md:block text-xl md:text-2xl lg:text-2xl xl:text-3xl">👑</span>
                    <span class="text-3xl xl:text-4xl whitespace-nowrap">Ez is érdekelhet!</span>
                    <span class="hidden md:block text-xl md:text-2xl lg:text-2xl xl:text-3xl">👑</span>
                </div>
                <!-- Responsive Model container wrapper -->
                <div class="relative w-full max-h-[30svh] flex justify-center items-center mb-4">
                    <ModelViewer src="/csaladihaz.glb" />
                </div>

                <p class="text-2xl text-gray-100 my-8 text-center">
                    Kövesd tippjeinket és a pénztárcád helyett legyen<br>
                    <span class="text-orange-400 font-semibold">a lakásfelújítás maximumon!</span>
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button
                        class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-4 px-8 rounded-full transition-all duration-300 transform hover:scale-105 flex items-center justify-center gap-2">
                        Mutasd az utat! <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <BaseFooter />
</template>
<style>
.bookmark {
    @apply transition-all transform ease-in duration-200 hover:scale-105 cursor-pointer hover:bg-slate-800 p-1 w-fit rounded-md;
}

.orange-marker p::marker {
    color: #fb923c;
}

.glow-line {
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, transparent, #fff, transparent);
    animation: glow 2s infinite;
}

.text-container {
    perspective: 1000px;
}

.Outsmart {
    font-size: 4.5rem;
    color: orange;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
    padding: 1rem 2rem;
    border-radius: 15px;
    backdrop-filter: blur(5px);
    transform: rotateX(5deg);
    transition: transform 0.3s ease;
}

.material-symbols--fixed {
    font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24;
    font-size: 40px;
    width: 24px;
    height: 24px;
    line-height: 1;
    display: inline-flex;
    justify-content: center;
    align-items: center;
}
</style>
