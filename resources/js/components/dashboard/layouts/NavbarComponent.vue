<template>
    <header class="Header">
        <div class="container">
            <div class="Header-section">
                <section class="logo">
                    <a href="#">لوحة التحكم</a>
                </section>

                <section class="menu-icons">

                    <div class="icon-drob" @click="toggleSidebarActive">
                        <fa :icon="['fas', 'bars']"></fa>
                    </div>
            
                    <div class="icon-drob" @click="toggleDark">
                        <fa :icon="['fas', 'sun']"></fa>
                    </div>

                    <div class="icon-drob" @click="logout()">
                        <fa :icon="['fas', 'sign-out']"></fa>
                    </div>

                </section>

            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "NavbarComponent",
    data(){
        return {
            user: '',
            menuActive: ''
        }
    },
    mounted(){
        let isAuth = localStorage.getItem('token');
        let user = JSON.parse(localStorage.getItem('user'));
        if(!isAuth){
            return this.$router.push({ path: "/login"})
        }
        else {
            this.user = user;
        }
        window.addEventListener("resize", this.responsve)
    },
    methods: {
        responsve(){
            var DeviceScreen = window?.innerWidth;
            var sidebar = document.querySelector('.sidebar');
            var content = document.querySelector('.content-wrapper');

            if(DeviceScreen < 768){
                sidebar.classList.remove('active');
                content.classList.add('full-width');
            }
        },

        logout(){
            let token = localStorage.getItem('token');
            axios.post("/api/auth/logout?token="+token).then(response => {
                localStorage.clear();
                this.$router.push({ path: "/login" })
            }).catch(err => {
                this.$router.push({ path: "/login" })
            });
        },

        toggleDark(){
            var page = document.getElementById("app");
            var icon = document.querySelector('.icon-light-dark');
            page.classList.toggle('dark');

            if(page.classList.contains('dark')){
                icon.classList.replace('fa-sun', 'fa-moon');
            }
            else {
                icon.classList.replace('fa-moon', 'fa-sun');
            }
        },
        toggleSidebarActive(){
            var sidebar = document.querySelector('.sidebar');
            var content = document.querySelector('.content-wrapper');
            sidebar.classList.toggle('active');
            content.classList.toggle('full-width');
        },
    }
}
</script>