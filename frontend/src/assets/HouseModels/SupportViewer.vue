<template>
    <div class="fixed bottom-4 right-4 z-50">
        <!-- Model Container -->
        <div ref="container mx-auto"
            class="model-container mx-auto flex justify-center items-center cursor-pointer transform hover:scale-105 transition-transform
             bg-white bg-opacity-85 border-x-4 border-amber-500/70 rounded-full border-b-8 border-b-orange-500/70 
             border-t-8 border-t-orange-500/70"
            @click="showInitialBubble">
            <canvas ref="modelCanvas" class="w-24 h-24 mx-auto lg:w-full lg:h-full "></canvas>
        </div>

        <!-- Initial Help Bubble -->
        <div v-if="isInitialBubbleVisible" @click="showChatInterface"
            class="absolute bottom-full mb-4 right-0 bg-white rounded-lg shadow-xl p-4 animate-fade-in w-52 lg:w-56 cursor-pointer hover:bg-gray-50">
            <div class="relative">
                <p class="text-rose-600 font-medium lg:text-nowrap text-center">
                    <i class="fa-solid fa-hand-peace text-rose-500 text-xl"></i> Segíthetek valamiben?
                </p>
                <div class="absolute -bottom-8 right-6 
                    border-l-[8px] border-l-transparent
                    border-t-[8px] border-t-rose-400
                    border-r-[8px] border-r-transparent">
                </div>
            </div>
        </div>

        <!-- Chat Interface -->
        <div v-if="isChatInterfaceVisible"
            class="absolute bottom-full mb-4 right-0 bg-indigo-100 rounded-xl shadow-xl animate-fade-in border-2 border-slate-600"
            style="width: 330px; max-height: 480px;">
            <!-- Chat Header -->
            <div class="p-4 bg-indigo-500 rounded-t-lg flex justify-between border-b-4 border-indigo-800 items-center">
                <h3 class="text-orange-100 text-xl" style="font-family: 'Nunito','Arial';">Temu-Kupon Asszisztens</h3>
                <button @click="closeChatInterface" class="text-white hover:bg-rose-400 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <!-- Chat all Messages -->
            <div ref="chatMessages" class="p-4 space-y-4 overflow-auto" style="height: 300px;">
                <div v-for="(message, index) in chatHistory" :key="index" :class="[
                    'p-3 rounded-lg max-w-[85%]',
                    message.type === 'user' ? 'bg-rose-400 text-white ml-auto'
                        : 'bg-indigo-500 text-orange-50 py-2'
                ]">
                    {{ message.icon }} {{ message.text }}
                </div>
            </div>
            <!-- Chat Inputja -->
            <div class="px-4 py-3">
                <div class="flex gap-2">
                    <input v-model="userMessage" @keyup.enter="sendMessage" type="text"
                        placeholder="Írja be üzenetét..."
                        class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:border-indigo-500" />
                    <button @click="sendMessage" :disabled="!userMessage.trim()"
                        class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 disabled:opacity-50
                         disabled:cursor-not-allowed">
                        Küldés
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue';
import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';

// Referenciák definiálása
const modelCanvas = ref(null);
const isInitialBubbleVisible = ref(false);
const isChatInterfaceVisible = ref(false);
const userMessage = ref('');
const chatMessages = ref(null);
const chatHistory = ref([
    { type: 'bot', icon: '💬', text: 'Üdvözlöm! Miben segíthetek?' }
]);

const props = defineProps({
    src: { type: String, required: true }
});

let renderer, scene, camera, controls, model, animationId;

function initThree() {
    // Fix méretezés
    const containerWidth = 96;
    const containerHeight = 96;
    scene = new THREE.Scene();

    // Kamera beállítások finomítása
    camera = new THREE.PerspectiveCamera(
        45,
        containerWidth / containerHeight,
        0.1,
        1500
    ); camera.position.set(0, 0, 0);

    renderer = new THREE.WebGLRenderer({
        canvas: modelCanvas.value,
        antialias: true,
        alpha: true,
    });

    renderer.setSize(containerWidth, containerHeight);
    renderer.setClearColor(0x000000, 0);
    renderer.setPixelRatio(window.devicePixelRatio);

    // Fények beállítása
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.7);
    scene.add(ambientLight);

    const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
    directionalLight.position.set(10, 10, 10);
    scene.add(directionalLight);

    // Model betöltése
    const loader = new GLTFLoader();
    loader.load(props.src, (gltf) => {
        model = gltf.scene;

        // Model méretezése és pozicionálása
        const box = new THREE.Box3().setFromObject(model);
        const size = box.getSize(new THREE.Vector3());
        const center = box.getCenter(new THREE.Vector3());

        const scale = 3 / Math.max(size.x, size.y, size.z);
        model.scale.setScalar(scale);
        model.position.sub(center.multiplyScalar(scale));

        // Kezdeti 45 fokos elforgatás az Y tengely körül
        model.rotation.y = 5.5;

        scene.add(model);

        camera.position.z = 4.5;
        camera.lookAt(0, 0, 0);
    });

    // függőleges mozgás korlátozása
    controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.05;
    controls.enableZoom = false;
    controls.enablePan = false;
    controls.autoRotate = true;
    controls.autoRotateSpeed = -0.3;

    // Függőleges forgatás korlátozása
    controls.minPolarAngle = Math.PI / 2;
    controls.maxPolarAngle = Math.PI / 2;
}

function animate() {
    animationId = requestAnimationFrame(animate);

    if (controls) {
        controls.update();
    }

    if (renderer && scene && camera) {
        renderer.render(scene, camera);
    }
}
const showInitialBubble = () => {
    isInitialBubbleVisible.value = true;
};

const showChatInterface = () => {
    isInitialBubbleVisible.value = false;
    isChatInterfaceVisible.value = true;
};

const closeChatInterface = () => {
    isChatInterfaceVisible.value = false;
    isInitialBubbleVisible.value = false;
};

onMounted(() => {
    nextTick(() => {
        initThree();
        animate();
    });
});

onBeforeUnmount(() => {
    if (animationId) {
        cancelAnimationFrame(animationId);
    }
    if (controls) {
        controls.dispose();
    }
    if (renderer) {
        renderer.dispose();
    }
});
</script>

<style>
.model-container {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 140px;
    width: fit-content;
    height: fit-content;
    max-height: 140px;
}

@media (min-width: 640px) {
    .model-container {
        height: 150px;
        width: 150px;
    }
}

@media (min-width: 768px) {
    .model-container {
        height: 200px;
        width: 200px;
    }
}

@media (min-width: 1024px) {
    .model-container {
        height: 150px;
        width: 150px;
    }
}

.animate-fade-in {
    transition: all;
    animation: 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
