<template>
  <div class="flex justify-center">
    <nav aria-label="Page navigation example">
        <ul class="flex list-style-none">
            <li class="page-item"><Link
            class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded-full text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
            v-if="data.prev_page_url"
            :href="data.prev_page_url+'&search='+params">Anterior</Link></li>
    
        <li v-for="link in cleanLInks" :key="link.label"
            :class="{'bg-blue-600 text-white rounded-full' : link.active}"
            class="page-item mx-1"><Link
            :href="link.url+'&search='+params"
            class="page-link relative block py-1.5 px-3 border-0  outline-none transition-all duration-300 rounded-full hover:text-white hover:bg-blue-600 shadow-md focus:shadow-md"
            >{{ link.label }}</Link></li>


        <li class="page-item"><Link
            class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded-full text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
            v-if="data.next_page_url"
            :href="data.next_page_url+'&search='+params">Próximo</Link></li>
        </ul>
    </nav>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
    components: { Link },
    props:{
        data: Object,
        params: ''
    },
    computed:{
        cleanLInks(){
            const cleanLInks = [...this.data.links];
            cleanLInks.shift();
            cleanLInks.pop();
            return cleanLInks;
        }
    }
}
</script>