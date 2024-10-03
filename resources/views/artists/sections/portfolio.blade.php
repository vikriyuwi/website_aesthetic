<!-- Portfolio Section -->
<div class="bg-white p-4 rounded-lg shadow-lg mt-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold">Portfolio</h3>
                <a href="#" class="text-gray-600 hover:text-gray-800"></a>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <img src="{{ asset('images/Assets/Category/Content/1.jpg') }}" alt="Portfolio work 1" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/2.jpg') }}" alt="Portfolio work 2" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/3.jpg') }}" alt="Portfolio work 3" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/4.jpg') }}" alt="Portfolio work 3" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/5.jpg') }}" alt="Portfolio work 3" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/6.jpg') }}" alt="Portfolio work 3" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/7.jpg') }}" alt="Portfolio work 3" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/8.jpg') }}" alt="Portfolio work 3" class="rounded-lg object-cover">
            </div>
        </div>

<script>
    const app = Vue.createApp({
        data() {
            return {
                portfolioItems: [
                    { title: 'Work Title 1', image: '{{ asset('images/Assets/3d-art.jpeg') }}', likes: 20, views: 15 },
                    { title: 'Work Title 2', image: '{{ asset('images/Assets/Portfolio/portfolio2.jpg') }}', likes: 30, views: 25 },
                    { title: 'Work Title 3', image: '{{ asset('images/Assets/Portfolio/portfolio3.jpg') }}', likes: 40, views: 35 }
                ]
            }
        }
    });

    app.mount('#app');
</script>
