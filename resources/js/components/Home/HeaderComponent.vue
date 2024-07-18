<template>
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-theme-orange">
            <div class="container-fluid">
                <div class="headerTop">
                    <a class="logo" href="#">mizo</a>
                    <ul class="menu">
                        <li>
                            <a :href="'https://wa.me/'+ contact.phone" target="_blank">
                                <fa :icon="['fab', 'whatsapp']"></fa>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#companyInfo">
                                <fa :icon="['fas', 'info-circle']"></fa>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <!-- background page -->
        <div class="background-cover">
            <img src="../../../../public/assets/images/bg-cover.jpg" alt="bg-cover">
            <div class="image-blur"></div>
        </div>

        <!-- model info company -->
        <div class="modal fade" id="companyInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">معلومات عن الشركة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="info" v-if="contact != null">
                    <p>اسم الشركة : {{ contact.company_name }}</p>
                    <p> رقم التواصل : {{ contact.phone }}</p>
                    <p> معلومات : {{ contact.info }}</p>
                    <p> العنوان : {{ contact.address }}</p>
                    <p v-if="contact.facebook_link != null"> صفحة الفيسبوك : {{ contact.facebook_link }}</p>
                    <p v-if="contact.instegram_link != null">انستجرام : {{ contact.instegram_link }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">حسناً</button>
            </div>
            </div>
        </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "HeaderComponent",
    data(){
        return {
            isSearch: false,
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
        searchActive(){
            this.isSearch = true;
        }
    }
}
</script>