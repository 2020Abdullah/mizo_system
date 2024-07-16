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
                        <h3 class="card-title" id="foodTitle1">اللحوم والمشويات</h3>
                        <div class="card-food">
                            <div class="card-food-content">
                                <div class="image">
                                    <img src="../../../../public/assets/images/foods/meat.png" alt="img">
                                </div>
                                <div class="info">
                                    <h3 class="food">كباب</h3>
                                    <p>150 جنيه</p>
                                </div>
                            </div>
                            <div class="card-food-price-table">
                                <ul>
                                    <li>
                                        <p>ربع</p>
                                        <span class="price">175</span>
                                    </li>
                                    <li>
                                        <p>نص</p>
                                        <span class="price">340</span>
                                    </li>
                                    <li>
                                        <p>كيلو</p>
                                        <span class="price">680</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-food">
                            <div class="card-food-content">
                                <div class="image">
                                    <img src="../../../../public/assets/images/foods/meat.png" alt="img">
                                </div>
                                <div class="info">
                                    <h3 class="food">كباب</h3>
                                    <p>150 جنيه</p>
                                </div>
                            </div>
                            <div class="card-food-price-table">
                                <ul>
                                    <li>
                                        <p>ربع</p>
                                        <span class="price">175</span>
                                    </li>
                                    <li>
                                        <p>نص</p>
                                        <span class="price">340</span>
                                    </li>
                                    <li>
                                        <p>كيلو</p>
                                        <span class="price">680</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3 class="card-title" id="foodTitle2">المحاشي</h3>
                        <div class="card-food">
                            <div class="card-food-content">
                                <div class="image">
                                    <img src="../../../../public/assets/images/foods/meat.png" alt="img">
                                </div>
                                <div class="info">
                                    <h3 class="food">كباب</h3>
                                    <p>150 جنيه</p>
                                </div>
                            </div>
                            <div class="card-food-price-table">
                                <ul>
                                    <li>
                                        <p>ربع</p>
                                        <span class="price">175</span>
                                    </li>
                                    <li>
                                        <p>نص</p>
                                        <span class="price">340</span>
                                    </li>
                                    <li>
                                        <p>كيلو</p>
                                        <span class="price">680</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3 class="card-title" id="foodTitle3">السندوتشات</h3>
                        <div class="card-food">
                            <div class="card-food-content">
                                <div class="image">
                                    <img src="../../../../public/assets/images/foods/meat.png" alt="img">
                                </div>
                                <div class="info">
                                    <h3 class="food">كباب</h3>
                                    <p>150 جنيه</p>
                                </div>
                            </div>
                            <div class="card-food-price-table">
                                <ul>
                                    <li>
                                        <p>ربع</p>
                                        <span class="price">175</span>
                                    </li>
                                    <li>
                                        <p>نص</p>
                                        <span class="price">340</span>
                                    </li>
                                    <li>
                                        <p>كيلو</p>
                                        <span class="price">680</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3 class="card-title" id="foodTitle4">السلطات</h3>
                        <div class="card-food">
                            <div class="card-food-content">
                                <div class="image">
                                    <img src="../../../../public/assets/images/foods/meat.png" alt="img">
                                </div>
                                <div class="info">
                                    <h3 class="food">كباب</h3>
                                    <p>150 جنيه</p>
                                </div>
                            </div>
                            <div class="card-food-price-table">
                                <ul>
                                    <li>
                                        <p>ربع</p>
                                        <span class="price">175</span>
                                    </li>
                                    <li>
                                        <p>نص</p>
                                        <span class="price">340</span>
                                    </li>
                                    <li>
                                        <p>كيلو</p>
                                        <span class="price">680</span>
                                    </li>
                                </ul>
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
        }
    },
    mounted(){
        this.mycategory();
    },
    methods: {
        myfilter(index, id){
            this.isActive = index;
            document.getElementById("foodTitle" + id).scrollIntoView();
        },
        mycategory(){
            axios.get('/api/category/list').then(response => {
                this.categoryList = response.data;
                console.log(this.categoryList);
            }).catch(err => {
                console.log(err);
            });
        }
    }
}
</script>