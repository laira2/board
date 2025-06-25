import '../css/app.css'
import './bootstrap';
import { createInertiaApp } from '@inertiajs/vue3'
import { createApp, h } from 'vue'
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(PrimeVue,{
        theme: {
          preset: Aura,  // 테마 설정
          options: {
            darkModeSelector: '.dark',
          }
        }
      })
      .mount(el)
  },
})