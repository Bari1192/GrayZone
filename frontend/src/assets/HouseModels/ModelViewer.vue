<template>
    <!-- Fontos: a container-hez hozzá kell rendelni a ref értéket! -->
    <div ref="container" class="model-container flex justify-center items-center mx-auto cursor-pointer"></div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue';
import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';

const props = defineProps({
    src: { type: String, required: true }
});

const container = ref(null);
let renderer, scene, camera, controls, model, animationId, startTime = null;

function initThree() {
    // Győződj meg róla, hogy a container már rendelkezésre áll, és annak mérete meghatározott
    const containerWidth = 280
    const containerHeight = 350;

    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(30, containerWidth / containerHeight, 0.1, 100);
    if (props.src.endsWith('Panelhaz.glb')) {
        camera.position.set(0, 2, 4);
    } else if (props.src.endsWith('csaladihaz.glb')) {
        camera.position.set(1, 4, 9);
    } else if (props.src.endsWith('support.glb')) {
        camera.position.set(0.5, 0.1, 0.1);
    } else {
        camera.position.set(1, 3.1, 7);
    }

    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setClearColor(0x000000, 0);
    renderer.setSize(containerWidth, containerHeight);
    renderer.setPixelRatio(window.devicePixelRatio);

    // Győződj meg róla, hogy van container.value, mielőtt hozzáadod a canvas-t!
    if (container.value) {
        container.value.appendChild(renderer.domElement);
    }

    const ambient = new THREE.AmbientLight(0xffffff, 0.67);
    scene.add(ambient);

    const dir = new THREE.DirectionalLight(0xffffff, 0.77);
    dir.position.set(7, 9, 7);
    scene.add(dir);

    const loader = new GLTFLoader();
    loader.load(props.src, (gltf) => {
        model = gltf.scene;
        model.position.set(0, 0, 0);
        if (props.src.endsWith('Panelhaz.glb')) {
            model.scale.set(0.1, 0.07, 0.09);
        } else if (props.src.endsWith('support.glb')) {
            camera.position.set(0.01, 0.01, 0.01);
        } else {
            model.scale.set(0.3, 0.3, 0.3);
        }
        model.traverse((n) => {
            if (n.isMesh) {
                n.castShadow = false;
                n.receiveShadow = false;
            }
        });
        scene.add(model);
    });

    controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.072;
    controls.enablePan = false;
    controls.enableZoom = false;
    controls.target.set(0, 1, 0);
    controls.minPolarAngle = Math.PI / 2.5;
    controls.maxPolarAngle = Math.PI / 2.9;
    controls.minDistance = 6;
    controls.maxDistance = 12;
}

function animate(ts) {
    animationId = requestAnimationFrame(animate);
    if (model) {
        if (!startTime) startTime = ts;
        const elapsed = (ts - startTime) / 1000;
        model.rotation.y = 5.5 / 100 * elapsed;
    }
    controls.update();
    renderer.render(scene, camera);
}

onMounted(() => {
    nextTick(() => {
        initThree();
        animate();
    });
});

onBeforeUnmount(() => {
    if (animationId) cancelAnimationFrame(animationId);
    if (renderer) renderer.dispose();
});
</script>

<style scoped>
.model-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 1rem;
    margin-bottom: 2rem;

}
</style>