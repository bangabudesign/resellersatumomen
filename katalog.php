<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Undangan Digital</title>
    <meta name="title" content="Undangan Digital">
    <meta name="description" content="Undangan pernikahan online atau undangan pernikahan digital dengan desain website ekslusif.">
    <meta itemprop="image" content="https://websiteanda.com/inv/logo.jpg">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://websiteanda.com">
    <meta property="og:title" content="Undangan Digital">
    <meta property="og:description" content="Undangan pernikahan online atau undangan pernikahan digital dengan desain website ekslusif.">
    <meta property="og:image" content="https://websiteanda.com/inv/logo.jpg">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Undangan Digital">
    <meta name="twitter:description" content="Undangan pernikahan online atau undangan pernikahan digital dengan desain website ekslusif.">
    <meta name="twitter:image" content="https://websiteanda.com/inv/logo.jpg">
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
  	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="root" class="flex flex-col container max-w-md mx-auto py-8 px-4" class="bg-white">
        <img class="rounded-full w-24 mx-auto mb-7 border-2 border-gray-100" src="/inv/logo.jpg" />
        <div class="text-center text-xl font-bold mb-10">Katalog Undangan Digital</div>
        <div v-if="loader" class="text-center">Loading...</div>
      	<div class="grid grid-cols-3 gap-3 mb-5">
            <div v-if="themes.length" v-for="theme in themes" :key="theme.id">
                <a :href="'https://websiteanda.com/inv/preview/' + theme.slug" target="_BLANK">
                    <img :src="theme.image_url" :alt="theme.name" class="rounded-md bg-gray-200" width="133" height="237">
                  	<div class="text-center text-sm mt-1 mb-2">{{ theme.name }}</div>
                </a>
                <a :href="'https://wa.me/6285559350885?text=Halo+Saya+Mau+Pesan+Undangan+Digital+'+encodeURIComponent(theme.name).replace('%20','+')" target="_BLANK" class="py-1 px-2 block bg-sky-800 hover:bg-sky-900 text-xs text-white text-center rounded-lg mb-4">Pesan</a>
            </div>
        </div>
    </div>
</body>

<script>
    new Vue({
        el: '#root',
        data: {
            loader: false,
            themes: null
        },
        mounted () {
          	this.getThemes()
        },
      	methods: {
          	getThemes() {
                this.loader = true
                axios.get('https://satumomen.com/api/themes?version=2').then((response) => {
                    this.themes = response.data.data
                    this.loader = false
                }).catch((error) => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors
                    }
                    this.loader = false
                })
            }
        }
    })
</script>

</html>