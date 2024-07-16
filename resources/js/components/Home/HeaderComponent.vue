<template>
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-theme-orange">
            <div class="container-fluid">
                <div class="headerTop">
                    <a class="logo" href="#">mizo</a>
                    
                    <ul class="menu">
                        <li>
                            <a href="#">
                                <fa :icon="['fas', 'search']"></fa>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <fa :icon="['fab', 'whatsapp']"></fa>
                            </a>
                        </li>
                        <li>
                            <a href="#">
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
    </header>
</template>

<script>
export default {
    name: "HeaderComponent"
}
</script>