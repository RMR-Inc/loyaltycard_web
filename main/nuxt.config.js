export default {
    // Global page headers: https://go.nuxtjs.dev/config-head
    head: {
        title: `LoyaltyCard`,
        htmlAttrs: {
            lang: "en",
        },
        meta: [
            { charset: "utf-8" },
            {
                name: "viewport",
                content: "width=device-width, initial-scale=1",
            },
            { hid: "description", name: "description", content: "" },
            { name: "format-detection", content: "telephone=no" },
        ],
        link: [
            { rel: "icon", type: "image/png", href: "/favicon.png" },
            {
                rel: "stylesheet",
                href: "https://cdn.loyaltycard.tech/css/common.css",
            },
        ],
        script: [
            { async: true, src: "https://cdn.loyaltycard.tech/js/common.js" },
        ],
    },

    // Global CSS: https://go.nuxtjs.dev/config-css
    css: [],

    server: {
        port: 9999,
    },

    // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
    plugins: ["~/plugins/extend-app.js"],

    // Auto import components: https://go.nuxtjs.dev/config-components
    components: true,

    // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
    buildModules: [],

    // Modules: https://go.nuxtjs.dev/config-modules
    modules: [
        // https://go.nuxtjs.dev/axios
        "@nuxtjs/axios",
        // https://go.nuxtjs.dev/pwa
        "@nuxtjs/pwa",
    ],

    // Axios module configuration: https://go.nuxtjs.dev/config-axios
    axios: {},

    // PWA module configuration: https://go.nuxtjs.dev/pwa
    pwa: {
        manifest: {
            lang: "en",
        },
    },

    // Build Configuration: https://go.nuxtjs.dev/config-build
    build: {},

    loading: {
        color: "#1D3557",
        height: "5px",
    },
};
