<template>
    <form
        @submit.prevent="submit"
        enctype="multipart/form-data"
        class="w-full min-h-screen h-fit flex flex-col justify-start items-center space-y-6"
    >
        <div
            ref="slide"
            class="w-full h-[500px] flex justify-center items-center relative overflow-hidden"
            :style="`background-color: ${form.backgroundColor}`"
        >
            <img
                v-if="logoPreview"
                :src="logoPreview"
                alt="Logo"
                :style="`width: ${form.logoWidth}px; height: ${form.logoHeight}px; position: absolute; top: ${form.logoPositionY}px; left: ${form.logoPositionX}px; transform: scale(${form.logoScale});`"
            />
            <div
                ref="title"
                class="z-50"
                :style="`position: absolute; color: ${form.mainTitleColor}; font-size: ${form.mainTitleSize}px; left: ${form.mainTitlePositionX}px; top: ${form.mainTitlePositionY}px`"
            >
                {{ form.mainTitle }}
            </div>
        </div>
        <div
            class="w-full h-32 flex flex-col justify-start items-start px-6 space-y-3"
        >
            <label for="backgroundColor" class="text-xl text-black"
                >Background Color</label
            >
            <input
                type="color"
                v-model="form.backgroundColor"
                class="w-40 h-10 rounded-lg border-2 border-black"
            />
        </div>
        <div class="w-full h-56 grid grid-cols-3">
            <div
                class="col-span-1 flex flex-col justify-start items-start px-6 space-y-3"
            >
                <label for="uploadLogo" class="text-xl text-black"
                    >Upload Logo</label
                >
                <input type="file" @input="logoHandler" />
            </div>
            <div
                class="col-span-1 flex flex-col justify-start items-start px-6 space-y-3"
            >
                <div
                    class="w-full h-1/2 flex flex-col justify-start items-start"
                >
                    <label for="LogoWidth" class="text-xl text-black"
                        >Logo Width</label
                    >
                    <div
                        class="w-full h-auto flex justify-start items-center space-x-6"
                    >
                        <input
                            type="number"
                            v-model="form.logoWidth"
                            class="w-1/2 h-10 rounded-lg border-[1px] border-black"
                        />
                        <input
                            type="number"
                            v-model="form.logoScale"
                            class="w-1/2 h-10 rounded-lg border-[1px] border-black"
                        />
                    </div>
                </div>
                <div class="w-full h-1/2">
                    <label for="LogoWidth" class="text-xl text-black"
                        >Logo Height</label
                    >
                    <div
                        class="w-full h-auto flex justify-start items-center space-x-6"
                    >
                        <input
                            type="number"
                            v-model="form.logoHeight"
                            class="w-1/2 h-10 rounded-lg border-[1px] border-black"
                        />
                    </div>
                </div>
            </div>
            <div
                class="col-span-1 flex flex-col justify-start items-start px-6 space-y-3"
            >
                <div
                    class="w-full h-1/2 flex flex-col justify-start items-start"
                >
                    <label for="LogoWidth" class="text-xl text-black"
                        >Logo Position X</label
                    >
                    <div
                        class="w-full h-auto flex justify-start items-center space-x-6"
                    >
                        <input
                            type="range"
                            min="0"
                            :max="xRangeLogo"
                            v-model="form.logoPositionX"
                            class="w-1/2 h-10"
                        />
                        <input
                            type="number"
                            v-model="form.logoPositionX"
                            class="w-1/2 h-10 rounded-lg border-[1px] border-black"
                        />
                    </div>
                </div>
                <div class="w-full h-1/2">
                    <label for="LogoWidth" class="text-xl text-black"
                        >Logo Position Y</label
                    >
                    <div
                        class="w-full h-auto flex justify-start items-center space-x-6"
                    >
                        <input
                            type="range"
                            min="0"
                            :max="yRangeLogo"
                            v-model="form.logoPositionY"
                            class="w-1/2 h-10"
                        />
                        <input
                            type="number"
                            v-model="form.logoPositionY"
                            class="w-1/2 h-10 rounded-lg border-[1px] border-black"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-56 grid grid-cols-3">
            <div
                class="col-span-1 flex flex-col justify-start items-start px-6 space-y-3"
            >
                <label for="uploadLogo" class="text-xl text-black"
                    >Main Title</label
                >
                <input
                    type="text"
                    v-model="form.mainTitle"
                    class="w-full rounded-lg text-black px-2 h-10"
                />
            </div>
            <div
                class="col-span-1 flex flex-col justify-start items-start px-6 space-y-3"
            >
                <div
                    class="w-full h-1/2 flex flex-col justify-start items-start space-y-3"
                >
                    <label for="LogoWidth" class="text-xl text-black"
                        >Text Size</label
                    >
                    <div
                        class="w-full h-auto flex justify-start items-center space-x-6"
                    >
                        <input
                            type="number"
                            v-model="form.mainTitleSize"
                            class="w-1/2 h-10 rounded-lg border-[1px] border-black"
                        />
                    </div>
                </div>
                <div
                    class="w-full h-1/2 flex flex-col justify-start items-start space-y-3"
                >
                    <label for="LogoWidth" class="text-xl text-black"
                        >Text Color</label
                    >
                    <div
                        class="w-full h-auto flex justify-start items-center space-x-6"
                    >
                        <input
                            type="color"
                            v-model="form.mainTitleColor"
                            class="w-1/2 h-10 rounded-lg border-[1px] border-black"
                        />
                    </div>
                </div>
            </div>
            <div
                class="col-span-1 flex flex-col justify-start items-start px-6 space-y-3"
            >
                <div
                    class="w-full h-1/2 flex flex-col justify-start items-start"
                >
                    <label for="LogoWidth" class="text-xl text-black"
                        >Title Position X</label
                    >
                    <div
                        class="w-full h-auto flex justify-start items-center space-x-6"
                    >
                        <input
                            type="range"
                            min="0"
                            :max="xRangeTitle"
                            v-model="form.mainTitlePositionX"
                            class="w-1/2 h-10"
                        />
                        <input
                            type="number"
                            v-model="form.mainTitlePositionX"
                            class="w-1/2 h-10 rounded-lg border-[1px] border-black"
                        />
                    </div>
                </div>
                <div class="w-full h-1/2">
                    <label for="LogoWidth" class="text-xl text-black"
                        >Title Position Y</label
                    >
                    <div
                        class="w-full h-auto flex justify-start items-center space-x-6"
                    >
                        <input
                            type="range"
                            min="0"
                            :max="yRangeTitle"
                            v-model="form.mainTitlePositionY"
                            class="w-1/2 h-10"
                        />
                        <input
                            type="number"
                            v-model="form.mainTitlePositionY"
                            class="w-1/2 h-10 rounded-lg border-[1px] border-black"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-20 flex justify-start items-start px-6 mb-6">
            <button
                class="w-56 h-10 rounded-lg bg-purple-500 text-white text-xl"
            >
                Submit
            </button>
        </div>
    </form>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { onMounted, reactive, ref, watch } from "vue";

const form = reactive({
    backgroundColor: "#000000",
    logo: null,
    logoPositionX: 0,
    logoPositionY: 0,
    logoScale: 1,
    logoWidth: null,
    logoHeight: null,
    mainTitle: "",
    mainTitleSize: 16,
    mainTitlePositionX: 0,
    mainTitlePositionY: 0,
    mainTitleColor: "#ffffff",
});
const slide = ref();
const title = ref();
const logoPreview = ref();
const xRangeLogo = ref();
const yRangeLogo = ref();
const xRangeTitle = ref();
const yRangeTitle = ref();

onMounted(() => {
    yRangeTitle.value = slide.value.offsetHeight;
    xRangeTitle.value = slide.value.offsetWidth;
});

watch(
    () => form.logoWidth,
    () => {
        xRangeLogo.value = slide.value.offsetWidth - form.logoWidth;
    }
);
watch(
    () => form.logoHeight,
    () => {
        yRangeLogo.value = slide.value.offsetHeight - form.logoHeight;
    }
);

const logoHandler = (event) => {
    const reader = new FileReader();
    reader.readAsDataURL(event.target.files[0]);

    reader.onloadend = () => {
        logoPreview.value = reader.result;
    };

    form.logo = event.target.files[0];
};

const submit = () => {
    Inertia.post("/add-slide", form);
};
</script>
