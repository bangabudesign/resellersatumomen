<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>UNDI - Undangan Digital Indonesia</title>
    <meta name="title" content="UNDI - Undangan Digital Indonesia">
    <meta name="description" content="Bagikan Momen Terindahmu Dengan Cepat, Tepat Dan Hemat Bersama Undi Undangan Digital">
    <meta itemprop="image" content="https://undi.co.id/undangan/logo.jpg">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://undi.co.id">
    <meta property="og:title" content="UNDI - Undangan Digital Indonesia">
    <meta property="og:description" content="Bagikan Momen Terindahmu Dengan Cepat, Tepat Dan Hemat Bersama Undi Undangan Digital">
    <meta property="og:image" content="https://undi.co.id/undangan/logo.jpg">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="UNDI - Undangan Digital Indonesia">
    <meta name="twitter:description" content="Bagikan Momen Terindahmu Dengan Cepat, Tepat Dan Hemat Bersama Undi Undangan Digital">
    <meta name="twitter:image" content="https://undi.co.id/undangan/logo.jpg">
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
  	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="root" class="flex flex-col container max-w-md mx-auto py-8 px-4" class="bg-white">
        <img class="rounded-full w-24 mx-auto mb-7 border-2 border-gray-100" src="/undangan/logo.jpg" />
        <div class="text-center text-xl font-bold mb-10">Katalog Undangan Digital</div>
      	<div class="grid grid-cols-3 gap-3 mb-5">
            <div v-if="themes.length" v-for="theme in themes" :key="theme.id">
                <a :href="'https://undi.co.id/undangan/preview/' + theme.slug">
                    <img :src="theme.image_url" :alt="theme.name" class="rounded-md bg-gray-200" width="133" height="237">
                  	<div class="text-center text-sm mt-1 mb-2">{{ theme.name }}</div>
                </a>
                <a :href="'https://wa.me/628112006113?text=Halo+Saya+Mau+Pesan+Undangan+Digital+'+encodeURIComponent(theme.name).replace('%20','+')" target="_BLANK" class="py-1 px-2 block bg-cyan-500 hover:bg-cyan-600 text-xs text-white text-center rounded-lg mb-4">Pesan</a>
            </div>
        </div>
    </div>
</body>

<script>
    new Vue({
        el: '#root',
        data: {
            themes: null
        },
        mounted () {
          	this.getThemes()
        },
      	methods: {
          	getThemes() {
                this.loader = true
                axios.get('https://satumomen.com/api/themes?version=all').then((response) => {
                    this.themes = response.data.data
                }).catch((error) => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors
                    }
                })
            }
        }
    })
</script>

</html>