<template>
    <sidebar class="sidebar active">
        <div class="close-sidebar" @click="closeSidebar">
            <i class="fa fa-window-close" aria-hidden="true"></i>
        </div>
        <div class="profile">
            <img src="../../../../../public/assets/images/user.png" alt="img">
            <h3>عبدالله محمد</h3>
            <span>مسؤول</span>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'showDashboard'}" active-class="active">
                    <i class="fa fa-home"></i>
                    <span>الرئيسية</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'category'}" active-class="active">
                    <i class="fas fa-graduation-cap"></i>
                    <span>التصنيفات</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'food'}" active-class="active">
                    <i class="fas fa-graduation-cap"></i>
                    <span>الوجبات</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'contact'}" active-class="active">
                    <i class="fas fa-graduation-cap"></i>
                    <span>معلومات الإتصال</span>
                </router-link>
            </li>
        </ul>
    </sidebar>
</template>

<script>
export default {
    name: "SidebarComponent",
    methods: {
        closeSidebar(){
            var sidebar = document.querySelector('.sidebar');
            var content = document.querySelector('.content-wrapper');
            sidebar.classList.remove('active');
            content.classList.add('full-width');
        }
    }
}
</script>