<template>
    <div class="container mt-5">
        <div class="page-error">
            <div class="page-inner">
                <h1>404</h1>
                <div class="page-description">
                    A página que você esta procurando não foi encontrada.
                </div>
                <div class="page-search">
<!--                    <form>-->
<!--                        <div class="form-group floating-addon floating-addon-not-append">-->
<!--                            <div class="input-group">-->
<!--                                <div class="input-group-prepend">-->
<!--                                    <div class="input-group-text">-->
<!--                                        <i class="fas fa-search"></i>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <input type="text" class="form-control" placeholder="Search">-->
<!--                                <div class="input-group-append">-->
<!--                                    <button class="btn btn-primary btn-lg">-->
<!--                                        Search-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
                    <div class="mt-3">
                        <router-link :to="{ name : 'home'}" >Voltar para Home</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {

    }
}
</script>
