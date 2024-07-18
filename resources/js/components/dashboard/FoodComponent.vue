<template>
    <section class="foodList">
        <div class="loading" v-if="loading == true">
            <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="table-action">
            <div class="search">
                <input type="text" class="form-control" v-model="search" placeholder="بحث عن وجبة ...">
            </div>
            <v-btn color="#f58328" data-bs-toggle="modal" data-bs-target="#addFood">
                إضافة وجبة جديدة إلي القائمة
            </v-btn>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>التصنيف</th>
                        <th>صورة</th>
                        <th>اسم الوجبة</th>
                        <th>الوصف</th>
                        <th>السعر</th>
                        <th>حالة المنيو</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody class="text-right" v-if="foodList.length">
                    <tr v-for="(food, index) in filteredItems" :key="index" >
                        <td>{{ food.category.name }}</td>
                        <td>
                            <img :src="'/images/' + food.image" width="100" height="50" alt="img">
                        </td>
                        <td>{{ food.name }}</td>
                        <td>{{ food.info }}</td>
                        <td>{{ food.price }}</td>
                        <td>{{ food.is_active == 1 ? 'متاحة حالياً' : 'غير متاح' }}</td>
                        <td class="d-flex gap-2 justify-content-center">
                            <v-btn color="#f58328" data-bs-toggle="modal" @click="editFood(food)" data-bs-target="#editFood">
                                تعديل
                            </v-btn>
                            <v-btn color="#dc3545" @click="deleteFood(food.id)">
                                حذف
                            </v-btn>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- models action -->

        <!-- add food -->
        <div class="modal fade" id="addFood" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة وجبة جديدة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="addFood">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">اسم الوجبة</label>
                            <input type="text" class="form-control" required v-model="food.name">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">الوصف</label>
                            <input type="text" class="form-control" required v-model="food.info">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">السعر</label>
                            <input type="text" class="form-control" required v-model="food.price">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">الصورة</label>
                            <input type="file" class="form-control" @change="onchangeImage">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">التصنيف</label>
                            <select class="form-select" required v-model="food.category_id">
                                <option selected>اختر تصنيف ...</option>
                                <option :value="cate.id" v-for="(cate, index) in categoryList" :key="index" >
                                    {{ cate.name }}
                                </option>
                            </select>
                        </div>
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

        <!-- update food -->
        <div class="modal fade" id="editFood" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل معلومات الوجبة</h5>
                <button type="button" class="btn-close" ref="CloseFoodadd" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="updateFood">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">اسم الوجبة</label>
                            <input type="text" class="form-control" required v-model="food.name">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">الوصف</label>
                            <input type="text" class="form-control" required v-model="food.info">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">السعر</label>
                            <input type="text" class="form-control" required v-model="food.price">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">الصورة</label>
                            <input type="file" class="form-control" @change="onchangeImage">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">التصنيف</label>
                            <select class="form-select" v-model="food.category_id">
                                <option :value="cate.id" v-for="(cate, index) in categoryList" :key="index" >
                                    <span>{{ cate.name }}</span>
                                </option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">الحالة</label>
                            <select class="form-select" v-model="food.is_active">
                                <option value="1" selected>متاحة</option>
                                <option value="0">غير متاحة</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            إلغاء
                        </button>
                        <button type="submit" class="btn btn-success">
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
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
import LeadingComponent from './LeadingComponent.vue';

export default {
    name: "FoodComponent",
    components: {
        LeadingComponent
    },
    data(){
        return {
            loading: true,
            search: '',
            categoryList: [],
            foodList: [],
            food: {
                id: '',
                name: '',
                price: '',
                image: '',
                info: '',
                category_id: '',
                is_active: '',
            },
            category_name: ''
        }
    },
    mounted(){
        this.getFood();
        this.getCategory();

        setTimeout(() => {
            this.loading = false
        }, 1000)

    },
    computed: {
        filteredItems(){
            return this.foodList.filter(item => {
                return item.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
            });
        }
    },
    methods: {
        async getCategory(){
            await axios.get("/api/category/list").then(res => {
                this.categoryList = res.data;
            })
        },
        async getFood(){
            await axios.get("/api/food/list").then(res => {
                this.foodList = res.data;
            })
        },

        async deleteFood(id){
            this.food.id = id;
            Swal.fire({
            title: "هل انت متأكد من حذف هذه الوجبة ؟",
            text: "لن تكون قادراً علي استعادتها مرة أخرى",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "تأكيد الحذف"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/food/delete/'+ this.food.id).then(res => {
                        if(res.data.status == 'success'){
                            Swal.fire({
                                title: "تم الحذف!",
                                text: res.data.message,
                                icon: "success"
                            });
                            this.getFood();
                        }
                    })
                }
            });
        },

        // show edit food and fill info
        editFood(food){
            this.food.id = food.id;
            this.food.image = food.image;
            this.food.name = food.name;
            this.food.info = food.info;
            this.food.is_active = food.is_active;
            this.food.price = food.price;
            this.food.category_id = food.category_id;
            this.category_name = food.category.name;
        },

        // edit Food 
        updateFood(){
            axios.post('/api/food/update', this.food).then(res => {
                if(res.data.status == 'success'){
                    Swal.fire({
                        title: 'عملية ناجحة',
                        text: res.data.message,
                        icon: 'success',
                    });
                    document.querySelector('#editFood .btn-close').click();
                    this.getFood();
                }
            }).catch(err => {
                console.log(err)
            })
        },

        onchangeImage(event){
            this.food.image = event.target.files[0];
        },
        addFood(){
            let config = {
                headers: {"content-type": "multipart/form-data"}
            };
            let formData = new FormData();
            formData.append('name', this.food.name);
            formData.append('info', this.food.info);
            formData.append('price', this.food.price);
            formData.append('image', this.food.image);
            formData.append('category_id', this.food.category_id);

            axios.post('/api/food/add', formData, config).then(res => {
                Swal.fire({
                    title: 'عملية ناجحة',
                    text: res.data.message,
                    icon: 'success',
                });
                document.querySelector('#addFood .btn-close').click();
                this.getFood();
            }).catch(err => {
                console.log(err)
            });
        }
    }
}
</script>