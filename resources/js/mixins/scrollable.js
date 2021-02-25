const scrollable = {
    data() {
        return {
            is_mobile: false,
            loading: false
        }
    },
    methods: {
        activateAutoload(){
            // Não utilizado
            this.configureAutoLoad();
            window.addEventListener("resize", this.configureAutoLoad);
        },
        configureAutoLoad(){
            // Não utilizado
            if (screen.width < 640 || screen.height < 480) {
                console.log("mobile")
                this.is_mobile = true;
                this.scroll();
            }else{
                console.log("web")
                this.is_mobile = false;
                this.dissableScroll();
            }
        },
        scroll: function () {
            window.onscroll = () => {
                let endOfScreen =
                    Math.max(
                        window.pageYOffset,
                        document.documentElement.scrollTop,
                        document.body.scrollTop
                    ) +
                    window.innerHeight >=
                    document.documentElement.offsetHeight - 100;
                if (endOfScreen && this.next_page_url != null && !this.loading) {
                    this.loading = true;
                    this.loadMore();
                }
            };
        },
        dissableScroll: function () {
            // Não utilizado
            window.onscroll = () => {
                let endOfScreen =
                    Math.max(
                        window.pageYOffset,
                        document.documentElement.scrollTop,
                        document.body.scrollTop
                    ) +
                    window.innerHeight ===
                    document.documentElement.offsetHeight;

                if (endOfScreen && !this.is_last_page) {

                }
            };
        },
    }
}

export default scrollable
