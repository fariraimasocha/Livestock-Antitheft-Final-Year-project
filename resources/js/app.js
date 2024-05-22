import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import Counter from "./Components/Counter.vue";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

import VueApexCharts from "vue3-apexcharts";

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el })
})

    .use(VueApexCharts)
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": true
    })
    .component('Counter', Counter)
    .mount(el);

