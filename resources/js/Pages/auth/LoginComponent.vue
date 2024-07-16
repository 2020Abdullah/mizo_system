<template>
    <section class="authPage">
        <div class="container">
            <div class="form-area">
                <h3 class="heading">تسجيل الدخول</h3>
                <form method="POST" action="#">
                    <div class="mb-1">
                        <label class="form-label" for="email">البريد الإلكتروني</label>
                        <input type="text" class="form-control" id="email" v-model="user.email">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="password">كلمة المرور</label>
                        <input type="text" class="form-control" id="password" v-model="user.password">
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

export default {
    name: "LoginComponent",
    data(){
        return {
            user: {
                email: '',
                password: '',
            }
        }
    }
}
</script>