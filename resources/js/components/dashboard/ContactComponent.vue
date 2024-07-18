<template>
    <section class="contact">
        <div class="loading" v-if="loading == true">
            <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>معلومات عن الشركة</h3>
            </div>
            <div class="card-body">
                <div class="formContact">
                    <div class="mb-1">
                        <label class="form-label">اسم النشاط التجارى</label>
                        <input v-model="contact.company_name" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">وصف النشاط التجارى</label>
                        <textarea v-model="contact.info" class="form-control" cols="5" rows="5"></textarea>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">العنوان</label>
                        <input v-model="contact.address" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">رقم الهاتف</label>
                        <input v-model="contact.phone" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">لينك صفحة الفيسبوك إن وجد</label>
                        <input v-model="contact.facebook_link" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">لينك صفحة انستجرام إن وجد</label>
                        <input v-model="contact.instegram_link" type="text" class="form-control">
                    </div>
                    <div class="mt-2">
                        <v-btn color="#f58328" @click="contactUpdate">
                            حفظ البيانات
                        </v-btn>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
    name: "ContactComponent",
    data(){
        return {
            loading: true,
            contact: {
                company_name: "",
                info: "",
                address: "",
                phone: "",
                facebook_link: "",
                instegram_link: "",
            }
        }
    },
    mounted(){
        this.getContact();
        setTimeout(() => {
            this.loading = false
        }, 1000)
    },
    methods: {
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
        contactUpdate(){
            axios.post("/api/contact/update", this.contact).then(res => {
                Swal.fire({
                    title: 'عملية ناجحة',
                    text: res.data.message,
                    icon: 'success',
                });
            }).catch(err => {
                console.log(err)
            });
        }
    }
}

</script>