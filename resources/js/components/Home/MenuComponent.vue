<template>
    <section class="Menu-wrapper">
        <div class="container-fluid">
            <div class="menu-food">
                <div class="category-grid">
                    <button class="category-item" :class="{'active': index === isActive}" v-for="(cate, index) in categoryList" :key="index" @click="myfilter(index, cate.id)">
                        <span>{{ cate.name }}</span>
                    </button>
                </div>
            </div>
            <div class="menu-card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu-content" v-for="(item, index) in foodList" :key="index">
                            <h3 class="card-title" :id="'foodTitle'+ item.category_id">{{ item.category.name }}</h3>
                            <div class="card-food">
                                <div class="card-food-content">
                                    <div class="image">
                                        <img :src="'/images/'+ item.image" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3 class="food">{{ item.name }}</h3>
                                        <p>{{ item.info }}</p>
                                    </div>
                                </div>
                                <div class="card-food-price-table">
                                    <ul>
                                        <li>السعر</li>
                                        <li>{{ item.price }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</template>

<script>
export default {
    name: "MenuComponent",
    data(){
        return {
            isActive: 0,
            categoryList: [],
            foodList: [],
        }
    },
    mounted(){
        this.mycategory();
        this.getFood();
        this.getContact();
    },
    methods: {
        myfilter(index, id){
            this.isActive = index;
            document.getElementById("foodTitle" + id).scrollIntoView({ block: 'end',  behavior: 'smooth' });
        },
        mycategory(){
            axios.get('/api/category/list').then(response => {
                this.categoryList = response.data;
                console.log(response.data);
            }).catch(err => {
                console.log(err);
            });
        },
        async getFood(){
            await axios.get("/api/food/list").then(res => {
                this.foodList = res.data;
            })
        },
        getContact(){
            axios.get("/api/getContact").then(res => {
                this.contact.company_name = res.data.contact.company_name;
                this.contact.info = res.data.contact.info;
                this.contact.address = res.data.contact.address;
                this.contact.phone = res.data.contact.phone;
                this.contact.facebook_link = res.data.contact.facebook_link;
                this.contact.instegram_link = res.data.contact.instegram_link;
            })
        },
    }
}
</script>