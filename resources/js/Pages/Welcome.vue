<template>
    <div class="w-full h-[500px]">
        <Swiper
            navigation
            v-bind="settings"
            class="w-full h-full bg-purple-500"
        >
            <SwiperSlide
                @mousemove="getCursorPosition($event)"
                class="w-full h-full bg-red-500 text-3xl text-white flex justify-center items-center"
                >Slide 1
                <div
                    v-if="positionX && positionY"
                    class="w-4 h-4 bg-green-500 absolute rounded-lg"
                    :style="
                        'top:' + positionY + 'px; left: ' + positionX + 'px;'
                    "
                ></div>
            </SwiperSlide>
            <SwiperSlide
                @mousemove="getCursorPosition($event)"
                class="w-full h-full bg-red-500 text-3xl text-white flex justify-center items-center"
                >Slide 2</SwiperSlide
            >
            <SwiperSlide
                @mousemove="getCursorPosition($event)"
                class="w-full h-full bg-red-500 text-3xl text-white flex justify-center items-center"
                >Slide 3</SwiperSlide
            >
            <SwiperSlide
                @mousemove="getCursorPosition($event)"
                class="w-full h-full bg-red-500 text-3xl text-white flex justify-center items-center"
                >Slide 4</SwiperSlide
            >
            <div class="swiper-pagination"></div>
        </Swiper>
    </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination } from "swiper";

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

const getCursorPosition = (event) => {
    positionX.value = event.clientX;
    positionY.value = event.clientY;
    console.log(event.clientX + " = x || " + event.clientY + " = y");
};
</script>
