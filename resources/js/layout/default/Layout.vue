<template>
    <div class="wrapper">
        <Navbar />
        <section class="content">
            <div class="container">
                <slot />
            </div>
        </section>
        <Footer class="footer"/>
    </div>
</template>

<script>
import Navbar from "./parts/Navbar";
import Footer from "./parts/Footer";
export default {
    name: "Layout",
    components: {
        Navbar,
        Footer,
    }
}
</script>

<style>
    .wrapper{
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .content {
        height: 80vh;
    }

</style>
