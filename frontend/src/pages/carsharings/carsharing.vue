<template>
    <BaseHeader />
    <!-- Mindkettő mást tölt be! -->
    <ModelViewer src="/csaladihaz.glb" />
    <ModelViewer src="/Panelhaz.glb" />
    <ModelViewer src="/support.glb" />

    <BaseFooter />

</template>

<script setup>
import ModelViewer from '@assets/HouseModels/ModelViewer.vue'
import BaseHeader from '@components/layout/BaseHeader.vue';
import BaseFooter from '@components/layout/BaseFooter.vue';
</script>