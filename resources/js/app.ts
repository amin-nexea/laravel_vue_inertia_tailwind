import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createPinia } from 'pinia'
import VueApexCharts from 'vue3-apexcharts'

// Import CSS files
import '@/assets/css/satoshi.css'
import '@/assets/css/style.css'

createInertiaApp({
  resolve: (name: string) => {
    const pages = import.meta.glob<any>('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(createPinia())
      .use(VueApexCharts)
      .mount(el)
  },
})