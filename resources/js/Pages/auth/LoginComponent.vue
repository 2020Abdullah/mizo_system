<template>
    <section class="authPage">
        <div class="container">
            <div class="form-area">
                <h3 class="heading">تسجيل الدخول</h3>
                <form method="POST" @submit.prevent="SignIn">
                    <div class="mb-1">
                        <label class="form-label" for="email">البريد الإلكتروني</label>
                        <input type="text" class="form-control" id="email" v-model="form.email">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="password">كلمة المرور</label>
                        <input type="password" class="form-control" id="password" v-model="form.password">
                    </div>
                    <div class="signBtn">
                        <v-btn type="submit" color="#f58328" size="x-large">تسجيل الدخول</v-btn>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
import '../../../css/auth.css';
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
    name: "LoginComponent",
    data(){
        return {
            form: {
                email: '',
                password: '',
            }
        }
    },
    methods: {
        SignIn(){
            axios.post('/api/auth/login', this.form).then(response => {
                if(response.data.status == 'success'){
                    localStorage.setItem('token', response.data.token);
                    localStorage.setItem('user', JSON.stringify(response.data.user));
                    this.$router.push({ path: "/dashboard"});
                }
                else {
                    Swal.fire({
                        title: 'هذا الحساب غير موجود بالفعل لدينا',
                        text: 'برجاء المحاولة مرة أخرى في وقت لاحق',
                        icon: 'error',
                    })
                }

            }).catch(err => {
                console.log(err)
            });
        }
    }
}
</script>