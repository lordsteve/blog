<div class="lg:grid lg:grid-cols-6">
    @foreach($posts as $post)
        <x-post-card :post="$post" :key="$post['id']" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
    @endforeach
    
    @if ($hasMorePages)
        <button wire:click.prevent='loadMore' class='col-span-2 transition-colors duration-300 py-60 fade-in hover:bg-gray-100 rounded-xl hover:shadow-lg'>Load More</button>
    
        <div
            x-data="{
                observe () {
                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                @this.call('loadMore')
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
    @endif
</div>