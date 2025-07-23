    <template>
        <div class="flex flex-col h-full w-full">
            <Panel legend="BOARD"  toggleable >
                <template #header>
                    <Link :href="`/`" >
                        BOARD
                    </Link> 
                </template>
                <TopMenu :menus="$page.props.menus" />
            </Panel> 
            <slot>
                <!-- content 영역 -->
            </slot>
            <Footer />
        </div>
    </template>

    <script setup>
    import { Panel } from "primevue";
    import { Link,usePage } from '@inertiajs/vue3';
    import TopMenu from "../components/ui/TopMenu.vue";
    import Footer from "../components/ui/Footer.vue";

    // const props = defineProps({
    //     menus:{
    //         type: Object
    //     }
    // })
    const page = usePage();
    console.log("boardlayout");
    // console.log(props);
    </script>