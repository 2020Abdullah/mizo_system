<template>
    <section class="price-list">
        <div class="table-action">
            <div class="search">
                <input type="text" class="form-control" v-model="search" placeholder="بحث عن وجبة ...">
            </div>
            <v-btn color="#f58328" data-bs-toggle="modal" data-bs-target="#addFoodPrice">
                إنشاء سعر جديد  
            </v-btn>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>الوجبة</th>
                        <th>الوزن</th>
                        <th>السعر</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody class="text-right">
                    
                </tbody>
            </table>
        </div>

        <!-- add food price -->
        <div class="modal fade" id="addFoodPrice" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة سعر للوجبة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="addFood">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">التصنيف</label>
                            <select class="form-select" required v-model="food.category_id" @change="getFoodList">
                                <option :value="cate.id" v-for="(cate, index) in categoryList" :key="index" >
                                    {{ cate.name }}
                                </option>
                            </select>
                        </div>
                        <transition name="fade" mode="out-in">
                            <div class="mb-2" v-if="food.category_id">
                                <label class="form-label">اسم الوجبة</label>
                                <select class="form-select" required v-model="food.category_id">
                                    <option selected>اختر الوجبة ...</option>
                                    <option :value="cate.id" v-for="(cate, index) in categoryList" :key="index" >
                                        {{ cate.name }}
                                    </option>
                                </select>
                            </div>
                        </transition>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            إلغاء
                        </button>
                        <button type="submit" class="saveBtn btn btn-success">
                            حفظ البيانات
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>

    </section>
</template>

<script>
export default {
    name: "FoodPriceComponent",
    data(){
        return {
            search: "",
            food: {
                category_id: "",
            }
        }
    },
    mounted(){
        this.getCategory();
    },
    methods: {
        async getCategory(){
            await axios.get("/api/category/list").then(res => {
                this.categoryList = res.data;
            })
        },
        getFoodList(){
            axios.post("/api/getfoodList").then(res => {
                console.log(res);
            })
        }
    }
}
</script>