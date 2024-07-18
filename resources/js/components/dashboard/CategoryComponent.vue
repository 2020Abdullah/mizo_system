<template>
    <section class="category">
        <div class="loading" v-if="loading == true">
            <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="table-action">
            <div class="search">
                <input type="text" class="form-control" v-model="search" placeholder="بحث عن تصنيف ...">
            </div>
            <v-btn color="#f58328" data-bs-toggle="modal" data-bs-target="#addCategory">
                إضافة تصنيف جديد
            </v-btn>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>اسم التصنيف</th>
                        <th>مفعل</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody class="text-right">
                    <tr v-for="(cate, index) in filteredItems" :key="index">
                        <td>{{ cate.name }}</td>
                        <td>{{ cate.is_active == 1 ? 'مفعل' : 'غير مفعل'}}</td>
                        <td class="d-flex gap-2 justify-content-center">
                            <v-btn color="#f58328" data-bs-toggle="modal" @click="editCategory(cate)" data-bs-target="#editCategory">
                                تعديل
                            </v-btn>
                            <v-btn color="#dc3545" @click="removeCategory(cate.id)">
                                حذف
                            </v-btn>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- models action -->
        <div class="modal fade" id="addCategory" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة تصنيف جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="addCategory">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">اسم التصنيف</label>
                            <input type="text" class="form-control" v-model="category.name">
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

        <div class="modal fade" id="editCategory" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل التصنيف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="updateCategory">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">التصنيف</label>
                            <input type="text" class="form-control" v-model="category.name">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">حالة التصنيف</label>
                            <select class="form-select" v-model="category.is_active">
                                <option :value="category.is_active" v-if="category.is_active == 1">مفعل</option>
                                <option :value="category.is_active" v-else>غير مفعل</option>

                                <option :value="category.is_active == 1 ? 0 : 1" v-if="category.is_active == 1">غير مفعل</option>
                                <option :value="category.is_active == 1 ? 0 : 1" v-else>مفعل</option>
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

export default {
    name: "CategoryComponent",
    data(){
        return {
            loading: true,
            categoryList: [],
            search: '',
            category: {
                id: "",
                name: "",
                is_active: "",
            }
        };
    },
    mounted(){
        this.getCategory();
        setTimeout(() => {
            this.loading = false
        }, 1000)
    },
    computed: {
        filteredItems(){
            return this.categoryList.filter(item => {
                return item.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
            })
        }
    },
    methods: {
        async getCategory(){
            await axios.get("/api/category/All").then(res => {
                this.categoryList = res.data;
            })
        },

        // add category 
        addCategory(){
            axios.post('/api/category/add', this.category).then(res => {
                Swal.fire({
                    title: 'عملية ناجحة',
                    text: res.data.message,
                    icon: 'success',
                });
                document.querySelector('#addCategory .btn-close').click();
                this.getCategory();
            })
        },

        // remove category 
        removeCategory(id){
            this.category.id = id;
            console.log(this.category.id);
            Swal.fire({
            title: "هل انت متأكد من حذف هذا التصنيف ؟",
            text: "لن تكون قادراً علي استعادته مرة أخرى",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "تأكيد الحذف"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/category/delete/'+ this.category.id).then(res => {
                        if(res.data.status == 'success'){
                            Swal.fire({
                                title: "تم الحذف!",
                                text: res.data.message,
                                icon: "success"
                            });
                            this.getCategory();
                        }
                    })
                }
            });
        },

        // show edit category and fill name
        editCategory(cate){
            this.category.id = cate.id;
            this.category.name = cate.name;
            this.category.is_active = cate.is_active;
        },

        // edit category 
        updateCategory(){
            axios.post('/api/category/update', this.category).then(res => {
                if(res.data.status == 'success'){
                    Swal.fire({
                        title: 'عملية ناجحة',
                        text: res.data.message,
                        icon: 'success',
                    });
                    document.querySelector('#editCategory .btn-close').click();
                    this.getCategory();
                }
            })
        }

    }
}
</script>