<template>
    <div class="w-full h-[500px]">
        <Swiper navigation v-bind="settings" class="w-full h-full">
            <SwiperSlide
                v-for="slide in slides"
                :key="slide.id"
                :style="`background-color: ${slide.background}`"
                class="h-full flex justify-center items-center relative"
            >
                <img
                    :src="`http://localhost:8000/storage/${slide.logo.image}`"
                    alt="Logo"
                    :style="`width: ${slide.logo.width}px; height: ${slide.logo.height}px; position: absolute; left: ${slide.logo.x}px; top: ${slide.logo.y}px;`"
                />
                <div
                    :style="`color: ${slide.title.color}; font-size: ${slide.title.size}px; position:absolute; left: ${slide.title.x}px;top: ${slide.title.y}px`"
                >
                    {{ slide.title.text }}
                </div>
            </SwiperSlide>
            <div class="swiper-pagination"></div>
        </Swiper>
    </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination } from "swiper";

const props = defineProps(["slides"]);

import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import { ref } from "@vue/runtime-core";

const positionX = ref(0);
const positionY = ref(0);

const settings = {
    slidesPerView: 1,
    pagination: {
        clickable: true,
    },
    modules: [Navigation, Pagination],
};
</script>
