import { ref } from "vue";
import router from "../router/index.js"
import axios from 'axios';

export default function useLots() {

    const lots = ref([]);
    const program = ref("");
    const area = ref("");
    const price = ref("");
    const pages = ref([]);
    const total = ref(0);

    const getLots = async (page = 1) => {
        let response = await axios.get(`/api/lots?page=${page}&program=${program.value}&area=${area.value}&price=${price.value}`);
        lots.value = response.data.data;
        pages.value = response.data.meta.links;
        total.value = response.data.meta.total;
        //console.log(total.value);
    }

    return {
        program,
        area,
        price,
        total,
        lots,
        pages,
        getLots,
    }

}
