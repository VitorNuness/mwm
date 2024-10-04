import axios from "axios";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import PrimeVue from "primevue/config";
import Lara from "@primevue/themes/lara";
import { definePreset } from "@primevue/themes";

window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

const RosePreset = definePreset(Lara, {
    semantic: {
        primary: {
            50: "{rose.50}",
            100: "{rose.100}",
            200: "{rose.200}",
            300: "{rose.300}",
            400: "{rose.400}",
            500: "{rose.500}",
            600: "{rose.600}",
            700: "{rose.700}",
            800: "{rose.800}",
            900: "{rose.900}",
            950: "{rose.950}",
        },
    },
});

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue, {
                theme: {
                    preset: RosePreset,
                },
            })
            .mount(el);
    },
});
