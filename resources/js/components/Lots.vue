<template>
   <div class="container">
        <div class="row">
            <div className="form-group form-search">
                <div className="row">
                    <div className="col-4">
                        <input type="text" id="program" class="form-control" placeholder="Nom du programe" v-model="program">
                    </div>
                    <div className="col-4">
                        <input type="text" id="area" class="form-control" placeholder="Surface minimum" v-model="area">
                    </div>
                    <div className="col-4">
                        <input type="text" id="price" class="form-control" placeholder="Prix maximum" v-model="price">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <template v-for="lot in lots" :key="lot.id">
                <div class="col-4">
                    <div class="card">
                        <img :src="lot.picture" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" v-text="lot.number"></h5>
                            <p class="card-text" v-text="lot.program"></p>
                            <p class="card-text">Prix: {{ lot.price }} €</p>
                            <p class="card-text">Air: {{ lot.area }} m2</p>
                            <p class="card-text">Adresse: {{ lot.address }}</p>
                        </div>
                        </div>
                </div>
            </template>
        </div>
        <div class="row">
            <Pagination v-model="page" :records="total" :per-page="9" @paginate="changePage"/>
        </div>
   </div>
</template>

<script>

import { onMounted, watch } from "vue";
import useLots from "../services/LotService.js";
import Pagination from 'v-pagination-3';

export default {

    data() {
       return {
           page: 1
       }
    },

    components: {
        Pagination
    },

    methods: {
        changePage() {
            this.getLots(this.page);
        }
    },

    setup() {

        const { program, area, price, total, lots, pages, getLots } = useLots();

        watch(program, (newProgram, oldProgram) => getLots(1));

        watch(area, (newArea, oldPArea) => getLots(1));

        watch(price, (newPrice, oldPrice) =>  getLots(1));

        onMounted(getLots(1));

        return {
            program,
            area,
            price,
            total,
            lots,
            pages,
            getLots,
        }
    },

}

</script>

<style>
.form-search {
    background-color: rgb(31, 57, 201);
    margin: 20px;
    padding: 20px 50px;
    border-radius: 10px;
}
.card {
    margin-bottom: 20px;
}
</style>

