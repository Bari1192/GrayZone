<template>
    <div class="fixed bottom-4 right-4 z-50">
      <div
        ref="container"
        class="
          flex justify-center items-center cursor-pointer
          transition-transform transform hover:scale-105
          bg-white bg-opacity-85
          border-x-4 border-amber-500/70 rounded-full
          border-b-8 border-b-orange-500/70 border-t-8 border-t-orange-500/70
          w-[45px] h-[45px] 
          sm:w-[70px] sm:h-[70px]
          md:w-[85px] md:h-[85px]
          lg:w-[100px] lg:h-[100px]
          m-auto
        "
        @click="showInitialBubble"
      >
        <canvas ref="modelCanvas" class="w-full h-full"></canvas>
      </div>
  
      <!-- Help Bubble -->
      <div
        v-if="isInitialBubbleVisible"
        @click="showChatInterface"
        class="
          absolute bottom-full mb-4 right-0 bg-white rounded-lg shadow-xl p-4
          animate-fade-in w-52 lg:w-56 cursor-pointer hover:bg-gray-50"
      >
        <div class="relative">
          <p class="text-rose-600 font-medium text-center whitespace-nowrap">
            <i class="fa-solid fa-hand-peace text-rose-500 text-xl"></i>
            Szia! Segíthetek?
          </p>
          <div
            class="absolute -bottom-8 right-6
              border-l-[8px] border-l-transparent
              border-r-[8px] border-r-transparent
              border-t-[8px] border-t-rose-400"
          ></div>
        </div>
      </div>
  
      <div
        v-if="isChatInterfaceVisible"
        class="
          absolute bottom-full mb-4 right-0 bg-indigo-100 rounded-xl shadow-xl animate-fade-in
          border-2 border-slate-600 w-[330px] max-h-[480px]"
      >
        <!-- Chat Header -->
        <div class="p-4 bg-indigo-500 rounded-t-lg flex justify-between border-b-4 border-indigo-800 items-center">
          <h3 class="text-orange-100 text-xl font-nunito">Temu-Kupon Asszisztens</h3>
          <button @click="closeChatInterface" class="text-white hover:bg-rose-400 rounded-full p-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 0 1 1.414 0L10 8.586l4.293-4.293a1 1 0 1 1 1.414 1.414L11.414 10l4.293 4.293a1 1 0 0 1-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L8.586 10 4.293 5.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/>
            </svg>
          </button>
        </div>
        <!-- Chat History -->
        <div ref="chatMessages" class="p-4 space-y-4 overflow-auto" style="height:300px;">
          <div
            v-for="(message, index) in chatHistory"
            :key="index"
            :class="[
              'p-3 rounded-lg max-w-[85%]',
              message.type === 'user' ? 'bg-rose-400 text-white ml-auto' : 'bg-indigo-500 text-orange-50 py-2'
            ]"
          >
            {{ message.icon }}{{ message.text }}
          </div>
        </div>
        <!-- Chat Input -->
        <div class="px-4 py-3">
          <div class="flex gap-2">
            <input
              v-model="userMessage"
              @keyup.enter="submit"
              type="text"
              placeholder="Írja be üzenetét..."
              class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:border-indigo-500"
            />
            <button
              @click="submit"
              :disabled="!userMessage.trim()"
              class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 disabled:opacity-50 disabled:cursor-not-allowed"
            >Küldés</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted, onBeforeUnmount, nextTick, defineProps } from 'vue'
  import * as THREE from 'three'
  import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader'
  import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls'
  import { useChatStore } from '@stores/ChatStore.mjs'
  import { storeToRefs } from 'pinia'
  
  const modelCanvas = ref(null)
  const isInitialBubbleVisible = ref(false)
  const isChatInterfaceVisible = ref(false)
  const chatHistory = ref([{ type: 'bot', icon: '💬 ', text: 'Szia! Brúnó vagyok a GrayZone okos-asszisztense. Írd meg nekem, amit keresel és kikeresem neked, hogy pontosan hol találod.' }])
  const chatStore = useChatStore()
  const userMessage = ref('')
  const props = defineProps({ src: { type: String, required: true } })
  
  async function submit() {
    if (!userMessage.value.trim()) return
    chatHistory.value.push({ type: 'user', icon: '🗨️ ', text: userMessage.value })
    const reply = await chatStore.sendMessage(userMessage.value)
    chatHistory.value.push({ type: 'bot', icon: '💬 ', text: reply || 'Hiba történt!' })
    userMessage.value = ''
  }
  
  let renderer, scene, camera, controls, model, animationId
  
  function getContainerSize() {
    const width = window.innerWidth
    if (width >= 1024) return 170
    if (width >= 768) return 140
    if (width >= 640) return 110
    if (width >= 400) return 60
    return 60
  }
  
  function initThree() {
    const containerSize = getContainerSize()
    scene = new THREE.Scene()
    camera = new THREE.PerspectiveCamera(82, 0.9, 0.1, 1000)
    camera.position.set(0,0,0)
    renderer = new THREE.WebGLRenderer({ canvas: modelCanvas.value, antialias: true, alpha: true })
    renderer.setSize(containerSize, containerSize)
    renderer.setClearColor(0x000000, 0)
    renderer.setPixelRatio(window.devicePixelRatio)
  
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.7)
    scene.add(ambientLight)
    const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8)
    directionalLight.position.set(10, 10, 10)
    scene.add(directionalLight)
  
    const loader = new GLTFLoader()
    loader.load(props.src, (gltf) => {
      model = gltf.scene
      const box = new THREE.Box3().setFromObject(model)
      const size = box.getSize(new THREE.Vector3())
      const center = box.getCenter(new THREE.Vector3())
      const scale = 3 / Math.max(size.x, size.y, size.z)
      model.scale.setScalar(scale)
      model.position.sub(center.multiplyScalar(scale))
      model.rotation.y = 5.9
      scene.add(model)
      camera.position.z = 5
      camera.lookAt(0, 0, 0)
    })
  
    controls = new OrbitControls(camera, renderer.domElement)
    controls.enableDamping = true
    controls.dampingFactor = 0.05
    controls.enableZoom = false
    controls.enablePan = false
    controls.autoRotate = true
    controls.autoRotateSpeed = -0.3
    controls.minPolarAngle = Math.PI / 2
    controls.maxPolarAngle = Math.PI / 2
  }
  
  function animate() {
    animationId = requestAnimationFrame(animate)
    if (controls) controls.update()
    if (renderer && scene && camera) renderer.render(scene, camera)
  }
  
  function resizeThree() {
    if (!renderer || !camera) return
    const newSize = getContainerSize()
    renderer.setSize(newSize, newSize)
    camera.aspect = 1
    camera.updateProjectionMatrix()
  }
  
  const showInitialBubble = () => { isInitialBubbleVisible.value = true }
  const showChatInterface = () => {
    isInitialBubbleVisible.value = false
    isChatInterfaceVisible.value = true
  }
  const closeChatInterface = () => {
    isChatInterfaceVisible.value = false
    isInitialBubbleVisible.value = false
  }
  
  onMounted(() => {
    nextTick(() => {
      initThree()
      animate()
      window.addEventListener('resize', resizeThree)
    })
  })
  onBeforeUnmount(() => {
    if (animationId) cancelAnimationFrame(animationId)
    if (controls) controls.dispose()
    if (renderer) renderer.dispose()
    window.removeEventListener('resize', resizeThree)
  })
  </script>
  
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap');
  .font-nunito {
    font-family: 'Nunito', Arial, sans-serif !important;
  }
  @keyframes fade-in {
    from { opacity:0; transform: translateY(10px);}
    to { opacity:1; transform: translateY(0);}
  }
  .animate-fade-in {
    animation: fade-in 0.5s ease-in-out;
  }
  </style>
  