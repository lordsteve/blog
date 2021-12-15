@props(['posts'])

<x-post-featured-card :post="$posts[0]" />

<livewire:posts-grid />