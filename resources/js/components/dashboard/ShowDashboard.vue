<template>
    <section class="showDashboard text-center">
        <div class="loading" v-if="loading == true">
            <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">عدد التصنيفات</h3>
                        <p class="h2">{{ category }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">عدد الوجبات</h3>
                        <p class="h2">{{ food }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "ShowDashboard",
    data(){
        return {
            loading: true,
            category: '',
            food: '',
        }
    },
    mounted() {
        this.getDashboard();

        setTimeout(() => {
            this.loading = false
        }, 1000)
    },
    methods: {
        async getDashboard(){
            await axios.get("/api/getDashboard").then(res => {
                this.category = res.data.categoryCount;
                this.food = res.data.FoodCount;
            }) 
        }
    }
}
</script>