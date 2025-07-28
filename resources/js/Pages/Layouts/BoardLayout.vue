    <template>
        <div class="flex flex-col h-full w-full mb-0 pb-0">
            <Panel legend="BOARD"  toggleable class="mb-0 pb-0" >
                <template #header >
                    <div class="m-0 p-0">
                        <Link :href="`/`" >     
                            BOARD
                        </Link> 
                    </div>
                    
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