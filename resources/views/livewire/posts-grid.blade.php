<div id="wrapper" class="lg:grid lg:grid-cols-6">

    @foreach($posts->skip(1) as $post)
        <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
    @endforeach

    @if ($hasMorePages == true)
        <button id="loadButton" wire:click.prevent="loadMore" class='col-span-2 transition-colors duration-300 py-60 fade-in hover:bg-gray-100 rounded-xl hover:shadow-lg'>Load More</button>
    @endif

    <div
        x-data="{
            observe () {
                let observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            @this.call('loadMore');
                        }
                    })
                }, {
                    root: null
                })

                observer.observe(this.$el)
            }
        }"
        x-init="observe">
    </div>
</div>
