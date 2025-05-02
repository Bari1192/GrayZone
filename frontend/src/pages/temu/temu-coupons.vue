<script setup>
import BaseHeader from '@components/layout/BaseHeader.vue';
import BaseFooter from '@components/layout/BaseFooter.vue';
import BrighterSection from '@layouts/BrighterSection.vue';
import DarkerSection from '@layouts/DarkerSection.vue';
import { RouterLink } from 'vue-router';
import BookMarkSection from './sections/temu-coupons/bookmark.vue';

</script>

<template>
    <BaseHeader />

    <div class="w-full py-12 bg-gradient-to-r from-orange-400 via-orange-500 to-orange-400 rounded-b-2xl 
    shadow-2xl shadow-orange-700/40">
        <div class="max-w-[1500px] text-center mx-auto text-white">
            <p class="text-4xl md:text-5xl font-extrabold mb-4" style="font-family: Nunito;">
                Temu kuponok és kredit-visszatérítési lehetőségek
            </p>
            <p class="text-4xl md:text-5xl mb-4 lg:mb-8 italic" style="font-family: Tourney;">
                A Teljes Útmutató</p>
            <p class="text-lg md:text-3xl font-medium text-orange-100 my-2" style="font-family:Nunito ;">
                Használd ki a legújabb kedvezményeket, <span class="text-lime-500 font-extrabold">profi módon.</span>
            </p>
        </div>
    </div>

    <div class="flex flex-col justify-center items-start mx-auto lg:w-4/5 min-h-[50svh] text-white"
        style="font-family:Nunito ;">
        <div class="mx-auto text-2xl font-semibold">
            <p class="text-center text-3xl mt-20 font-extrabold">🎁 Helló, Shopping Fan! <i
                    class="fa-solid fa-box-open text-yellow-500"></i></p>
            <p class="m-4 text-center">Szeretnél spórolni, miközben a <b class="text-orange-400">Temu</b>-n vásárolsz,
                de nem vagy
                biztos benne,
                <b class="text-orange-400">hogyan kezdj neki?</b>
            </p>
            <p class="m-4 text-center">Kuponok tucatjait küldi neked a Temu de nem tudod, hogy <b
                    class="text-orange-400">hogyan
                    használhatod fel tudatosan?</b></p>
            <p class="my-4 text-center">Ne aggódj, most minden titkot elárulok a <br><b class="text-orange-400">Temu
                    kuponokról és visszatérítésekről,</b> egyszerűen
                és
                közérthetően.</p>

            <p class="m-8 text-left underline underline-offset-8">Lépésről lépésre összefoglaltam, hogy neked már ne
                kelljen:</p>

            <BookMarkSection />
            <p class="m-8 text-justify">Itt az ideje, hogy profin használd ki a kedvezményeket, még ha csak most
                találkozol
                először a
                Temu-val!</p>

            <router-link to="/temu/temu-help/coupon-help">
                <p class="m-8 text-justify lg:text-center text-yellow-400 hover:italic underline underline-offset-8">
                    Nem jelenik meg nálad az adott kupon? Itt a
                    segítség!
                </p>
            </router-link>
        </div>
    </div>

    <BrighterSection :listItems="['Új Felhasználói Kedvezmények', 'Minimum 30-90%-os kedvezmények az első vásárlásra.', 'Választott termék ajándék a vásárlásod mellé.',
        'Ingyenes szállítás első rendeléshez', 'Alkalmazás letöltési bónusz, akár további $20 kedvezményér',]"
        :frontTitle="'Új felhasználóknak'" :TitleDiscountPercent="'90%-os kedvezmény'"
        :backText="'Ezek a kedvezmények csak új felhasználók számára érhetők el, ezért érdemes rögtön kihasználni!'"
        :title_CTA="'Új felhasználóknak szóló regisztrációs kedvezmények'">
        <div class="mx-auto space-y-2 text-lg">
            <p>Ha először vásárolsz a Temun, 30%-tól 90%-ig kaphatsz kedvezményt az első rendelésedre, amely általában
                ~39 dollár
                értékű szokott lenni.</p>
            <p>Egyes promóciós kódok, mint például az '[SAJÁTOM]' kóddal akár <b>110.000 Forint értékű kupon</b>
                csomaghoz
                juthatsz.</p>
            <p>Sőt, <b>ha a mi kuponunkat használod</b>, azzal nem csak mi, hanem <b>Te is jól jársz!</b> </p>
            <p>Többször is felhasználhatod, azon túl, hogy támogatod vele a munkánkat.</p>
        </div>
    </BrighterSection>


    <!-- :listItems -->
    <!-- :title_CTA -->
    <!-- :TitleDiscountPercent -->
    <!-- :frontTitle -->
    <!-- :backText -->
    <!-- :icon -->

    <DarkerSection :listItems="[
        'Új és Meglévő Felhasználóknak egyaránt elérhető',
        'Minimum vásárlási összeg elérése szükséges.',
        'Extra szállítási kupon esetén a min. összeg alatt is elérhető.']" :frontTitle="'Mindenkinek!'"
        :TitleDiscountPercent="'Ingyenes szállítás'" :backText="'Új és Meglévő felhasználók számára egyaránt!'"
        :title_CTA="'Ingyenes szállítás – Kinek, mikor és milyen összeghatártól?'" :icon="'📦'">
        <div class="mx-auto space-y-2 text-lg">
            <p>A Temu rendszeresen kínál időszakos promóciókat, amelyek általában a főoldalon kerülnek kiemelésre.</p>
            <p> Ugyanakkor fontos megjegyezni, hogy a házhoz-szállítási költség általában 0 Ft, amennyiben a minimális
                vásárlási összeget eléred. </p>
            <p>Ez az összeg általában 7.000 - 8.000 Forint minimális rendelési összeget szokott jelenteni.</p>
        </div>
    </DarkerSection>

    <BrighterSection :listItems="['Aktuális ajánlatok folyamatos keresése? Bízd ránk inkább!',
        'Vásárlás és megtakarítás egyben kombinálva?',
        'Egyszerűen beváltható kuponok a vásárlási folyamatban?',
        'Mutatjuk is, hogyan lehetséges mindez!'
    ]" :title_CTA="'Rendszeresen elérhető promóciók és kuponok'" :TitleDiscountPercent="'Promóciós Kuponok'"
        :frontTitle="'Mindenkinek'" :backText="'Új és Meglévő felhasználók számára egyaránt!'" :icon="'📢'">
        <div class="mx-auto space-y-2 text-lg">
            Folyamatosan frissítjük oldalunkat, hogy a Temu ajánlataival mindig naprakész lehess, így elérd a legjobb
            kuponokat és akciókat. Ezek a
            kedvezmények gyorsan változnak, ezért érdemes rendszeresen ellátogatnod a Temu Főoldalára, ahol megtalálod
            az aktuális promóciókat. Ne feledd: minden egyes kupon lehetőség arra, hogy extra megtakarításokat érj el,
            miközben élvezed a vásárlás örömét!
            <p>A Temu rendszeresen kínál időszakos promóciókat, amelyek általában a főoldalon kerülnek kiemelésre.</p>
            <p> Ugyanakkor fontos megjegyezni, hogy a házhoz-szállítási költség általában 0 Ft, amennyiben a minimális
                vásárlási összeget eléred. </p>
            <p>Ez az összeg általában 7.000 - 8.000 Forint minimális rendelési összeget szokott jelenteni.</p>
        </div>

    </BrighterSection>

    <DarkerSection :listItems="[
        'Egyedi szezonális akciók és ünnepi ajánlatok',
        'Több azonos termék együttes vásárlásánál elérhető kedvezmények',
        'Korlátozott idejű, mégis állandó promóciók?',
    ]" :frontTitle="'Idő vagy a mennyiség?'" :TitleDiscountPercent="'Szezonálisan, Limitált Ideig'"
        :backText="'Black-Friday, Tavaszi akciók, vagy rendszeres vásárlóknak extra kedvezmények!'"
        :title_CTA="'Időszakos, Mennyiségi és Szezonális kedvezmények'" :icon="'⏰'">
        <div class="mx-auto space-y-2 text-lg">
            <p> Black Friday, Tavaszi Akció, Rush-Hour gyors vásárlást ösztönző kuponok?</p>
            <p> Ünnepi időszakokban, szezonális kiárusítások alkalmával és nagyobb mennyiségű vásárlás esetén
                fantasztikus akciókkal találkozhatsz. </p>
            <p>Ezek az ajánlatok akár 90%-os kedvezményt is biztosíthatnak számodra, így mindig érdemes figyelni az
                ideiglenes lehetőségeket.</p>
            <p>Ha több terméket vásárolsz egyszerre, még nagyobb megtakarításokat érhetsz el.</p>
            <p>Csatlakozz a <i class="text-pink-300 font-semibold cursor-pointer">Temu Hűségprogramhoz</i> és fedezd fel
                az <span class="text-rose-400 border-b-2 border-dotted border-pink-300/60 font-semibold ">extra
                    kedvezményeket!</span></p>
        </div>
    </DarkerSection>





    <BrighterSection :listItems="[
        'Limitált idejű kedvezmények - gyakran 3-4 óráig elérhetőek.',
        'Villámeladások visszaszámlálóval - általában 30-60 percig elérhetőek.',
        'Azonnali kedvezmények a gyors cselekvésért - kosárban lévő termékek akciója.',
        'Vásárlás után szerezhető kuponok, kreditek akciója.',
    ]" :title_CTA="'Rendszeresen elérhető promóciók és kuponok'" :TitleDiscountPercent="'Promóciós Kuponok'"
        :frontTitle="'Mindenkinek'" :backText="'Új és Meglévő felhasználók számára egyaránt!'" :icon="'🛒'">
        <div class="mx-auto space-y-2 text-lg">
            <p>Az olyan akciók, mint a "villámeladások" <i>(Flash Sales)</i>, csak rövid ideig érhetők el, ezért
                azonnali
                döntésre és gyors cselekvésre ösztönöz az alkalmazás. </p>
            <p>Ezeknél az ajánlatoknál egy visszaszámláló jelzi, mennyi időd van még a vásárlásra, így biztosítva a
                gyors cselekvést. </p>
            <div
                class="mx-12 p-2 grid justify-center items-center bg-sky-100/25 rounded-lg lg:space-y-2 lg:text-justify border-2 border-amber-200/25">
                <p class="font-bold bg-rose-500 py-1 px-2 rounded-lg border border-white/50 shadow-lg text-orange-50 w-fit">Személyes tapasztalataim:
                </p>
                <div>
                    Alapvetően az alkalmazás - és a webshop - célja, hogy <span
                        class="text-white font-extrabold">eladjon nekünk, bármi áron</span>. A <span
                        class="bg-orange-400 text-white px-1 rounded-md">Temu</span>-nál ez hatványozotton érezhető
                    jelenség.
                </div>
                <p><b class="text-white flex justify-center mx-auto font-bolt border-b-2 border-white">Ugyanakkor...Miért ne használnád ki
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



    [Kép helye: A Temu nyitóoldala, kiemelve az új felhasználóknak szóló kedvezményekkel]

    <!-- Alkalmazás-specifikus bónuszok
                A Temu app használata nemcsak kényelmesebb vásárlási élményt biztosít, hanem extra kedvezményeket is
                kínál: -->

    <!-- Ingyenes ajándék az alkalmazáson keresztüli vásárlásokhoz - Ha az alkalmazáson keresztül vásárolsz,
                gyakran kaphatsz ajándék termékeket a rendelésed mellé. -->



    <b class="text-2xl text-white font-bold">
        [Kép helye: A Temu app letöltési oldala, kiemelve az app-specifikus bónuszokat]
    </b>



    Ezek
    a
    kedvezmények gyakran változnak, így érdemes rendszeresen ellenőrizni az elérhető ajánlatokat.

    Szezonális kiárusítások - és egyéb ünnepi időszakokban akár
    90%-os kedvezményeket is találhatsz.

    Limitált idejű ajánlatok - Ezek a promóciók csak korlátozott ideig érhetőek el, így gyors cselekvésre
    ösztönöznek. Általában egy visszaszámláló jelzi, mennyi időd van még kihasználni az ajánlatot.

    Villámeladások (Flash Sales) - Ezek rendkívül rövid ideig tartó, jelentős kedvezményeket kínáló akciók
    bizonyos termékekre.

    [Kép helye: A Temu főoldala a szezonális promóciókat kiemelve,
    villámeladások szekciója]

    Kuponkódok és felhasználásuk
    A Temu kuponkódok különféle kedvezményeket kínálnak, és ezeket könnyedén beválthatod a vásárlás során:

    Egyedi kuponkódok - Például az "act545667" kód akár 100 USD kedvezményt és további 30% engedményt is
    biztosíthat a vásárlásod során.

    Kuponkód beváltás lépései:

    Válaszd ki a termékeket, amiket meg szeretnél vásárolni
    Add hozzá őket a kosaradhoz
    A fizetési folyamat során keresd a "Kuponkód beváltása" vagy hasonló mezőt
    Írd be vagy másold be a kuponkódot
    Kattints a "Beváltás" gombra
    A kedvezményt a rendszer automatikusan levonja a végösszegből
    [Kép helye: A Temu kosár/fizetés oldala, kiemelve a kuponkód beváltási mezőt]

    Hűségprogram és rendszeres kedvezmények
    A Temu jutalmazza a visszatérő vásárlókat is különféle kedvezményekkel és promóciókkal:

    Temu Circle hűségprogram - A program tagjai exkluzív kedvezményekhez és jutalmazási lehetőségekhez
    férhetnek
    hozzá.

    Meglévő felhasználók kedvezményei - A rendszeres vásárlók további 40% kedvezményt is kaphatnak a
    következő
    vásárlásukra, vagy akár 5-32% közötti visszatérítést is szerezhetnek.

    Bulk vásárlási kedvezmények - Ha több termékből rendelsz, további kedvezményekben részesülhetsz.

    [Kép helye: A Temu hűségprogram oldala, a különböző tagsági szintek és előnyök megjelenítésével]

    Speciális kedvezmények és termék-specifikus akciók
    Limitált kedvezmények és termék-specifikus akciók
    A Temu gyakran kínál olyan kedvezményeket, amelyek csak bizonyos termékkategóriákra vagy specifikus
    termékekre vonatkoznak:

    Kategória-specifikus kedvezmények - Egyes termékkategóriák, mint például női ruhák, technológiai
    eszközök
    vagy háztartási cikkek időszakosan akár 90%-os kedvezménnyel is elérhetőek.

    Termék-specifikus kuponok - Bizonyos termékekre célzott kuponok érhetők el, amelyek csak az adott
    termékre
    érvényesek.

    Időzített kedvezmények - Egyes termékek csak bizonyos időszakokban érhetők el kedvezménnyel, ösztönözve
    a
    gyors döntéshozatalt.

    [Kép helye: Termék-specifikus akciók és limitált kedvezmények a Temu oldalán]

    Csoportos vásárlás és mennyiségi kedvezmények
    A Temu különleges csoportos vásárlási funkciókat kínál, amelyekkel még több pénzt takaríthatsz meg:

    Csoportos vásárlási funkció - Együtt vásárolhatsz barátaiddal, ami mélyebb kedvezményekhez vezethet
    bizonyos
    termékek esetében.

    Mennyiségi kedvezmények - Minél többet vásárolsz egy termékből, annál nagyobb kedvezményben
    részesülhetsz.

    Kapcsolódó termékek csomagajánlatai - Ha kapcsolódó termékeket vásárolsz, extra kedvezményeket kaphatsz
    a
    csomagban.

    [Kép helye: Csoportos vásárlási funkció bemutatása és példa a mennyiségi kedvezményre]

    Kredit-visszatérítési lehetőségek
    Általános kredit-visszatérítési rendszer
    A Temu kredit-visszatérítési rendszere lehetővé teszi, hogy bizonyos összegeket visszakapj jövőbeli
    vásárlásokra, vagy problémák esetén kompenzációt kapj:

    Cashback rendszer - A vásárlások után akár 5-32% közötti visszatérítést is kaphatsz, amit későbbi
    vásárlásokra használhatsz fel.

    Temu hitelponok - A visszatérítések Temu kreditek formájában kerülnek jóváírásra a fiókodban, amelyeket
    később vásárlásokra válthatsz be.

    Lejárati idő - A legtöbb Temu kredit nem jár le, így bármikor felhasználhatod őket jövőbeli
    vásárlásokhoz.

    [Kép helye: A Temu fiók kredit egyenlegének megjelenítése és a visszatérítések nyomon követése]

    Problémák és késések utáni kompenzációk
    Ha bármilyen probléma merül fel a rendeléseddel kapcsolatban, a Temu különféle kompenzációkat kínálhat:

    Késedelmes szállítás kompenzációja - Ha a csomag később érkezik meg, mint az ígért szállítási idő, a
    Temu
    automatikusan jóváír egy bizonyos összeget a fiókodban. Standard szállítás késése esetén ez 5 USD (kb.
    1700
    Ft), expressz szállítás késése esetén pedig 13 USD (kb. 4400 Ft) kredit.

    Hibás vagy nem megfelelő termékek kompenzációja - Ha sérült vagy nem a leírásnak megfelelő terméket
    kapsz,
    teljes visszatérítést is igényelhetsz.

    Árváltozás miatti visszatérítés - Ha egy termék ára 30 napon belül csökken a vásárlás után, kérheted az
    árkülönbség visszatérítését. Ehhez a "Kérj árkorrekciót" opciót kell választanod a "Rendeléseid"
    menüben.

    [Kép helye: Problémás rendelés bejelentése és kompenzáció igénylése a Temu felületén]

    Vásárlóvédelmi garancia
    A Temu kiterjedt vásárlóvédelmi programot kínál, amely további visszatérítési lehetőségeket biztosít:

    90 napos visszatérítési garancia - 90 napon belül visszaküldheted a termékeket, ha nem vagy elégedett,
    és az
    első visszaküldés minden rendelés esetén ingyenes.

    Teljes visszatérítés problémás termékekre - Ha a termék nem érkezik meg, sérült állapotban érkezik, vagy
    nem
    egyezik a leírással, teljes visszatérítést kaphatsz a Temu Vásárlóvédelmi Program keretében.

    No-return refund - Bizonyos esetekben, különösen alacsony értékű termékeknél, a Temu visszatérítést
    adhat
    anélkül, hogy vissza kellene küldened a terméket.

    [Kép helye: A Temu Vásárlóvédelmi Program részletei és a visszatérítési folyamat]

    Pénzvisszafizetési és reklamációs lehetőségek
    Visszatérítési folyamat és lehetőségek
    Ha nem vagy elégedett a termékeiddel, a következő lépéseket követheted a visszatérítés igényléséhez:

    Visszatérítési kérelem benyújtása:

    Jelentkezz be a Temu fiókodba
    Navigálj a "Rendeléseid" szekcióba
    Válaszd ki az érintett rendelést
    Kattints a "Visszatérítés/Visszaküldés" gombra
    Válaszd ki a visszatérítés okát
    Tölts fel képeket a problémáról (ha szükséges)
    Válaszd ki a visszatérítés módját (eredeti fizetési mód vagy Temu kredit)
    Küldd be a kérelmet
    Visszatérítési módok - A visszatérítés történhet az eredeti fizetési módra (5-14 munkanap) vagy Temu
    kreditként, ami 3 percen belül megjelenik a fiókodban.

    Ingyenes visszaküldés - Az első visszaküldés minden rendelés esetén ingyenes, a további visszaküldések
    7,99
    USD-be kerülhetnek.

    [Kép helye: A Temu visszatérítési folyamat képernyőképe lépésről lépésre]

    Ügyfélszolgálat és problémakezelés
    Ha bármilyen problémád adódik a rendeléseddel, ezeken a módokon érheted el az ügyfélszolgálatot:

    Ügyfélszolgálat elérése:

    Nyisd meg a Temu alkalmazást vagy weboldalt
    Keresd meg a "Kapcsolat" vagy "Ügyfélszolgálat" opciót
    Válaszd ki a problémád típusát
    Részletezd a problémát és csatolj képeket, ha szükséges
    Problémák jelentése - Jelezheted a hiányzó tételeket, a kézbesítési problémákat vagy a termékekkel
    kapcsolatos problémákat. Ügyelj arra, hogy részletesen leírd a problémát és mellékelj bizonyítékokat
    (pl.
    fényképeke


    <BaseFooter />

</template>



<style>
.bookmark {
    @apply transition-all transform ease-in duration-200 hover:scale-105 cursor-pointer hover:bg-slate-800 p-1 w-fit rounded-md;
}

.orange-marker p::marker {
    color: #fb923c;
}
</style>