<template>
    <section class="authPage">
        <div class="container">
            <div class="form-area">
                <h3 class="heading">إنشاء حساب جديد</h3>
                <form method="POST" @submit.prevent="signUp">
                    <div class="mb-1">
                        <label class="form-label" for="name">اسم المستخدم</label>
                        <input type="text" class="form-control" id="name" v-model="form.name">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="email">البريد الإلكتروني</label>
                        <input type="text" class="form-control" id="email" v-model="form.email">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="password">كلمة المرور</label>
                        <input type="password" class="form-control" id="password" v-model="form.password">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="passConfirm">تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" id="passConfirm" v-model="form.passConfirm">
                    </div>
                    <div class="signBtn">
                        <v-btn type="submit" color="#f58328" size="x-large">إنشاء حساب جديد</v-btn>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
import '../../../css/auth.css';
import { useRouter } from 'vue-router';

export default {
    name: "SignUpComponent",
    data(){
        return {
            form: {
                name: '',
                email: '',
                password: '',
                passConfirm: '',
            }
        }
    },
    methods: {
        signUp(){
            this.axios.post("/api/signUp", this.form).then(response => {
                console.log(response);
            })
        }
    }
}
</script>