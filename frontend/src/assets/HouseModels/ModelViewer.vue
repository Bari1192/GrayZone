<template>
    <div class="model-container flex justify-center items-center mx-auto cursor-pointer border-2 border-yellow-200"
        ref="container">
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';

const props = defineProps({
    src: { type: String, required: true }
});

const container = ref(null);
// Ezek mind MINDEN példánynál ÚJ példány lesz:
let renderer, scene, camera, controls, model, animationId, startTime = null;

onMounted(() => {

    // MINDEN komponensnek saját scene-je, renderere, kamerája lesz!
    const width = 320;
    const height = 400;
    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(30, width / height, 0.1, 120);
    if (props.src.endsWith('Panelhaz.glb')) {
        camera.position.set(0, 2, 4); // Panel lakás
    } else if (props.src.endsWith('csaladihaz.glb')) {
        camera.position.set(0, 3, 7); // Családi ház
    } else if (props.src.endsWith('support.glb')) {
        camera.position.set(0.5, 0.1, 0.1);
    } else {
        camera.position.set(1, 3.1, 7); // Alapértelmezett
    }
    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setClearColor(0x000000, 0);
    renderer.setSize(width, height);
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.shadowMap.enabled = false;

    container.value.appendChild(renderer.domElement);

    const ambient = new THREE.AmbientLight(0xffffff, 0.67);
    scene.add(ambient);
    const dir = new THREE.DirectionalLight(0xffffff, 0.77);
    dir.position.set(7, 9, 7);
    scene.add(dir);

    const loader = new GLTFLoader();
    // CSAK azt tölti be, amit a props.src mutat!
    loader.load(
        props.src,
        (gltf) => {
            model = gltf.scene;
            model.position.set(0, 0, 0);

            // Méretkülönbség props.src alapján:
            if (props.src.endsWith('Panelhaz.glb')) {
                model.scale.set(0.1, 0.07, 0.09); // Fele akkora!
            } else if (props.src.endsWith('support.glb')) {
                camera.position.set(0.01, 0.01, 0.01);
            } else {
                model.scale.set(0.3, 0.3, 0.3); // Alapértelmezett
            }

            model.traverse((n) => {
                if (n.isMesh) {
                    n.castShadow = false;
                    n.receiveShadow = false;
                }
            });
            scene.add(model);
        }
    );

    controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.072;
    controls.enablePan = false;
    controls.enableZoom = false;
    controls.target.set(0, 1, 0);
    controls.maxPolarAngle = Math.PI / 2.13;
    controls.minDistance = 6;
    controls.maxDistance = 12;

    window.addEventListener('resize', onResize);
    animate();
});

onBeforeUnmount(() => {
    window.removeEventListener('resize', onResize);
    if (animationId) cancelAnimationFrame(animationId);
    if (renderer) renderer.dispose();
});

function animate(ts) {
    animationId = requestAnimationFrame(animate);
    if (model) {
        if (!startTime) startTime = ts;
        const elapsed = (ts - startTime) / 1000;
        model.rotation.y = - (2 * Math.PI / 60) * elapsed;
    }
    controls.update();
    renderer.render(scene, camera);
}

function onResize() {
    if (!renderer || !camera || !container.value) return;
    const width = container.value.clientWidth;
    const height = container.value.clientHeight;
    renderer.setSize(width, height);
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
}
</script>

<style scoped>
.model-container {
    min-width: 340px;
    width: 420px;
    max-width: 95vw;
    min-height: 500px;
    height: 500px;
    border-radius: 2rem;
    position: relative;
    background: transparent;
    overflow: hidden;
}
</style>